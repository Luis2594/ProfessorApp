<?php

include './ScheduleBusiness.php';

$group = (int) $_POST['group'];
$professor = (int) $_POST['professor'];
$module = (int) $_POST['module'];
$hours =  $_POST['hours'];
$days =  $_POST['days'];

if (isset($group) && is_int($group) 
        && isset($professor) && is_int($professor) 
        && isset($module) && is_int($module) 
        && isset($hours)
        && isset($days)) {

    $scheduleBusiness = new ScheduleBusiness();

    $arrayHours = explode(",", $hours);
    $arrayDays = explode(",", $days);
    
    for ($i = 0; $i < count($arrayHours); $i++) {
        $schedule = new Schedule(NULL,
                $group, 
                $professor, 
                $module, 
                $arrayHours[$i], 
                $arrayDays[$i]);
        
        $scheduleBusiness->insert($schedule);
    }
    echo TRUE;
} else {
    echo FALSE;
} 