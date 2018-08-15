<?php

session_start();
include_once '../business/NotificationBusiness.php';

$text = $_POST['text'];
$course = (int) $_POST['course'];
$professor = (int) $_POST['professor'];
$year = (int) $_POST['year'];
$period = (int) $_POST['period'];
$group = (int) $_POST['group'];
if (isset($text) && $text != "" && isset($course) &&
        isset($professor) && isset($year) &&
        isset($period) && isset($group)) {
    if ($course != -1) {
        $business = new NotificationBusiness();
        $new = new Notification(0, $text, $course, $group, $professor, $year, $period, date("Y/m/d"), 0);

        if ($business->insertNotification($new) == 1) {
            header("location: ../view/ShowNotifications.php?course=".$course."&professor=". $professor."&year=". $year."&period=". $period."&group=". $group."&action=1&msg=Registro_creado_correctamente");
        } else {
            header("location: ../view/CreateNotification.php?course=".$course."&professor=". $professor."&year=". $year."&period=". $period."&group=". $group."&action=0&msg=Registro_fallido");
        }
    } else {
        header("location: ../view/ShowNotifications.php?course=".$course."&professor=". $professor."&year=". $year."&period=". $period."&group=". $group."&action=0&msg=No_tiene_cursos_registrados");
    }
} else {
    header("location: ../view/ShowNotifications.php?course=".$course."&professor=". $professor."&year=". $year."&period=". $period."&group=". $group."&action=0&msg=Error_en_los_datos");
}
