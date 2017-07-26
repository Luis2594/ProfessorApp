<?php

include_once './CourseBusiness.php';

$id = $_GET['id'];
$code = (int) $_POST['code'];
$name = $_POST['name'];
$credits = (int) $_POST['credits'];
$lessons = (int) $_POST['lessons'];
$speciality = (int) $_POST['speciality'];
$type = (int) $_POST['typeCourse'];

if (isset($id) &&
        isset($code) &&
        isset($name) &&
        isset($credits) &&
        isset($lessons) &&
        isset($speciality) &&
        isset($type)
) {
    $coursesBusiness = new CourseBusiness();
    
    $courseTemp = $coursesBusiness->getCourseIdUpdate($id);
    
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
        foreach ($courseTemp as $courseForeach) {
            $pdf = $courseForeach->getCoursePdf();
        }
    }

    $course = new Course($id, $code, $name, $credits, $lessons, $pdf, $speciality, $type);

    if ($coursesBusiness->update($course)) {
        header("location: ../view/InformationCourse.php?id=".$id."&action=1&msg=Registro_actualizado_correctamente");
    } else {
        header("location: ../view/InformationCourse.php?id=".$id."&action=0&msg=Error_al_actualizar_registro");
    }
} else {
    //error
    header("location: ../view/InformationCourse.php?id=".$id."&action=0&msg=Datos_erroneos");
}
?>