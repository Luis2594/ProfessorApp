<?php

class Attendance{

    private $id;
    private $codStudent;
    private $codProfessor;
    private $codCourse;
    private $codeGroup;
    private $attenDate;
    private $isPresent;
    private $justification;
    
    function Attendance($codStudent, $codProfessor, $codCourse, $codeGroup, $isPresent, $justification) {
        $this->codStudent = $codStudent;
        $this->codProfessor = $codProfessor;
        $this->codCourse = $codCourse;
        $this->codeGroup = $codeGroup;
        $this->isPresent = $isPresent;
        $this->justification = $justification;
    }
    
    function getId() {
        return $this->id;
    }

    function getCodStudent() {
        return $this->codStudent;
    }

    function getCodProfessor() {
        return $this->codProfessor;
    }

    function getCodCourse() {
        return $this->codCourse;
    }

    function getCodeGroup() {
        return $this->codeGroup;
    }

    function getAttenDate() {
        return $this->attenDate;
    }

    function getIsPresent() {
        return $this->isPresent;
    }

    function getJustification() {
        return $this->justification;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodStudent($codStudent) {
        $this->codStudent = $codStudent;
    }

    function setCodProfessor($codProfessor) {
        $this->codProfessor = $codProfessor;
    }

    function setCodCourse($codCourse) {
        $this->codCourse = $codCourse;
    }

    function setCodeGroup($codeGroup) {
        $this->codeGroup = $codeGroup;
    }

    function setAttenDate($attenDate) {
        $this->attenDate = $attenDate;
    }

    function setIsPresent($isPresent) {
        $this->isPresent = $isPresent;
    }

    function setJustification($justification) {
        $this->justification = $justification;
    }
}




