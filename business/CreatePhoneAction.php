<?php

include_once './PhoneBusiness.php';

$id = (int) $_GET['id'];
$phones = (int) $_POST['phones'];

if (isset($id) && isset($phones) && is_int($id) && is_int($phones)) {

    $phoneBusiness = new PhoneBusiness();

    for ($i = 0; $i <= $phones; $i++) {
        $number = $_POST['phone' . $i];
        if (isset($number) && $number != "") {
            $phone = new Phone(NULL, $number, $id);
            $phoneBusiness->insert($phone);
        }
    }

    header("location: ../view/UpdatePhones.php?id=" . $id . "&action=1&msg=Registros_creados_correctamente");
} else {
    header("location: ../view/UpdatePhones.php?id=" . $id . "&action=0&msg=Error_al_crear_registros");
}
