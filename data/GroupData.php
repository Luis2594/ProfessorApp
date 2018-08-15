<?php

require_once '../data/Connector.php';
include_once '../domain/Group.php';

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
            $this->Log(__METHOD__, $query);
        }
    }

    public function getGroupByNumber($number) {
        $query = "call getGroupByNumber('" . $number . "');";
        try {
            $group = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($group)) {
                return (new Group($row['groupid'], $row['groupnumber'], 0));
            }
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }
    
    public function getNumberGroup($id) {
        $query = "call getNumberGroup('" . $id . "');";
        try {
            $value = $this->exeQuery($query);
            if ((mysqli_num_rows($value) > 0)) {
                return mysqli_fetch_array($value)[0];
            } else {
                return 0;
            }
        } catch (Exception $ex) {
//            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

}
