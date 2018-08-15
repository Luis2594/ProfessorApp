<?php

require_once '../data/Connector.php';
include_once '../domain/Schedule.php';

class ScheduleData extends Connector {

    public function insert($schedule) {
        $query = "call insertGroupSchedule(" . $schedule->getGroupscheduleidgroup() . ","
                . "" . $schedule->getGroupscheduleidprofesor() . ","
                . "" . $schedule->getGroupscheduleidcourse() . ","
                . "" . $schedule->getGroupschedulehour() . ","
                . "" . $schedule->getGroupscheduleday() . ")";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function getScheduleByProfessor($id) {
        $query = "call getScheduleByProfessor(" . $id . ")";

        try {
            $allSchedule = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allSchedule) > 0) {
                while ($row = mysqli_fetch_array($allSchedule)) {

                    $array[] = array("groupscheduleid" => $row['groupscheduleid'],
                        "coursecode" => $row['coursecode'],
                        "groupschedulehour" => $row['groupschedulehour'],
                        "groupscheduleday" => $row['groupscheduleday']);
                }
            }
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function getScheduleByStudent($id) {
        $query = "call getScheduleByStudent(" . $id . ")";

        try {
            $allSchedule = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allSchedule) > 0) {
                while ($row = mysqli_fetch_array($allSchedule)) {

                    $array[] = array("groupscheduleid" => $row['groupscheduleid'],
                        "coursecode" => $row['coursecode'],
                        "groupschedulehour" => $row['groupschedulehour'],
                        "groupscheduleday" => $row['groupscheduleday']);
                }
            }
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function deleteScheduleByGroup($group) {
        $query = 'call deleteScheduleByGroup(' . $group . ');';
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

    public function deleteSchedule($id) {
        $query = 'call deleteSchedule(' . $id . ');';
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
