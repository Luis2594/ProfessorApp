<?php

include './PersonBusiness.php';

$dni = $_GET['dni'];

if(isset($dni)){
    $personBusiness = new PersonBusiness();
    if($personBusiness->confirmDni($dni) == '0'){
        echo TRUE;
    }else{
        echo FALSE;
    }
}else{
    echo FALSE;
}