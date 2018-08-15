<?php

require_once '../data/Connector.php';
include_once '../domain/Student.php';
include_once '../domain/StudentAll.php';

class StudentData extends Connector {

    public function insertStudentWithCredentials($student, $pass) {
        $query = "call insertStudentWithCredentials(" . $student->getStudentAdecuacy() . ","
                . "'" . $student->getStudentYearIncome() . "',"
                . "'" . $student->getStudentLocation() . "',"
                . "'" . $student->getStudentManager() . "',"
                . "" . $student->getStudentPerson() . ","
                . "'" . $pass . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $id = trim($array[0]);
            return $id;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function update($student) {
        $query = "call updateStudent('" . $student->getStudentPerson() . "',"
                . "'" . $student->getStudentAdecuacy() . "',"
                . "'" . $student->getStudentYearIncome() . "',"
                . "'" . $student->getStudentLocation() . "',"
                . "'" . $student->getStudentManager() . "')";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
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
            $this->Log(__METHOD__, $query);
        }
    }

    public function getAll() {
        $query = "call getAllStudent()";
        try {
            $allStudents = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allStudents) > 0) {
                while ($row = mysqli_fetch_array($allStudents)) {
                    $currentStudent = new StudentAll(
                            $row['personid'], $row['persondni'], $row['personfirstname'], $row['personfirstlastname'], $row['personsecondlastname'], $row['personemail'], $row['personbirthdate'], $row['personage'], $row['persongender'], $row['personnationality'], $row['studentadecuacy'], $row['studentyearincome'], $row['studentyearout'], $row['studentlocation'], $row['studentgroup'], $row['studentmanager'], $row['userusername'], $row['useruserpass']);
                    array_push($array, $currentStudent);
                }
            }
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }
    
     public function getStudentId($id) {
        $query = 'call getStudent("' . $id . '");';
        try {
            $allStudent = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allStudent) > 0) {
                while ($row = mysqli_fetch_array($allStudent)) {

                    $currentStudent = new StudentAll(
                            $row['personid'], 
                            $row['persondni'], 
                            $row['personfirstname'], 
                            $row['personfirstlastname'], 
                            $row['personsecondlastname'], 
                            $row['personemail'], 
                            $row['personbirthdate'], 
                            $row['personage'], 
                            $row['persongender'], 
                            $row['personnationality'], 
                            $row['studentadecuacy'], 
                            $row['studentyearincome'], 
                            $row['studentyearout'], 
                            $row['studentlocation'], 
                            "", 
                            $row['studentmanager'], 
                            $row['userusername'], 
                            $row['useruserpass']);

                    array_push($array, $currentStudent);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }


    public function getStudentsByCourse($id) {
        $query = 'call getStudentByCourse(' . $id . ');';
        try {
            $allStudent = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allStudent) > 0) {
                while ($row = mysqli_fetch_array($allStudent)) {

                    $currentStudent = new StudentAll(
                            $row['personid'], $row['persondni'], $row['personfirstname'], $row['personfirstlastname'], $row['personsecondlastname'], $row['personemail'], $row['personbirthdate'], $row['personage'], $row['persongender'], $row['personnationality'], $row['studentadecuacy'], $row['studentyearincome'], $row['studentyearout'], $row['studentlocation'], $row['studentgroup'], $row['studentmanager'], $row['userusername'], $row['useruserpass']);

                    array_push($array, $currentStudent);
                }
            }
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function getStudentByProfessor($id) {
        $query = 'call getStudentByProfessor("' . $id . '");';
        try {
            $allStudent = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allStudent) > 0) {
                while ($row = mysqli_fetch_array($allStudent)) {

                    $currentStudent = new StudentAll(
                            $row['personid'], $row['persondni'], $row['personfirstname'], $row['personfirstlastname'], $row['personsecondlastname'], $row['personemail'], $row['personbirthdate'], $row['personage'], $row['persongender'], $row['personnationality'], $row['studentadecuacy'], $row['studentyearincome'], $row['studentyearout'], $row['studentlocation'], $row['studentgroup'], $row['studentmanager'], $row['userusername'], $row['useruserpass']);

                    array_push($array, $currentStudent);
                }
            }
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

}
