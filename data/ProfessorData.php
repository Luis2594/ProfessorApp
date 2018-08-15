<?php

require_once '../data/Connector.php';
include_once '../domain/Professor.php';
include_once '../domain/ProfessorAll.php';

class ProfessorData extends Connector {

    public function insertProfessorWithCredentials($professor, $pass) {
        $query = "call insertProfessorWithCredentials("
                . "" . $professor->getProfessorPerson() . ","
                . "'" . $pass . "')";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    /**
     * Updates a professor record with a new person
     * @param type $professor
     * @return type
     */
    public function update($professor) {
        $query = "call updateProfessor(" . $professor->getProfessorId() . ","
                . "" . $professor->getProfessorPerson() . ")";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    /**
     * Deletes a professor record
     * @param type $id
     * @return boolean
     */
    public function delete($id) {
        $query = 'call delete("' . $id . '");';
        try {
            if ($this->exeQuery($query)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function getAll() {
        $query = "call getAllProfessor()";
        try {
            $allProfessors = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allProfessors) > 0) {
                while ($row = mysqli_fetch_array($allProfessors)) {
                    $currentProfessor = new ProfessorAll($row['professorid'], $row['personid'], $row['persondni'], $row['personfirstname'], $row['personfirstlastname'], $row['personsecondlastname'], $row['personemail'], $row['persongender'], $row['personnationality'], $row['userusername'], $row['useruserpass']);
                    array_push($array, $currentProfessor);
                }
            }
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function getAllSchedule() {
        $query = "call getAllProfessor()";
        try {
            $allProfessors = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allProfessors) > 0) {
                while ($row = mysqli_fetch_array($allProfessors)) {
                    $array[] = array(
//                        "professorid" => $row['professorid'],
                        "personid" => $row['personid'],
//                        "persondni" => $row['persondni'],
                        "personfirstname" => $row['personfirstname'],
                        "personfirstlastname" => $row['personfirstlastname'],
                        "personsecondlastname" => $row['personsecondlastname']);
//                        "personemail" => $row['personemail'],
//                        "persongender" => $row['persongender'],
//                        "personnationality" => $row['personnationality'],
//                        "userusername" => $row['userusername'],
//                        "useruserpass" => $row['useruserpass']);
                }
            }
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function getProfessor($id) {
        $query = 'call getProfessor("' . $id . '");';
        try {
            $allProfessor = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allProfessor) > 0) {
                while ($row = mysqli_fetch_array($allProfessor)) {
                    $currentProfessor = new ProfessorAll(
                            $row['professorid'], $row['personid'], $row['persondni'], $row['personfirstname'], $row['personfirstlastname'], $row['personsecondlastname'], $row['personemail'], $row['persongender'], $row['personnationality'], $row['userusername'], $row['useruserpass']);
                    array_push($array, $currentProfessor);
                }
            }
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function getLastId() {
        $query = 'call getProfessorLastId();';
        try {
            $value = $this->exeQuery($query);
            if (mysqli_num_rows($value) > 0) {
                $row = mysqli_fetch_array($value);
                return $row['id'];
            }
            return -1;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function insertCourseToProfessor($id, $group, $period, $course) {
        $query = "call insertProfessorCourse('" . $id . "',"
                . "'" . $group . "',"
                . "" . $period . ","
                . "" . $course . ","
                . "" . date("Y") . ")";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function deleteProfessorCourse($id) {
        $query = 'call deleteProfessorCourse(' . $id . ');';
        try {
            if ($this->exeQuery($query)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

}
