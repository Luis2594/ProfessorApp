<?php

include_once './CourseBusiness.php';

$id = (int) $_GET['id'];
$periods = (int) $_POST['periods'];

if (isset($id) && isset($periods) && is_int($id) && is_int($periods)) {

    $courseBusiness = new CourseBusiness();

    for ($i = 0; $i <= $periods; $i++) {
            $period = (int) $_POST['period' . $i];
            if (isset($period) && is_int($period)) {
                $courseBusiness->insertPeriod($id, $period);
            }
        }
    header("location: ../view/UpdatePeriods.php?id=" . $id . "&action=1&msg=Registros_creados_correctamente");
} else {
    header("location: ../view/UpdatePeriods.php?id=" . $id . "&action=0&msg=Error_al_crear_registros");
}
