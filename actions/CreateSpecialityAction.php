<?php

include_once '../business/SpecialityBusiness.php';

$name = $_POST['name'];

if(isset($name) && $name != ""){
    $name = ucwords(strtolower($name));
    $specialityBusiness = new SpecialityBusiness();
    $speciality = new Speciality(NULL, $name);
    $id_last = $specialityBusiness->insert($speciality);
    
    if($id_last != 0){
        header("location: ../view/ShowSpecialities.php?action=1&msg=Registro_creado_correctamente");
    }else{
        header("location: ../view/CreateSpeciality.php?action=0&msg=Ya_existe_una_atinencia_o_especialidad_con_ese_nombre");
    }
}else{
    header("location: ../view/CreateSpeciality.php?action=0&msg=Error_en_la_información_de_los_datos");
}