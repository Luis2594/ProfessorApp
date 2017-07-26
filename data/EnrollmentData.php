<?php

require_once '../data/Connector.php';
include '../domain/Enrollment.php';
//require_once './resource/log/ErrorHandler.php';

class EnrollmentData extends Connector {

    public function insertEnrollment($enrollment) {
        $query = "call insertEnrollment('" . $enrollment->getEnrollmentperson() . "',"
                . "'" . $enrollment->getEnrollmentcourse() . "',"
                . "" . $enrollment->getEnrollmentgroup() . ","
                . "" . $enrollment->getEnrollmentperiod() . ","
                . "" . $enrollment->getEnrollmentstatus() . ")";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($idEnrollment, $status) {
        $query = "call updateEnrolloment('" . $idEnrollment . "',"
                . "" . $status . ")";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function delete($id) {
        $query = 'call deleteEnrollment("' . $id . '");';
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

    public function getCoursesAllEnrollmentByStudent($idStudent) {
        $query = "call getCoursesAllEnrollmentByStudent(" . $idStudent . ")";
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {
                    $date = new DateTime($row['enrollmentdate']);

                    $array[] = array("enrollmentid" => $row['enrollmentid'],
                        "enrollmentstatus" => $row['enrollmentstatus'],
                        "enrollmentdate" => $date->format("d-m-Y"),
                        "courseid" => $row['courseid'],
                        "coursecode" => $row['coursecode'],
                        "coursename" => $row['coursename'],
                        "coursecredits" => $row['coursecredits'],
                        "courselesson" => $row['courselesson'],
                        "coursepdf" => $row['coursepdf'],
                        "groupnumber" => $row['groupnumber'],
                        "period" => $row['period']);
//                    "coursetype" => $row['coursetype'],
//                    "personfirstname" => $row['personfirstname'],
//                    "personfirstlastname" => $row['personfirstlastname'],
//                    "personsecondlastname" => $row['personsecondlastname']);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getCoursesEnrollmentByStudent($idStudent) {
        $query = "call getCoursesEnrollmentByStudent(" . $idStudent . ")";
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {

                    $date = new DateTime($row['enrollmentdate']);

                    $array[] = array("enrollmentid" => $row['enrollmentid'],
                        "enrollmentstatus" => $row['enrollmentstatus'],
                        "enrollmentdate" => $date->format("d-m-Y"),
                        "courseid" => $row['courseid'],
                        "coursecode" => $row['coursecode'],
                        "coursename" => $row['coursename'],
                        "coursecredits" => $row['coursecredits'],
                        "courselesson" => $row['courselesson'],
                        "coursepdf" => $row['coursepdf'],
                        "groupnumber" => $row['groupnumber'],
                        "period" => $row['period']);
//                    "coursetype" => $row['coursetype'],
//                    "personfirstname" => $row['personfirstname'],
//                    "personfirstlastname" => $row['personfirstlastname'],
//                    "personsecondlastname" => $row['personsecondlastname']);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getCoursesApprovedByStudent($idStudent) {
        $query = "call getCoursesApprovedByStudent(" . $idStudent . ")";
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {

                    $date = new DateTime($row['enrollmentdate']);

                    $array[] = array("enrollmentid" => $row['enrollmentid'],
                        "enrollmentstatus" => $row['enrollmentstatus'],
                        "enrollmentdate" => $date->format("d-m-Y"),
                        "courseid" => $row['courseid'],
                        "coursecode" => $row['coursecode'],
                        "coursename" => $row['coursename'],
                        "coursecredits" => $row['coursecredits'],
                        "courselesson" => $row['courselesson'],
                        "coursepdf" => $row['coursepdf'],
                        "groupnumber" => $row['groupnumber'],
                        "period" => $row['period']);
//                    "coursetype" => $row['coursetype'],
//                    "personfirstname" => $row['personfirstname'],
//                    "personfirstlastname" => $row['personfirstlastname'],
//                    "personsecondlastname" => $row['personsecondlastname']);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getCoursesReprobateByStudent($idStudent) {
        $query = "call getCoursesReprobateByStudent(" . $idStudent . ")";
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {
                    $date = new DateTime($row['enrollmentdate']);

                    $array[] = array("enrollmentid" => $row['enrollmentid'],
                        "enrollmentstatus" => $row['enrollmentstatus'],
                        "enrollmentdate" => $date->format("d-m-Y"),
                        "courseid" => $row['courseid'],
                        "coursecode" => $row['coursecode'],
                        "coursename" => $row['coursename'],
                        "coursecredits" => $row['coursecredits'],
                        "courselesson" => $row['courselesson'],
                        "coursepdf" => $row['coursepdf'],
                        "groupnumber" => $row['groupnumber'],
                        "period" => $row['period']);
//                    "coursetype" => $row['coursetype'],
//                    "personfirstname" => $row['personfirstname'],
//                    "personfirstlastname" => $row['personfirstlastname'],
//                    "personsecondlastname" => $row['personsecondlastname']);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

}
