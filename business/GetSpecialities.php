<?php

include_once './SpecialityBusiness.php';

$specialityBusiness = new SpecialityBusiness();
$result = $specialityBusiness->getAllSpecialitiesForCourse();
echo json_encode($result);

