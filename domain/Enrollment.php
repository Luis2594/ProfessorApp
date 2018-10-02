<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Enrollment {
    
//    DATA ENROLLMENT
    private $enrollmentid;
    private $enrollmentperson;
    private $enrollmentcourse;
    private $enrollmentgroup;
    private $enrollmentperiod;
    private $enrollmentstatus;
    private $enrollmentdate;
 
//    DATA COURSE
    private $courseid;
    private $coursecode;
    private $coursename;
    private $coursecredits;
    private $courselesson;
    private $coursepdf;
    private $groupnumber;
    private $period;
    private $coursetype;
    
//    DATA PROFESSOR
    private $professorfirstname;
    private $professorfirstlastname;
    private $professorcondlastname;
    
    function Enrollment($enrollmentperson, $enrollmentcourse, $enrollmentgroup, $enrollmentperiod, $enrollmentstatus) {
        $this->enrollmentperson = $enrollmentperson;
        $this->enrollmentcourse = $enrollmentcourse;
        $this->enrollmentgroup = $enrollmentgroup;
        $this->enrollmentperiod = $enrollmentperiod;
        $this->enrollmentstatus = $enrollmentstatus;
    }
  
    function getEnrollmentid() {
        return $this->enrollmentid;
    }

    function getEnrollmentperson() {
        return $this->enrollmentperson;
    }

    function getEnrollmentcourse() {
        return $this->enrollmentcourse;
    }

    function getEnrollmentgroup() {
        return $this->enrollmentgroup;
    }

    function getEnrollmentperiod() {
        return $this->enrollmentperiod;
    }

    function getEnrollmentstatus() {
        return $this->enrollmentstatus;
    }

    function getEnrollmentdate() {
        return $this->enrollmentdate;
    }

    function getCourseid() {
        return $this->courseid;
    }

    function getCoursecode() {
        return $this->coursecode;
    }

    function getCoursename() {
        return $this->coursename;
    }

    function getCoursecredits() {
        return $this->coursecredits;
    }

    function getCourselesson() {
        return $this->courselesson;
    }

    function getCoursepdf() {
        return $this->coursepdf;
    }

    function getGroupnumber() {
        return $this->groupnumber;
    }

    function getPeriod() {
        return $this->period;
    }

    function getCoursetype() {
        return $this->coursetype;
    }

    function getProfessorfirstname() {
        return $this->professorfirstname;
    }

    function getProfessorfirstlastname() {
        return $this->professorfirstlastname;
    }

    function getProfessorcondlastname() {
        return $this->professorcondlastname;
    }

    function setEnrollmentid($enrollmentid) {
        $this->enrollmentid = $enrollmentid;
    }

    function setEnrollmentperson($enrollmentperson) {
        $this->enrollmentperson = $enrollmentperson;
    }

    function setEnrollmentcourse($enrollmentcourse) {
        $this->enrollmentcourse = $enrollmentcourse;
    }

    function setEnrollmentgroup($enrollmentgroup) {
        $this->enrollmentgroup = $enrollmentgroup;
    }

    function setEnrollmentperiod($enrollmentperiod) {
        $this->enrollmentperiod = $enrollmentperiod;
    }

    function setEnrollmentstatus($enrollmentstatus) {
        $this->enrollmentstatus = $enrollmentstatus;
    }

    function setEnrollmentdate($enrollmentdate) {
        $this->enrollmentdate = $enrollmentdate;
    }

    function setCourseid($courseid) {
        $this->courseid = $courseid;
    }

    function setCoursecode($coursecode) {
        $this->coursecode = $coursecode;
    }

    function setCoursename($coursename) {
        $this->coursename = $coursename;
    }

    function setCoursecredits($coursecredits) {
        $this->coursecredits = $coursecredits;
    }

    function setCourselesson($courselesson) {
        $this->courselesson = $courselesson;
    }

    function setCoursepdf($coursepdf) {
        $this->coursepdf = $coursepdf;
    }

    function setGroupnumber($groupnumber) {
        $this->groupnumber = $groupnumber;
    }

    function setPeriod($period) {
        $this->period = $period;
    }

    function setCoursetype($coursetype) {
        $this->coursetype = $coursetype;
    }

    function setProfessorfirstname($professorfirstname) {
        $this->professorfirstname = $professorfirstname;
    }

    function setProfessorfirstlastname($professorfirstlastname) {
        $this->professorfirstlastname = $professorfirstlastname;
    }

    function setProfessorcondlastname($professorcondlastname) {
        $this->professorcondlastname = $professorcondlastname;
    }


    
}
