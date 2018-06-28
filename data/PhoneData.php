<?php

require_once '../data/Connector.php';
include_once '../domain/Phone.php';

class PhoneData extends Connector {

    public function insert($phone) {
        $query = "call insertPhone('" . $phone->getPhonePhone() . "',"
                . "" . $phone->getPhonePerson() . ")";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function update($phone) {
        $query = "call updatePhone('" . $phone->getPhoneId() . "',"
                . "'" . $phone->getPhonePhone() . "',"
                . "'" . $phone->getPhonePerson() . "')";
        try {
            return $this->exeQuery($query);
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function delete($id) {
        $query = 'call deletePhone(' . $id . ');';
        try {
            if ($this->exeQuery($query)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

    public function getAllPhone($id) {
        $query = 'call getAllPhonesByPerson(' . $id . ');';
        try {
            $allPhones = $this->exeQuery($query);
            $array = [];
            if (mysqli_num_rows($allPhones) > 0) {
                while ($row = mysqli_fetch_array($allPhones)) {
                    $currentPhone = new Phone(
                            $row['phoneid'], $row['phonephone'], $row['phoneperson']);
                    array_push($array, $currentPhone);
                }
            }
            return $array;
        } catch (Exception $ex) {
            $this->Log(__METHOD__, $query);
        }
    }

}
