<?php

class Notification {

    private $notificationId;
    private $notificationText;
    private $notificationProfessor;
    private $notificationCourse;
    private $notificationYear;
    private $notificationGroup;
    private $notificationPeriod;
    private $notificationDate;
    private $notificationRead;
    
    public function Notification($id, $text, $course, $group, $professor, $year, $period, $date, $read) {
        $this->notificationId = $id;
        $this->notificationText = $text;
        $this->notificationProfessor = $professor;
        $this->notificationCourse = $course;
        $this->notificationGroup = $group;
        $this->notificationYear = $year;
        $this->notificationPeriod = $period;
        $this->notificationDate = $date;
        $this->notificationRead = $read;
    }
    function getNotificationId() {
        return $this->notificationId;
    }

    function getNotificationText() {
        return $this->notificationText;
    }

    function getNotificationProfessor() {
        return $this->notificationProfessor;
    }

    function getNotificationCourse() {
        return $this->notificationCourse;
    }

    function getNotificationYear() {
        return $this->notificationYear;
    }

    function getNotificationPeriod() {
        return $this->notificationPeriod;
    }

    function getNotificationDate() {
        return $this->notificationDate;
    }

    function getNotificationRead() {
        return $this->notificationRead;
    }

    function setNotificationId($notificationId) {
        $this->notificationId = $notificationId;
    }

    function setNotificationText($notificationText) {
        $this->notificationText = $notificationText;
    }

    function setNotificationProfessor($notificationProfessor) {
        $this->notificationProfessor = $notificationProfessor;
    }

    function setNotificationCourse($notificationCourse) {
        $this->notificationCourse = $notificationCourse;
    }

    function setNotificationYear($notificationYear) {
        $this->notificationYear = $notificationYear;
    }

    function setNotificationPeriod($notificationPeriod) {
        $this->notificationPeriod = $notificationPeriod;
    }

    function setNotificationDate($notificationDate) {
        $this->notificationDate = $notificationDate;
    }

    function setNotificationRead($notificationRead) {
        $this->notificationRead = $notificationRead;
    }
    function getNotificationGroup() {
        return $this->notificationGroup;
    }

    function setNotificationGroup($notificationGroup) {
        $this->notificationGroup = $notificationGroup;
    }


}
