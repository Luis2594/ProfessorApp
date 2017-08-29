<?php

class Person {

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
    private $personimage;
    private $personUser;
    private $personPass;

    function Person($personId, $personDni, $personFirstName, $personFirstlastname, $personSecondlastname, $personEmail, $personBirthday, $personAge, $personGender, $personNacionality, $personimage) {
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
        $this->personimage = $personimage;
    }
    public function getPersonId() {
        return $this->personId;
    }

    public function getPersonDni() {
        return $this->personDni;
    }

    public function getPersonFirstName() {
        return $this->personFirstName;
    }

    public function getPersonFirstlastname() {
        return $this->personFirstlastname;
    }

    public function getPersonSecondlastname() {
        return $this->personSecondlastname;
    }

    public function getPersonEmail() {
        return $this->personEmail;
    }

    public function getPersonBirthday() {
        return $this->personBirthday;
    }

    public function getPersonAge() {
        return $this->personAge;
    }

    public function getPersonGender() {
        return $this->personGender;
    }

    public function getPersonNacionality() {
        return $this->personNacionality;
    }

    public function getPersonimage() {
        return $this->personimage;
    }

    public function setPersonId($personId) {
        $this->personId = $personId;
        return $this;
    }

    public function setPersonDni($personDni) {
        $this->personDni = $personDni;
        return $this;
    }

    public function setPersonFirstName($personFirstName) {
        $this->personFirstName = $personFirstName;
        return $this;
    }

    public function setPersonFirstlastname($personFirstlastname) {
        $this->personFirstlastname = $personFirstlastname;
        return $this;
    }

    public function setPersonSecondlastname($personSecondlastname) {
        $this->personSecondlastname = $personSecondlastname;
        return $this;
    }

    public function setPersonEmail($personEmail) {
        $this->personEmail = $personEmail;
        return $this;
    }

    public function setPersonBirthday($personBirthday) {
        $this->personBirthday = $personBirthday;
        return $this;
    }

    public function setPersonAge($personAge) {
        $this->personAge = $personAge;
        return $this;
    }

    public function setPersonGender($personGender) {
        $this->personGender = $personGender;
        return $this;
    }

    public function setPersonNacionality($personNacionality) {
        $this->personNacionality = $personNacionality;
        return $this;
    }

    public function setPersonimage($personimage) {
        $this->personimage = $personimage;
        return $this;
    }

    public function getPersonUser() {
        return $this->personUser;
    }

    public function getPersonPass() {
        return $this->personPass;
    }

    public function setPersonUser($personUser) {
        $this->personUser = $personUser;
        return $this;
    }

    public function setPersonPass($personPass) {
        $this->personPass = $personPass;
        return $this;
    }

}
