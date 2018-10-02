<?php

require('../resource/fpdf/fpdf.php');
require_once '../business/AttendanceBusiness.php';
require_once '../business/PersonBusiness.php';
require_once '../business/CourseBusiness.php';
require_once '../business/GroupBusiness.php';
date_default_timezone_set('America/Costa_Rica');

class PDF extends FPDF {

    // Cabecera de p�gina
    function Header() {
        // Logo
        $this->Image('../resource/images/header.png', 30, 1, 150);
        // Salto de l�nea
        $this->Ln(20);
    }

// Cargar los datos
    function LoadData($courses) {
        $data = array();
        // Leer las líneas del fichero
        foreach ($courses as $course) {
            $data[] = $course;
        }
        return $data;
    }

    function students($data) {
        $header = array(utf8_decode('Nombre de estudiante'),
            utf8_decode('01'),
            utf8_decode('02'),
            utf8_decode('03'),
            utf8_decode('04'),
            utf8_decode('05'),
            utf8_decode('06'),
            utf8_decode('07'),
            utf8_decode('08'),
            utf8_decode('09'),
            utf8_decode('10'),
            utf8_decode('11'),
            utf8_decode('12'),
            utf8_decode('13'),
            utf8_decode('14'),
            utf8_decode('15'),
            utf8_decode('16'),
            utf8_decode('17'),
            utf8_decode('18'),
            utf8_decode('19'),
            utf8_decode('20'),
            utf8_decode('21'),
            utf8_decode('22'),
            utf8_decode('23'),
            utf8_decode('24'),
            utf8_decode('25'),
            utf8_decode('26'),
            utf8_decode('27'),
            utf8_decode('28'),
            utf8_decode('29'),
            utf8_decode('30'),
            utf8_decode('31'));

        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(196, 198, 198);
        $this->SetTextColor(0);
        $this->SetLineWidth(.1);
        $this->SetFont('', '');

        // Cabecera
        $w = array(40,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5,
            5);
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 4, $header[$i], 1, 0, 'C', true);
        }

        $this->Ln();

        // Restauración de colores y fuentes
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0);
        $this->SetFont('');

        foreach ($data as $value) {
            $this->SetFont('Arial', '', 6);

            $this->Cell($w[0], 8, utf8_decode($value->getFullName()), 'LR', 0, 'L', FALSE);

            $this->SetFont('ZapfDingbats', '', 8);

            for ($index = 1; $index < 32; $index++) {
                $isPresent = 0;
                foreach ($value->getAttendance() as $attendance) {
                    if ((int) $attendance['dateAttendance'] == $index) {
                        if ($attendance['isPresent'] == 1) {
                            $isPresent = 1;
                        } else {
                            $isPresent = 0;
                        }
                        break;
                    } else {
                        $isPresent = -1;
                    }
                }

                switch ($isPresent) {
                    case -1:
                        $this->Cell($w[$index], 8, "", 'LR', 0, 'C', FALSE);
                        break;
                    case 0:
                        $this->Cell($w[$index], 8, "7", 'LR', 0, 'C', FALSE);
                        break;
                    case 1:
                        $this->Cell($w[$index], 8, "4", 'LR', 0, 'C', FALSE);
                        break;
                }
            }

            $this->Ln();

            //Estas lineas es para que dibuje la linea divisora inferior
            for ($index = 0; $index < 32; $index++) {
                $this->Cell($w[$index], 0, "", 1, 0, 'L', TRUE);
            }

            $this->Ln();
        }

        $this->Cell(array_sum($w), 0, '', 'T');
    }

    function getMonth($param) {
        $month = "";
        switch ($param) {
            case 1:
                $month = "Enero";
                break;
            case 2:
                $month = "Febrero";
                break;
            case 3:
                $month = "Marzo";
                break;
            case 4:
                $month = "Abril";
                break;
            case 5:
                $month = "Mayo";
                break;
            case 6:
                $month = "Junio";
                break;
            case 7:
                $month = "Julio";
                break;
            case 8:
                $month = "Agosto";
                break;
            case 9:
                $month = "Septiembre";
                break;
            case 10:
                $month = "Octubre";
                break;
            case 1:
                $month = "Noviembre";
                break;
            case 12:
                $month = "Diciembre";
                break;
        }

        return $month;
    }

}

class AttendanceInfo {

    private $fullName;
    private $attendance;

    function AttendanceInfo($fullName, $attendance) {
        $this->fullName = $fullName;
        $this->attendance = $attendance;
    }

    function getFullName() {
        return $this->fullName;
    }

    function getAttendance() {
        return $this->attendance;
    }

    function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    function setAttendance($attendance) {
        $this->attendance = $attendance;
    }

}

$id = $_GET["id"];
$month = $_GET["month"];
$period = $_GET["period"];
$year = $_GET["year"];
$idCourse = $_GET["course"];
$idGroup = $_GET["group"];

$attendanceBusiness = new AttendanceBusiness();
$personBusiness = new PersonBusiness();
$courseBusiness = new CourseBusiness();
$groupBusiness = new GroupBusiness();

$professor = $personBusiness->getPersonId($id);
$course = $courseBusiness->getCourseId($idCourse);
$courseName;
foreach ($course as $value) {
    $courseName = $value->getCourseCode() . " - " . $value->getCourseName();
}

$group = $groupBusiness->getNumberGroup($idGroup);

$data = $attendanceBusiness->getAttenadanceByMonth($month, $period, $year, $idCourse, $idGroup);

$idsStudents = [];
foreach ($data as $value) {
    $idsStudents[] = $value['codStudent'];
}

$idsStudents = array_unique($idsStudents);

$arrangeData = [];
foreach ($idsStudents as $value) {
    $attendance = [];
    foreach ($data as $valueData) {
        if ($value == $valueData['codStudent']) {
            $fullName = $valueData['fullName'];
            $attendance[] = array("isPresent" => $valueData['isPresent'],
                "dateAttendance" => $valueData['dateAttendance']);
        }
    }
    $attendanceInfo = new AttendanceInfo($fullName, $attendance);
    array_push($arrangeData, $attendanceInfo);
}

foreach ($professor as $profe) {
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);

    $pdf->Cell(0, 15, utf8_decode("INFORME DE ASISTENCIA"), 0, 0, 'C', false);

    $name = $profe->getPersonFirstName() . " " . $profe->getPersonFirstlastname() . " " . $profe->getPersonSecondlastname();

    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(0, 5, utf8_decode("Mes: " . $pdf->getMonth(date("m"))), 0, 0, 'R');
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(0, 5, utf8_decode("Profesor(a): " . $name), 0, 0);

    $pdf->Ln();
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(0, 5, utf8_decode("Módulo: " . $courseName), 0, 0);
    $pdf->Ln();
    $pdf->Cell(0, 5, utf8_decode("Grupo: " . $group), 0, 0);
    $pdf->Ln();


//MODULES
//    $pdf->HeaderTable("2-1");
//
    $pdf->Ln();
//
    $pdf->students($arrangeData);

    $pdf->Ln();
//
//    $pdf->SetFont('Arial', 'B', 9);
//    $pdf->Cell(0, 15, utf8_decode("¿OPCIONAL?: No ( ) Si ( ) ¿Cuál?:_________________________________________________"), 0, 1);
//
//    $pdf->SetFont('Arial', 'B', 9);
//    $pdf->Cell(0, 20, utf8_decode("Funcionario que realiza la matrícula: __________________________________________                          Sello "), 0, 1);

    $pdf->Output();
}
?>