<?php

include_once './UserBusiness.php';

$user = $_POST['user'];
$pass = $_POST['pass'];

if (isset($user) && isset($pass)){
    $userBusiness = new UserBusiness();
    if ($userBusiness->login($user, $pass)){
        header("location: ../view/Home.php?action=1&msg=Ingreso_correcto!");
    } else {
        header("location: ../view/Login.php?action=0&msg=Credenciales_inválidas!");
    }
}