<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="CreateCourse.php"><i class="fa fa-arrow-circle-right"></i>Crear Módulo</a></li>
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
                    <h3 class="box-title">Crear Módulo</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="formCourse" action="../business/CreateCourseAction.php" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <!--CODE-->
                        <div class="form-group">
                            <label>Código</label>
                            <input id="code" name="code" type="number" class="form-control" placeholder="Código" required=""/>
                        </div>
                        <!--NAME-->
                        <div class="form-group">
                            <label>Nombre</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre" required=""/>
                        </div>
                        <!--CREDITS-->
                        <div class="form-group">
                            <label>Creditos</label>
                            <input id="credits" name="credits" type="number" class="form-control" placeholder="Creditos" required=""/>
                        </div>
                        <!--LESSONS-->
                        <div class="form-group">
                            <label>Lecciones</label>
                            <input id="lessons" name="lessons" type="number" class="form-control" placeholder="Lecciones" required=""/>
                        </div>
                        <!--PERIODS-->
                        <div class="form-group">
                            <table id="period">
                                <tr id="tr0">
                                    <td>
                                        <input id="periods" name="periods" type="text">
                                        <div class="form-group">
                                            <label>Período</label>
                                            <select id="period0" name="period0" class="form-control">
                                            </select>
                                        </div><!-- /.form group -->
                                    </td>
                                </tr>
                            </table>
                            <div class="btn-group-vertical">
                                <button id="AddPeriod" onclick="addPeriod();" type="button" class="btn btn-success">Agregar período</button>
                            </div>
                        </div>
                        <!--SPECIALITIES-->
                        <div class="form-group">
                            <label>Atinencia/Especialidad</label>
                            <select id="speciality" name="speciality" class="form-control">
                            </select>
                        </div>
                        <!--TYPE-->
                        <div class="form-group">
                            <label>Tipo de curso</label>
                            <select id="typeCourse" name="typeCourse" class="form-control">
                            </select>
                        </div>
                        <!--PDF-->
                        <div class="form-group">
                            <label for="exampleInputFile">Cronograma</label>
                            <input id="schedule" name="schedule" type="file" accept=".pdf">
                            <p class="help-block">Subir archivo con extensión .pdf</p>
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

    $(function () {
        speciality();
        period(0);
        typeCourse();

    });

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

    function valueInputs() {
        var code = $('#code').val();
        var name = $('#name').val();
        var credits = $('#credits').val();
        var lesson = $('#lessons').val();

        if (!isInteger(code)) {
            alertify.error("Formato de código incorrecto");
            return false;
        }

        if (name.length === 0) {
            alertify.error("Verifique el nombre del curso");
            return false;
        }

        if (!isInteger(credits)) {
            alertify.error("Número de créditos no valido.");
            return false;
        }

        if (!isInteger(lesson)) {
            alertify.error("Número de lecciones no valido.");
            return false;
        }

        confirmCode(code);
    }

    function isInteger(number) {
        if (number % 1 === 0) {
            return true;
        } else {
            return false;
        }
    }

    $('#periods').hide();
    var idPeriod = 1;
    function addPeriod() {
        var startTr = '<tr id=' + '"tr' + idPeriod + '">';
        var startTd1 = '<td>';
        var startDiv1 = '<div class=' + '"form-group"' + '>';
        var label = '<label>Período</label>';
        var select = '<select id="period' + idPeriod + '" name="period' + idPeriod + '" class="form-control" />';
        var endDiv1 = '</div>';
        var endTd1 = '</td>';
        var startTd2 = '<td>';
        var startDiv4 = "<div class=" + '"btn-group-vertical"' + 'style="margin-top: 9px; margin-left: 15px;">';
        var button = '<button id="' + 'deletePeriod' + idPeriod + '" type=' + '"button"' + ' onclick=' + '"deletePeriod(' + idPeriod + ');" class=' + '"btn btn-danger">Eliminar</button>';
        var endDiv4 = '</div>';
        var endTd2 = '</td>';
        var endTr = '</tr>';

        var scripHtml = startTr + startTd1 + startDiv1 + label + select + endDiv1 + endTd1 + startTd2 + startDiv4 + button + endDiv4 + endTd2 + endTr;

        $('#period tr:last').after(scripHtml);

        period(idPeriod);
        idPeriod++;
    }

    function deletePeriod(id) {
        $("#tr" + id).remove();
    }

    function period(id) {
        $.ajax({
            type: 'GET',
            url: "../business/GetPeriods.php",
            success: function (data)
            {
                var speciality = JSON.parse(data);
                var htmlCombo = '';
                $.each(speciality, function (i, item) {
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.period + '</OPTION>';
                });
                $("#period" + id).html(htmlCombo);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function speciality() {
        $.ajax({
            type: 'GET',
            url: "../business/GetSpecialities.php",
            success: function (data)
            {
                var speciality = JSON.parse(data);
                var htmlCombo = '';
                var bool = 0;
                $.each(speciality, function (i, item) {
                    bool = 1;
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.name + '</OPTION>';
                });
                $("#speciality").html(htmlCombo);

                if (bool === 0) {
                    /*
                     * @title {String or DOMElement} The dialog title.
                     * @message {String or DOMElement} The dialog contents.
                     * @onok {Function} Invoked when the user clicks OK button.
                     * @oncancel {Function} Invoked when the user clicks Cancel button or closes the dialog.
                     *
                     * alertify.confirm(title, message, onok, oncancel);
                     *
                     */
                    alertify.confirm('Confirmar', 'Tiene que existir al menos una atinencia o especialidad', function () {
                        window.location = "CreateSpeciality.php";
                    }
                    , function () {
                        window.location = "CreateSpeciality.php";
                    });
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function typeCourse() {
        $.ajax({
            type: 'GET',
            url: "../business/GetTypeCourse.php",
            success: function (data)
            {
                var type = JSON.parse(data);
                var htmlCombo = '';
                $.each(type, function (i, item) {
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.type + '</OPTION>';
                });
                $("#typeCourse").html(htmlCombo);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function confirmCode(code) {
        $.ajax({
            type: 'GET',
            url: "../business/ConfirmCode.php",
            data: {"code": code},
            success: function (data)
            {
                if (data == true) {
                    $('#periods').val(idPeriod);
                    $("#formCourse").submit();
                } else {
                    alertify.error("Ya existe un módulo con ese número de código");
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

</script>
