<?php

require_once '../data/Connector.php';
require_once '../domain/Person.php';

//require_once './resource/log/ErrorHandler.php';

class PersonData extends Connector {

    public function insert($person) {
        $query = "call insertPerson('" . $person->getPersonDni() . "',"
                . "'" . $person->getPersonFirstName() . "',"
                . "'" . $person->getPersonFirstlastname() . "',"
                . "'" . $person->getPersonSecondlastname() . "',"
                . "'" . $person->getPersonEmail() . "',"
                . "'" . $person->getPersonBirthday() . "',"
                . "'" . $person->getPersonGender() . "',"
                . "'" . $person->getPersonNacionality() . "',"
                . "'" . $person->getPersonimage() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $id = trim($array[0]);
            return $id;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($person) {
        $query = "call updatePerson('" . $person->getPersonId() . "',"
                . "'" . $person->getPersonDni() . "',"
                . "'" . $person->getPersonFirstName() . "',"
                . "'" . $person->getPersonFirstlastname() . "',"
                . "'" . $person->getPersonSecondlastname() . "',"
                . "'" . $person->getPersonEmail() . "',"
                . "'" . $person->getPersonBirthday() . "',"
                . "'" . $person->getPersonGender() . "',"
                . "'" . $person->getPersonNacionality() . "',"
                . "'" . $person->getPersonimage() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $res = trim($array[0]);
            return $res;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function delete($id) {
        $query = 'call deletePerson("' . $id . '");';
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
        $query = "SELECT * FROM `person`";
        try {
            $allPersons = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allPersons) > 0) {
                while ($row = mysqli_fetch_array($allPersons)) {
                    $currentPerson = new Person($row['personid'], $row['persondni'], $row['personfirstname'], $row['personfirstlastname'], $row['personsecondlastname'], $row['personemail'], $row['personbirthday'], $row['personage'], $row['persongender'], $row['personnationality'], $row['personimage']);
                    array_push($array, $currentPerson);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getPersonId($id) {
        $query = "call getPersonById('" . $id . "')";
        try {
            $allPerson = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allPerson) > 0) {
                while ($row = mysqli_fetch_array($allPerson)) {
                    $currentPerson = new Person($row['personid'], $row['persondni'], $row['personfirstname'], $row['personfirstlastname'], $row['personsecondlastname'], $row['personemail'], $row['personbirthday'], $row['personage'], $row['persongender'], $row['personnationality'], $row['personimage']);
                    array_push($array, $currentPerson);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function confirmDni($dni) {
        $query = "call confirmDni('" . $dni . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $res = trim($array[0]);
            return $res;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

}
