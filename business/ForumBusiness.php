<?php

include_once '../data/ForumData.php';

class ForumBusiness {

     private $conversationData;

    public function ForumBusiness() {
        return $this->conversationData = new ForumData();
    }
    
     public function insert($conversation) {
       return $this->conversationData->insert($conversation);
    }
    
    public function update($conversation) {
       return $this->conversationData->update($conversation);
    }
    
    public function delete($id) {
      return $this->conversationData->delete($id);
    }
    
    public function getAll() {
      return $this->conversationData->getAll();
    }
    
    public function getForum($id) {
     return $this->conversationData->getForum($id);
    }
    
    public function getForumsByUser($id) {
     return $this->conversationData->getForumsByUser($id);
    }
    
}
