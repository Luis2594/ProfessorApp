<?php

include './CourseBusiness.php';

$id = (int) $_POST['id'];

$courseBusiness = new CourseBusiness();
$result = $courseBusiness->getCourseToAssignCurriculum($id);

echo json_encode($result);
