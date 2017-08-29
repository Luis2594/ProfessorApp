<?php

include_once './ScheduleBusiness.php';

$id = (int) $_POST['schedule'];

if(isset($id) && is_int($id)){
    $scheduleBusiness = new ScheduleBusiness();
    $scheduleBusiness->deleteSchedule($id);
    echo true;
}else{
    echo false;
}
