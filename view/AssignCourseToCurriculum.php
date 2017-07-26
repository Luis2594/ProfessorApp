<?php
include './reusable/Session.php';
include './reusable/Header.php';
$id = (int) $_GET['id'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowCurriculum.php?assign=assign"><i class="fa fa-arrow-circle-right"></i>Asignar módulos a malla</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Asignar módulos</a></li>
    </ol>
</section>
<br>

<?php
if (isset($id) && is_int($id)) {
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!--SHOW PERIOD AND GROUP-->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3>Selccionar período</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Período</label>
                                <select id="period" name="period" class="form-control">
                                </select>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->

            <!--SHOW MODULES FOR ASSIGN TO PROFESSOR-->
            <div class="col-xs-12" id="showModules">
                <div class="box">
                    <div class="box-header">
                        <?php
                        include '../business/CurriculumBusiness.php';

                        $curriculumBusiness = new CurriculumBusiness();

                        $curriculums = $curriculumBusiness->getCurriculumId($id);

                        foreach ($curriculums as $curriculum) {
                            ?>
                            <h3 id="h3Info" class="box-title">Asignar módulos a la malla: 
                                <?php echo $curriculum->getCurriculumName();
                            }
                            ?> </h3>
                    </div>
                    <div class="box-body">
                        <div class="box-footer" style="text-align: center">
                            <button onclick="Assign(<?php echo $id; ?>);" class="btn btn-primary">Asignar módulo(s)</button>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Seleccionar</th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Creditos</th>
                                    <th>Lecciones</th>
                                    <th>Tipo</th>
                                    <th>Atinencia/Especialidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $courses = $curriculumBusiness->getAllCourses();

                                foreach ($courses as $course) {
                                    ?>
                                    <tr>
                                        <td>
                                            <input value="<?php echo $course->getCourseId() ?>" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                                        </td>
                                        <td><?php echo $course->getCourseCode(); ?></td>
                                        <td><a href="InformationCourse.php?id=<?php echo $course->getCourseId() ?>"><?php echo $course->getCourseName(); ?></a></td>
                                        <td><?php echo $course->getCourseCredits(); ?></td>
                                        <td><?php echo $course->getCourseLesson(); ?></td>
                                        <td><?php echo $course->getCourseType(); ?></td>
                                        <td><?php echo $course->getSpecialityname(); ?></td>
                                    </tr>
                                    <?php
                                }
                                ?> 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Seleccionar</th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Creditos</th>
                                    <th>Lecciones</th>
                                    <th>Tipo</th>
                                    <th>Atinencia/Especialidad</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div><!-- /.col -->

            <!--SHOW MODULES TO CURRICULUM-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <?php
                        foreach ($curriculums as $curriculum) {
                            ?>
                            <h3 id="h3Info" class="box-title">Módulos asignados a la malla: 
                                <?php echo $curriculum->getCurriculumName();
                            }
                            ?> </h3>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Creditos</th>
                                    <th>Lecciones</th>
                                    <th>Tipo</th>
                                    <th>Período</th>
                                    <th>Atinencia/Especialidad</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Creditos</th>
                                    <th>Lecciones</th>
                                    <th>Tipo</th>
                                    <th>Período</th>
                                    <th>Atinencia/Especialidad</th>
                                    <th>Eliminar</th>
                                </tr>
                            </tfoot>
                        </table>
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
    var id = $.get("id");

    $(function () {
        $("#example1").dataTable();
        hideDiv();
        coursesToCurriculum();
        period();
    });

    function hideDiv() {
        $("#showModules").hide();
    }

    $('#period').on('change', function () {
        clearCheck();
        if ($(this).val() !== "0") {
            $("#showModules").show();
        } else {
            $("#showModules").hide();
        }
    }
    );

    function clearCheck() {
        $("input[name=check]").each(function (index) {
            if ($(this).is(':checked')) {
                $(this).prop("checked", "");
            }
        });
    }

    function Assign(id) {
        var bool = false;
        var modules = "";

        $("input[name=check]").each(function (index) {
            if ($(this).is(':checked')) {
                bool = true;
                modules += $(this).val() + ",";
            }
        });

        if (bool) {
            modules = modules.substr(0, modules.length - 1);

            clearCheck();
            assignCourseToCurriculum(modules);
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

    function assignCourseToCurriculum(modules) {
        var parameters = {
            "id": id,
            "period": $("#period").val(),
            "modules": modules
        };

        $.ajax({
            type: 'POST',
            url: "../business/AssignCoursesToCurriculum.php",
            data: parameters,
            success: function (data)
            {
                if (data == true) {
                    coursesToCurriculum();
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

    var temHtmlPerido;
    function period() {
        $.ajax({
            type: 'GET',
            url: "../business/GetPeriods.php",
            success: function (data)
            {
                var speciality = JSON.parse(data);
                var htmlCombo = '<OPTION VALUE="0">Seleccionar período</OPTION>';
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

    function coursesToCurriculum() {
        $.ajax({
            type: 'POST',
            url: "../business/GetCoursesCurriculum.php",
            data: {"id": id},
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
                    htmlCourse += "<td>" + item.coursetype + "</td>";
                    htmlCourse += "<td>" + item.period + "</td>";
                    htmlCourse += "<td>" + item.specialityname + "</td>";
                    htmlCourse += '<td><a href="javascript:deleteCourseToCurrciulum(' + item.curriculumcourseid + ')">Eliminar</a></td>';
                });
                $("#tbody").html(htmlCourse);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function deleteCourseToCurrciulum(id) {

        alertify.confirm('Eliminar módulo de malla curricular', '¿Desea eliminar módulo de la malla curricular?', function () {
            $.ajax({
                type: 'POST',
                url: "../business/DeleteCourseToCurriculum.php",
                data: {"id": id},
                success: function (data)
                {
                    if (data == true) {
                        alertify.success("Módulo eliminado de la malla curricular");
                        coursesToCurriculum();
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

</script>

