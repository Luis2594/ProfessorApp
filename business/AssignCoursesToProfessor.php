<?php

include_once './ProfessorBusiness.php';

$id = (int) $_POST['id'];
$group = (int) $_POST['group'];
$period = (int) $_POST['period'];
$modules = $_POST['modules'];

if (isset($id) && is_int($id) 
        && isset($group) && is_int($group) 
        && isset($period) && is_int($period) 
        && isset($modules)) {

    $professorBusiness = new ProfessorBusiness();

    $array = explode(",", $modules);
    foreach ($array as $idCourse) {
        $professorBusiness->insertCourseToProfessor($id, $group, $period, $idCourse);
    }
    echo TRUE;
} else {
    echo FALSE;
} 