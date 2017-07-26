<?php

include '../data/EnrollmentData.php';

class EnrollmentBusiness {
    private $enrollmentData;
    
    public function EnrollmentBusiness() {
        return $this->enrollmentData = new EnrollmentData();
    }
    
    public function insertEnrollment($enrollment){
        return $this->enrollmentData->insertEnrollment($enrollment);
    }
    
    public function update($idEnrollment, $status){
        return $this->enrollmentData->update($idEnrollment, $status);
    }
    
     public function delete($id){
         return $this->enrollmentData->delete($id);
     }
     
     public function getCoursesAllEnrollmentByStudent($idStudent){
         return $this->enrollmentData->getCoursesAllEnrollmentByStudent($idStudent);
     }
     
     public function getCoursesEnrollmentByStudent($idStudent){
         return $this->enrollmentData->getCoursesEnrollmentByStudent($idStudent);
     }
     
     public function getCoursesApprovedByStudent($idStudent){
         return $this->enrollmentData->getCoursesApprovedByStudent($idStudent);
     }
     
     public function getCoursesReprobateByStudent($idStudent){
         return $this->enrollmentData->getCoursesReprobateByStudent($idStudent);
     }
}
