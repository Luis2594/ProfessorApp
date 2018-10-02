<?php

include_once '../data/PersonData.php';

class PersonBusiness {

     private $personData;

    public function PersonBusiness() {
        return $this->personData = new PersonData();
    }
    
     public function insert($person) {
       return $this->personData->insert($person);
    }
    
    public function update($person) {
       return $this->personData->update($person);
    }
    
    public function delete($id) {
      return $this->personData->delete($id);
    }
    
    public function getAll() {
      return $this->personData->getAll();
    }
    
    public function getAllFull() {
      return $this->personData->getAllFull();
    }
    
    public function getPersonId($id) {
     return $this->personData->getPersonId($id);
    }
    
    public function confirmDni($dni){
        return $this->personData->confirmDni($dni);
    }
    
    public function getLastId() {
        return $this->personData->getLastId();
    }
    
}
