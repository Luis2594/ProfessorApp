<?php

include_once './PeriodBusiness.php';

$periodBusiness = new PeriodBusiness();
$result = $periodBusiness->getAllPeriods();
echo json_encode($result);

