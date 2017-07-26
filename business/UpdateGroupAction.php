<?php

include './GroupBusiness.php';

$idPerson = (int) $_GET['id'];

$mainGroup = (int) $_POST['mainGroup'];
$mainGroupTemp = (int) $_POST['mainGroupTemp'];

$secundaryGroup = (int) $_POST['secundaryGroup'];
$secundaryGroupTemp = (int) $_POST['secundaryGroupTemp'];

if (isset($idPerson) && is_int($idPerson)) {

    $groupBusiness = new GroupBusiness();

    if (isset($mainGroup) && is_int($mainGroup) && $mainGroup != -1) {
        if (isset($mainGroupTemp) && $mainGroupTemp != 0) {
            if ($groupBusiness->delete($idPerson, $mainGroupTemp)) {
                if ($mainGroup != 0) {
                    $groupBusiness->insertStudentGroup($mainGroup, $idPerson, 1);
                }
            }
        } else {
            if ($mainGroup != 0) {
                $groupBusiness->insertStudentGroup($mainGroup, $idPerson, 1);
            }
        }
    }

    if (isset($secundaryGroup) && is_int($secundaryGroup) && $secundaryGroup != -1) {
        if (isset($secundaryGroupTemp) && $secundaryGroupTemp != 0) {
            if ($groupBusiness->delete($idPerson, $secundaryGroupTemp)) {
                if ($secundaryGroup != 0) {
                    $groupBusiness->insertStudentGroup($secundaryGroup, $idPerson, 0);
                }
            }
        } else {
            if ($secundaryGroup != 0) {
                $groupBusiness->insertStudentGroup($secundaryGroup, $idPerson, 0);
            }
        }
    }


    header("location: ../view/UpdateGroup.php?id=" . $idPerson . "&action=1&msg=Registro_actualizado_correctamente");
} else {
    header("location: ../view/UpdateGroup.php?id=" . $idPerson . "&action=0&msg=Error_al_actualizar_registro");
}