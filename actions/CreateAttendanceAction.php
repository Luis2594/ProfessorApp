<?php

include_once '../business/AttendanceBusiness.php';

$data = $_POST['data'];

if (isset($data)) {
    $business = new AttendanceBusiness();
    $array = json_decode($data);

    foreach ($array as $obj) {
        $attendance = new Attendance($obj->id, $obj->professor, $obj->course, $obj->group, $obj->isPresent, $obj->justification);
        $business->insert($attendance);
    }
    echo true;
} else {
    echo false;
}
