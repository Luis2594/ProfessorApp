<?php

class ProfessorAll {

    private $professorId;
    private $personId;
    private $personDni;
    private $personFirstName;
    private $personFirstlastname;
    private $personSecondlastname;
    private $personEmail;
    private $personGender;
    private $personNacionality;
    private $userUsername;
    private $userPass;

    public function ProfessorAll($professorId,$personId, $personDni, $personFirstName, $personFirstlastname, $personSecondlastname, $personEmail, $personGender, $personNacionality, $userUsername, $userPass) {
        $this->professorId = $professorId;
        $this->personId = $personId;
        $this->personDni = $personDni;
        $this->personFirstName = $personFirstName;
        $this->personFirstlastname = $personFirstlastname;
        $this->personSecondlastname = $personSecondlastname;
        $this->personEmail = $personEmail;
        $this->personGender = $personGender;
        $this->personNacionality = $personNacionality;
        $this->userUsername = $userUsername;
        $this->userPass = $userPass;
    }
    
    public function getProfessorId() {
        return $this->professorId;
    }

    public function setProfessorId($professorId) {
        $this->professorId = $professorId;
        return $this;
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

    public function getPersonGender() {
        return $this->personGender;
    }

    public function getPersonNacionality() {
        return $this->personNacionality;
    }

    public function getUserUsername() {
        return $this->userUsername;
    }

    public function getUserPass() {
        return $this->userPass;
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

    public function setPersonGender($personGender) {
        $this->personGender = $personGender;
        return $this;
    }

    public function setPersonNacionality($personNacionality) {
        $this->personNacionality = $personNacionality;
        return $this;
    }

    public function setUserUsername($userUsername) {
        $this->userUsername = $userUsername;
        return $this;
    }

    public function setUserPass($userPass) {
        $this->userPass = $userPass;
        return $this;
    }

    public function ToString(){
        return $this->professorId . " - " .
        $this->personId  . " - " .
        $this->personDni  . " - " .
        $this->personFirstName  . " - " .
        $this->personFirstlastname  . " - " .
        $this->personSecondlastname  . " - " .
        $this->personEmail  . " - " .
        $this->personGender  . " - " .
        $this->personNacionality  . " - " .
        $this->userUsername  . " - " .
        $this->userPass;
    }

}
