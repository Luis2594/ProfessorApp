<?php
include './reusable/Session.php';
include './reusable/Header.php';
$id = (int) $_GET['id'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Ver módulos</a></li>
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
                        include '../business/ProfessorBusiness.php';

                        $professorBusiness = new ProfessorBusiness();

                        $professors = $professorBusiness->getProfessor($_SESSION['id']);
                        foreach ($professors as $professor) {
                            ?>
                            <h3 class="box-title">Módulos asignados a: 
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
                        <table id="coursesList" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Grupo</th>
                                    <th>Periodo</th>
                                    <th>Año</th>
                                    <th>Estudiantes</th>
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
                                    <th>Estudiantes</th>
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
    var id = <?php echo $_SESSION['id']; ?>;

    $(function () {
        $("#coursesList").dataTable();
    });
    
    $(function () {
        coursesToProfessor();
    });

    function coursesToProfessor() {
        $.ajax({
            type: 'POST',
            url: "../business/GetCoursesProfessor.php",
            data: {"id": id},
            success: function (data)
            {
                var courses = JSON.parse(data);
                var htmlToInsert = '';

                $.each(courses, function (i, item) {
                    htmlToInsert += "<tr>";
                    htmlToInsert += "<td>" + item.coursecode + "</td>";
                    htmlToInsert += '<td><a href="InformationCourse.php?id=' + item.courseid + '">' + item.coursename + '</a></td>';
                    htmlToInsert += "<td>" + item.groupnumber + "</td>";
                    htmlToInsert += "<td>" + item.period + "</td>";
                    htmlToInsert += "<td>" + item.professorcourseyear + "</td>";
                    htmlToInsert += '<td><a href="ShowStudentsByCourse.php?course=' + item.courseid + '">Estudiantes</a></td>';
                    htmlToInsert += "</tr>";
                });
                $("#tbody").html(htmlToInsert);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }


</script>

