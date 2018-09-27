<?php

class File {

    private $id;
    private $group;
    private $professor;
    private $year;
    private $period;
    private $course;
    private $description;
    private $date;
    private $guid;

    public function File($id, $group, $professor, $year, $period, $course, $description, $date, $guid) {
        $this->id = $id;
        $this->group = $group;
        $this->professor = $professor;
        $this->year = $year;
        $this->period = $period;
        $this->course = $course;
        $this->description = $description;
        $this->guid = $guid;
        $this->date = $date;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($value) {
        $this->id = $value;
    }
    
    public function getGroup() {
        return $this->group;
    }

    public function setGroup($value) {
        $this->group = $value;
    }

    public function getProfessor() {
        return $this->professor;
    }

    public function setProfessor($value) {
        $this->professor = $value;
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($value) {
        $this->year = $value;
    }

    public function getPeriod() {
        return $this->period;
    }

    public function setPeriod($value) {
        $this->period = $value;
    }

    public function getCourse() {
        return $this->course;
    }

    public function setCourse($value) {
        $this->course = $value;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($value) {
        $this->description = $value;
    }

    public function getGUID() {
        return $this->guid;
    }

    public function setGUID($value) {
        $this->guid = $value;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($value) {
        $this->date = $value;
    }
}
