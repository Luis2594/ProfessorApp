<?php

include_once '../business/NotificationBusiness.php';

$id = $_POST['id'];
$text = $_POST['text'];
$course = $_GET['course'];
$professor = $_GET['professor'];
$year = $_GET['year'];
$period = $_GET['period'];
$group = $_GET['group'];
if ($text != NULL && $text != "") {
    $business = new NotificationBusiness();
    $newComment = $business->getNotification($id)[0];
    $newComment->setNotificationText($text);
    if ($business->updateNotification($newComment)) {
        header("location: ../view/ShowNotifications.php?course=" . $course . "&professor=" . $professor . "&year=" . $year . "&period=" . $period . "&group=" . $group . "&action=1&msg=Registro_actualizado_correctamente");
    } else {
        header("location: ../view/ShowNotifications.php?course=" . $course . "&professor=" . $professor . "&year=" . $year . "&period=" . $period . "&group=" . $group . "&action=0&msg=Actualización_fallida");
    }
} else {
    header("location: ../view/ShowNotifications.php?course=" . $course . "&professor=" . $professor . "&year=" . $year . "&period=" . $period . "&group=" . $group . "&action=0&msg=Error_en_los_datos");
}
