<?php

include_once '../business/FileBusiness.php';

$id = $_POST['id'];
$name = $_POST['name'];

$business = new FileBusiness();

$file = $business->get($id);

$params = "&course=" . $file->getCourse() .
"&professor=" . $file->getProfessor() .
"&year=" . $file->getYear() .
"&period=" . $file->getPeriod() .
"&group=" . $file->getGroup();

if (isset($id) && isset($name) && $name != "") {
    $file->setDescription($name);
    if ($business->update($file) != 1) {
        header("location: ../view/FileShowByCourseAndProfessor.php?action=1&msg=Registro_actualizado_correctamente" . $params);
    } else {
        header("location: ../view/FileUpdate.php?action=0&msg=Actualización_fallida&id=" . $id);
    }
} else {
    header("location: ../view/FileShowByCourseAndProfessor.php?action=0&msg=Error_en_los_datos" . $params);
}
