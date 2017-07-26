<?php

//includes
include_once './PersonBusiness.php';
include_once './ProfessorBusiness.php';
include_once './UserBusiness.php';
include_once './PhoneBusiness.php';

//Capture data from POST method
//First the generic data for person model
$id = $_POST['id'];
$dni = $_POST['dni'];
$name = $_POST['name'];
$firstlastname = $_POST['firstlastname'];
$secondlastname = $_POST['secondlastname'];
$email = $_POST['email'];
$genderTemp = $_POST['optionsRadios'];
$nationality = $_POST['nationality'];

//capture quantity of phone numbres
$quantityPhones = (int) $_POST['phones'];

if (isset($id) && isset($dni) &&
        isset($name) &&
        isset($firstlastname) &&
        isset($secondlastname) &&
        isset($genderTemp)) {

    $name = ucwords(strtolower($name));
    $firstlastname = ucwords(strtolower($firstlastname));
    $secondlastname = ucwords(strtolower($secondlastname));
    $personBusiness = new PersonBusiness();


    $person = new Person(
            $id, $dni, $name, $firstlastname, $secondlastname, $email, date("Y-m-d"), NULL, $genderTemp, $nationality, "profile_default.png");

    $res = $personBusiness->update($person);

    if ($res == 1) {

        $userBusiness = new UserBusiness();

        $userTemp = $userBusiness->getUserId($id);

        $pass = strtoupper(substr($firstlastname, 0, 2)) . strtoupper(substr($secondlastname, 0, 2)) . substr($dni, -3);

        $user = new User($userTemp->getUserId(), $dni, $pass, NULL, NULL);

        if ($userBusiness->update($user)) {
            header("location: ../view/InformationProfessor.php?id=" . $id . "&action=1&msg=Registro_actualizado_correctamente");
        } else {
            header("location: ../view/UpdateProfessor.php?id=" . $id . "&action=0&msg=Error_al_actualizar_registro");
        }
    } else {
        //error
        header("location: ../view/UpdateProfessor.php?id=" . $id . "&action=0&msg=Error_al_actualizar_registro");
    }
} else {
    header("location: ../view/UpdateProfessor.php?id=" . $id . "&action=0&msg=Datos_erroneos");
}
?>