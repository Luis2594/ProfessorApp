<?php

include './EnrollmentBusiness.php';

$id = (int) $_POST['id'];

if (isset($id) && is_int($id)) {
    $enrollmentBusiness = new EnrollmentBusiness();
    if ($enrollmentBusiness->delete($id)) {
        echo TRUE;
    } else {
        echo FALSE;
    }
} else {
    echo FALSE;
}