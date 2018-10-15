<?php

require_once '../data/Connector.php';
include_once '../domain/File.php';

class GradesData extends Connector
{
    public function updateClassWork($id, $data)
    {
        $query = "call updateGradeClassWork(" . $id . ",". $data . ")";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function updateHomeWork($id, $data)
    {
        $query = "call updateGradeHomeWork(" . $id . ",". $data . ")";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function updateTest($id, $data)
    {
        $query = "call updateGradeTest(" . $id . ",". $data . ")";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function updateAtendance($id, $data)
    {
        $query = "call updateGradeAtendance(" . $id . ",". $data . ")";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function updateRecovery1($id, $data)
    {
        $query = "call updateGradeRecovery1(" . $id . ",". $data . ")";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function updateRecovery2($id, $data)
    {
        $query = "call updateGradeRecovery2(" . $id . ",". $data . ")";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function updatePromotion($id, $data)
    {
        $query = "call updateGradePromotion(" . $id . ",". $data . ")";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function updateProject($id, $data)
    {
        $query = "call updateGradeProject(" . $id . ",". $data . ")";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function updateFinalGrade($id, $data)
    {
        $query = "call updateGradeFinal(" . $id . ",". $data . ")";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            return trim($array[0]);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

}
