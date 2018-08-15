<?php


class CurriculumCourse {
    private $id;
    private $curriculum;
    private $course;
    private $period;
    
    public function CurriculumCourse($id, $curriculum, $course, $period) {
        $this->id = $id;
        $this->curriculum = $curriculum;
        $this->course = $course;
        $this->period = $period;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getCurriculum() {
        return $this->curriculum;
    }

    public function getCourse() {
        return $this->course;
    }

    public function getPeriod() {
        return $this->period;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setCurriculum($curriculum) {
        $this->curriculum = $curriculum;
        return $this;
    }

    public function setCourse($course) {
        $this->course = $course;
        return $this;
    }

    public function setPeriod($period) {
        $this->period = $period;
        return $this;
    }

}