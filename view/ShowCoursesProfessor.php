<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Módulos</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Ver módulos</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">

            <!--SHOW MODULES TO PROFESSOR-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row col-md-12">
                            <div class="pull-left col-md-6">
                                <?php
                                include_once '../business/ProfessorBusiness.php';
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
                            <div class="col-md-6 pull-right">
                                <div class="col-md-4">
                                    <select class="btn btn-primary" style="width: 100%" id="filterPeriod">
                                        <option value="0">Periodo</option>
                                        <option value="1">I</option>
                                        <option value="2">II</option>
                                        <option value="3">III</option>
                                        <option value="4">IV</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="btn btn-primary" style="width: 100%" id="filterYear">
                                        <option value="0">Año</option>
                                        <?php
                                        include_once '../business/FiltersBusiness.php';
                                        $filtersBusiness = new FiltersBusiness();
                                        $years = $filtersBusiness->getCoursesYearsByProfessor($_SESSION['id']);

                                        foreach ($years as $tmpYear) {
                                            ?>
                                            <option value="<?php echo $tmpYear; ?>" ><?php echo $tmpYear; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button onclick="getCoursesByFilters();" class="btn btn-primary" style="width: 100%" id="search">Filtrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Créditos</th>
                                    <th>Lecciones</th>
                                    <th>Tipo</th>
                                    <th>Grupo</th>
                                    <th>Periodo</th>
                                    <th>Año</th>
                                    <th>Atinencia <br/> Especialidad</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Créditos</th>
                                    <th>Lecciones</th>
                                    <th>Tipo</th>
                                    <th>Grupo</th>
                                    <th>Periodo</th>
                                    <th>Año</th>
                                    <th>Atinencia <br/> Especialidad</th>
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
include_once './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">
    $(document).ready(function () {
        coursesToProfessor();
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

    var id = <?php echo $_SESSION['id']; ?>;

    function coursesToProfessor() {
        $.ajax({
            type: 'POST',
            url: "../business/GetCoursesProfessor.php",
            data: {"id": id},
            success: function (data)
            {
                var courses = JSON.parse(data);
                var htmlCourse = '';

                if (!(courses === undefined || courses.length === 0)) {
                    $.each(courses, function (i, item) {
                        htmlCourse += "<tr>";
                        htmlCourse += "<td>" + item.coursecode + "</td>";
                        htmlCourse += '<td><a href="InformationCourse.php?id=' + item.courseid + '">' + item.coursename + '</a></td>';
                        htmlCourse += "<td>" + item.coursecredits + "</td>";
                        htmlCourse += "<td>" + item.courselesson + "</td>";
                        htmlCourse += "<td>" + item.coursetype + "</td>";
                        htmlCourse += "<td>" + item.groupnumber + "</td>";
                        htmlCourse += "<td>" + item.period + "</td>";
                        htmlCourse += "<td>" + item.professorcourseyear + "</td>";
                        htmlCourse += "<td>" + item.specialityname + "</td>";
                        htmlCourse += "</tr>";
                    });
                } else {
                    htmlCourse += "<tr>";
                    htmlCourse = 'No se encontraron registros para el periodo actual.';
                    htmlCourse += "</tr>";
                }
                $("#tbody").html(htmlCourse);
                $('#example').DataTable();
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function getCoursesByFilters() {
        if ($("#filterYear").val() != 0 && $("#filterPeriod").val() != 0) {
            $.ajax({
                type: 'POST',
                url: "../business/GetCoursesProfessorByFilters.php",
                data: {"id": id, "period": $("#filterPeriod").val(), "year": $("#filterYear").val()},
                success: function (data)
                {
                    var courses = JSON.parse(data);
                    var htmlCourse = '';
                    if (!(courses === undefined || courses.length === 0)) {
                        $.each(courses, function (i, item) {
                            htmlCourse += "<tr>";
                            htmlCourse += "<td>" + item.coursecode + "</td>";
                            htmlCourse += '<td><a href="InformationCourse.php?id=' + item.courseid + '">' + item.coursename + '</a></td>';
                            htmlCourse += "<td>" + item.coursecredits + "</td>";
                            htmlCourse += "<td>" + item.courselesson + "</td>";
                            htmlCourse += "<td>" + item.coursetype + "</td>";
                            htmlCourse += "<td>" + item.groupnumber + "</td>";
                            htmlCourse += "<td>" + item.period + "</td>";
                            htmlCourse += "<td>" + item.professorcourseyear + "</td>";
                            htmlCourse += "<td>" + item.specialityname + "</td>";
                            htmlCourse += "</tr>";
                        });
                    } else {
                        htmlCourse += "<tr>";
                        htmlCourse = 'No se encontraron registros.';
                        htmlCourse += "</tr>";
                    }
                    $("#tbody").html(htmlCourse);
                    $('#example').DataTable();
                },
                error: function ()
                {
                    alertify.error("Error ...");
                }
            });
        } else {
            alertify.error("Seleccione los filtros...");
        }
    }
</script>

