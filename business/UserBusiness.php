<?php

require_once '../data/UserData.php';

class UserBusiness {
    
    private $userData;

    public function UserBusiness() {
        return $this->userData = new UserData();
    }
    
     public function insert($user) {
       return $this->userData->insert($user);
    }
    
     public function insertProfessorWithCredentials($user) {
       return $this->userData->insertProfessorWithCredentials($user);
    }
    
    public function update($user) {
       return $this->userData->update($user);
    }
    
    public function delete($id) {
      return $this->userData->delete($id);
    }
    
    public function getAll() {
      return $this->userData->getAll();
    }
    
    public function getUserId($id) {
     return $this->userData->getUserId($id);
    }
    
    public function getLastId() {
        return $this->userData->getLastId();
    }
    
    public function login($user, $pass) {
        return $this->userData->login($user, $pass);
    }
    
    public function isUser($user, $pass) {
        return $this->userData->isUser($user, $pass);
    }
    
}
