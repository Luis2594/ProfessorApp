<?php

include_once './ForumBusiness.php';

if(isset($_GET['id'])){
    $business = new ForumBusiness();
    if($business->delete($_GET['id'])){
        header("location: ../view/ShowForums.php?action=1&msg=Registro_eliminado_correctamente");
    }else{
        header("location: ../view/ShowForums.php?action=0&msg=Error_al_eliminar_registro");
    }
}else{
    header("location: ../view/ShowForums.php?action=0&msg=Error_al_capturar_los_datos");
}
