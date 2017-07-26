<?php

require_once '../data/Connector.php';
include '../domain/Period.php';
//require_once './resource/log/ErrorHandler.php';

class PeriodData extends Connector {

    public function getAllPeriods() {
        $query = "SELECT * FROM period";
        try {
            $periods = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($periods)) {
                $array[] = array("id" => $row['periodid'],
                    "period" => $row['period']);
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAllPeriodsByCourse($id) {
        $query = "call getCoursePeriodByCourse(" . $id . ")";
        try {
            $periods = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($periods)) {

                $currentPeriod = new Period(
                        $row['periodid'], $row['period']);
                array_push($array, $currentPeriod);
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function deletePeridoCourse($idCourse, $idPeriod) {
        $query = 'call deleteCoursePeriod(' . $idCourse . ', ' . $idPeriod . ');';
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

}
