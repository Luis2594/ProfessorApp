<?php
session_start();
include_once '../business/NotificationBusiness.php';

$text = $_POST['text'];
$course = $_POST['curso'];

if (isset($text) && $text != "" && isset($course)) {
    if ($course != -1) {
        $business = new NotificationBusiness();
        $new = new Notification(NULL, $text, $_SESSION['id'], $course, NULL, NULL, NULL, NULL);

        if ($business->insertNotificationFromProfessor($new) != 0) {
            header("location: ../view/ShowNotifications.php?action=1&msg=Registro_creado_correctamente");
        } else {
            header("location: ../view/CreateNotification.php?action=0&msg=Registro_fallido");
        }
    } else {
        header("location: ../view/CreateNotification.php?action=0&msg=No_tiene_cursos_registrados.");
    }
} else {
    header("location: ../view/CreateNotification.php?action=0&msg=Error_en_los_datos");
}
