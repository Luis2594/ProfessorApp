<?php

include_once './CourseBusiness.php';

$id = (int) $_POST['id'];

$courseBusiness = new CourseBusiness();
$result = $courseBusiness->getCourseToAssignCurriculum($id);

echo json_encode($result);
