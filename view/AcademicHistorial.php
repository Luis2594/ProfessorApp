<?php
include './reusable/Session.php';
include './reusable/Header.php';
$id = (int) $_GET['id'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowStudents.php"><i class="fa fa-arrow-circle-right"></i>Ver estudiante</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Historial Académico</a></li>
    </ol>
</section>
<br>

<?php
if (isset($id) && is_int($id)) {
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!--SELECT FILTER-->
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
                            <h3 class="box-title">Historial académico de: <?php
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
                                <label>Filtrar historial académico</label>
                                <select id="academicHistorial" name="academicHistorial" class="form-control">
                                    <option value="3">Todo el historial</option>
                                    <option value="2">Módulos matriculados</option>
                                    <option value="1">Módulos aprovados</option>
                                    <option value="0">Módulos reprovados</option>
                                </select>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->

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
                    <div class="box-body">
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
        loadAcademicHistorial(3);
    });

    //Cargar el historial academico del estudiante
    function loadAcademicHistorial(option) {
        $.ajax({
            type: 'POST',
            url: "../business/GetEnrollment.php",
            data: {"id": id, "option": option}, // 0 reprobate, 1 approved, 2 enrollment , 3  academic historial
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

//------------------------------------------------------------------------------
    //Logica del select de historial académico
    $('#academicHistorial').on('change', function () {
        loadAcademicHistorial($(this).val());
    }
    );

</script>

