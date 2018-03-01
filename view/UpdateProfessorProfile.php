<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';
?>

<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Actualizar Perfil</a></li>
    </ol>
</section>
<br>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Información Profesor</h3>
                </div>
                <div class="box-footer">
                    <?php
                    include_once './business/PersonBusiness.php';
                    include_once '../domain/Person.php';

                    $personBusiness = new PersonBusiness();
                    $id = (int) $_GET['id'];
                    $currentPerson = $personBusiness->getPersonId($id)[0];

                    if ($currentPerson == NULL) {
                        header("location: ./Login.php");
                    }
                    ?>
                    <form role="form" id="formUpdateProfesorProfile" action="../actions/UpdateProfessorProfileAction.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="dniTemp" value="<?php echo $currentPerson->getPersonDni() ?>">
                        <input type="hidden" id="id" name="id" value="<?php echo $id ?>">
                        <!--DNI-->
                        <div class="form-group">
                            <label>Cédula</label>
                            <input id="dni" name="dni" type="number" class="form-control" placeholder="Cédula" required="" value="<?php echo $currentPerson->getPersonDni() ?>"  />
                        </div>
                        <!--NAME-->
                        <div class="form-group">
                            <label>Nombre</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre" required="" value="<?php echo $currentPerson->getPersonFirstName() ?>"  />
                        </div>
                        <!--FIRSTLASTNAME-->
                        <div class="form-group">
                            <label>Primer Apellido</label>
                            <input id="firstlastname" name="firstlastname" type="text" class="form-control" placeholder="Primer apellido" required="" value="<?php echo $currentPerson->getPersonFirstlastname() ?>"  />
                        </div>
                        <!--SECONDLASTNAME-->
                        <div class="form-group">
                            <label>Segundo Apellido</label>
                            <input id="secondlastname" name="secondlastname" type="text" class="form-control" placeholder="Segundo apellido" required="" value="<?php echo $currentPerson->getPersonSecondlastname() ?>"  />
                        </div>
                        <!--EMAIL-->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" value="<?php echo $currentPerson->getPersonEmail() ?>">
                        </div>
                        <!--GENDER-->
                        <div class="form-group">
                            <label>Género</label>
                            <?php
                            if ($currentPerson->getPersonGender() == 1) {
                                ?>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" name="optionsRadios1" value="1" checked>
                                        Hombre
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" name="optionsRadios2" value="2">
                                        Mujer
                                    </label>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" name="optionsRadios1" value="1" >
                                        Hombre
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" name="optionsRadios2" value="2" checked>
                                        Mujer
                                    </label>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <!--NATIONALITY-->
                        <div class="form-group">
                            <label>Nacionalidad</label>
                            <input id="nationality" name="nationality" type="text" class="form-control" placeholder="Nacionalidad" required="" value="<?php echo $currentPerson->getPersonNacionality() ?>" />
                        </div>
                    </form>
                    <button onclick="valueInputs();" style="width: 49%" class="btn btn-primary">Actualizar</button>
                    <button onclick="backPage();" style="width: 49%" class="btn btn-primary">Atrás</button>
                </div>
            </div>
        </div>
    </div> 
</section>

<?php
include_once './reusable/Footer.php';
?>

<script type="text/javascript">
    $("#id").hide();
    $("#dniTemp").hide();
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

    $(function () {

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });

    function valueInputs() {
        var dni = $('#dni').val();
        var dniTemp = $('#dniTemp').val();
        var email = $('#email').val();
        var name = $('#name').val();
        var firstlastname = $('#firstlastname').val();
        var secondlastname = $('#secondlastname').val();
        var nationality = $('#nationality').val();

        if (!isInteger(dni)) {
            alertify.error("Formato de cédula incorrecto");
            return false;
        }

        if (dni.length < 9) {
            alertify.error("Formato de cédula incorrecto");
            return false;
        }

        if (name.length === 0) {
            alertify.error("Verifique el nombre");
            return false;
        }

        if (email.length === 0) {
            alertify.error("Verifique el correo");
            return false;
        }

        if (firstlastname.length === 0) {
            alertify.error("Verifique el primer apellido");
            return false;
        }

        if (secondlastname.length === 0) {
            alertify.error("Verifique el segundo apellido");
            return false;
        }

        if (nationality.length === 0) {
            alertify.error("Verifique la nacionalidad");
            return false;
        }

        if (dni === dniTemp) {
            $("#formUpdateProfesorProfile").submit();
        } else {
            confirmDni(dni);
        }

    }

    function isInteger(number) {
        if (number % 1 === 0) {
            return true;
        } else {
            return false;
        }
    }


    function confirmDni(dni) {
        $.ajax({
            type: 'GET',
            url: "../business/ConfirmDni.php",
            data: {"dni": dni},
            success: function (data)
            {
                if (data == true) {
                    $("#form").submit();
                } else {
                    alertify.error("Ya existe un administrador con ese número de cédula");
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function backPage() {
        window.location = "ShowProfile.php";
    }
</script>
