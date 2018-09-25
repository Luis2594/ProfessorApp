<?php

class StudentAll {

    private $personId;
    private $personDni;
    private $personFirstName;
    private $personFirstlastname;
    private $personSecondlastname;
    private $personEmail;
    private $personBirthday;
    private $personAge;
    private $personGender;
    private $personNacionality;
    private $studentAdecuacy;
    private $studentYearIncome;
    private $studentYearOut;
    private $studentLocation;
    private $studentgroup;
    private $studentManager;
    private $userUsername;
    private $userPass;
    
    function StudentAll($personId, $personDni, $personFirstName, $personFirstlastname, $personSecondlastname, $personEmail, $personBirthday, $personAge, $personGender, $personNacionality, $studentAdecuacy, $studentYearIncome, $studentYearOut, $studentLocation, $studentgroup, $studentManager, $userUsername, $userPass) {
        $this->personId = $personId;
        $this->personDni = $personDni;
        $this->personFirstName = $personFirstName;
        $this->personFirstlastname = $personFirstlastname;
        $this->personSecondlastname = $personSecondlastname;
        $this->personEmail = $personEmail;
        $this->personBirthday = $personBirthday;
        $this->personAge = $personAge;
        $this->personGender = $personGender;
        $this->personNacionality = $personNacionality;
        $this->studentAdecuacy = $studentAdecuacy;
        $this->studentYearIncome = $studentYearIncome;
        $this->studentYearOut = $studentYearOut;
        $this->studentLocation = $studentLocation;
        $this->studentgroup = $studentgroup;
        $this->studentManager = $studentManager;
        $this->userUsername = $userUsername;
        $this->userPass = $userPass;
    }

    function getPersonId() {
        return $this->personId;
    }

    function getPersonDni() {
        return $this->personDni;
    }

    function getPersonFirstName() {
        return $this->personFirstName;
    }

    function getPersonFirstlastname() {
        return $this->personFirstlastname;
    }

    function getPersonSecondlastname() {
        return $this->personSecondlastname;
    }

    function getPersonEmail() {
        return $this->personEmail;
    }

    function getPersonBirthday() {
        return $this->personBirthday;
    }

    function getPersonAge() {
        return $this->personAge;
    }

    function getPersonGender() {
        return $this->personGender;
    }

    function getPersonNacionality() {
        return $this->personNacionality;
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

    function getUserUsername() {
        return $this->userUsername;
    }

    function getUserPass() {
        return $this->userPass;
    }

    function setPersonId($personId) {
        $this->personId = $personId;
    }

    function setPersonDni($personDni) {
        $this->personDni = $personDni;
    }

    function setPersonFirstName($personFirstName) {
        $this->personFirstName = $personFirstName;
    }

    function setPersonFirstlastname($personFirstlastname) {
        $this->personFirstlastname = $personFirstlastname;
    }

    function setPersonSecondlastname($personSecondlastname) {
        $this->personSecondlastname = $personSecondlastname;
    }

    function setPersonEmail($personEmail) {
        $this->personEmail = $personEmail;
    }

    function setPersonBirthday($personBirthday) {
        $this->personBirthday = $personBirthday;
    }

    function setPersonAge($personAge) {
        $this->personAge = $personAge;
    }

    function setPersonGender($personGender) {
        $this->personGender = $personGender;
    }

    function setPersonNacionality($personNacionality) {
        $this->personNacionality = $personNacionality;
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

    function setUserUsername($userUsername) {
        $this->userUsername = $userUsername;
    }

    function setUserPass($userPass) {
        $this->userPass = $userPass;
    }


    
}
