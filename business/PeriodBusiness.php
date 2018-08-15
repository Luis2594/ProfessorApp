<?php

include_once '../data/PeriodData.php';

class PeriodBusiness {

    private $periodData;
    
    public function PeriodBusiness() {
        return $this->periodData = new PeriodData();
    }
    
    public function getAllPeriods() {
        return $this->periodData->getAllPeriods();
    }
    
    public function getAllPeriodsByCourse($id) {
        return $this->periodData->getAllPeriodsByCourse($id);
    }
    
    public function deletePeridoCourse($idCourse, $idPeriod) {
        return $this->periodData->deletePeridoCourse($idCourse, $idPeriod);
    }
    
}
