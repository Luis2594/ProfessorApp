<?php

include_once '../business/InstitutionBusiness.php';

$institutionId = $_POST['id'];
$institutionName = $_POST['name'];
$institutionAddress = $_POST['address'];
$institutionFax = $_POST['fax'];
$institutionPhone = $_POST['phone'];
$institutionMission = $_POST['mission'];
$institutionView = $_POST['view'];

if (
        isset($institutionId) && $institutionId != "" &&
        isset($institutionAddress) && $institutionAddress != "" &&
        isset($institutionFax) && $institutionFax != "" &&
        isset($institutionMission) && $institutionMission != "" &&
        isset($institutionName) && $institutionName != "" &&
        isset($institutionPhone) && $institutionPhone != "" &&
        isset($institutionView) && $institutionView != ""
) {
    //$institutionName = ucwords(strtolower($institutionName));
    $institutionBusiness = new InstitutionBusiness();
    $institution = new Institution($institutionId, $institutionName, $institutionAddress, $institutionFax, $institutionPhone, $institutionMission, $institutionView);   
    if ($institutionBusiness->update($institution) != 0) {
        header("location: ../view/InformationInstitution.php?action=1&msg=Registro_actualizado_correctamente");
    } else {
        header("location: ../view/UpdateInstitution.php?action=0&msg=Registro_fallido");
    }
} else {
    header("location: ../view/UpdateInstitution.php?action=0&msg=Error_en_los_datos");
}
