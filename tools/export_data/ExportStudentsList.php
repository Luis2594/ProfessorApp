<?php

include_once '../../libs/ExportData.php';
include_once '../../libs/GUID.php';
include_once '../../business/CourseBusiness.php';

//capture required IDs
$course = (int)$_GET['course'];
$professor = (int)$_GET['professor'];

//new instances of data management lib
$excel = new ExportDataExcel('browser');//browser-file-string
$excel->filename = GUID().".xlsx";//configure name
//new instance of course business
$courseBusiness = new CourseBusiness();
//capture the list of students by course and professor
$result = $courseBusiness->GetStudentsListByCourseAndProfessor($course, $professor);
//add the headersfor the excel file
$data = array_merge(array_push($array, array("Nombre", "Cédula", "Teléfono")), $result);

//creation of the file!
$excel->initialize();
foreach($data as $row) {
	$excel->addRow($row);
}
$excel->finalize();//be happy!!