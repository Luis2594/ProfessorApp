<?php

include_once '../business/GradesBusiness.php';

$params = "&course=" . $_GET['course'] .
"&professor=" . $_GET['professor'] .
"&year=" . $_GET['year'] .
"&period=" . $_GET['period'] .
"&group=" . $_GET['group'];

$action = $_GET['action'];
$id = $_POST['id'];
$data = $_POST['data'];

$business = new GradesBusiness();

if (isset($id) && $id != "" && isset($data) && $data != "") {
    switch ($action) {
        case 'classWork':
            $resultado = $business->updateClassWork($id, $data);
            break;
        case 'homeWork':
            $resultado = $business->updateHomeWork($id, $data);
            break;
        case 'test':
            $resultado = $business->updateTest($id, $data);
            break;
        case 'projects':
            $resultado = $business->updateProject($id, $data);
            break;
        case 'atendance':
            $resultado = $business->updateAtendance($id, $data);
            break;
        case 'recovery1':
            $resultado = $business->updateRecovery1($id, $data);
            break;
        case 'recovery2':
            $resultado = $business->updateRecovery2($id, $data);
            break;
        case 'promotion':
            $resultado = $business->updatePromotion($id, $data);
            break;
        default: //final grade
            $resultado = $business->updateFinalGrade($id, $data);
            break;
    }

    if ($resultado != 1) {
        echo json_encode("Guardado");
    } else {
        echo json_encode("Error");
    }
} else {
    echo json_encode("Error");
}
