<?php

include_once '../data/GroupData.php';

class GroupBusiness {
    
    private $groupData;
    
    public function GroupBusiness() {
        return $this->groupData = new GroupData();
    }
    
    public function insert($number) {
         return $this->groupData->insert($number);
    }
    
    public function insertStudentGroup($idGroup, $idStudent, $priority) {
        return $this->groupData->insertStudentGroup($idGroup, $idStudent, $priority);
    }

    public function delete($idPerson, $group) {
      return $this->groupData->delete($idPerson, $group);
    }

    public function getAll() {
     return $this->groupData->getAll();
    }
    
    public function getGroupByStudent($id) {
        return $this->groupData->getGroupByStudent($id);
    }
    
    public function getGroupByPerson($id) {
        return $this->groupData->getGroupByPerson($id);
    }
    
}
