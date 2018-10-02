<?php

include_once '../data/StudentCourseData.php';

class StudentCourseBusiness {
    
    private $studentCourseData;

    public function StudentCourseBusiness() {
        return $this->studentCourseData = new StudentCourseData();
    }
    
     public function insert($studentCourse) {
       return $this->studentCourseData->insert($studentCourse);
    }
    
    public function update($studentCourse) {
       return $this->studentCourseData->update($studentCourse);
    }
    
    public function delete($id) {
      return $this->studentCourseData->delete($id);
    }
    
    public function getAll() {
      return $this->studentCourseData->getAll();
    }
    
    public function getCourseId($id) {
     return $this->studentCourseData->getCourseId($id);
    }
    
    public function getLastId() {
        return $this->studentCourseData->getLastId();
    }
    
}
