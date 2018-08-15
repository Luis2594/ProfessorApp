<?php

include_once './CourseBusiness.php';

$courseBusiness = new CourseBusiness();
$result = $courseBusiness->getAllJson();

echo json_encode($result);