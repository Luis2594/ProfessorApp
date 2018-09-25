<?php

require_once '../data/Connector.php';
include_once '../domain/Circular.php';

/**
 * Description of CircularData
 *
 * @author Kevin Esquivel Marín <kevinesquivel21@gmail.com>
 */
class CircularData extends Connector
{
    public function insert($circular)
    {
        $query = "call insertCircular('" .
        $circular->getCircularDescription() . "'," .
        $circular->getCircularSender() . ",'" .
        $circular->GetCircularGUID() . "')";

        try {
            $result = $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $id = trim($array[0]);
            return $id;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getBySender($id)
    {
        $query = "call getCircularBySender(" . $id . ");";
        try {
            $Circular = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($Circular)) {
                $current = new Circular($row['circularid'], $row['circulartext'], $row['circulardate'], $row['circularsender'], $row['circularGUID']);
                array_push($array, $current);
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function getAll()
    {
        $query = "call getAllCircular();";
        try {
            $Circular = $this->exeQuery($query);
            $array = [];
            while ($row = mysqli_fetch_array($Circular)) {
                $current = new Circular($row['circularid'], $row['circulartext'], $row['circulardate'], $row['circularsender'], $row['circularGUID']);
                array_push($array, $current);
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function get($id)
    {
        $query = "call getCircular(".$id.");";
        try {
            $result = $this->exeQuery($query);
            while ($row = mysqli_fetch_array($result)) {
                $current = new Circular($row['circularid'], $row['circulartext'], $row['circulardate'], $row['circularsender'], $row['circularGUID']);
                return $current;
            }
            return $array;
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function update($id, $text)
    {
        $query = "call updateCircular(" . $id . ",'" . $text . "')";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

    public function delete($id)
    {
        $query = "call deleteCircular(" . $id . ")";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            ErrorHandler::Log(__METHOD__, $query, $_SESSION["id"]);
        }
    }

}
