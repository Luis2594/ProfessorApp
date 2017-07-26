<?php

require_once '../data/Connector.php';
include_once '../domain/Curriculum.php';
include_once '../domain/CurriculumCourse.php';
include_once '../domain/Course.php';
//require_once './resource/log/ErrorHandler.php';

class CurriculumData extends Connector {

    public function insert($curriculum) {
        $query = "call insertCurriculum('" . $curriculum->getCurriculumName() . "',"
                . "'" . $curriculum->getCurriculumYear() . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $id = trim($array[0]);
            return $id;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function insertCurriculumCourse($idCurriculum, $idCourse) {
        $query = "call insertCurriculumCourse('" . $idCurriculum . "',"
                . "'" . $idCourse . "')";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function insertCourseToCurriculum($id, $period, $idCourse) {
        $query = "call insertCurriculumCourse(" . $id . ","
                . "" . $period . ","
                . $idCourse . ")";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($curriculum) {
        $query = "call updateCurriculum(" . $curriculum->getCurriculumId() . ","
                . "'" . $curriculum->getCurriculumName() . "',"
                . "" . $curriculum->getCurriculumYear() . ")";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function delete($id) {
        $query = 'call deteleCurriculum("' . $id . '");';
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
        $query = "call getAllCurriculum()";
        try {
            $allCurriculum = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCurriculum) > 0) {
                while ($row = mysqli_fetch_array($allCurriculum)) {
                    $currentCurriculum = new Curriculum(
                            $row['curriculumid'], $row['curriculumname'], $row['curriculumyear']);
                    array_push($array, $currentCurriculum);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAllEnrollment() {
        $query = "call getAllCurriculum()";
        try {
            $allCurriculum = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCurriculum) > 0) {
                while ($row = mysqli_fetch_array($allCurriculum)) {
                    $array[] = array("id" => $row['curriculumid'],
                        "name" => $row['curriculumname']);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAllCourses() {
        $query = "call getAllCourse()";
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

    public function getCurriculumCourseOutCurriculum($id) {
        $query = 'call getCurriculumCourseOutCurriculum("' . $id . '");';
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

    public function getCurriculumCourseByCurriculum($id) {
        $query = 'call getCurriculumCourseByCurriculum("' . $id . '");';
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

    public function getCurriculumCourseEnrollment($id) {
        $query = 'call getCurriculumCourseByCurriculum("' . $id . '");';
        try {
            $allCourses = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCourses) > 0) {
                while ($row = mysqli_fetch_array($allCourses)) {
                    $array[] = array("courseid" => $row['courseid'],
                        "coursecode" => $row['coursecode'],
                        "coursename" => $row['coursename'],
                        "coursecredits" => $row['coursecredits'],
                        "courselesson" => $row['courselesson'],
                        "coursepdf" => $row['coursepdf'],
                        "specialityname" => $row['specialityname'],
                        "coursetype" => $row['coursetype'],
                        "periodid" => $row['periodid']);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getCurriculumId($id) {
        $query = 'call getCurriculumById(' . $id . ');';
        try {
            $allCurriculum = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCurriculum) > 0) {
                while ($row = mysqli_fetch_array($allCurriculum)) {
                    $currentCurriculum = new Curriculum(
                            $row['curriculumid'], $row['curriculumname'], $row['curriculumyear']);
                    array_push($array, $currentCurriculum);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function deleteCurriculumCourse($id) {
        $query = 'call deleteCurriculumCourse(' . $id . ');';
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

    public function getAllCurriculumCourseParsed(){
        $query = "call getAllCurriculumCourseParsed()";
        try {
            $allCurriculum = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allCurriculum) > 0) {
                while ($row = mysqli_fetch_array($allCurriculum)) {
                    $current = new CurriculumCourse(
                            $row['curriculumcourseid'],
                            $row['curriculumcoursecurriculum'],
                            $row['curriculumcoursecourse'],
                            $row['period']);
                    array_push($array, $current);
                }
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }
    
}
