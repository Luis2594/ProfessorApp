<?php

include_once '../business/NotificationBusiness.php';

$id = $_GET['id'];
$course = $_GET['course'];
$professor = $_GET['professor'];
$year = $_GET['year'];
$period = $_GET['period'];
$group = $_GET['group'];

if(isset($id)){
    $business = new NotificationBusiness();
    if($business->deteleNotification($id) == 1){
        header("location: ../view/ShowNotifications.php?course=".$course."&professor=". $professor."&year=". $year."&period=". $period."&group=". $group."&action=1&msg=Registro_eliminado_correctamente");
    }else{
        header("location: ../view/ShowNotifications.php?course=".$course."&professor=". $professor."&year=". $year."&period=". $period."&group=". $group."&action=0&msg=Error_al_eliminar_registro");
    }
}else{
    header("location: ../view/ShowNotifications.php?course=".$course."&professor=". $professor."&year=". $year."&period=". $period."&group=". $group."&action=0&msg=Error_al_capturar_los_datos");
}
