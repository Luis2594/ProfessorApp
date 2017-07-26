<?php

class Comment{
    private $id;
    private $comment;
    private $conversation;
    private $person;
    
    public function Comment($id, $comment, $conversation, $person) {
        $this->id = $id;
        $this->comment = $comment;
        $this->conversation = $conversation;
        $this->person = $person;
    }
    public function getId() {
        return $this->id;
    }

    public function getComment() {
        return $this->comment;
    }

    public function getConversation() {
        return $this->conversation;
    }

    public function getPerson() {
        return $this->person;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setComment($comment) {
        $this->comment = $comment;
        return $this;
    }

    public function setConversation($conversation) {
        $this->conversation = $conversation;
        return $this;
    }

    public function setPerson($person) {
        $this->person = $person;
        return $this;
    }


    
}



