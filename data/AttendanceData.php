<?php

require_once '../data/Connector.php';
include_once '../domain/Attendance.php';

class AttendanceData extends Connector {

    public function insert($attendance) {
        $query = "call insertAttendance("
                . $attendance->getCodStudent() . ","
                . $attendance->getCodProfessor() . ","
                . $attendance->getCodCourse() . ","
                . $attendance->getCodGroup() . ","
                . $attendance->getCodPeriod() . ","
                . $attendance->getIsPresent() . ",'"
                . $attendance->getJustification() . "')";
        return $this->exeQuery($query);
    }
    
    public function update($id, $isPresent, $justification) {
        $query = "call updateAttendance("
                . $id . ","
                . $isPresent . ",'"
                . $justification . "')";
        return $this->exeQuery($query);
    }


    public function getAttenadanceByDate($professor, $course, $group, $period, $date) {
        $query = "call getAttendanceByDate("
                . $professor . ","
                . $course . ","
                . $group . ","
                . $period . ",'"
                . $date . "')";
        try {
            $attendances = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($attendances) > 0) {
                while ($row = mysqli_fetch_array($attendances)) {
                    $array[] = array("id" => $row['id'],
                        "fullName" => $row['fullName'],
                        "persondni" => $row['persondni'],
                        "phoneNumber" => $row['phoneNumber'],
                        "isPresent" => $row['isPresent'],
                        "justification" => $row['justification']);
                }
            }
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

}
