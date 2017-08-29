<?php

include './EnrollmentBusiness.php';

$id = $_POST['id'];
$option = (int) $_POST['option'];

$enrollmentBusiness = new EnrollmentBusiness();
$result;
switch ($option) {
    case 0:
        $result = $enrollmentBusiness->getCoursesReprobateByStudent($id);
        break;
    case 1:
        $result = $enrollmentBusiness->getCoursesApprovedByStudent($id);
        break;
    case 2:
        $result = $enrollmentBusiness->getCoursesEnrollmentByStudent($id);
        break;
    case 3:
        $result = $enrollmentBusiness->getCoursesAllEnrollmentByStudent($id);
        break;
    default:
        $result = $enrollmentBusiness->getCoursesAllEnrollmentByStudent($id);
        break;
}




echo json_encode($result);
