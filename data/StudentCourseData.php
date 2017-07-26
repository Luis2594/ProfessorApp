<?php

require_once '../data/Connector.php';
include '../domain/StudentCourse.php';
//require_once './resource/log/ErrorHandler.php';

class StudentCourseData extends Connector {

    public function insert($studentCourse) {
        $query = "call insert('" . $studentCourse->getStudentCourseStudent() . "',"
                . "'" . $studentCourse->getStudentCourseCourse() . "',"
                . "'" . $studentCourse->getStudentCourseYear() . "')";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($studentCourse) {
        $query = "call insert('" . $studentCourse->getStudentCourseId() . "',"
                . "'" . $studentCourse->getStudentCourseStudent() . "',"
                . "'" . $studentCourse->getStudentCourseCourse() . "',"
                . "'" . $studentCourse->getStudentCourseYear() . "')";
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

//    public function getAll() {
//        $query = "";
//        try {
//            $allStudentCourses = $this->exeQuery($query);
//            $array = [];
//            if (mysqli_num_rows($allStudentCourses) > 0) {
//                while ($row = mysqli_fetch_array($allStudentCourses)) {
//                    $currentStudentCourse = new CourseSchedule(
//                            $row['studentCourseId'], $row['studentCourseStudent'], $row['studentCourseCourse'], $row['studentCourseYear']);
//                    array_push($array, $currentStudentCourse);
//                }
//            }
//            return $array;
//        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
//        }
//    }

//    public function getCourseId($id) {
//        $query = "";
//        try {
//            $allStudentCourse = $this->exeQuery($query);
//            $array = [];
//            if (mysqli_num_rows($allStudentCourse) > 0) {
//                while ($row = mysqli_fetch_array($allStudentCourse)) {
//                    $currentStudentCourse = new CourseSchedule(
//                            $row['studentCourseId'], $row['studentCourseStudent'], $row['studentCourseCourse'], $row['studentCourseYear']);
//                    array_push($array, $currentStudentCourse);
//                }
//            }
//            return $array;
//        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
//        }
//    }

//    public function getLastId() {
//        
//    }

}
