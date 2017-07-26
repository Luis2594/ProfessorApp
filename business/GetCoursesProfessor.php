<?php

include './CourseBusiness.php';

$id = (int)$_POST['id'];

$courseBusiness = new CourseBusiness();
$result = $courseBusiness->getCourseToAssignProfessor($id);
echo json_encode($result);

