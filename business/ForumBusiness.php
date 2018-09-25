<?php

include_once '../data/ForumData.php';

class ForumBusiness {

    private $forumData;

    public function ForumBusiness() {
        return $this->forumData = new ForumData();
    }

    public function insert($forum) {
        return $this->forumData->insert($forum);
    }

    public function update($forum) {
        return $this->forumData->update($forum);
    }

    public function delete($id) {
        return $this->forumData->delete($id);
    }

    public function getAll() {
        return $this->forumData->getAll();
    }

    public function getForum($id) {
        return $this->forumData->getForum($id);
    }

    public function getForumsByUser($id) {
        return $this->forumData->getForumsByUser($id);
    }

    public function getForumByProfessor($id) {
        return $this->forumData->getForumByProfessor($id);
    }

}
