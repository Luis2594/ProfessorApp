<?php

class Professor {

    private $professorId;
    private $professorPerson;

    function Professor($professorId, $professorPerson) {
        $this->professorId = $professorId;
        $this->professorPerson = $professorPerson;
    }

    function getProfessorId() {
        return $this->professorId;
    }

    function getProfessorPerson() {
        return $this->professorPerson;
    }

    function setProfessorId($professorId) {
        $this->professorId = $professorId;
    }

    function setProfessorPerson($professorPerson) {
        $this->professorPerson = $professorPerson;
    }

}
