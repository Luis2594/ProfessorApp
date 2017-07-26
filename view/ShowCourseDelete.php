<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowCourseDelete.php"><i class="fa fa-arrow-circle-right"></i> Eliminar módulos</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Eliminar Módulos del Cindea</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Créditos</th>
                                <th>Lecciones</th>
                                <th>Tipo</th>
                                <th>Atinencia/Especialidad</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../business/CourseBusiness.php';
                            $coursesBusiness = new CourseBusiness();

                            $courses = $coursesBusiness->getAll();

                            foreach ($courses as $course) {
                                ?>
                                <tr>
                                    <td><?php echo $course->getCourseCode(); ?></td>
                                    <td id="name<?php echo $course->getCourseId(); ?>"><?php echo $course->getCourseName(); ?></td>
                                    <td><?php echo $course->getCourseCredits(); ?></td>
                                    <td><?php echo $course->getCourseLesson(); ?></td>
                                    <td><?php echo $course->getCourseType(); ?></td>
                                    <td><?php echo $course->getSpecialityname(); ?></td>
                                    <td><a href="javascript:deleteConfirmation(<?php echo $course->getCourseId(); ?>)" >Eliminar</a></td>
                                </tr>
                                <?php
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Créditos</th>
                                <th>Lecciones</th>
                                <th>Tipo</th>
                                <th>Atinencia/Especialidad</th>
                                <th>Eliminar</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<?php
include './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
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

    function deleteConfirmation(id) {
        alertify.confirm('Eliminar Módulo', '¿Desea eliminar el módulo "' +
                $("#name" + id).html() + " " +
                '" de la lista de módulos?', function () {
                    window.location = "../business/DeleteCourseAction.php?id=" + id;
                }
        , function () {
            alertify.error('Cancelado');
        });
    }



</script>

