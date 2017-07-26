<?php

require_once '../data/Connector.php';
require_once '../domain/User.php';
require_once '../business/PersonBusiness.php';
////require_once './resource/log/ErrorHandler.php';

class UserData extends Connector {

    public function insert($user) {
        $query = "call insertUser('" . $user->getUserUsername() . "',"
                . "'" . $user->getUserPass() . "',"
                . "" . $user->getUserUserType() . ","
                . "" . $user->getUserPerson() . ")";
        try {
            $res = $this->exeQuery($query);

            return mysqli_num_rows($res);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function insertProfessorWithCredentials($user) {
        $query = "call insertProfessorWithCredentials('" . $user->getUserPerson() . "',"
                . "" . $user->getUserPass() . ")";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($user) {
        $query = "call updateUser('" . $user->getUserId() . "',"
                . "'" . $user->getUserUsername() . "',"
                . "'" . $user->getUserPass() . "')";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function delete($id) {
        $query = 'call delete("' . $id . '");';
        try {
            if ($this->exeQuery($query)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAll() {
        $query = "";
        try {
            $allUsers = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allUsers) > 0) {
                while ($row = mysqli_fetch_array($allUsers)) {
                    $currentUser = new CourseSchedule(
                            $row['userId'], $row['userUsername'], $row['userPass'], $row['userUserType'], $row['userPerson']);
                    array_push($array, $currentUser);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getUserId($id) {
        $query = "SELECT * FROM personuser WHERE userperson = " . $id;
        try {
            $allUser = $this->exeQuery($query);
            if (mysqli_num_rows($allUser) > 0) {
                while ($row = mysqli_fetch_array($allUser)) {
                    $currentUser = new User(
                            $row['userid'], $row['userusername'], $row['useruserpass'], $row['userusertype'], $row['userperson']);
                }
            }
            return $currentUser;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getLastId() {
        try {
            $this->getMaxIdTable('personuser');
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, "SELECT MAX(id) FROM personuser;", -1);
        }
    }

    public function login($user, $pass) {
        $query = "call login('" . $user . "', '" . $pass . "')";
        try {
            $result = $this->exeQuery($query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    session_start();
                    $_SESSION["img"] = $row['personimage'];
                    $_SESSION["type"] = $row['userusertype'];
                    $_SESSION["id"] = $row['personid'];
                    $_SESSION["name"] = $row['personfirstname'] + " " + $row['personfirstlastname'];
                    break;
                }
            }
            if (!isset($_SESSION['id']) || !isset($_SESSION['type']) || !isset($_SESSION['name']) || !isset($_SESSION['img'])) {
                // remove all session variables
                session_unset();

                // destroy the session 
                session_destroy();
                return FALSE;
            } else {
                return TRUE;
            }
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, -1);
        }
    }

    public function isUser($user, $pass) {
        $query = "call isUser('" . $user . "', '" . $pass . "')";
        try {
            $result = $this->exeQuery($query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    return new Person($row['personid'], $row['persondni'], $row['personfirstname'], $row['personfirstlastname'], $row['personsecondlastname'], $row['personemail'], $row['personbirthday'], $row['personage'], $row['persongender'], $row['personnationality'], $row['personimage']);
                }
            }
            return NULL;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, -1);
        }
    }

}
