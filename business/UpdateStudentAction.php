<?php

//includes
include_once './PersonBusiness.php';
include_once './StudentBusiness.php';
include_once './UserBusiness.php';

$id = $_POST['id'];
$dni = $_POST['dni'];
$name = $_POST['name'];
$firstlastname = $_POST['firstlastname'];
$secondlastname = $_POST['secondlastname'];
$birthdate = $_POST['birthdate'];
$genderTemp = $_POST['optionsRadios'];
$nationality = $_POST['nationality'];

$yearIncome = $_POST['yearIncome'];
$managerStudent = $_POST['managerStudent'];
//$yearOut = $_POST['yearOut'];
$localitation = $_POST['localitation'];
$adecuacyTemp = $_POST['adecuacy'];


if (isset($id) &&
        isset($dni) &&
        isset($name) &&
        isset($firstlastname) &&
        isset($secondlastname) &&
        isset($birthdate) &&
        isset($genderTemp) &&
        isset($nationality) &&
        isset($yearIncome) &&
//        isset($yearOut) &&
        isset($managerStudent) &&
        isset($localitation)) {

    $name = ucwords(strtolower($name));
    $firstlastname = ucwords(strtolower($firstlastname));
    $secondlastname = ucwords(strtolower($secondlastname));
    $managerStudent = ucwords(strtolower($managerStudent));

    $personBusiness = new PersonBusiness();

    //Verificamos el genero de la persona
    $gender = 1;
    if ($genderTemp == 2) {
        $gender = 2;
    }

    //Esto es por si ocupo algo de la persona
    //$personTemp = $personBusiness->getPersonId($id);
    //Creamos instancia de persona
    $person = new Person($id, $dni, $name, $firstlastname, $secondlastname, "email", date('Y-m-d', strtotime(str_replace('/', '-', $birthdate))), NULL, $gender, $nationality, "profile_default.png");

    $res = $personBusiness->update($person);

    if ($res == 1) {

        $studentBusiness = new StudentBusiness();

        //Verificamos la adecuación de la persona
        $adecuacy = 0;
        switch ($adecuacyTemp) {
            case 0:
                $adecuacy = 0;
                break;
            case 1:
                $adecuacy = 1;
                break;
            case 2:
                $adecuacy = 2;
                break;
            default:
                $adecuacy = 0;
                break;
        }

        $student = new Student(NULL, $adecuacy, $yearIncome, NULL, $localitation, NULL, $managerStudent, $id);
        
        if ($studentBusiness->update($student)) {
            $userBusiness = new UserBusiness();
            
            $userTemp = $userBusiness->getUserId($id);
            
            $pass = strtoupper(substr($firstlastname, 0, 2)) . strtoupper(substr($secondlastname, 0, 2)) . substr($dni, -3);
            
            $user = new User($userTemp->getUserId(), $dni, $pass, NULL, NULL);
            
            if ($userBusiness->update($user)) {
                header("location: ../view/InformationStudent.php?id=" . $id . "&action=1&msg=Estudiante_actualizado_correctamente");
            } else {
                header("location: ../view/UpdateStudent.php?id=" . $id . "&action=0&msg=Error_al_actualizar_estudiante");
            }
        } else {
            //error
            header("location: ../view/UpdateStudent.php?id=" . $id . "&action=0&msg=Error_al_actualizar_estudiante");
        }
    } else {
        //error
        header("location: ../view/UpdateStudent.php?id=" . $id . "&action=0&msg=Error_al_actualizar_estudiante");
    }
} else {
    header("location: ../view/UpdateStudent.php?id=" . $id . "&action=0&msg=Datos_erroneos");
}
?>
