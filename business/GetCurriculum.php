<?php

include './CurriculumBusiness.php';

$curriculumBusiness = new CurriculumBusiness();
$result = $curriculumBusiness->getAllEnrollment();
echo json_encode($result);

