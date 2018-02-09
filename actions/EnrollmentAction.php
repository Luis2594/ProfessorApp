<?php

include './EnrollmentBusiness.php';

$id = (int) $_POST['id'];
$modules = $_POST['modules'];
$group = (int) $_POST['group'];
$periods =  $_POST['periods'];

if (isset($id) && is_int($id) 
        && isset($group) && is_int($group) 
        && isset($periods)
        && isset($modules)) {

    $enrollmentBusiness = new EnrollmentBusiness();

    $arrayCourses = explode(",", $modules);
    $arrayPeriods = explode(",", $periods);
    
    for ($i = 0; $i < count($arrayCourses); $i++) {
        $enrollment = new Enrollment($id, $arrayCourses[$i], $group, $arrayPeriods[$i], 2);
        $enrollmentBusiness->insertEnrollment($enrollment);
    }
    echo TRUE;
} else {
    echo FALSE;
} 