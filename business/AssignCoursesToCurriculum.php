<?php

include_once './CurriculumBusiness.php';

$id = (int) $_POST['id'];
$period = (int) $_POST['period'];
$modules = $_POST['modules'];

if (isset($id) && is_int($id) 
        && isset($period) && is_int($period) 
        && isset($modules)) {

    $curriculumBusiness = new CurriculumBusiness();

    $array = explode(",", $modules);
    foreach ($array as $idCourse) {
        $curriculumBusiness->insertCourseToCurriculum($id, $period, $idCourse);
    }
    echo TRUE;
} else {
    echo FALSE;
} 