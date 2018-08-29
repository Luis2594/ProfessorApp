<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';

$course = (int) $_GET['course'];
$professor = (int) $_GET['professor'];
$year = (int) $_GET['year'];
$period = (int) $_GET['period'];
$group = (int) $_GET['group'];
$courseName =  $_GET['courseName'];;

?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Notificaciones</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Ver Notificaciones</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><b>Notificaciones:</b> <?php echo $courseName; ?></h3>
                    <a type="button" class="btn btn-primary pull-right" href="CreateNotification.php?course=<?php echo $course; ?>&professor=<?php echo $professor; ?>&year=<?php echo $year; ?>&period=<?php echo $period; ?>&group=<?php echo $group; ?>">Enviar Notificación</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Contenido</th>
                                <th>Fecha</th>
                                <th>Actualizar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!isset($_SESSION)) {
                                session_start();
                            }

                            include_once '../business/NotificationBusiness.php';
                            $business = new NotificationBusiness();

                            $notifications = $business->getNotificationByProfessor($_SESSION['id']);

                            foreach ($notifications as $not) {
                                ?>
                                <tr>
                                    <td><?php echo $not->getNotificationText(); ?></td>
                                    <td><?php echo $not->getNotificationDate(); ?></td>
                            <div class="btn-group btn-group-justified">
                                <td>
                                    <a type="button" class="btn btn-primary" href="javascript:updateNotification(<?php echo $not->getNotificationId() . ',' . $course . ',' . $professor . ',' . $year . ',' . $period . ',' . $group ?>)">Actualizar</a>                    
                                </td>
                                <td>
                                    <a type="button" class="btn btn-danger" href="javascript:deleteNotification(<?php echo $not->getNotificationId() . ',' . $course . ',' . $professor . ',' . $year . ',' . $period . ',' . $group ?>)">Eliminar</a>
                                </td>
                            </div>
                            </tr>
                            <?php
                        }
                        ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Contenido</th>
                                <th>Fecha</th>
                                <th>Actualizar</th>
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
include_once './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">
    $(document).ready(function () {
        $("#example1").dataTable();
    });

    function updateNotification(id, course, professor, year, period, group) {
        window.location = "UpdateNotification.php?id=" + id + "&course=" + course + "&professor=" + professor + "&year=" + year + "&period=" + period + "&group=" + group;
    }

    function deleteNotification(id, course, professor, year, period, group) {
        alertify.confirm('Eliminar notificación', '¿Desea eliminar?', function () {
            window.location = "../actions/DeleteNotificationAction.php?id=" + id + "&course=" + course + "&professor=" + professor + "&year=" + year + "&period=" + period + "&group=" + group;
        }
        , function () {
            alertify.error('Cancelado');
        });
    }

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
        };
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
</script>

