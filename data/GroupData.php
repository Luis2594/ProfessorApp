<?php

require_once '../data/Connector.php';
include_once '../domain/Group.php';

//require_once './resource/log/ErrorHandler.php';

class GroupData extends Connector {

    public function getAll($id) {
        $query = "call getAllGroupsByProfessor(" . $id . ");";
        try {
            $group = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($group)) {
                $array[] = array("id" => $row['groupid'],
                    "number" => $row['groupnumber']);
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }
    
    public function getGroupByNumber($number) {
        $query = "call getGroupByNumber('" . $number . "');";
        try {
            $group = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($group)) {
                return (new Group($row['groupid'],$row['groupnumber'], 0));
            }
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

}
