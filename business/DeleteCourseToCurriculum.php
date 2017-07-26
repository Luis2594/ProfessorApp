<?php
include_once './CurriculumBusiness.php';

$id = (int) $_POST['id'];

if (isset($id) && is_int($id)) {
    $curriculumBusiness = new CurriculumBusiness();
    if ($curriculumBusiness->deleteCurriculumCourse($id)) {
        echo TRUE;
    } else {
        echo FALSE;
    }
} else {
    echo FALSE;
}

