<?php

include_once './SpecialityBusiness.php';

$id = (int) $_GET['id'];

if (isset($id) && is_int($id)) {
    $specialityBusiness = new SpecialityBusiness();
    if ($specialityBusiness->delete($id)) {
        header("location: ../view/ShowSpecialities.php?action=1&msg=Registro_eliminado_correctamente");
    } else {
        header("location: ../view/InformationSpeciality.php?id=" . $id . "&action=0&msg=Esta_Atinencia/Especialidad_esta_ligada_con_un_modulo");
    }
} else {
    header("location: ../view/InformationSpeciality.php?id=" . $id . "&action=0&msg=Datos_erroneos");
}