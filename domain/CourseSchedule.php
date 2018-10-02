<?php

class CourseSchedule {

    private $courseScheduleId;
    private $courseScheduleDay;
    private $courseScheduleHour;
    private $courseScheduleOptional;
    private $courseScheduleCourse;
    private $courseScheduleProfessor;
    private $courseScheduleStudent;
    
    function CourseSchedule($courseScheduleId, $courseScheduleDay, $courseScheduleHour, $courseScheduleOptional, $courseScheduleCourse, $courseScheduleProfessor, $courseScheduleStudent) {
        $this->courseScheduleId = $courseScheduleId;
        $this->courseScheduleDay = $courseScheduleDay;
        $this->courseScheduleHour = $courseScheduleHour;
        $this->courseScheduleOptional = $courseScheduleOptional;
        $this->courseScheduleCourse = $courseScheduleCourse;
        $this->courseScheduleProfessor = $courseScheduleProfessor;
        $this->courseScheduleStudent = $courseScheduleStudent;
    }
    
    function getCourseScheduleId() {
        return $this->courseScheduleId;
    }

    function getCourseScheduleDay() {
        return $this->courseScheduleDay;
    }

    function getCourseScheduleHour() {
        return $this->courseScheduleHour;
    }

    function getCourseScheduleOptional() {
        return $this->courseScheduleOptional;
    }

    function getCourseScheduleCourse() {
        return $this->courseScheduleCourse;
    }

    function getCourseScheduleProfessor() {
        return $this->courseScheduleProfessor;
    }

    function getCourseScheduleStudent() {
        return $this->courseScheduleStudent;
    }

    function setCourseScheduleId($courseScheduleId) {
        $this->courseScheduleId = $courseScheduleId;
    }

    function setCourseScheduleDay($courseScheduleDay) {
        $this->courseScheduleDay = $courseScheduleDay;
    }

    function setCourseScheduleHour($courseScheduleHour) {
        $this->courseScheduleHour = $courseScheduleHour;
    }

    function setCourseScheduleOptional($courseScheduleOptional) {
        $this->courseScheduleOptional = $courseScheduleOptional;
    }

    function setCourseScheduleCourse($courseScheduleCourse) {
        $this->courseScheduleCourse = $courseScheduleCourse;
    }

    function setCourseScheduleProfessor($courseScheduleProfessor) {
        $this->courseScheduleProfessor = $courseScheduleProfessor;
    }

    function setCourseScheduleStudent($courseScheduleStudent) {
        $this->courseScheduleStudent = $courseScheduleStudent;
    }

}
