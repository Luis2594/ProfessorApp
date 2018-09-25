<?php

include_once './CourseBusiness.php';

$courseBusiness = new CourseBusiness();
$result = $courseBusiness->getType();
echo json_encode($result);
