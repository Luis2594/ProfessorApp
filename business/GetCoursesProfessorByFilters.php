<?php

include_once './CourseBusiness.php';

$id = (int)$_POST['id'];
$period = (int)$_POST['period'];
$year = (int)$_POST['year'];

$courseBusiness = new CourseBusiness();
$result = $courseBusiness->getCourseToAssignProfessorByFilters($id, $period, $year);
echo json_encode($result);

