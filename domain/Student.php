<?php

class Student {

    private $studentId;
    private $studentAdecuacy;
    private $studentYearIncome;
    private $studentYearOut;
    private $studentLocation;
    private $studentgroup;
    private $studentManager;
    private $studentPerson;
    
    function Student($studentId, $studentAdecuacy, $studentYearIncome, $studentYearOut, $studentLocation, $studentgroup, $studentManager, $studentPerson) {
        $this->studentId = $studentId;
        $this->studentAdecuacy = $studentAdecuacy;
        $this->studentYearIncome = $studentYearIncome;
        $this->studentYearOut = $studentYearOut;
        $this->studentLocation = $studentLocation;
        $this->studentgroup = $studentgroup;
        $this->studentManager = $studentManager;
        $this->studentPerson = $studentPerson;
    }
    
    function getStudentId() {
        return $this->studentId;
    }

    function getStudentAdecuacy() {
        return $this->studentAdecuacy;
    }

    function getStudentYearIncome() {
        return $this->studentYearIncome;
    }

    function getStudentYearOut() {
        return $this->studentYearOut;
    }

    function getStudentLocation() {
        return $this->studentLocation;
    }

    function getStudentgroup() {
        return $this->studentgroup;
    }

    function getStudentManager() {
        return $this->studentManager;
    }

    function getStudentPerson() {
        return $this->studentPerson;
    }

    function setStudentId($studentId) {
        $this->studentId = $studentId;
    }

    function setStudentAdecuacy($studentAdecuacy) {
        $this->studentAdecuacy = $studentAdecuacy;
    }

    function setStudentYearIncome($studentYearIncome) {
        $this->studentYearIncome = $studentYearIncome;
    }

    function setStudentYearOut($studentYearOut) {
        $this->studentYearOut = $studentYearOut;
    }

    function setStudentLocation($studentLocation) {
        $this->studentLocation = $studentLocation;
    }

    function setStudentgroup($studentgroup) {
        $this->studentgroup = $studentgroup;
    }

    function setStudentManager($studentManager) {
        $this->studentManager = $studentManager;
    }

    function setStudentPerson($studentPerson) {
        $this->studentPerson = $studentPerson;
    }
}
