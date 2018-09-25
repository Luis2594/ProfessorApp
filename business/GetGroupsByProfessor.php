<?php

include_once './GroupBusiness.php';

$id = (int) $_POST['id'];
$groupBusiness = new GroupBusiness();
$result = $groupBusiness->getAll($id);
echo json_encode($result);

