<?php

require('../resource/fpdf/fpdf.php');
require_once '../business/PersonBusiness.php';
require_once '../business/CourseBusiness.php';
require_once '../business/GroupBusiness.php';
date_default_timezone_set('America/Costa_Rica');

class PDF extends FPDF {

    // Cabecera de p�gina
    function Header() {
        // Logo
        $this->Image('../resource/images/header.png', 7, 5, 200);
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
        $header = array(utf8_decode('Nombre'), utf8_decode('Presente'), utf8_decode('Ausente'), utf8_decode('Justificación'));
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(196, 198, 198);
        $this->SetTextColor(0);
        $this->SetLineWidth(.1);
        $this->SetFont('', '');

        // Cabecera
        $w = array(90, 20, 20, 60);
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 4, $header[$i], 1, 0, 'C', true);
        }

        $this->Ln();

        // Restauración de colores y fuentes
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0);
        $this->SetFont('');

        foreach ($data as $value) {
            $this->Cell($w[0], 8, utf8_decode($value->name), 'LR', 0, 'C', FALSE);
            $this->SetFont('ZapfDingbats', '', 10);

            if ($value->present == 1) {
                $this->Cell($w[1], 8, "4", 'LR', 0, 'C', FALSE);
            } else {
                $this->Cell($w[1], 8, "", 'LR', 0, 'C', FALSE);
            }

            if ($value->absence == 1) {
                $this->Cell($w[2], 8, "4", 'LR', 0, 'C', FALSE);
            } else {
                $this->Cell($w[2], 8, "", 'LR', 0, 'C', FALSE);
            }

            $this->SetFont('Arial', '', 10);
            $this->Cell($w[3], 8, utf8_decode($value->justification), 'LR', 0, 'C', FALSE);

            $this->Ln();

            //Estas lineas es para que dibuje la linea divisora inferior
            $this->Cell($w[0], 0, "", 1, 0, 'L', TRUE);
            $this->Cell($w[1], 0, "", 1, 0, 'L', TRUE);
            $this->Cell($w[2], 0, "", 1, 0, 'L', TRUE);
            $this->Cell($w[3], 0, "", 1, 0, 'L', TRUE);

            $this->Ln();
        }

        $this->Cell(array_sum($w), 0, '', 'T');
    }

}

$id = $_GET["id"];
$idCourse = $_GET["idCourse"];
$idGroup = $_GET["idGroup"];

$data = $_GET["data"];

$data = json_decode($data);

$personBusiness = new PersonBusiness();
$courseBusiness = new CourseBusiness();
$groupBusiness = new GroupBusiness();

$professor = $personBusiness->getPersonId($id);
$course = $courseBusiness->getCourseId($idCourse);
$courseName;
foreach ($course as $value) {
    $courseName = $value->getCourseName();
}

$group = $groupBusiness->getNumberGroup($idGroup);

foreach ($professor as $profe) {
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);

    $pdf->Cell(0, 0, utf8_decode("INFORME DE ASISTENCIA"), 0, 0, 'C', false);

    $name = $profe->getPersonFirstName() . " " . $profe->getPersonFirstlastname() . " " . $profe->getPersonSecondlastname();

    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(0, 5, utf8_decode("Fecha: " . date("d") . "-" . date("m") . "-" . date("Y")), 0, 0, 'C');
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(0, 5, utf8_decode("Profesor: " . $name), 0, 0);


    $pdf->Ln();
    $pdf->Cell(0, 5, utf8_decode("Módulo: " . $courseName), 0, 0);
    $pdf->Ln();
    $pdf->Cell(0, 5, utf8_decode("Grupo: ".$group), 0, 0);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 0, utf8_decode("ESTUDIANTES"), 0, 0, 'C', false);
    $pdf->Ln(5);


//MODULES
//    $pdf->HeaderTable("2-1");
//
    $pdf->Ln();
//
    $pdf->students($data);

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