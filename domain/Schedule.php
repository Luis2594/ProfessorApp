<?php

class Schedule {

    private $groupscheduleid;
    private $groupscheduleidgroup;
    private $groupscheduleidprofesor;
    private $groupscheduleidcourse;
    private $groupschedulehour;
    private $groupscheduleday;

    function Schedule($groupscheduleid, $groupscheduleidgroup, $groupscheduleidprofesor, $groupscheduleidcourse, $groupschedulehour, $groupscheduleday) {
        $this->groupscheduleid = $groupscheduleid;
        $this->groupscheduleidgroup = $groupscheduleidgroup;
        $this->groupscheduleidprofesor = $groupscheduleidprofesor;
        $this->groupscheduleidcourse = $groupscheduleidcourse;
        $this->groupschedulehour = $groupschedulehour;
        $this->groupscheduleday = $groupscheduleday;
    }

    function getGroupscheduleid() {
        return $this->groupscheduleid;
    }

    function getGroupscheduleidgroup() {
        return $this->groupscheduleidgroup;
    }

    function getGroupscheduleidprofesor() {
        return $this->groupscheduleidprofesor;
    }

    function getGroupscheduleidcourse() {
        return $this->groupscheduleidcourse;
    }

    function getGroupschedulehour() {
        return $this->groupschedulehour;
    }

    function getGroupscheduleday() {
        return $this->groupscheduleday;
    }

    function setGroupscheduleid($groupscheduleid) {
        $this->groupscheduleid = $groupscheduleid;
    }

    function setGroupscheduleidgroup($groupscheduleidgroup) {
        $this->groupscheduleidgroup = $groupscheduleidgroup;
    }

    function setGroupscheduleidprofesor($groupscheduleidprofesor) {
        $this->groupscheduleidprofesor = $groupscheduleidprofesor;
    }

    function setGroupscheduleidcourse($groupscheduleidcourse) {
        $this->groupscheduleidcourse = $groupscheduleidcourse;
    }

    function setGroupschedulehour($groupschedulehour) {
        $this->groupschedulehour = $groupschedulehour;
    }

    function setGroupscheduleday($groupscheduleday) {
        $this->groupscheduleday = $groupscheduleday;
    }

}
