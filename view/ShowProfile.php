<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<style>
    .imgCircle {
        width:200px;
        height:200px;
        border-radius:150px;
        margin-left: 50px;
        margin-right: 100px;
    }
</style>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowProfile.php"><i class="fa fa-arrow-circle-right"></i> Mi perfil</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <!--TITLE-->
                <div class="box-header">
                    <h3 class="box-title">Mi Perfil</h3>
                </div><!-- /.box-header -->
                <?php
                if (isset($_SESSION['id'])) {
                    include_once '../business/PersonBusiness.php';
                    $personBusiness = new PersonBusiness();
                    $person = $personBusiness->getPersonId((int) $_SESSION['id'])[0];
                } else {
                    echo '<script type="text/javascript">window.location = "./Login.php"</script>';
                }
                ?>
                <!-- form start -->
                <form role="form" id="formProfile" action="" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <!--PHOTO-->
                        <!--                       <div class="form-group">
                                                    <label for="exampleInputFile">Cambiar foto de perfil</label>
                                                    <input id="newImage" name="newImage" type="file" id="exampleInputFile">
                                                    <a class="help-block" onclick="preview();">Vista previa</a>
                                                </div>-->
                        <div class="form-group">
                            <img id="imageProfile2" src="./../resource/images/<?php echo $person->getPersonimage(); ?>" class="img-circle" alt="User Image" />
                        </div>
                        <!--NAME-->
                        <div class="form-group">
                            <label>Perfil</label>
                            <input id="name" name="name" type="text" class="form-control" disabled value="<?php
                            if (isset($_SESSION['type'])) {
                                //echo $person->getPersonFirstName();
                                switch ((int) $_SESSION['type']) {
                                    case 0:
                                        echo 'Estudiante';
                                        break;
                                    case 1:
                                        echo 'Profesor';
                                        break;
                                    case 2:
                                        echo 'Administrador';
                                        break;
                                    default:
                                        echo 'Usuario';
                                        break;
                                }
                            } else {
                                echo 'Usuario';
                            }
                            ?>"/>
                        </div>
                        <!--DNI-->
                        <div class="form-group">
                            <label>Cédula</label>
                            <input id="dni" name="dni" type="text" class="form-control" disabled value="<?php echo $person->getPersonDni() ?>"/>
                        </div>
                        <!--NAME-->
                        <div class="form-group">
                            <label>Nombre</label>
                            <input id="name" name="name" type="text" class="form-control" disabled value="<?php echo $person->getPersonFirstName() ?>"/>
                        </div>
                        <!--FIRSTLASTNAME-->
                        <div class="form-group">
                            <label>Primer Apellido</label>
                            <input id="firstlastname" name="firstlastname" type="text" class="form-control" disabled value="<?php echo $person->getPersonFirstlastname() ?>"/>
                        </div>
                        <!--SECONDLASTNAME-->
                        <div class="form-group">
                            <label>Segundo Apellido</label>
                            <input id="secondlastname" name="secondlastname" type="text" class="form-control" disabled value="<?php echo $person->getPersonSecondlastname() ?>"/>
                        </div>
                        <!--EMAIL-->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" value="<?php echo $person->getPersonEmail() ?>" >
                        </div>
                        <!--GENDER-->
                        <div class="form-group">
                            <label>Género</label>
                            <?php
                            if ($person->getPersonGender() == "1") {
                                ?>
                                <input id="gender" name="gender" type="text" class="form-control" placeholder="Género" required="" value="Hombre" readonly/>
                                <?php
                            } else {
                                ?>
                                <input id="gender" name="gender" type="text" class="form-control" placeholder="Género" required="" value="Mujer" readonly/>
                                <?php
                            }
                            ?>
                        </div>
                        <!--NATIONALITY-->
                        <div class="form-group">
                            <label>Nacionalidad</label>
                            <input id="nationality" name="nationality" type="text" class="form-control" disabled value="<?php echo $person->getPersonNacionality() ?>" />
                        </div>
                        <!--PHONES-->
                        <table id="phone">
                            <tr id="tr0">
                                <td>
                                    <!--<input id="phone0" name="phone0" type="text">-->
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <?php
                                        include '../business/PhoneBusiness.php';
                                        $phoneBusiness = new PhoneBusiness();
                                        $phones = $phoneBusiness->getAllPhone((int) $_SESSION['id']);
                                        foreach ($phones as $phone) {
                                            ?>
                                            <!--PHONE-->
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-phone"></i>
                                                    </div>
                                                    <input id="phone" name="phone" type="text" class="form-control" placeholder="Télefono" required="" value="<?php echo $phone->getPhonePhone() ?>" readonly />
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div><!-- /.form group -->
                                </td>
                            </tr>
                        </table>
                    </div><!-- /.box-body -->
                </form>
                <a type="button" class="btn btn-primary" href="javascript:updateAdmin(<?php echo $person->getPersonId() ?>)">Actualizar</a>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
    });

    function updateAdmin(id) {
        window.location = "UpdateAdmin.php?id=" + id;
    }
</script>