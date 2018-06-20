<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowNotifications.php"><i class="fa fa-arrow-circle-right"></i> Notificaciones</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Notificaciones</h3>
                    <a type="button" class="btn btn-primary pull-right" href="CreateNotification.php">Enviar Notificación</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Contenido</th>
                                <th>Módulo</th>
                                <th>Fecha</th>
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
                                    <td><?php echo $not->getNotificationCourse(); ?></td>
                                    <td><?php echo $not->getNotificationDate(); ?></td>
                            <div class="btn-group btn-group-justified">
                                <td>
                                    <a type="button" class="btn btn-primary" href="javascript:updateNotification(<?php echo $not->getNotificationId() ?>)">Actualizar</a>                    
                                </td>
                                <td>
                                    <a type="button" class="btn btn-danger" href="javascript:deleteNotification(<?php echo $not->getNotificationId() ?>)">Eliminar</a>
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
                                <th>Módulo</th>
                                <th>Fecha</th>
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
    $(function () {
        $("#example1").dataTable();
    });

    function updateNotification(id) {
        window.location = "UpdateNotification.php?id=" + id;
    }

    function deleteNotification(id) {
        alertify.confirm('Eliminar notificación', '¿Desea eliminar?', function () {
            window.location = "../actions/DeleteNotificationAction.php?id=" + id;
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
</script>

