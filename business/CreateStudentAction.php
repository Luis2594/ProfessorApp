<?php

include './PersonBusiness.php';
include './StudentBusiness.php';
include './UserBusiness.php';
include './PhoneBusiness.php';
include './GroupBusiness.php';

$dni = $_POST['dni'];
$name = $_POST['name'];
$firstlastname = $_POST['firstlastname'];
$secondlastname = $_POST['secondlastname'];
$birthdate = $_POST['birthdate'];
$genderTemp = $_POST['optionsRadios'];
$nationality = $_POST['nationality'];

$yearIncome = $_POST['yearIncome'];
$managerStudent = $_POST['managerStudent'];
$localitation = $_POST['localitation'];
$adecuacyTemp = $_POST['adecuacy'];
$mainGroup = $_POST['mainGroup'];
$secundaryGroup = $_POST['secundaryGroup'];

$quantityPhones = (int) $_POST['phones'];

if (isset($dni) &&
        isset($name) &&
        isset($firstlastname) &&
        isset($secondlastname) &&
        isset($birthdate) &&
        isset($genderTemp) &&
        isset($mainGroup) &&
        isset($secundaryGroup) &&
        isset($yearIncome) &&
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

    //Creamos instancia de persona
    $person = new Person(NULL, $dni, $name, $firstlastname, $secondlastname, "", date('Y-m-d', strtotime(str_replace('/', '-', $birthdate))), NULL, $gender, $nationality, "profile_default.png");

    $id_last = $personBusiness->insert($person);

    if ($id_last != 0) {

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

        $student = new Student(NULL, $adecuacy, $yearIncome, NULL, $localitation, NULL, $managerStudent, $id_last);
        $pass = strtoupper(substr($firstlastname, 0, 2)) . strtoupper(substr($secondlastname, 0, 2)) . substr($dni, -3);
        
        if ($studentBusiness->insertStudentWithCredentials($student, $pass)) {
            
            $groupBusiness = new GroupBusiness();
            if($groupBusiness->insertStudentGroup($mainGroup, $id_last, 1)){
                if($secundaryGroup != 0 && $secundaryGroup != $mainGroup){
                    if($groupBusiness->insertStudentGroup($secundaryGroup, $id_last, 0)){
                        
                    }else{
                        header("location: ../view/CreateStudent.php?action=0&msg=Error_al_ingresar_grupo_secundario");
                    }
                }
            }else{
                header("location: ../view/CreateStudent.php?action=0&msg=Error_al_ingresar_grupo_principal");
            }
           
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
            header("location: ../view/InformationStudent.php?id=" . $id_last . "&action=1&msg=Registro_creado_correctamente");
        } else {
            //error
            $personBusiness->delete($id_last);
            header("location: ../view/CreateStudent.php?action=0&msg=Error_al_crear_registro");
        }
    } else {
        //error
        $personBusiness->delete($id_last);
        header("location: ../view/CreateStudent.php?action=0&msg=Error_al_crear_estudiante");
    }
} else {
    header("location: ../view/CreateStudent.php?action=0&msg=Datos_erroneos");
}
