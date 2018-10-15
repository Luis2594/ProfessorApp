<?php

include_once '../data/GradesData.php';

class GradesBusiness {

    private $data;

    public function GradesBusiness() {
        return $this->data = new GradesData();
    }

    public function updateClassWork($id, $data) {
        return $this->data->updateClassWork($id, $data);
    }

    public function updateHomeWork($id, $data) {
        return $this->data->updateHomeWork($id, $data);
    }

    public function updateTest($id, $data) {
        return $this->data->updateTest($id, $data);
    }

    public function updateProject($id, $data) {
        return $this->data->updateProject($id, $data);
    }

    public function updateAtendance($id, $data) {
        return $this->data->updateAtendance($id, $data);
    }

    public function updateRecovery1($id, $data) {
        return $this->data->updateRecovery1($id, $data);
    }
    
    public function updateRecovery2($id, $data) {
        return $this->data->updateRecovery2($id, $data);
    }

    public function updatePromotion($id, $data) {
        return $this->data->updatePromotion($id, $data);
    }

    public function updateFinalGrade($id, $data) {
        return $this->data->updateFinalGrade($id, $data);
    }
  
}
