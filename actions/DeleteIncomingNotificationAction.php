<?php

include_once '../business/NotificationBusiness.php';

$id = $_GET['id'];

if(isset($id)){
    $business = new NotificationBusiness();
    if($business->deteleIncomingNotification($id) == 1){
        header("location: ../view/ShowIncomingNotifications.php?action=1&msg=Registro_eliminado_correctamente");
    }else{
        header("location: ../view/ShowIncomingNotifications.php?action=0&msg=Error_al_eliminar_registro");
    }
}else{
    header("location: ../view/ShowIncomingNotifications.php?action=0&msg=Error_al_capturar_los_datos");
}
