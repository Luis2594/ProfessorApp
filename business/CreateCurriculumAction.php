<?php

include_once './CurriculumBusiness.php';

$year = $_POST['year'];
$text = $_POST['name'];

if (isset($year) && isset($text)) {

    $curriculumBusiness = new CurriculumBusiness();
    $curriculum = new Curriculum(NULL, $text, $year);
    $id = $curriculumBusiness->insert($curriculum);
    if ($id != 0) {
        header("location: ../view/InformationCurriculum.php?id=" . $id . "&action=1&msg=Maya_curricular_creada_correctamente");
    } else {
        header("location: ../view/CreateCurriculum.php?action=0&msg=Erro_al_crear_maya_curricular");
    }
} else {
    header("location: ../view/CreateCurriculum.php?action=0&msg=Erro_al_crear_maya_curricular_(DATOS_ERRONEOS)");
}