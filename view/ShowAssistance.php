<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';
$id = (int) $_GET['id'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Módulos</a></li>
        <li><a href="ShowAssistance.php"><i class="fa fa-arrow-circle-right"></i> Ver Asistencia</a></li>
    </ol>
</section>
<br>

<?php
if (isset($id) && is_int($id)) {
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!--SHOW MODULES TO PROFESSOR-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <?php
                        include_once '../business/ProfessorBusiness.php';

                        $professorBusiness = new ProfessorBusiness();

                        $professors = $professorBusiness->getProfessor($_SESSION['id']);
                        foreach ($professors as $professor) {
                            ?>
                            <h3 class="box-title">Asistencia módulos asignados a: 
                                <b>
                                    <?php
                                    echo $professor->getPersonFirstName()
                                    . " " . $professor->getPersonFirstlastname()
                                    . " " . $professor->getPersonSecondlastname();
                                    ?> 
                                </b>
                            </h3>
                        <?php } ?>
                    </div>
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Grupo</th>
                                    <th>Periodo</th>
                                    <th>Año</th>
                                    <th>Asistencia</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Grupo</th>
                                    <th>Periodo</th>
                                    <th>Año</th>
                                    <th>Asistencia</th>
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
include_once './reusable/Footer.php';
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

    var id = <?php echo $_SESSION['id']; ?>;

    function coursesToProfessor() {
        $.ajax({
            type: 'POST',
            url: "../business/GetCoursesProfessor.php",
            data: {"id": id},
            success: function (data)
            {
                var courses = JSON.parse(data);
                var htmlToInsert = '';

                if (!(courses === undefined || courses.length === 0)) {
                    $.each(courses, function (i, item) {
                        htmlToInsert += "<tr>";
                        htmlToInsert += "<td>" + item.coursecode + "</td>";
                        htmlToInsert += '<td><a href="InformationCourse.php?id=' + item.courseid + '">' + item.coursename + '</a></td>';
                        htmlToInsert += "<td>" + item.groupnumber + "</td>";
                        htmlToInsert += "<td>" + item.period + "</td>";
                        htmlToInsert += "<td>" + item.professorcourseyear + "</td>";
                        htmlToInsert += '<td><a href="ShowStudentsByCourseAssistance.php?' +
                                'course=' + item.courseid + '&' +
                                'professor=' + id + '&' +
                                'year=' + item.professorcourseyear + '&' +
                                'period=' + item.periodid + '&' +
                                'group=' + item.groupid +
                                '">Estudiantes</a></td>';
                        htmlToInsert += "</tr>";
                    });

                    $("#tbody").html(htmlToInsert);
                    $('#example').DataTable();
                } else {
                    htmlToInsert += "<tr>";
                    htmlCourse = 'No se encontraron registros para el periodo actual.';
                    htmlToInsert += "</tr>";
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    $(document).ready(function () {
        coursesToProfessor();
    });
</script>

