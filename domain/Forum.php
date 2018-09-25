<?php

class Forum {
    private $id;
    private $name;
    private $course;
    private $group;
    private $professor;
    
    public function Forum($id, $name, $course, $group, $professor) {
        $this->id = $id;
        $this->name = $name;
        $this->course = $course;
        $this->group = $group;
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
    
    public function getGroup() {
        return $this->group;
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
    
    public function setGroup($group) {
        $this->group = $group;
        return $this;
    }

    public function setProfessor($professor) {
        $this->professor = $professor;
        return $this;
    }

}

