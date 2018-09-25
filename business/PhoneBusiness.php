<?php

include_once '../data/PhoneData.php';

class PhoneBusiness {
    
    private $phoneData;

    public function PhoneBusiness() {
        return $this->phoneData = new PhoneData();
    }
    
     public function insert($phone) {
       return $this->phoneData->insert($phone);
    }
    
    public function update($phone) {
       return $this->phoneData->update($phone);
    }
    
    public function delete($id) {
      return $this->phoneData->delete($id);
    }
    
    public function getAllPhone($id) {
      return $this->phoneData->getAllPhone($id);
    }
    
    public function getCourseId($id) {
     return $this->phoneData->getCourseId($id);
    }
    
    public function getLastId() {
        return $this->phoneData->getLastId();
    }
    
}
