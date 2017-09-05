<?php

class Group {

    private $groupid;
    private $groupnumber;
    private $priority;
    
    public function Group($groupid, $groupnumber, $priority) {
        $this->groupid = $groupid;
        $this->groupnumber = $groupnumber;
        $this->priority = $priority;
    }

    public function getGroupid() {
        return $this->groupid;
    }

    public function getGroupnumber() {
        return $this->groupnumber;
    }

    public function getPriority() {
        return $this->priority;
    }

    public function setGroupid($groupid) {
        $this->groupid = $groupid;
    }

    public function setGroupnumber($groupnumber) {
        $this->groupnumber = $groupnumber;
    }

    public function setPriority($priority) {
        $this->priority = $priority;
    }



}
