<?php


class Circular {

    private $circularDescription;
    private $circularSender;
    private $circularGUID;
    private $circularDate;
    private $circularId;
    
    function Circular($circularId, $circularDescription, $circularDate, $circularSender, $circularGUID) {
        $this->circularId = $circularId;
        $this->circularDescription = $circularDescription;
        $this->circularDate = $circularDate;
        $this->circularSender = $circularSender;
        $this->circularGUID = $circularGUID;
    }

    function getCircularId() {
        return $this->circularId;
    }

    function setCircularId($circularId) {
        $this->circularId = $circularId;
    }

    function getCircularDescription() {
        return $this->circularDescription;
    }

    function setCircularDescription($circularDescription) {
        $this->circularDescription = $circularDescription;
    }

    function getCircularDate() {
        return $this->circularDate;
    }

    function setCircularDate($circularDate) {
        $this->circularDate = $circularDate;
    }

    function getCircularSender() {
        return $this->circularSender;
    }

    function setCircularSender($circularSender) {
        $this->circularSender = $circularSender;
    }

    function getCircularGUID() {
        return $this->circularGUID;
    }

    function setCircularGUID($circularGUID) {
        $this->circularGUID = $circularGUID;
    }
}
