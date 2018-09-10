<?php

require_once '../data/Connector.php';
include_once '../domain/Course.php';

class FiltersData extends Connector {

    /**
     * Capture array of years related to the courses related to a given professor
     * @param type $id person id (professor)
     * @return array years
     */
    public function getCoursesYearsByProfessor($id) {
        $query = 'call getCoursesYearsByProfessor(' . $id . ');';
        try {
            $rows = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($rows) > 0) {
                while ($row = mysqli_fetch_array($rows)) {
                    array_push($array, $row['year']);
                }
            }
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    /**
     * Capture array of years related to enrollment
     * @return array years
     */
    public function getCoursesYears() {
        $query = 'call getCoursesYears();';
        try {
            $rows = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($rows) > 0) {
                while ($row = mysqli_fetch_array($rows)) {
                    array_push($array, $row['year']);
                }
            }
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    /**
     * Current period id
     * @return type integer
     */
    public function getCurrentPeriod() {
        $query = 'call getCurrentPeriod();';
        try {
            $rows = $this->exeQuery($query);
            if (mysqli_num_rows($rows) > 0) {
                while ($row = mysqli_fetch_array($rows)) {
                    return $row['period'];
                }
            }
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }
}
