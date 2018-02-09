<?php

//Capture data from GET method
$course = $_GET['course'];
$professor = $_GET['professor'];

if (isset($course) && isset($professor)) {
    include_once '../business/CourseBusiness.php';
    $business = new CourseBusiness();
    $business->exportStudentsListByCourseAndProfessor($course, $professor);
    //header("location: ../view/ShowStudentsByCourse.php?course=".$course."&action=1&msg=Datos_exportados");
} else {
    header("location: ../view/ShowStudentsByCourse.php?course=".$course."&action=0&msg=Datos_erroneos");
}