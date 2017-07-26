<?php

class Forum {
    private $id;
    private $name;
    private $course;
    private $professor;
    
    public function Forum($id, $name, $course, $professor) {
        $this->id = $id;
        $this->name = $name;
        $this->course = $course;
        $this->professor = $professor;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getCourse() {
        return $this->course;
    }

    public function getProfessor() {
        return $this->professor;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setCourse($course) {
        $this->course = $course;
        return $this;
    }

    public function setProfessor($professor) {
        $this->professor = $professor;
        return $this;
    }

}

