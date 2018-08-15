<?php

//Capture data from GET method
$course = $_GET['course'];
$professor = $_GET['professor'];
$period = $_GET['period'];
$year = $_GET['year'];
$group = $_GET['group'];

if (isset($course) && isset($professor)) {
    include_once '../business/CourseBusiness.php';
    $business = new CourseBusiness();
    $business->exportStudentsListByCourseAndProfessor($course, $professor, $period, $year, $group);
} else {
    header("location: ../view/ShowCoursesLists.php?action=0&msg=Datos_erroneos");
}