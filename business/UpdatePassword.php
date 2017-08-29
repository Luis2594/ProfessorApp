<?php

include './UserBusiness.php';

session_start();
$id = $_SESSION['id'];

$passOld = $_POST['pass'];
$passNew = $_POST['passUpdate'];

if(isset($passOld) && isset($passNew) && $passOld != "" && $passOld != "" && isset($id)){
    $userBusiness = new UserBusiness();
    if($userBusiness->updatePassword($id, $passOld, $passNew) == 1){
        header("location: ../view/UpdatePassword.php?action=1&msg=Registro_actualizado_correctamente");
    }else{
        header("location: ../view/UpdatePassword.php?action=0&msg=Error_al_actualizar_registro!_Contraseña_no_coincide_con_la_actual");
    }
}else{
    header("location: ../view/UpdatePassword.php?action=0&msg=Error_al_actualizar_registro");
}

