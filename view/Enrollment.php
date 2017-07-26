<?php
include './reusable/Session.php';
include './reusable/Header.php';
$id = (int) $_GET['id'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowStudents.php?enrollment=enrollment"><i class="fa fa-arrow-circle-right"></i>Matrícular estudiante</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Matrícular</a></li>
    </ol>
</section>
<br>

<?php
if (isset($id) && is_int($id)) {
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!--SHOW GROUP AND CURRICULUM-->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <?php
                        include '../business/PersonBusiness.php';

                        $personBusiness = new PersonBusiness();

                        $persons = $personBusiness->getPersonId($id);

                        foreach ($persons as $person) {
                            ?>
                            <h3 class="box-title">Matrícula para : <?php
                                echo $person->getPersonFirstName()
                                . " " . $person->getPersonFirstlastname()
                                . " " . $person->getPersonSecondlastname();
                                ?> </h3>
                        <?php } ?>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <!--GROUP-->
                            <div class="form-group">
                                <label>Grupo</label>
                                <select id="group" name="group" class="form-control">
                                </select>
                            </div>
                            <!--CURRICULUM-->
                            <div class="form-group" id="divCurriculum">
                                <label>Malla curricular</label>
                                <select id="curriculum" name="curriculum" class="form-control">
                                </select>
                            </div>
                            <!--PERIOD-->
                            <div class="form-group" id="divFilterPeriod">
                                <label>Filtrar por período</label>
                                <select id="period" name="period" class="form-control">
                                </select>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->

            <!--SHOW MODULES OF PERIDO I-->
            <div class="col-xs-12" id="showPeriodI">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Módulos del período I</h3>
                    </div>
                    <div class="box-body">
                        <div class="box-footer" style="text-align: center">
                            <h1>PERÍODO I</h1>
                        </div>
                        <div class="table-responsive">
                            <table id="tablePeriodI" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Seleccionar</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Créditos</th>
                                        <th>Lecciones</th>
                                        <th>Tipo</th>
                                        <th>Atinencia/Especialidad</th>
                                    </tr>
                                </thead>
                                <tbody id="periodI">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Seleccionar</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Créditos</th>
                                        <th>Lecciones</th>
                                        <th>Tipo</th>
                                        <th>Atinencia/Especialidad</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.col -->

            <!--SHOW MODULES OF PERIDO II-->
            <div class="col-xs-12" id="showPeriodII">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Módulos del período II</h3>
                    </div>
                    <div class="box-body">
                        <div class="box-footer" style="text-align: center">
                            <h1>PERÍODO II</h1>
                        </div>
                        <div class="table-responsive">
                            <table id="tablePeriodII" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Seleccionar</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Créditos</th>
                                        <th>Lecciones</th>
                                        <th>Tipo</th>
                                        <th>Atinencia/Especialidad</th>
                                    </tr>
                                </thead>
                                <tbody id="periodII">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Seleccionar</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Créditos</th>
                                        <th>Lecciones</th>
                                        <th>Tipo</th>
                                        <th>Atinencia/Especialidad</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.col -->

            <!--SHOW MODULES OF PERIDO III-->
            <div class="col-xs-12" id="showPeriodIII">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Módulos del período III</h3>
                    </div>
                    <div class="box-body">
                        <div class="box-footer" style="text-align: center">
                            <h1>PERÍODO III</h1>
                        </div>
                        <div class="table-responsive">
                            <table id="tablePeriodIII" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Seleccionar</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Créditos</th>
                                        <th>Lecciones</th>
                                        <th>Tipo</th>
                                        <th>Atinencia/Especialidad</th>
                                    </tr>
                                </thead>
                                <tbody id="periodIII">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Seleccionar</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Créditos</th>
                                        <th>Lecciones</th>
                                        <th>Tipo</th>
                                        <th>Atinencia/Especialidad</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.col -->

            <!--SHOW MODULES OF PERIDO IV-->
            <div class="col-xs-12" id="showPeriodIV">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Módulos del período IV</h3>
                    </div>
                    <div class="box-body">
                        <div class="box-footer" style="text-align: center">
                            <h1>PERÍODO IV</h1>
                        </div>
                        <div class="table-responsive">
                            <table id="tablePeriodIV" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Seleccionar</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Créditos</th>
                                        <th>Lecciones</th>
                                        <th>Tipo</th>
                                        <th>Atinencia/Especialidad</th>
                                    </tr>
                                </thead>
                                <tbody id="periodIV">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Seleccionar</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Créditos</th>
                                        <th>Lecciones</th>
                                        <th>Tipo</th>
                                        <th>Atinencia/Especialidad</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.col -->


            <!--ENROLLMENT-->
            <div class="col-xs-12" id="enrollmentAction">
                <div class="box">
                    <div class="box-body">
                        <div class="box-footer" style="text-align: center">
                            <button onclick="enrollment(<?php echo $id; ?>);" class="btn btn-primary">Matrícular módulo(s)</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.col -->

            <!--SHOW ENROLLMENT TO STUDENT-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <?php
                        foreach ($persons as $person) {
                            ?>
                            <h3 class="box-title">Nueva Matrícula de : <?php
                                echo $person->getPersonFirstName()
                                . " " . $person->getPersonFirstlastname()
                                . " " . $person->getPersonSecondlastname();
                                ?> </h3>
                        <?php } ?>
                    </div>
                    <div class="box-body">
                        <div class="box-footer" style="text-align: center">
                            <button onclick="infoEnrollment(<?php echo $id; ?>);" class="btn btn-primary">Informe de matrícula</button>
                        </div>
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Créditos</th>
                                        <th>Lecciones</th>
                                        <!--<th>Tipo</th>-->
                                        <th>Grupo</th>
                                        <th>Período</th>
                                        <!--<th>Atinencia/Especialidad</th>-->
                                        <th>Fecha de matrícula</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyEnrollment">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Créditos</th>
                                        <th>Lecciones</th>
                                        <!--<th>Tipo</th>-->
                                        <th>Grupo</th>
                                        <th>Período</th>
                                        <!--<th>Atinencia/Especialidad</th>-->
                                        <th>Fecha de matrícula</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.col -->

            <!--SHOW ACADEMIC HISTORIAL-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <?php
                        foreach ($persons as $person) {
                            ?>
                            <h3 class="box-title">Historial académico de : <?php
                                echo $person->getPersonFirstName()
                                . " " . $person->getPersonFirstlastname()
                                . " " . $person->getPersonSecondlastname();
                                ?> </h3>
                        <?php } ?>
                    </div>
                    <div class="table-responsive">
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Créditos</th>
                                        <th>Lecciones</th>
                                        <!--<th>Tipo</th>-->
                                        <th>Grupo</th>
                                        <th>Período</th>
                                        <!--<th>Atinencia/Especialidad</th>-->
                                        <th>Fecha de matrícula</th>
                                        <th>Estado del módulo</th>

                                    </tr>
                                </thead>
                                <tbody id="tbodyHistorial">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Créditos</th>
                                        <th>Lecciones</th>
                                        <!--<th>Tipo</th>-->
                                        <th>Grupo</th>
                                        <th>Período</th>
                                        <!--<th>Atinencia/Especialidad</th>-->
                                        <th>Fecha de matrícula</th>
                                        <th>Estado del módulo</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </section><!-- /.content -->
    <?php
}
include './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">

    //Obtener las variables por GET que se encuentran en la URL
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

    //Obtener el id del estudiante
    var id = $.get("id");

    //Funcion anonima 
    $(function () {
        $("#divPeriod").hide();
        $("#divCurriculum").hide();
        $("#divFilterPeriod").hide();
        hideDiv();
        groups();
        curriculum();
        period();
        loadAcademicHistorial();
        coursesToEnrollment();
    });

    //Ocultar los div de los periodos y oculatar el boton de matricula
    function hideDiv() {
        $("#showPeriodI").hide();
        $("#showPeriodII").hide();
        $("#showPeriodIII").hide();
        $("#showPeriodIV").hide();
        $("#enrollmentAction").hide();
    }

    //LImpiar los checkbox para elejir la matricula
    function clearCheck() {
        $("input[name=check]").each(function (index) {
            if ($(this).is(':checked')) {
                $(this).prop("checked", "");
            }
        });
    }

    //Cargar el historial academico del estudiante
    function loadAcademicHistorial() {
        $.ajax({
            type: 'POST',
            url: "../business/GetEnrollment.php",
            data: {"id": id, "option": 3}, // 0 reprobate, 1 approved, 2 enrollment , 3  academic historial
            success: function (data)
            {
                var courses = JSON.parse(data);
                var htmlCourse = '';

                $.each(courses, function (i, item) {
                    htmlCourse += "<tr>";
                    htmlCourse += "<td>" + item.coursecode + "</td>";
                    htmlCourse += '<td><a href="InformationCourse.php?id=' + item.courseid + '">' + item.coursename + '</a></td>';
                    htmlCourse += "<td>" + item.coursecredits + "</td>";
                    htmlCourse += "<td>" + item.courselesson + "</td>";
//                    htmlCourse += "<td>" + item.coursetype + "</td>";
                    htmlCourse += "<td>" + item.groupnumber + "</td>";
                    htmlCourse += "<td>" + item.period + "</td>";
                    htmlCourse += "<td>" + item.enrollmentdate + "</td>";

                    switch (item.enrollmentstatus) {
                        case "0":
                            htmlCourse += '<td style="color: red;">Reprobado</td>';
                            break;
                        case "1":
                            htmlCourse += '<td style="color: green;">Aprovado</td>';
                            break;
                        case "2":
                            htmlCourse += '<td style="color: blue;">Matriculado</td>';
                            break;
                        default :
                            htmlCourse += "<td>Indefinido</td>";
                            break;
                    }

                    htmlCourse += "</tr>";
                });
                $("#tbodyHistorial").html(htmlCourse);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        }
        );
    }

    //Matricular los módulos seleccionados y verificar que haya al menos uno seleccionado
    function enrollment(id) {
        var bool = false;
        var coursePeriod = "";
        var modules = "";
        var periods = "";

        $("input[name=check]").each(function (index) {
            if ($(this).is(':checked')) {
                bool = true;
                coursePeriod = $(this).val().split("-");
                modules += coursePeriod[0] + ",";
                periods += coursePeriod[1] + ",";
            }
        });

        if (bool) {
            modules = modules.substr(0, modules.length - 1);
            periods = periods.substr(0, periods.length - 1);

            clearCheck();
            assignCourseToStudent(modules, periods);
        } else {
            /*
             * @title {String or DOMElement} The dialog title.
             * @message {String or DOMElement} The dialog contents.
             * @onok {Function} Invoked when the user clicks OK button.
             * @oncancel {Function} Invoked when the user clicks Cancel button or closes the dialog.
             *
             * alertify.confirm(title, message, onok, oncancel);
             *
             */
            alertify.confirm('Ups!', 'Tiene que seleccionar al menos un módulo', function () {
                alertify.success("Selecciona un módulo");
                return;
            }
            , function () {
                alertify.success("Selecciona un módulo");
                return;
            });
        }

    }

    //Matricular los módulos con AJAX
    function assignCourseToStudent(modules, periods) {
        var parameters = {
            "id": id,
            "modules": modules,
            "group": $("#group").val(),
            "periods": periods
        };

        $.ajax({
            type: 'POST',
            url: "../business/EnrollmentAction.php",
            data: parameters,
            success: function (data)
            {
                if (data == true) {
                    coursesToEnrollment();
                    loadAcademicHistorial();
                } else {
                    alertify.error("Upps! Ha ocurrido un error!");
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    //Obtener todos los grupos del estudiante
    function groups() {
        $.ajax({
            type: "POST",
            url: "../business/GetGroupsStudent.php",
            data: {"id": id},
            success: function (data)
            {
                var group = JSON.parse(data);
                var htmlCombo = '<OPTION VALUE="0">Seleccione un grupo</OPTION>';
                $.each(group, function (i, item) {
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.number + '</OPTION>';
                });
                $("#group").html(htmlCombo);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    //Obtener todas las mallas curricular que existen
    var temHtmlCurriculum;
    function curriculum() {
        $.ajax({
            type: "GET",
            url: "../business/GetCurriculum.php",
            success: function (data)
            {
                var curriculum = JSON.parse(data);
                var htmlCombo = '<OPTION VALUE="0">Seleccione una malla curricular</OPTION>';
                $.each(curriculum, function (i, item) {
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.name + '</OPTION>';
                });
                temHtmlCurriculum = htmlCombo;
                $("#curriculum").html(temHtmlCurriculum);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    //Obtener todos los periodos que existen
    var temHtmlPerido;
    function period() {
        $.ajax({
            type: 'GET',
            url: "../business/GetPeriods.php",
            success: function (data)
            {
                var speciality = JSON.parse(data);
                var htmlCombo = '<OPTION VALUE="-1">Filtrar</OPTION>';
                htmlCombo += '<OPTION VALUE="0">Todos los períodos</OPTION>';
                $.each(speciality, function (i, item) {
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.period + '</OPTION>';
                });
                temHtmlPerido = htmlCombo;
                $("#period").html(temHtmlPerido);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    //Obtener todos los módulos de la malla selecciona, ya sea mostrar todos 
    //los períodos o filtrar por período
    function coursesToCurriculum(id, idPeriod) {
        $.ajax({
            type: 'POST',
            url: "../business/GetCourseBYCurriculum.php",
            data: {"id": id},
            success: function (data)
            {
                var courses = JSON.parse(data);
                var htmlCourse = '';
                var htmlCoursePeriodI = '';
                var htmlCoursePeriodII = '';
                var htmlCoursePeriodIII = '';
                var htmlCoursePeriodIV = '';

                var periodI = false;
                var periodII = false;
                var periodIII = false;
                var periodIV = false;

                $.each(courses, function (i, item) {
                    if (idPeriod == 0) {
                        switch (item.periodid) {
                            case "1":
                                periodI = true;
                                htmlCoursePeriodI += "<tr>";
                                htmlCoursePeriodI += "<td>";
                                htmlCoursePeriodI += '<input value="' + item.courseid + '-' + item.periodid + '" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />';
                                htmlCoursePeriodI += "</td>";
                                htmlCoursePeriodI += "<td>" + item.coursecode + "</td>";
                                htmlCoursePeriodI += '<td><a href="InformationCourse.php?id=' + item.courseid + '">' + item.coursename + '</a></td>';
                                htmlCoursePeriodI += "<td>" + item.coursecredits + "</td>";
                                htmlCoursePeriodI += "<td>" + item.courselesson + "</td>";
                                htmlCoursePeriodI += "<td>" + item.coursetype + "</td>";
                                htmlCoursePeriodI += "<td>" + item.specialityname + "</td>";
                                htmlCoursePeriodI += "</tr>";
                                break;
                            case "2":
                                periodII = true;
                                htmlCoursePeriodII += "<tr>";
                                htmlCoursePeriodII += "<td>";
                                htmlCoursePeriodII += '<input value="' + item.courseid + '-' + item.periodid + '" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />';
                                htmlCoursePeriodII += "</td>";
                                htmlCoursePeriodII += "<td>" + item.coursecode + "</td>";
                                htmlCoursePeriodII += '<td><a href="InformationCourse.php?id=' + item.courseid + '">' + item.coursename + '</a></td>';
                                htmlCoursePeriodII += "<td>" + item.coursecredits + "</td>";
                                htmlCoursePeriodII += "<td>" + item.courselesson + "</td>";
                                htmlCoursePeriodII += "<td>" + item.coursetype + "</td>";
                                htmlCoursePeriodII += "<td>" + item.specialityname + "</td>";
                                htmlCoursePeriodII += "</tr>";
                                break;
                            case "3":
                                periodIII = true;
                                htmlCoursePeriodIII += "<tr>";
                                htmlCoursePeriodIII += "<td>";
                                htmlCoursePeriodIII += '<input value="' + item.courseid + '-' + item.periodid + '" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />';
                                htmlCoursePeriodIII += "</td>";
                                htmlCoursePeriodIII += "<td>" + item.coursecode + "</td>";
                                htmlCoursePeriodIII += '<td><a href="InformationCourse.php?id=' + item.courseid + '">' + item.coursename + '</a></td>';
                                htmlCoursePeriodIII += "<td>" + item.coursecredits + "</td>";
                                htmlCoursePeriodIII += "<td>" + item.courselesson + "</td>";
                                htmlCoursePeriodIII += "<td>" + item.coursetype + "</td>";
                                htmlCoursePeriodIII += "<td>" + item.specialityname + "</td>";
                                htmlCoursePeriodIII += "</tr>";
                                break;
                            case "4":
                                periodIV = true;
                                htmlCoursePeriodIV += "<tr>";
                                htmlCoursePeriodIV += "<td>";
                                htmlCoursePeriodIV += '<input value="' + item.courseid + '-' + item.periodid + '" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />';
                                htmlCoursePeriodIV += "</td>";
                                htmlCoursePeriodIV += "<td>" + item.coursecode + "</td>";
                                htmlCoursePeriodIV += '<td><a href="InformationCourse.php?id=' + item.courseid + '">' + item.coursename + '</a></td>';
                                htmlCoursePeriodIV += "<td>" + item.coursecredits + "</td>";
                                htmlCoursePeriodIV += "<td>" + item.courselesson + "</td>";
                                htmlCoursePeriodIV += "<td>" + item.coursetype + "</td>";
                                htmlCoursePeriodIV += "<td>" + item.specialityname + "</td>";
                                htmlCoursePeriodIV += "</tr>";
                                break;
                            default  :
                                htmlCoursePeriodII += "";
                                htmlCoursePeriodII += "";
                                htmlCoursePeriodIII += "";
                                htmlCoursePeriodIV += "";
                                break;
                        }
                    } else {
                        if (idPeriod == item.periodid) {

                            switch (item.periodid) {
                                case "1":
                                    periodI = true;
                                    break;
                                case "2":
                                    periodII = true;
                                    break;
                                case "3":
                                    periodIII = true;
                                    break;
                                case "4":
                                    periodIV = true;
                                    break;
                            }

                            htmlCourse += "<tr>";
                            htmlCourse += "<td>";
                            htmlCourse += '<input value="' + item.courseid + '-' + item.periodid + '" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />';
                            htmlCourse += "</td>";
                            htmlCourse += "<td>" + item.coursecode + "</td>";
                            htmlCourse += '<td><a href="InformationCourse.php?id=' + item.courseid + '">' + item.coursename + '</a></td>';
                            htmlCourse += "<td>" + item.coursecredits + "</td>";
                            htmlCourse += "<td>" + item.courselesson + "</td>";
                            htmlCourse += "<td>" + item.coursetype + "</td>";
                            htmlCourse += "<td>" + item.specialityname + "</td>";
                            htmlCourse += "</tr>";
                            //htmlCourse += '<td><a href="javascript:deleteCourseToProfessor(' + item.professorcourseid + ')">Eliminar</a></td>';
                        }
                    }
                });
                switch (idPeriod) {
                    case "0":
                        $("#periodI").html(htmlCoursePeriodI);
                        $("#periodII").html(htmlCoursePeriodII);
                        $("#periodIII").html(htmlCoursePeriodIII);
                        $("#periodIV").html(htmlCoursePeriodIV);

                        if (periodI) {
                            $("#showPeriodI").show();
                        }

                        if (periodII) {
                            $("#showPeriodII").show();
                        }

                        if (periodIII) {
                            $("#showPeriodIII").show();
                        }

                        if (periodIV) {
                            $("#showPeriodIV").show();
                        }

                        if (!periodI && !periodII && !periodIII && !periodIV) {
                            alertify.error("No hay módulos asignados en la malla curricular");
                            hideDiv();
                        }

                        break;
                    case "1":
                        $("#periodI").html(htmlCourse);
                        $("#periodII").html("");
                        $("#periodIII").html("");
                        $("#periodIV").html("");

                        if (periodI) {
                            $("#showPeriodI").show();
                            $("#showPeriodII").hide();
                            $("#showPeriodIII").hide();
                            $("#showPeriodIV").hide();
                        } else {
                            hideDiv();
                            alertify.error("No hay módulos asignados en la malla curricular para el período I");
                        }

                        break;
                    case "2":
                        $("#periodI").html("");
                        $("#periodII").html(htmlCourse);
                        $("#periodIII").html("");
                        $("#periodIV").html("");

                        if (periodII) {
                            $("#showPeriodI").hide();
                            $("#showPeriodII").show();
                            $("#showPeriodIII").hide();
                            $("#showPeriodIV").hide();
                        } else {
                            hideDiv();
                            alertify.error("No hay módulos asignados en la malla curricular para el período II");
                        }

                        break;
                    case "3":
                        $("#periodI").html("");
                        $("#periodII").html("");
                        $("#periodIII").html(htmlCourse);
                        $("#periodIV").html("");

                        if (periodIII) {
                            $("#showPeriodI").hide();
                            $("#showPeriodII").hide();
                            $("#showPeriodIII").show();
                            $("#showPeriodIV").hide();
                        } else {
                            hideDiv();
                            alertify.error("No hay módulos asignados en la malla curricular para el período III");
                        }
                        break;
                    case "4":
                        $("#periodI").html("");
                        $("#periodII").html("");
                        $("#periodIII").html("");
                        $("#periodIV").html(htmlCourse);

                        if (periodIV) {
                            $("#showPeriodI").hide();
                            $("#showPeriodII").hide();
                            $("#showPeriodIII").hide();
                            $("#showPeriodIV").show();
                        } else {
                            hideDiv();
                            alertify.error("No hay módulos asignados en la malla curricular para el período IV");
                        }
                        break;
                    default  :
                        hideDiv();
                        break;
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        }
        );
    }

    //Obtener todos los módulos que han sido matrículados
    function coursesToEnrollment() {
        $.ajax({
            type: 'POST',
            url: "../business/GetEnrollment.php",
            data: {"id": id, "option": 2}, // 0 reprobate, 1 approved, 2 enrollment , 3  academic historial
            success: function (data)
            {
                var courses = JSON.parse(data);
                var htmlCourse = '';

                $.each(courses, function (i, item) {
                    htmlCourse += "<tr>";
                    htmlCourse += "<td>" + item.coursecode + "</td>";
                    htmlCourse += '<td><a href="InformationCourse.php?id=' + item.courseid + '">' + item.coursename + '</a></td>';
                    htmlCourse += "<td>" + item.coursecredits + "</td>";
                    htmlCourse += "<td>" + item.courselesson + "</td>";
//                    htmlCourse += "<td>" + item.coursetype + "</td>";
                    htmlCourse += "<td>" + item.groupnumber + "</td>";
                    htmlCourse += "<td>" + item.period + "</td>";
                    htmlCourse += "<td>" + item.enrollmentdate + "</td>";
                    htmlCourse += '<td><a href="javascript:deleteCourseToStudent(' + item.enrollmentid + ')">Eliminar</a></td>';
                    htmlCourse += "</tr>";
                });
                $("#tbodyEnrollment").html(htmlCourse);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        }
        );
    }

    //ELiminar un módulo de la matrícula
    function deleteCourseToStudent(id) {
        alertify.confirm('Eliminar módulo para matrícula', '¿Desea eliminar el módulo de la matrícula?', function () {
            $.ajax({
                type: 'POST',
                url: "../business/DeleteCourseToEnrollment.php",
                data: {"id": id},
                success: function (data)
                {
                    if (data == true) {
                        alertify.success("Módulo eliminado de la matrícula");
                        coursesToEnrollment();
                        loadAcademicHistorial();
                    } else {
                        alertify.error("Upps! Ha ocurrido un error al eliminar el módulo!");
                    }
                },
                error: function ()
                {
                    alertify.error("Error ...");
                }
            });
        }
        , function () {
            alertify.success("Cancelado");
            return;
        });
    }

//------------------------------------------------------------------------------
    //Logica del select de grupo
    $('#group').on('change', function () {
        if ($(this).val() !== "0") {
            $("#divCurriculum").show();
            $("#curriculum").html(temHtmlCurriculum);
            $("#divFilterPeriod").hide();
            $("#period").html(temHtmlPerido);
            hideDiv();
        } else {
            clearCheck();
            $("#divCurriculum").hide();
            $("#curriculum").html(temHtmlCurriculum);
            $("#divFilterPeriod").hide();
            $("#period").html(temHtmlPerido);
            hideDiv();
        }
    }
    );

    //Logica del select de malla curricular
    $('#curriculum').on('change', function () {
        if ($(this).val() !== "0") {
            $("#divFilterPeriod").show();
            $("#period").html(temHtmlPerido);
            hideDiv();
        } else {
            clearCheck();
            $("#period").html(temHtmlPerido);
            $("#divFilterPeriod").hide();
            hideDiv();
        }
    }
    );

    //Logica del select de período
    $('#period').on('change', function () {
//        clearCheck();
        if ($(this).val() == -1) {
            hideDiv();
            return;
        }

        coursesToCurriculum($("#curriculum").val(), $(this).val());
        $("#enrollmentAction").show();
    }
    );

</script>

