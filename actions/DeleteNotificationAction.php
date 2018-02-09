<?php

include_once '../business/NotificationBusiness.php';

$id = $_GET['id'];

if(isset($id)){
    $business = new NotificationBusiness();
    $not = $business->getNotification($id);
    if($business->deteleNotificationProfesor($not->getNotificationText(), $not->getNotificationProfessor(), $not->getNotificationCourse())){
        header("location: ../view/ShowNotifications.php?action=1&msg=Registro_eliminado_correctamente");
    }else{
        header("location: ../view/ShowNotifications.php?action=0&msg=Error_al_eliminar_registro");
    }
}else{
    header("location: ../view/ShowNotifications.php?action=0&msg=Error_al_capturar_los_datos");
}
