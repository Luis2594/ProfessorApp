<?php

include_once './ProfessorBusiness.php';

$id = (int) $_POST['id'];
$groups = $_POST['groups'];
$period = (int) $_POST['period'];
$modules = $_POST['modules'];

if (isset($id) && is_int($id) && isset($groups) && isset($period) && is_int($period) && isset($modules)) {

    $professorBusiness = new ProfessorBusiness();

    $arrayGroups = explode(",", $groups);
    $arrayModules = explode(",", $modules);

    foreach ($arrayGroups as $idGroup) {
        foreach ($arrayModules as $idCourse) {
            $professorBusiness->insertCourseToProfessor($id, $idGroup, $period, $idCourse);
        }
    }

    echo TRUE;
} else {
    echo FALSE;
} 