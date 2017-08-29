<?php

include_once '../business/NotificationBusiness.php';

$id = $_POST['id'];
$text = $_POST['text'];

if(isset($text) && $text != ""){
    $business = new NotificationBusiness();
    $newComment = new Notification($id, $text,NULL, NULL, NULL, NULL, NULL, NULL );
    
    if($business->updateGeneralNotification($newComment) != 0){
        header("location: ../view/ShowNotifications.php?action=1&msg=Registro_actualizado_correctamente");
    }else{
        header("location: ../view/ShowNotifications.php?action=0&msg=RActualización_fallida");
    }
}else{
    //error
    header("location: ../view/ShowNotifications.php?action=0&msg=Error_en_los_datos");
}
