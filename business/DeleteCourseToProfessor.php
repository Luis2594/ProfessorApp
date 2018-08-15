<?php

include_once './ProfessorBusiness.php';

$id = (int) $_POST['id'];

if (isset($id) && is_int($id)) {
    $professorBusiness = new ProfessorBusiness();
    if ($professorBusiness->deleteProfessorCourse($id)) {
        echo TRUE;
    } else {
        echo FALSE;
    }
} else {
    echo FALSE;
}

