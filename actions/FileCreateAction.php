<?php

include_once '../tools/GUID.php';

$target_dir = "../../documents/files/";

$course = (int) $_POST['course'];
$professor = (int) $_POST['professor'];
$year = (int) $_POST['year'];
$period = (int) $_POST['period'];
$group = (int) $_POST['group'];
$description = $_POST['description'];

$params = "&course=" . $course .
    "&professor=" . $professor .
    "&year=" . $year .
    "&period=" . $period .
    "&group=" . $group;

$guid = GUID() . "." . end((explode(".", $_FILES["fileToUpload"]["name"])));
$target_file = $target_dir . $guid;

// Check if file already exists
if (file_exists($target_file)) {
    header("location: ../view/FileCreate.php?action=0&msg=El_archivo_ya_existe!"+$params);
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    header("location: ../view/FileCreate.php?action=0&msg=Archivo_demasiado_grande!"+$params);
}

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    include_once '../business/FileBusiness.php';

    if (isset($description) && $description != "" && isset($guid) && $guid != "" 
        && isset($group) && $group != "" &&
        isset($period) && $period != "" && isset($year) && $year != "" && 
        isset($professor) && $professor != "" && isset($course) && $course != "") {

        $business = new FileBusiness();
        $entity = new File(0, $group, $professor, $year, $period, $course, $description, date("Y/m/d"), $guid);

        if ($business->insert($entity) != 0) {
            header("location: ../view/FileShowByCourseAndProfessor.php?action=1&msg=Registro_creado_correctamente".$params);
        } else {
            header("location: ../view/FileCreate.php?action=0&msg=Registro_fallido".$params);
        }
    } else {
        header("location: ../view/FileCreate.php?action=0&msg=Error_en_los_datos".$params);
    }
} else {
    header("location: ../view/FileCreate.php?action=0&msg=Registro_fallido".$params);
}
