<?php

require_once '../data/Connector.php';
include_once '../domain/Group.php';
//require_once './resource/log/ErrorHandler.php';

class GroupData extends Connector {

    public function insert($number) {
        $query = "call insert('" . $number . "')";
        try {
            $result = $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $id = trim($array[0]);
            return $id;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function insertStudentGroup($idGroup, $idStudent, $priority) {
        $query = "call insertStudentGroup(" . $idGroup . ","
                . "" . $idStudent . ","
                . "" . $priority . ")";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function delete($idPerson, $group) {
        $query = 'call deleteStudentGroup(' . $idPerson . ', ' . $group . ');';
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
        $query = "call getAllGroups();";
        try {
            $group = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($group)) {
                $array[] = array("id" => $row['groupid'],
                    "number" => $row['groupnumber']);
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getStudentGroupByStudent($id) {
        $query = "call getStudentGroupByStudent(" . $id . ");";
        try {
            $group = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($group)) {
                $array[] = array("id" => $row['groupid'],
                    "number" => $row['groupnumber']);
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getGroupByPerson($id) {
        $query = 'call getGroupsByPersonId(' . $id . ');';
        try {
            $allGroups = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allGroups) > 0) {
                while ($row = mysqli_fetch_array($allGroups)) {
                    $currentGroup = new Group($row['studentgroupgroup'], $row['groupnumber'], $row['studentsgrouppriority']);
                    array_push($array, $currentGroup);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

}
