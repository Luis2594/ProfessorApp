<?php

include_once './SpecialityBusiness.php';

$id = (int) $_GET['id'];
$name = $_POST['name'];

if (isset($id) && is_int($id) && isset($name) && $name != "") {
    $specialityBusiness = new SpecialityBusiness();
    $speciality = new Speciality($id, $name);
    if ($specialityBusiness->update($speciality)) {
        header("location: ../view/InformationSpeciality.php?id=" . $id . "&action=1&msg=Registro_actualizado_correctamente");
    } else {
        header("location: ../view/InformationSpeciality.php?id=" . $id . "&action=0&msg=Ya_existe_una_Atinencia/Especialidad_con_ese_nombre");
    }
} else {
    header("location: ../view/InformationSpeciality.php?id=" . $id . "&action=0&msg=Datos_erroneos");
}