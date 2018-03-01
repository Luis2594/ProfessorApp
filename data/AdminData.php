<?php

require_once '../data/Connector.php';
require_once '../domain/Person.php';

class AdminData extends Connector {

    public function insert($person, $pass) {
        $query = "call insertAdminCredentials('" . $person . "',"
                . "'" . $pass . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $id = trim($array[0]);

            return $id;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function update($person, $pass) {
        $query = "call updateAdmin('" . $person . "',"
                . "'" . $pass . "')";
        try {
            $result = $this->exeQuery($query);
            $array = mysqli_fetch_array($result);
            $res = trim($array[0]);
            return $res;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function getAll() {
        $query = "call getAllAdmin()";
        try {
            $allPersons = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allPersons) > 0) {
                while ($row = mysqli_fetch_array($allPersons)) {
                    $currentPerson = new Person(
                            $row['personid'], $row['persondni'], $row['personfirstname'], $row['personfirstlastname'], $row['personsecondlastname'], $row['personemail'], $row['personbirthday'], $row['personage'], $row['persongender'], $row['personnationality'], $row['personimage']);
                    array_push($array, $currentPerson);
                }
            }
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

}
