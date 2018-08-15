<?php

class User {

    private $userId;
    private $userUsername;
    private $userPass;
    private $userUserType;
    private $userPerson;
    
    function User($userId, $userUsername, $userPass, $userUserType, $userPerson) {
        $this->userId = $userId;
        $this->userUsername = $userUsername;
        $this->userPass = $userPass;
        $this->userUserType = $userUserType;
        $this->userPerson = $userPerson;
    }
    
    function getUserId() {
        return $this->userId;
    }

    function getUserUsername() {
        return $this->userUsername;
    }

    function getUserPass() {
        return $this->userPass;
    }

    function getUserUserType() {
        return $this->userUserType;
    }

    function getUserPerson() {
        return $this->userPerson;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

    function setUserUsername($userUsername) {
        $this->userUsername = $userUsername;
    }

    function setUserPass($userPass) {
        $this->userPass = $userPass;
    }

    function setUserUserType($userUserType) {
        $this->userUserType = $userUserType;
    }

    function setUserPerson($userPerson) {
        $this->userPerson = $userPerson;
    }

}
