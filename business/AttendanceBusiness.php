<?php

include_once '../data/AttendanceData.php';

class AttendanceBusiness {

     private $data;

    public function AttendanceBusiness() {
        return $this->data = new AttendanceData();
    }
    
     public function insert($attendance) {
       return $this->data->insert($attendance);
    }
    
//    public function update($comment) {
//       return $this->data->update($comment);
//    }
//    
//    public function delete($id) {
//      return $this->data->delete($id);
//    }
//    
//    public function getAll() {
//      return $this->data->getAll();
//    }
//    
//    public function getComment($id) {
//     return $this->data->getComment($id);
//    }
//    
//    public function getCommentsByUser($id) {
//     return $this->data->getCommentsByUser($id);
//    }
//    
//    public function getCommentsByConversation($id) {
//     return $this->data->getCommentsByConversation($id);
//    }
    
}
