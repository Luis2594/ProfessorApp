<?php

include_once './PeriodBusiness.php';

$idCourse = (int) $_GET['idCourse'];
$idPerid = (int) $_GET['idPeriod'];

if (isset($idCourse) && is_int($idCourse) && isset($idPerid) && is_int($idPerid)) {
    $periodBusiness = new PeriodBusiness();
    if ($periodBusiness->deletePeridoCourse($idCourse, $idPerid)) {
        header("location: ../view/UpdatePeriods.php?id=" . $idCourse . "&action=1&msg=Registro_eliminado_correctamente");
    } else {
        header("location: ../view/UpdatePeriods.php?id=" . $idCourse . "&action=0&msg=Error_al_eliminar_registros");
    }
} else {
    header("location: ../view/UpdatePeriods.php?id=" . $idCourse . "&action=0&msg=Datos_erroneos");
}