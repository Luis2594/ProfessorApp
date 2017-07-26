<?php

require_once '../data/Connector.php';
include_once '../domain/Institution.php';
//require_once './resource/log/ErrorHandler.php';

class InstitutionData extends Connector {

    public function insert($institution) {

        $query = "call insertInstitution('"
                . $institution->getInstitutionName() . "','"
                . $institution->getInstitutionAddress() . "','"
                . $institution->getInstitutionFax() . "','"
                . $institution->getInstitutionPhone() . "','"
                . $institution->getInstitutionMission() . "','"
                . $institution->getInstitutionView() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($institution) {
        $query = "call updateInstitution("
                . $institution->getInstitutionId() . ",'"
                . $institution->getInstitutionName() . "','"
                . $institution->getInstitutionAddress() . "','"
                . $institution->getInstitutionFax() . "','"
                . $institution->getInstitutionPhone() . "','"
                . $institution->getInstitutionMission() . "','"
                . $institution->getInstitutionView() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getInstitution() {
        $query = 'call getInstitution();';
        try {
            $allInstitutions = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allInstitutions) > 0) {
                while ($row = mysqli_fetch_array($allInstitutions)) {
                    $currentInstitution = new Institution(
                            $row['institutionid'], $row['institutionname'], $row['institutionaddress'], $row['institutionfax'], $row['institutionphone'], $row['institutionmission'], $row['institutionview']
                    );
                    array_push($array, $currentInstitution);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getInstitutionObject() {
        $query = 'call getInstitution();';
        try {
            $allInstitutions = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allInstitutions) > 0) {
                while ($row = mysqli_fetch_array($allInstitutions)) {
                    return new Institution(
                            $row['institutionid'], $row['institutionname'], $row['institutionaddress'], $row['institutionfax'], $row['institutionphone'], $row['institutionmission'], $row['institutionview']
                    );
                }
            }
            return NULL;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

}
