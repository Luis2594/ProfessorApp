<?php

include_once './ScheduleBusiness.php';

$group = (int) $_POST['group'];

if(isset($group) && is_int($group)){
    $scheduleBusiness = new ScheduleBusiness();
    $scheduleBusiness->deleteScheduleByGroup($group);
    echo true;
}else{
    echo false;
}