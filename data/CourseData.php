<?php

require_once '../data/Connector.php';
include '../domain/Course.php';
//require_once './resource/log/ErrorHandler.php';


class CourseData extends Connector {

    public function insert($course) {
        $query = "call insertCourse('" . $course->getCourseCode() . "',"
                . "'" . $course->getCourseName() . "',"
                . "" . $course->getCourseCredits() . ","
                . "" . $course->getCourseLesson() . ","
                . "'" . $course->getCoursePdf() . "',"
                . "'" . $course->getCourseSpeciality() . "',"
                . "" . $course->getCourseType() . ")";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $id = trim($array[0]);
            return $id;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function insertPeriod($course, $period) {
        $query = "call insertCoursePeriod(" . $course . "," . $period . ")";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($course) {
        $query = "call updateCourse('" . $course->getCourseId() . "',"
                . "'" . $course->getCourseCode() . "',"
                . "'" . $course->getCourseName() . "',"
                . "'" . $course->getCourseCredits() . "',"
                . "'" . $course->getCourseLesson() . "',"
                . "'" . $course->getCoursePdf() . "',"
                . "'" . $course->getCourseSpeciality() . "',"
                . "'" . $course->getCourseType() . "')";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function delete($id) {
        $query = 'call deleteCourse("' . $id . '");';
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
        $query = "call getAllCourse()";
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {
                    $currentCourse = new Course(
                            $row['courseid'], $row['coursecode'], 
                            $row['coursename'], $row['coursecredits'], 
                            $row['courselesson'], $row['coursepdf'], 
                            $row['coursespeciality'], $row['coursetype']);
                    
                    $currentCourse->setSpecialityname($row['specialityname']);
                    array_push($array, $currentCourse);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }
    
    public function getAllParsed() {
        $query = "call getAllCourse()";
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {
                    $currentCourse = new Course(
                            $row['courseid'], $row['coursecode'], 
                            $row['coursename'], $row['coursecredits'], 
                            $row['courselesson'], $row['coursepdf'], 
                            $row['specialityname'], $row['coursetype']);
                    
                    array_push($array, $currentCourse);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getCourseId($id) {
        $query = 'call getCourseById("' . $id . '");';
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {
                    $currentCourse = new Course(
                            $row['courseid'], $row['coursecode'], $row['coursename'], $row['coursecredits'], $row['courselesson'], $row['coursepdf'], $row['coursespeciality'], $row['coursetype']);
                    $currentCourse->setSpecialityname($row['specialityname']);
                    array_push($array, $currentCourse);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getCourseToAssignProfessor($id) {
        $query = 'call getProfessorCourseByPersontId("' . $id . '");';
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {
                    $array[] = array(
                        "professorcourseid" => $row['professorcourseid'],
                        "courseid" => $row['courseid'],
                        "coursecode" => $row['coursecode'],
                        "coursename" => $row['coursename'],
                        "coursecredits" => $row['coursecredits'],
                        "courselesson" => $row['courselesson'],
                        "coursepdf" => $row['coursepdf'],
                        "specialityname" => $row['specialityname'],
                        "coursetype" => $row['coursetype'],
                        "groupnumber" => $row['groupnumber'],
                        "period" => $row['period'],
                        "professorcourseyear" => $row['professorcourseyear']);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getCourseToAssignCurriculum($id) {
        $query = 'call getCurriculumCourseByCurriculum(' . $id . ');';
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {

                    $array[] = array(
                        "curriculumcourseid" => $row['curriculumcourseid'],
                        "courseid" => $row['courseid'],
                        "coursecode" => $row['coursecode'],
                        "coursename" => $row['coursename'],
                        "coursecredits" => $row['coursecredits'],
                        "courselesson" => $row['courselesson'],
                        "coursepdf" => $row['coursepdf'],
                        "specialityname" => $row['specialityname'],
                        "coursetype" => $row['coursetype'],
                        "period" => $row['period']);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getCourseIdUpdate($id) {
        $query = 'call getCourseByIdUpdate("' . $id . '");';
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {
                    $currentCourse = new Course(
                            $row['courseid'], $row['coursecode'], $row['coursename'], $row['coursecredits'], $row['courselesson'], $row['coursepdf'], $row['coursespeciality'], $row['coursetype']);
                    array_push($array, $currentCourse);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getType() {
        $query = "SELECT * FROM coursetype";
        try {
            $type = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($type)) {
                $array[] = array("id" => $row['coursetypeid'],
                    "type" => $row['coursetype']);
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function confirmCode($code) {
        $query = "call confirmCode('" . $code . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $res = trim($array[0]);
            return $res;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

}
