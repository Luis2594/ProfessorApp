<?php


class Group {

    private $groupid;
    private $groupnumber;
    private $priority;
    
    function Group($groupid, $groupnumber, $priority) {
        $this->groupid = $groupid;
        $this->groupnumber = $groupnumber;
        $this->priority = $priority;
    }

    function getGroupid() {
        return $this->groupid;
    }

    function getGroupnumber() {
        return $this->groupnumber;
    }

    function getPriority() {
        return $this->priority;
    }

    function setGroupid($groupid) {
        $this->groupid = $groupid;
    }

    function setGroupnumber($groupnumber) {
        $this->groupnumber = $groupnumber;
    }

    function setPriority($priority) {
        $this->priority = $priority;
    }



}
