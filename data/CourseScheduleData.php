<?php

require_once '../data/Connector.php';
include '../domain/CourseSchedule.php';
//require_once './resource/log/ErrorHandler.php';


class CourseScheduleData extends Connector {

    public function insert($courseSchedule) {
        $query = "call insert('" . $courseSchedule->getCourseScheduleDay() . "',"
                . "'" . $courseSchedule->getCourseScheduleHour() . "',"
                . "'" . $courseSchedule->getCourseScheduleOptional() . "',"
                . "'" . $courseSchedule->getCourseScheduleCourse() . "',"
                . "'" . $courseSchedule->getCourseScheduleProfessor() . "',"
                . "'" . $courseSchedule->getCourseScheduleStudent() . "')";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($courseSchedule) {
        $query = "call update('" . $courseSchedule->getCourseScheduleDay() . "',"
                . "'" . $courseSchedule->getCourseScheduleHour() . "',"
                . "'" . $courseSchedule->getCourseScheduleOptional() . "',"
                . "'" . $courseSchedule->getCourseScheduleCourse() . "',"
                . "'" . $courseSchedule->getCourseScheduleProfessor() . "',"
                . "'" . $courseSchedule->getCourseScheduleStudent() . "')";
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
//            $allCourseSchedule = $this->exeQuery($query);
//            $array = [];
//            if (mysqli_num_rows($allCourseSchedule) > 0) {
//                while ($row = mysqli_fetch_array($allCourseSchedule)) {
//                    $currentCourseSchedule = new CourseSchedule(
//                            $row['courseScheduleId'], $row['courseScheduleDay'], $row['courseScheduleHour'], $row['courseScheduleOptional'], $row['courseScheduleCourse'], $row['courseScheduleProfessor'], $row['courseScheduleStudent']);
//                    array_push($array, $currentCourseSchedule);
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
//            $allCourseSchedule = $this->exeQuery($query);
//            $array = [];
//            if (mysqli_num_rows($allCourseSchedule) > 0) {
//                while ($row = mysqli_fetch_array($allCourseSchedule)) {
//                    $currentCourseSchedule = new CourseSchedule(
//                            $row['courseScheduleId'], $row['courseScheduleDay'], $row['courseScheduleHour'], $row['courseScheduleOptional'], $row['courseScheduleCourse'], $row['courseScheduleProfessor'], $row['courseScheduleStudent']);
//                    array_push($array, $currentCourseSchedule);
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
