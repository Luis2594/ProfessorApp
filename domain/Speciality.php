<?php

class Speciality {

    private $specialityId;
    private $specialityName;
    
    function Speciality($specialityId, $specialityName) {
        $this->specialityId = $specialityId;
        $this->specialityName = $specialityName;
    }
    
    function getSpecialityId() {
        return $this->specialityId;
    }

    function getSpecialityName() {
        return $this->specialityName;
    }

    function setSpecialityId($specialityId) {
        $this->specialityId = $specialityId;
    }

    function setSpecialityName($specialityName) {
        $this->specialityName = $specialityName;
    }

}
