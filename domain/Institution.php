<?php

class Institution {

    private $institutionId;
    private $institutionName;
    private $institutionAddress;
    private $institutionFax;
    private $institutionPhone;
    private $institutionMission;
    private $institutionView;

    public function Institution($institutionId, $institutionName, $institutionAddress, $institutionFax, $institutionPhone, $institutionMission, $institutionView) {
        $this->institutionId = $institutionId;
        $this->institutionName = $institutionName;
        $this->institutionAddress = $institutionAddress;
        $this->institutionFax = $institutionFax;
        $this->institutionPhone = $institutionPhone;
        $this->institutionMission = $institutionMission;
        $this->institutionView = $institutionView;
    }

    public function getInstitutionId() {
        return $this->institutionId;
    }

    public function getInstitutionName() {
        return $this->institutionName;
    }

    public function getInstitutionAddress() {
        return $this->institutionAddress;
    }

    public function getInstitutionFax() {
        return $this->institutionFax;
    }

    public function getInstitutionPhone() {
        return $this->institutionPhone;
    }

    public function getInstitutionMission() {
        return $this->institutionMission;
    }

    public function getInstitutionView() {
        return $this->institutionView;
    }

    public function setInstitutionId($institutionId) {
        $this->institutionId = $institutionId;
        return $this;
    }

    public function setInstitutionName($institutionName) {
        $this->institutionName = $institutionName;
        return $this;
    }

    public function setInstitutionAddress($institutionAddress) {
        $this->institutionAddress = $institutionAddress;
        return $this;
    }

    public function setInstitutionFax($institutionFax) {
        $this->institutionFax = $institutionFax;
        return $this;
    }

    public function setInstitutionPhone($institutionPhone) {
        $this->institutionPhone = $institutionPhone;
        return $this;
    }

    public function setInstitutionMission($institutionMission) {
        $this->institutionMission = $institutionMission;
        return $this;
    }

    public function setInstitutionView($institutionView) {
        $this->institutionView = $institutionView;
        return $this;
    }

}
