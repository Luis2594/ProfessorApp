<?php

include_once '../business/AttendanceBusiness.php';

$data = $_POST['data'];

if (isset($data)) {
    $business = new AttendanceBusiness();
    $array = json_decode($data);

    if (!empty($array)) {
        foreach ($array as $obj) {
            $business->update($obj->id, $obj->isPresent, $obj->justification);
        }
        echo true;
    } else {
        echo false;
    }
} else {
    echo false;
}
