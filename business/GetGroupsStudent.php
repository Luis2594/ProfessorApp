<?php

include './GroupBusiness.php';

$id = $_POST['id'];

$groupBusiness = new GroupBusiness();
$result = $groupBusiness->getStudentGroupByStudent($id);
echo json_encode($result);

