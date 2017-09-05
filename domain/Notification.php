<?php

class Notification {

    private $notificationId;
    private $notificationText;
    private $notificationProfessor;
    private $notificationCourse;
    private $notificationStudent;
    private $notificationForum;
    private $notificationRead;
    private $notificationDate;

    public function Notification($notificationId, $notificationText, $notificactionProfessor, $notificationCourse, $notificationStudent, $notificationForum, $notificationRead, $notificationDate) {
        $this->notificationId = $notificationId;
        $this->notificationText = $notificationText;
        $this->notificationProfessor = $notificactionProfessor;
        $this->notificationCourse = $notificationCourse;
        $this->notificationStudent = $notificationStudent;
        $this->notificationForum = $notificationForum;
        $this->notificationRead = $notificationRead;
        $this->notificationDate = $notificationDate;
    }

    public function getNotificationId() {
        return $this->notificationId;
    }

    public function getNotificationText() {
        return $this->notificationText;
    }

    public function getNotificationProfessor() {
        return $this->notificationProfessor;
    }

    public function getNotificationCourse() {
        return $this->notificationCourse;
    }

    public function getNotificationStudent() {
        return $this->notificationStudent;
    }

    public function getNotificationForum() {
        return $this->notificationForum;
    }

    public function getNotificationRead() {
        return $this->notificationRead;
    }

    public function getNotificationDate() {
        return $this->notificationDate;
    }

    public function setNotificationId($notificationId) {
        $this->notificationId = $notificationId;
        return $this;
    }

    public function setNotificationText($notificationText) {
        $this->notificationText = $notificationText;
        return $this;
    }

    public function setNotificactionProfessor($notificactionProfessor) {
        $this->notificationProfessor = $notificactionProfessor;
        return $this;
    }

    public function setNotificationCourse($notificationCourse) {
        $this->notificationCourse = $notificationCourse;
        return $this;
    }

    public function setNotificationStudent($notificationStudent) {
        $this->notificationStudent = $notificationStudent;
        return $this;
    }

    public function setNotificationForum($notificationForum) {
        $this->notificationForum = $notificationForum;
        return $this;
    }

    public function setNotificationRead($notificationRead) {
        $this->notificationRead = $notificationRead;
        return $this;
    }

    public function setNotificationDate($notificationDate) {
        $this->notificationDate = $notificationDate;
        return $this;
    }

}
