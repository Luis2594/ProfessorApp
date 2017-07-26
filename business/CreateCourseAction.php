<?php

include_once './CourseBusiness.php';

$code = (int) $_POST['code'];
$name = $_POST['name'];
$credits = (int) $_POST['credits'];
$lessons = (int) $_POST['lessons'];
$periods = (int) $_POST['periods'];
$speciality = (int) $_POST['speciality'];
$type = (int) $_POST['typeCourse'];

if (isset($code) &&
        isset($name) &&
        isset($credits) &&
        isset($lessons) &&
        isset($speciality) &&
        isset($type)
) {
    $coursesBusiness = new CourseBusiness();

    $pdf = $_POST['schedule'];
    if (!empty($_FILES) && $_FILES["schedule"]["name"]) {
        $path_parts = pathinfo($_FILES["schedule"]["name"]);
        $ext = $path_parts['extension'];
        $pdf_tmp = tempnam("../../pdf/", $code);

        $path_parts_tmp = pathinfo($pdf_tmp);
        $name_tmp_pdf = $path_parts_tmp['basename'];

        $pdf = $pdf_tmp . "." . $ext;

        $folder = '../../pdf/'; //folder path
        opendir($folder); //open path server side
        copy($_FILES["schedule"]["tmp_name"], $pdf); //copy file to server side storage folder

        $pdf = $name_tmp_pdf . "." . $ext;
    } else {
        $pdf = null;
    }

    $course = new Course(NULL, $code, $name, $credits, $lessons, $pdf, $speciality, $type);

    $res = $coursesBusiness->insert($course);

    if ($res != 0) {
        for ($i = 0; $i <= $periods; $i++) {
            $period = $_POST['period' . $i];
            if (isset($period)) {
                $coursesBusiness->insertPeriod($res, $period);
            }
        }
        header("location: ../view/InformationCourse.php?id=" . $res . "&action=1&msg=Registro_creado_correctamente");
    } else {
        header("location: ../view/CreateCourse.php?action=0&msg=El_curso_no_fue_creado_correctamente._Puede_que_exista_uno_con_el_mismo_código_de_módulo.");
    }
} else {
    //error
    header("location: ../view/CreateCourse.php?action=0&msg=Datos_erroneos");
}
?>