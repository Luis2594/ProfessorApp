<?php

include_once './CourseBusiness.php';

$id = (int) $_GET['id'];

if(isset($id) && is_int($id)){
    $courseBusiness = new CourseBusiness();
    if($courseBusiness->delete($id)){
        header("location: ../view/ShowCourseDelete.php?action=1&msg=Registro_eliminado_correctamente");
    }else{
        header("location: ../view/ShowCourseDelete.php?action=0&msg=Error_al_eliminar_registro");
    }
}else{
    header("location: ../view/ShowCourseDelete.php?action=0&msg=Error_al_capturar_los_datos");
}

