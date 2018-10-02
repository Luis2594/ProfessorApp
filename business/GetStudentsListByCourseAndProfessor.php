<?php

include_once './CourseBusiness.php';

$course = (int)$_POST['course'];
$professor = (int)$_POST['professor'];

$courseBusiness = new CourseBusiness();
$result = $courseBusiness->GetStudentsListByCourseAndProfessor($course, $professor);
echo json_encode($result);

