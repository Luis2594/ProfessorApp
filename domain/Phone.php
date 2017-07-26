<?php

class Phone {

    private $phoneId;
    private $phonePhone;
    private $phonePerson;
    
    function Phone($phoneId, $phonePhone, $phonePerson) {
        $this->phoneId = $phoneId;
        $this->phonePhone = $phonePhone;
        $this->phonePerson = $phonePerson;
    }
    
    function getPhoneId() {
        return $this->phoneId;
    }

    function getPhonePhone() {
        return $this->phonePhone;
    }

    function getPhonePerson() {
        return $this->phonePerson;
    }

    function setPhoneId($phoneId) {
        $this->phoneId = $phoneId;
    }

    function setPhonePhone($phonePhone) {
        $this->phonePhone = $phonePhone;
    }

    function setPhonePerson($phonePerson) {
        $this->phonePerson = $phonePerson;
    }

}
