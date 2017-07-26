<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="CreateProfessor.php"><i class="fa fa-arrow-circle-right"></i>Crear Profesor</a></li>
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
                    <h3 class="box-title">Crear Profesor</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="formProfessor" action="../business/CreateProfessorAction.php" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <!--DNI-->
                        <div class="form-group">
                            <label>Cédula</label>
                            <input id="dni" name="dni" type="number" class="form-control" placeholder="Cédula" required=""/>
                        </div>
                        <!--NAME-->
                        <div class="form-group">
                            <label>Nombre</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre" required=""/>
                        </div>
                        <!--FIRSTLASTNAME-->
                        <div class="form-group">
                            <label>Primer Apellido</label>
                            <input id="firstlastname" name="firstlastname" type="text" class="form-control" placeholder="Primer apellido" required=""/>
                        </div>
                        <!--SECONDLASTNAME-->
                        <div class="form-group">
                            <label>Segundo Apellido</label>
                            <input id="secondlastname" name="secondlastname" type="text" class="form-control" placeholder="Segundo apellido" required=""/>
                        </div>
                        <!--EMAIL-->
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico">
                        </div>
                        <!--GENDER-->
                        <div class="form-group">
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
                        </div>
                        <!--NATIONALITY-->
                        <div class="form-group">
                            <label>Nacionalidad</label>
                            <input id="nationality" name="nationality" type="text" class="form-control" placeholder="Nacionalidad" required=""/>
                        </div>

                        <!--PHONES-->
                        <table id="phone">
                            <tr id="tr0">
                                <td>
                                    <input id="phones" name="phones" type="text">
                                    <!--<input id="phone0" name="phone0" type="text">-->
                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input id="phone0" name="phone0" type="number" class="form-control"  required="" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                </td>
                            </tr>
                        </table>
                        <!--<input id="AddPhone" type="button" onclick="addPhone();" value="Agregar teléfono">-->
                        <div class="btn-group-vertical">
                            <button id="AddPhone" onclick="addPhone();" type="button" class="btn btn-success">Agregar teléfono</button>
                        </div>
                    </div><!-- /.box-body -->
                </form>
                <div class="box-footer">
                    <button onclick="valueInputs();" class="btn btn-primary">Crear</button>
                </div>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include './reusable/Footer.php';
?>

<script type="text/javascript">
    var idPhone = 1;

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

        confirmDni(dni);

    }

    function isInteger(number) {
        if (number % 1 === 0) {
            return true;
        } else {
            return false;
        }
    }

    function exitsDate(dateInput) {
        var dateTemp = dateInput.split("/");
        var day = dateTemp[0];
        var month = dateTemp[1];
        var year = dateTemp[2];
        var date = new Date(year, month, '0');
        if ((day - 0) > (date.getDate() - 0)) {
            return false;
        }
        return true;
    }

    $('#phones').hide();
    function addPhone() {
        var startTr = '<tr id=' + '"tr' + idPhone + '">';
        var startTd1 = '<td>';
        var startDiv1 = '<div class=' + '"form-group"' + '>';
        var label = '<label>Teléfono</label>';
        var startDiv2 = '<div class="' + 'input-group"' + '>';
        var startDiv3 = '<div class="' + 'input-group-addon"' + '>';
        var i = '<i class="' + 'fa fa-phone" ></i>';
        var endDiv3 = '</div>';
        var input = '<input id="phone' + idPhone + '" name="phone' + idPhone + '" type="number" class="form-control" required=' + '"" />';
        var endDiv2 = '</div>';
        var endDiv1 = '</div>';
        var endTd1 = '</td>';
        var startTd2 = '<td>';
        var startDiv4 = "<div class=" + '"btn-group-vertical"' + 'style="margin-top: 9px; margin-left: 15px;">';
        var button = '<button id="' + 'deletePhone' + idPhone + '" type=' + '"button"' + ' onclick=' + '"deletePhone(' + idPhone + ');" class=' + '"btn btn-danger">Eliminar</button>';
        var endDiv4 = '</div>';
        var endTd2 = '</td>';
        var endTr = '</tr>';

        var scripHtml = startTr + startTd1 + startDiv1 + label + startDiv2 + startDiv3 + i + endDiv3 + input + endDiv2 + endDiv1 + endTd1 + startTd2 + startDiv4 + button + endDiv4 + endTd2 + endTr;

        $('#phone tr:last').after(scripHtml);

        idPhone++;
    }

    function deletePhone(id) {
        $("#tr" + id).remove();
    }

    function confirmDni(dni) {
        $.ajax({
            type: 'GET',
            url: "../business/ConfirmDni.php",
            data: {"dni": dni},
            success: function (data)
            {
                if (data == true) {
                    $('#phones').val(idPhone);
                    $("#formProfessor").submit();
                } else {
                    alertify.error("Ya existe un profesor con ese número de cédula");
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

</script>
