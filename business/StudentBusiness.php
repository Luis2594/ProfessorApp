<?php

include_once '../data/StudentData.php';

class StudentBusiness {

    private $studentData;

    public function StudentBusiness() {
        return $this->studentData = new StudentData();
    }
    
     public function insertStudentWithCredentials($student, $pass) {
       return $this->studentData->insertStudentWithCredentials($student,$pass);
    }
    
    public function update($student) {
       return $this->studentData->update($student);
    }
    
    public function delete($id) {
      return $this->studentData->delete($id);
    }
    
    public function getAll() {
      return $this->studentData->getAll();
    }
    
    public function getStudentId($id) {
     return $this->studentData->getStudentId($id);
    }
    
    public function getLastId() {
        return $this->studentData->getLastId();
    }
    
}
