<?php

require_once '../data/Connector.php';
include '../domain/Speciality.php';
//require_once './resource/log/ErrorHandler.php';

class SpecialityData extends Connector {

    public function insert($speciality) {
        $query = "call insertSpeciality('" . $speciality->getSpecialityName() . "')";
        try {
            $result = $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $id = trim($array[0]);
            return $id;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($speciality) {
        $query = "call updateSpeciality(" . $speciality->getSpecialityId() . ","
                . "'" . $speciality->getSpecialityName() . "')";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function delete($id) {
        $query = 'call deleteSpeciality(' . $id . ');';
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
        $query = "call getAllSpeciality();";
        try {
            $allSpecialities = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allSpecialities) > 0) {
                while ($row = mysqli_fetch_array($allSpecialities)) {
                    $currentSpeciality = new Speciality(
                            $row['specialityid'], $row['specialityname']);
                    array_push($array, $currentSpeciality);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAllSpecialitiesForCourse() {
        $query = "call getAllSpeciality();";
        try {
            $speciality = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($speciality)) {
                $array[] = array("id" => $row['specialityid'],
                    "name" => $row['specialityname']);
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getSpecialityId($id) {
        $query = 'call getSpecialityById("' . $id . '");';
        try {
            $allSpecialities = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allSpecialities) > 0) {
                while ($row = mysqli_fetch_array($allSpecialities)) {
                    $currentSpeciality = new Speciality(
                            $row['specialityid'], $row['specialityname']);
                    array_push($array, $currentSpeciality);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

}
