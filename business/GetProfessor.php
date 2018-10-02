<?php
include_once './ProfessorBusiness.php';

$professorBusiness = new ProfessorBusiness();
$result = $professorBusiness->getAllSchedule();

echo json_encode($result);