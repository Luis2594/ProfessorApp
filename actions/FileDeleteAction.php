<?php

include_once '../business/FileBusiness.php';

$id = $_GET['id'];

$business = new FileBusiness();

$file = $business->get($id);

$params = "&course=" . $file->getCourse() .
"&professor=" . $file->getProfessor() .
"&year=" . $file->getYear() .
"&period=" . $file->getPeriod() .
"&group=" . $file->getGroup();

if (isset($id)) {
    if ($business->delete($id)) {
        unlink("../../documents/files/" . $file->getGUID());
        header("location: ../view/FileShowByCourseAndProfessor.php?action=1&msg=Registro_eliminado_correctamente".$params);
    } else {
        header("location: ../view/FileShowByCourseAndProfessor.php?action=0&msg=Error_al_eliminar_registro".$params);
    }
} else {
    header("location: ../view/FileShowByCourseAndProfessor.php?action=0&msg=Error_al_capturar_los_datos".$params);
}
