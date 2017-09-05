<?php

include_once '../business/NotificationBusiness.php';

$id = $_POST['id'];
$text = $_POST['text'];
if($text != NULL && $text != ""){
    $business = new NotificationBusiness();
    $newComment = $business->getNotification($id)[0];

    if($business->updateProfessorNotification($text, $newComment->getNotificationProfessor(), $newComment->getNotificationText()) != 0){
        header("location: ../view/ShowNotifications.php?action=1&msg=Registro_actualizado_correctamente");
    }else{
        header("location: ../view/ShowNotifications.php?action=0&msg=RActualización_fallida");
    }
}else{
    header("location: ../view/ShowNotifications.php?action=0&msg=Error_en_los_datos");
}
