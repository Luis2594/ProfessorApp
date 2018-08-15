<?php

include_once './ScheduleBusiness.php';
session_start();
$scheduleBusiness = new ScheduleBusiness();
$result = $scheduleBusiness->getScheduleByProfessor($_SESSION["id"]);

echo json_encode($result);