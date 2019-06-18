<?php

require '../resource/fpdf/fpdf.php';
// require_once '../business/AttendanceBusiness.php';
require_once '../business/PersonBusiness.php';
require_once '../business/CourseBusiness.php';
require_once '../business/GroupBusiness.php';
date_default_timezone_set('America/Costa_Rica');

class PDF extends FPDF
{

    // Cabecera de p�gina
    public function Header()
    {
        // Logo
        $this->Image('../resource/images/header.png', 30, 1, 150);
        // Salto de l�nea
        $this->Ln(20);
    }

// Cargar los datos
    public function grades($data)
    {
        $header = array(utf8_decode('N°'),
            utf8_decode('Nombre de estudiante'),
            utf8_decode('Promedio'),
            utf8_decode('Condición'));

        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(196, 198, 198);
        $this->SetTextColor(0);
        $this->SetLineWidth(.1);
        $this->SetFont('', '');

        // Cabecera
        $w = array(10, 120, 30, 30);
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 4, $header[$i], 1, 0, 'C', true);
        }

        $this->Ln();

        // Restauración de colores y fuentes
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0);
        $this->SetFont('');

        $n = 1;
        foreach ($data as $value) {
            $this->SetFont('Arial', '', 10);

            $this->Cell($w[0], 8, utf8_decode($n), 'LR', 0, 'C', false);
            $this->Cell($w[1], 8, utf8_decode($value[0]), 'LR', 0, 'L', false);

            if ($value[10] == '0') {
                $this->Cell($w[2], 8, utf8_decode("-"), 'LR', 0, 'C', false);
                $this->Cell($w[3], 8, utf8_decode("Desertó"), 'LR', 0, 'C', false);
            } else {
                $this->Cell($w[2], 8, utf8_decode($value[10]), 'LR', 0, 'C', false);
                $this->Cell($w[3], 8, utf8_decode($this->getStatus($value[12])), 'LR', 0, 'C', false);
            }

            $this->Ln();

            //Estas lineas es para que dibuje la linea divisora inferior
            for ($index = 0; $index < 4; $index++) {
                $this->Cell($w[$index], 0, "", 1, 0, 'L', true);
            }

            $this->Ln();
            $n++;
        }

        $this->Cell(array_sum($w), 0, '', 'T');
    }

    public function reprobated($data)
    {
        $header = array(utf8_decode('N°'),
            utf8_decode('Nombre de estudiante'),
            utf8_decode('I Conv.'),
            utf8_decode('Condición'),
            utf8_decode('II Conv.'),
            utf8_decode('Condición'),
            utf8_decode('Promoción'),
            utf8_decode('Condición'));

        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(196, 198, 198);
        $this->SetTextColor(0);
        $this->SetLineWidth(.1);
        $this->SetFont('', '');

        // Cabecera
        $w = array(10, 60, 20, 20, 20, 20, 20, 20);
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 4, $header[$i], 1, 0, 'C', true);
        }

        $this->Ln();

        // Restauración de colores y fuentes
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0);
        $this->SetFont('');

        $n = 1;
        foreach ($data as $value) {
            $this->SetFont('Arial', '', 10);

            $this->Cell($w[0], 8, utf8_decode($n), 'LR', 0, 'C', false);
            $this->Cell($w[1], 8, utf8_decode($value[0]), 'LR', 0, 'L', false);
            $this->Cell($w[2], 8, utf8_decode($value[7]), 'LR', 0, 'C', false);
            $this->Cell($w[3], 8, utf8_decode($this->getStatus($value[12])), 'LR', 0, 'C', false);
            $this->Cell($w[4], 8, utf8_decode($value[8]), 'LR', 0, 'C', false);
            $this->Cell($w[5], 8, utf8_decode($this->getStatus($value[12])), 'LR', 0, 'C', false);
            $this->Cell($w[6], 8, utf8_decode($value[9]), 'LR', 0, 'C', false);
            $this->Cell($w[7], 8, utf8_decode($this->getStatus($value[12])), 'LR', 0, 'C', false);

            $this->Ln();

            //Estas lineas es para que dibuje la linea divisora inferior
            for ($index = 0; $index < 8; $index++) {
                $this->Cell($w[$index], 0, "", 1, 0, 'L', true);
            }

            $this->Ln();
            $n++;
        }

        $this->Cell(array_sum($w), 0, '', 'T');
    }

    private function getStatus($status)
    {
        switch ($status) {
            case '0':
                return 'Reprobado';
            case '1':
                return 'Aprobado';
            case '2':
                return 'Desertó';
        }
    }

    public function getSemestre($period)
    {
        switch ($period) {
            case '1':
            case '3':
                return 'I';
            case '2':
            case '4':
                return 'II';
        }
    }

    public function getPeriod($period)
    {
        switch ($period) {
            case '1':
                return 'I';
            case '2':
                return 'II';
            case '3':
                return 'III';
            case '4':
                return 'IV';
        }
    }
}

$id = $_GET["id"];
$period = $_GET["period"];
$year = $_GET["year"];
$idCourse = $_GET["course"];
$idGroup = $_GET["group"];

$personBusiness = new PersonBusiness();
$courseBusiness = new CourseBusiness();
$groupBusiness = new GroupBusiness();

$professor = $personBusiness->getPersonId($id);
$course = $courseBusiness->getCourseId($idCourse);
$courseName;
$codeCourse;
foreach ($course as $value) {
    $codeCourse = $value->getCourseCode();
    $courseName = $value->getCourseName();
    // $courseName = $value->getCourseCode() . " - " . $value->getCourseName();
}

$group = $groupBusiness->getNumberGroup($idGroup);

$data = $courseBusiness->getStudentsGradesByCourseAndProfessor($idCourse, $id, $period, $year, $idGroup);

$students1 = [];
$students2 = [];

// $reprobated = $courseBusiness->getStudentsReprobatedByCourseAndProfessor($idCourse, $id, $period, $year, $idGroup);

$reprobated = [];
$cont = 0;
foreach ($data as $student) {

    //DIVIDIR LOS ESTUDIANTES POR 25
    if ($cont < 25) {
        array_push($students1, $student);
    } else {
        array_push($students2, $student);
    }
    $cont++;
    //DIVIDIR LOS ESTUDIANTES POR 25

    //SELECCIONAR LOS APLAZADOS Y LOS QUE HICIERON CONVOCATORIA O PROMOCION
    if ($student[12] == '0') {
        array_push($reprobated, $student);
    } else {
        if ($student[7] != "0" && $student[8] != "0" && $student[9] != "0") {
            array_push($reprobated, $student);
        }
    }
    //SELECCIONAR LOS APLAZADOS Y LOS QUE HICIERON CONVOCATORIA O PROMOCION
}

// echo "#1 " . count($students1);
// echo "   #2 " . count($students2);

// exit();

// SE VA A DEJAR ASI POR AQUELLO DE QUE MARLEN QUIERA PRESENTAR EL NOMBRE DEL PROFESOR
foreach ($professor as $profe) {
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 15, utf8_decode("CONCENTRADO DE CALIFICACIONES"), 0, 0, 'C', false);
    $pdf->Ln(5);
    $pdf->Cell(0, 15, utf8_decode("CURSO LECTIVO: " . $year . " - " . $pdf->getSemestre($period) . " SEMESTRE"), 0, 0, 'C', false);

    $pdf->Ln(13);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 5, utf8_decode("Nombre del módulo: " . $courseName), 0, 0);
    $pdf->Ln();
    $pdf->Cell(0, 5, utf8_decode("Número de módulo: " . $codeCourse), 0, 0, 'L', false);
    $pdf->Cell(-200, 5, utf8_decode("Período: " . $pdf->getPeriod($period)), 0, 0, 'C', false);
    $pdf->Cell(0, 5, utf8_decode("Grupo: " . $group), 0, 0, 'R', false);
    $pdf->Ln();

    $pdf->Ln();

    $pdf->grades($students1);

    if (count($students2)) {
        $pdf->addPage();
        $pdf->Ln(10);
        $pdf->grades($students2);
    }

    $pdf->Ln(10);

    $pdf->SetFont('Arial', 'BU', 11);
    $name = $profe->getPersonFirstName() . " " . $profe->getPersonFirstlastname() . " " . $profe->getPersonSecondlastname();
    $pdf->Cell(0, 5, utf8_decode($name), 0, 0);
    $pdf->Cell(-5, 5, utf8_decode('M.Sc. Inés Madrigal Estrada'), 0, 0, 'R');
    $pdf->SetFont('Arial', '', 11);

    $pdf->Ln();
    $pdf->Cell(0, 5, utf8_decode('Nombre completo del profesor'), 0, 0);
    $pdf->Cell(-10, 5, utf8_decode('Directora Institucional'), 0, 0, 'R');

    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(0, 5, utf8_decode("___________________________"), 0, 0);
    $pdf->Cell(0, 5, utf8_decode('___________________________'), 0, 0, 'R');
    $pdf->SetFont('Arial', 'B', 11);

    $pdf->Ln();
    $pdf->Cell(0, 5, utf8_decode('Firma del docente'), 0, 0);
    $pdf->Cell(-23, 5, utf8_decode('Firma'), 0, 0, 'R');

    $pdf->SetFont('Arial', '', 11);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(0, 5, utf8_decode('Fecha de entrega:_____________________'), 0, 0);
    $pdf->Cell(-21, 5, utf8_decode('SELLO'), 0, 0, 'R');

    $pdf->addPage();

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 15, utf8_decode("ACTA DE APLAZADOS"), 0, 0, 'C', false);
    $pdf->Ln(8);
    $pdf->Cell(0, 15, utf8_decode("CURSO LECTIVO: " . $year . " - " . $pdf->getSemestre($period) . " SEMESTRE"), 0, 0, 'C', false);

    $pdf->Ln(13);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 5, utf8_decode("Nombre del módulo: " . $courseName), 0, 0);
    $pdf->Ln();
    $pdf->Cell(0, 5, utf8_decode("Número de módulo: " . $codeCourse), 0, 0, 'L', false);
    $pdf->Cell(-200, 5, utf8_decode("Período: " . $pdf->getPeriod($period)), 0, 0, 'C', false);
    $pdf->Cell(0, 5, utf8_decode("Grupo: " . $group), 0, 0, 'R', false);
    $pdf->Ln();

    $pdf->Ln();

    $pdf->reprobated($reprobated);

    $pdf->SetFont('Arial', '', 11);
    $pdf->Ln(5);
    $pdf->Cell(0, 5, utf8_decode('Fecha I Convocatoria:_____________________'), 0, 0);
    $pdf->Cell(0, 5, utf8_decode('Firma docente:_______________________'), 0, 0, 'R');

    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(0, 5, utf8_decode('Fecha II Convocatoria:_____________________'), 0, 0);
    $pdf->Cell(0, 5, utf8_decode('Firma docente:_______________________'), 0, 0, 'R');

    $pdf->Ln();
    $pdf->Ln();
    $pdf->Cell(0, 5, utf8_decode('Fecha Estarteg. Prom.:_____________________'), 0, 0);
    $pdf->Cell(0, 5, utf8_decode('Firma docente:_______________________'), 0, 0, 'R');

    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial', 'BU', 11);
    $pdf->Cell(0, 5, utf8_decode('M.Sc. Julio Contreras Monge'), 0, 0, 'C');
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(0, 5, utf8_decode('Asistente de dirección'), 0, 0, 'C');

    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial', 'BU', 11);
    $pdf->Cell(0, 5, utf8_decode('_____________________________'), 0, 0, 'C');
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(0, 5, utf8_decode('Firma del asistente de dirección'), 0, 0, 'C');

    $pdf->Output();
}
