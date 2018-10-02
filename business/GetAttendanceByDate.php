<?php

include './AttendanceBusiness.php';

$professor = (int) $_POST['professor'];
$course = (int) $_POST['course'];
$group = (int) $_POST['group'];
$period = (int) $_POST['period'];
$date = $_POST['date'];

$attendanceBusiness = new AttendanceBusiness();

$result = $attendanceBusiness->getAttenadanceByDate($professor, $course, $group, $period, $date);

echo json_encode($result);
