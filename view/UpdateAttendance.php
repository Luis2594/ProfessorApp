<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';

$course = (int) $_GET['course'];
$professor = (int) $_GET['professor'];
$year = (int) $_GET['year'];
$period = (int) $_GET['period'];
$group = (int) $_GET['group'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Módulos</a></li>
        <li><a href="ShowAssistance.php"><i class="fa fa-arrow-circle-right"></i> Ver Asistencia</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Asistencia</a></li>
    </ol>
</section>
<br>

<?php
if (isset($course) && is_int($course) &&
        isset($professor) && is_int($professor) &&
        isset($year) && is_int($year) &&
        isset($period) && is_int($period) &&
        isset($group) && is_int($group)) {
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!--SHOW MODULES RELATED TO PROFESSOR-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <?php
                        include_once '../business/CourseBusiness.php';

                        $business = new CourseBusiness();

                        $courses = $business->getCourseId($course);
                        foreach ($courses as $item) {
                            ?>
                            <h3 class="box-title">
                                <b>
                                    <?php
                                    echo $item->getCourseName();
                                    ?>
                                </b>
                            </h3>
                            <?php
                            break;
                        }
                        ?>
                        <a type="button" class="btn btn-primary pull-right" id="btnInforme" onclick="updateAttendance();">Actualizar Asistencia</a>
                        <br>
                        <br>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Fecha de asistencia</label>
                                <input id="date" type="date" onchange="handler(event);" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="box-body">
                            <table id="studentsList" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cédula</th>
                                        <th>Teléfono</th>
                                        <th>Presente</th>
                                        <th>Ausente</th>
                                        <th>Justificación</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody"/>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cédula</th>
                                        <th>Teléfono</th>
                                        <th>Presente</th>
                                        <th>Ausente</th>
                                        <th>Justificación</th>
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
    var typeMessage = $.get("typeMessage");
    var msg = $.get("msg");
    if (typeMessage === "1") {
        msg = msg.replace(/_/g, " ");
        alertify.success(msg);
    }
    if (typeMessage === "0") {
        msg = msg.replace(/_/g, " ");
        alertify.error(msg);
    }

    function handler(e) {
        loadAttendance();
    }

    function loadAttendance() {
        $.ajax({
            type: 'POST',
            url: "../business/GetAttendanceByDate.php",
            data: {"professor": <?php echo $_SESSION['id']; ?>,
                "course": <?php echo $course; ?>,
                "group": <?php echo $group; ?>,
                "period": <?php echo $period; ?>,
                "date": $('#date').val()},
            success: function (response)
            {
                var attendance = JSON.parse(response);
                var htmlCourse = '';

                $.each(attendance, function (i, item) {
                    htmlCourse += "<tr>";
                    htmlCourse += "<td><label>" + item.fullName + "</label>";
                    htmlCourse += "<input type='hidden' name='id' id='id' value='" + item.id + "'/></td>";
                    htmlCourse += "<td>" + item.persondni + "</td>";
                    htmlCourse += "<td>" + item.phoneNumber + "</td>";

                    if (item.isPresent == 1) {
                        htmlCourse += "<td><input checked type='checkbox' name='present' style='width: 20px; height: 20px; text-align: center' /></td>";
                        htmlCourse += "<td><input type='checkbox' name='absence' style='width: 20px; height: 20px; text-align: center' /></td>";
                    } else {
                        htmlCourse += "<td><input type='checkbox' name='present' style='width: 20px; height: 20px; text-align: center' /></td>";
                        htmlCourse += "<td><input checked type='checkbox' name='absence' style='width: 20px; height: 20px; text-align: center' /></td>";
                    }

                    htmlCourse += "<td> <textarea>" + item.justification + "</textarea></td>";
                    htmlCourse += "</tr>";
                });
                $("#tbody").html(htmlCourse);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        }
        );
    }

    var data = [];
    function createInfo() {
        var isCorrect = true;
        var infoAttendance;
        $('#tbody tr').each(function (index, element) {
            var id = $(element).find("td").eq(0).find("input").val();
            var name = $(element).find("td").eq(0).find("label").html();
            var present = $(element).find("td").eq(3).find("input");
            var absence = $(element).find("td").eq(4).find("input");
            var justification = $(element).find("td").eq(5).find("textarea").val();
            if ((present.is(':checked') && absence.is(':checked')) ||
                    (!present.is(':checked') &&
                            !absence.is(':checked'))) {
                isCorrect = false;
                if (name === "No se encuentran registros") {
                    alertify.error(name);
                } else {
                    alertify.error("Seleccione si el estudiante " + name + " esta ausente o presente");
                }

            } else {
                infoAttendance = new Object();
                infoAttendance.id = id;
                if (present.is(':checked')) {
                    infoAttendance.isPresent = 1;
                }

                if (absence.is(':checked')) {
                    infoAttendance.isPresent = 0;
                }

                infoAttendance.justification = justification;
                data.push(infoAttendance);
            }
        });
        return isCorrect;
    }

    function updateAttendance() {
        if (createInfo()) {
            $.ajax({
                type: 'POST',
                url: "../actions/UpdateAttendanceAction.php",
                data: {"data": JSON.stringify(data)},
                success: function (response)
                {
                    if (response == true) {
                        $("#tbody").html("");
                        data = [];
                        loadAttendance();
                        alertify.success("Asistencia actualizada correctamente.");
                    } else {
                        alertify.error("No hay ninguna asistencia para actualizar");
                    }
                },
                error: function ()
                {
                    alertify.error("Error ...");
                }
            });
            data = [];
        } else {
            data = [];
        }
    }

    function clearTable() {
        $('#tbody tr').each(function (index, element) {
            $(element).find("td").eq(3).find("input").prop("checked", "");
            $(element).find("td").eq(4).find("input").prop("checked", "");
            $(element).find("td").eq(5).find("textarea").val("");
        });
    }
</script>

