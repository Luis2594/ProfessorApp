<?php
require_once 'PhoneBusiness.php';
require_once 'PersonBusiness.php';
require_once 'UserBusiness.php';
require_once 'AdminBusiness.php';

//Capture data from POST method
//First the generic data for person model
$dni = $_POST['dni'];
$name = $_POST['name'];
$firstlastname = $_POST['firstlastname'];
$secondlastname = $_POST['secondlastname'];
$email = $_POST['email'];
$genderTemp = $_POST['optionsRadios'];
$nationality = $_POST['nationality'];
//capture quantity of phone numbres
$quantityPhones = (int) $_POST['phones'];

if (isset($dni) &&
        isset($name) &&
        isset($firstlastname) &&
        isset($secondlastname) &&
        isset($genderTemp)) {

    $name = ucwords(strtolower($name));
    $firstlastname = ucwords(strtolower($firstlastname));
    $secondlastname = ucwords(strtolower($secondlastname));
    $personBusiness = new PersonBusiness();
    $person = new Person(
            NULL, $dni, $name, $firstlastname, $secondlastname, $email, 
            date("Y-m-d"), NULL, $genderTemp, $nationality, "profile_default.png");
    
    $id_last = $personBusiness->insert($person);
    if ($id_last != 0) {
        $adminBusiness = new AdminBusiness();

        $pass = strtoupper(substr($firstlastname, 0, 2)) . strtoupper(substr($secondlastname, 0, 2)) . substr($dni, -3);
        if ($adminBusiness->insert($id_last, $pass) > 0) {
            if (isset($quantityPhones)) {
                $phoneBusiness = new PhoneBusiness();
                for ($i = 0; $i <= $quantityPhones; $i++) {
                    $number = $_POST['phone' . $i];
                    if (isset($number) && $number != "") {
                        $phone = new Phone(NULL, $number, $id_last);
                        $phoneBusiness->insert($phone);
                    }
                }
            }
            header("location: ../view/ShowAdmins.php?action=1&msg=Registro_creado_correctamente");
        } else {
            //error
            $personBusiness->delete($id_last);
            header("location: ../view/CreateAdmin.php?action=0&msg=Error_al_crear_registro");
        }
    } else {
        //error
        $personBusiness->delete($id_last);
        header("location: ../view/CreateAdmin.php?action=0&msg=Error_al_crear_registro");
    }
} else {
    header("location: ../view/CreateAdmin.php?action=0&msg=Datos_erroneos");
}