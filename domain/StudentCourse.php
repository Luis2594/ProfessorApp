<?php

class StudentCourse {

    private $studentCourseId;
    private $studentCourseStudent;
    private $studentCourseCourse;
    private $studentCourseYear;
    
    function StudentCourse($studentCourseId, $studentCourseStudent, $studentCourseCourse, $studentCourseYear) {
        $this->studentCourseId = $studentCourseId;
        $this->studentCourseStudent = $studentCourseStudent;
        $this->studentCourseCourse = $studentCourseCourse;
        $this->studentCourseYear = $studentCourseYear;
    }

    function getStudentCourseId() {
        return $this->studentCourseId;
    }

    function getStudentCourseStudent() {
        return $this->studentCourseStudent;
    }

    function getStudentCourseCourse() {
        return $this->studentCourseCourse;
    }

    function getStudentCourseYear() {
        return $this->studentCourseYear;
    }

    function setStudentCourseId($studentCourseId) {
        $this->studentCourseId = $studentCourseId;
    }

    function setStudentCourseStudent($studentCourseStudent) {
        $this->studentCourseStudent = $studentCourseStudent;
    }

    function setStudentCourseCourse($studentCourseCourse) {
        $this->studentCourseCourse = $studentCourseCourse;
    }

    function setStudentCourseYear($studentCourseYear) {
        $this->studentCourseYear = $studentCourseYear;
    }

}
