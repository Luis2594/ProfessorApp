<?php

class Conversation {
    private $forumConversationId;
    private $forumId;
    private $forumConversation;
    
    function Conversation($forumConversationId, $forumId, $forumConversation) {
        $this->forumConversationId = $forumConversationId;
        $this->forumId = $forumId;
        $this->forumConversation = $forumConversation;
    }
    public function getForumConversationId() {
        return $this->forumConversationId;
    }

    public function getForumId() {
        return $this->forumId;
    }

    public function getForumConversation() {
        return $this->forumConversation;
    }

    public function setForumConversationId($forumConversationId) {
        $this->forumConversationId = $forumConversationId;
        return $this;
    }

    public function setForumId($forumId) {
        $this->forumId = $forumId;
        return $this;
    }

    public function setForumConversation($forumConversation) {
        $this->forumConversation = $forumConversation;
        return $this;
    }

}

