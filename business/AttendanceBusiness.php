<?php

include_once '../data/AttendanceData.php';

class AttendanceBusiness {

    private $data;

    public function AttendanceBusiness() {
        return $this->data = new AttendanceData();
    }

    public function insert($attendance) {
        return $this->data->insert($attendance);
    }

    public function update($id, $isPresent, $justification) {
        return $this->data->update($id, $isPresent, $justification);
    }

    public function getAttenadanceByDate($professor, $course, $group, $period, $date) {
        return $this->data->getAttenadanceByDate($professor, $course, $group, $period, $date);
    }

    public function getAttenadanceByMonth($month, $period, $year, $course, $group) {
        return $this->data->getAttenadanceByMonth($month, $period, $year, $course, $group);
    }

}
