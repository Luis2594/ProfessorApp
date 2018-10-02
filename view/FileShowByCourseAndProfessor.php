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
        <li><a href="ShowCoursesLists.php"><i class="fa fa-arrow-circle-right"></i> Ver Estudiantes</a></li>
        <li><a href="ShowStudentsByCourse.php?course=<?php echo $course; ?>&period=<?php echo $period; ?>&year=<?php echo $year; ?>&group=<?php echo $group; ?>&professor=<?php echo $_SESSION['id']; ?>"><i class="fa fa-arrow-circle-right"></i> Estudiantes</a></li>
        <li><a href="FileShowByCourseAndProfessor.php?course=<?php echo $course; ?>&period=<?php echo $period; ?>&year=<?php echo $year; ?>&group=<?php echo $group; ?>&professor=<?php echo $_SESSION['id']; ?>"><i class="fa fa-arrow-circle-right"></i> Archivos</a></li>
    </ol>
</section>
<br>

<?php
if (isset($course) && is_int($course) && isset($professor) && is_int($professor) && isset($year) && is_int($year) && isset($year) && is_int($year) && isset($group) && is_int($group)) {
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!--SHOW FILES RELATED TO A MODULE AND PROFESSOR-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <?php
                        include_once '../business/CourseBusiness.php';
                        include_once '../business/FileBusiness.php';

                        $business = new CourseBusiness();
                        $fileBusiness = new FileBusiness();

                        $courses = $business->getCourseId($course);
                        foreach ($courses as $item) {
                            ?>
                            <h3 class="box-title">
                                <b> Archivos:&nbsp;&nbsp;&nbsp; </b>
                                <?php
                                    echo $item->getCourseName();
                                ?>
                            </h3>
                            <a type="button" class="btn btn-primary pull-right btn-sm" title="Exportar como archivo de excel."
                            href="FileCreate.php?course=<?php echo $course; ?>&period=<?php echo $period; ?>&year=<?php echo $year; ?>&group=<?php echo $group; ?>&professor=<?php echo $_SESSION['id']; ?>">Enviar Archivo</a>
                            <?php
                            break;
                        }
                        ?>
                    </div>
                    <div class="table-responsive">
                        <div class="box-body">
                            <table id="filesTable" class="table table-bordered table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                    <th>Descripción</th>
                                    <th>Fecha</th>
                                    <th>Ver Archivo</th>
                                    <th>Eliminar</th>
                                    <th>Actualizar</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <?php
                                    $files = $fileBusiness->getFilesByFilters($course, $professor, $period, $year, $group);
                                    foreach ($files as $file) {
                                        ?>
                                        <tr>
                                            <td><?php echo $file->getDescription(); ?></td>
                                            <td><?php echo $file->getDate(); ?></td>
                                            <td><a type="button" class="btn btn-primary btn-sm" target="_blank" href="../../documents/files/<?php echo $file->getGUID(); ?>" >Ver Archivo</a></td>
                                            <td><a type="button" class="btn btn-danger btn-sm" href="javascript:remove(<?php echo $file->getId(); ?>)">Eliminar</a></td>
                                            <td><a type="button" class="btn btn-info btn-sm" href="javascript:update(<?php echo $file->getId(); ?>)">Actualizar</a></td>
                                        </tr>    
                                        <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>Descripción</th>
                                    <th>Fecha</th>
                                    <th>Ver Archivo</th>
                                    <th>Eliminar</th>
                                    <th>Actualizar</th>
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
    $(document).ready(function () {
        $("#filesTable").dataTable();
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

    function remove(id) {
        alertify.confirm('Eliminar Registro', '¿Desea eliminar?', function () {
                    window.location = "../actions/FileDeleteAction.php?id=" + id;
                }
        , function () {
            alertify.error('Cancelado');
        });
    }

    function update(id) {
        window.location = "FileUpdate.php?id=" + id;
    }

</script>

