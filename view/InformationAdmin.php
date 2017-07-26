<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowAdmins.php"><i class="fa fa-arrow-circle-right"></i>Ver Administradores</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Información del Administrador</a></li>
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
                <div class="box-header">
                    <h3 class="box-title">Información Administrador</h3>
                </div><!-- /.box-header -->

                <?php
                include_once '../business/PersonBusiness.php';
                include_once '../business/PhoneBusiness.php';

                $PersonBusiness = new PersonBusiness();

                $id = (int) $_GET['id'];

                $admin = $PersonBusiness->getPersonId($id)[0];

                $phoneBusiness = new PhoneBusiness();

                $phones = $phoneBusiness->getAllPhone($id);
                ?>
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <!--DNI-->
                        <div class="form-group">
                            <label>Cédula</label>
                            <input id="dni" name="dni" type="number" class="form-control" placeholder="Cédula" required="" value="<?php echo $admin->getPersonDni() ?>" readonly />
                        </div>
                        <!--NAME-->
                        <div class="form-group">
                            <label>Nombre</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre" required="" value="<?php echo $admin->getPersonFirstName() ?>" readonly />
                        </div>
                        <!--FIRSTLASTNAME-->
                        <div class="form-group">
                            <label>Primer Apellido</label>
                            <input id="firstlastname" name="firstlastname" type="text" class="form-control" placeholder="Primer apellido" required="" value="<?php echo $admin->getPersonFirstlastname() ?>" readonly />
                        </div>
                        <!--SECONDLASTNAME-->
                        <div class="form-group">
                            <label>Segundo Apellido</label>
                            <input id="secondlastname" name="secondlastname" type="text" class="form-control" placeholder="Segundo apellido" required="" value="<?php echo $admin->getPersonSecondlastname() ?>" readonly />
                        </div>
                        <!--EMAIL-->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo Electrónico</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="exampleInputEmail1" placeholder="Correo Electrónico" value="<?php echo $admin->getPersonEmail() ?>" readonly>
                        </div>

                        <!--GENDER-->
                        <div class="form-group">
                            <label>Género</label>
                            <?php
                            if ($admin->getPersonGender() == "1") {
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
                            <input id="nationality" name="nationality" type="text" class="form-control" placeholder="Nacionalidad" required="" value="<?php echo $admin->getPersonNacionality() ?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <?php
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
                        </div>
                        <!--USERNAME-->
                        <div class="form-group">
                            <label>Nombre de usuario</label>
                            <input id="username" name="username" type="text" class="form-control" placeholder="Nombre de usuario" required="" value="<?php echo $admin->getUserUsername() ?>" readonly />
                        </div>
                        <!--PASSWORD-->
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input id="pass" name="pass" type="text" class="form-control" placeholder="Contraseña" required="" value="<?php echo $admin->getUserPass() ?>" readonly />
                        </div>
                    </div><!-- /.box-body -->

                </form>

                <div class="btn-group btn-group-justified">
                    <a type="button" class="btn btn-success" href="javascript:createAdmin()">Crear</a>
                    <a type="button" class="btn btn-primary" href="javascript:updateAdmin(<?php echo $admin->getPersonId() ?>)">Actualizar</a>
                    <a type="button" class="btn btn-danger" href="javascript:deleteAdmin(<?php echo $admin->getPersonId() ?>)">Eliminar</a>
                </div>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include './reusable/Footer.php';
?>

<script type="text/javascript">

    (function ($) {
        $.get = function (key) {
            key = key.replace(/[\[]/, '\\[');
            key = key.replace(/[\]]/, '\\]');
            var pattern = "[\\?&]" + key + "=([^&#]*)";
            var regex = new RegExp(pattern);
            var url = unescape(window.location.href);
            var results = regex.exec(url);
            if (results === null) {
                return null;
            } else {
                return results[1];
            }
        }
    })(jQuery);
    var action = $.get("action");
    var msg = $.get("msg");
    if (action === "1") {
        msg = msg.replace(/_/g, " ");
        alertify.success(msg);
    }
    if (action === "0") {
        msg = msg.replace(/_/g, " ");
        alertify.error(msg);
    }

    function createProfessor() {
        window.location = "CreateProfessor.php?";
    }

    function updateProfessor(id) {
        window.location = "UpdateProfessor.php?id=" + id;
    }

    function deleteProfessor(id) {
        alertify.confirm('Eliminar profesor', '¿Desea eliminar a ' +
                $("input[name=name]").val() + " " +
                $("input[name=firstlastname]").val() + " " +
                $("input[name=secondlastname]").val() +
                " con cédula " + $("input[name=dni]").val() +
                " de la lista de profesores?", function () {
                    window.location = "../business/DeleteProfessorAction.php?id=" + id;
                }
        , function () {
            alertify.error('Cancelado');
        });
    }


</script>
