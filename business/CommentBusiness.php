<?php

include_once '../data/CommentData.php';

class CommentBusiness {

     private $data;

    public function CommentBusiness() {
        return $this->data = new CommentData();
    }
    
     public function insert($comment) {
       return $this->data->insert($comment);
    }
    
    public function update($comment) {
       return $this->data->update($comment);
    }
    
    public function delete($id) {
      return $this->data->delete($id);
    }
    
    public function getAll() {
      return $this->data->getAll();
    }
    
    public function getComment($id) {
     return $this->data->getComment($id);
    }
    
    public function getCommentsByUser($id) {
     return $this->data->getCommentsByUser($id);
    }
    
    public function getCommentsByConversation($id) {
     return $this->data->getCommentsByConversation($id);
    }
    
}
