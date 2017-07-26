<?php
include './reusable/Session.php';
include './reusable/Header.php';
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
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Contenido</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../business/NotificationBusiness.php';
                            $notificationBusiness = new NotificationBusiness();

                            $notifications = $notificationBusiness->getAllGeneralNotification();

                            foreach ($notifications as $not) {
                                ?>
                                <tr>
                                    <td><?php echo $not->getNotificationText(); ?></td>
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
    
    function updateNotification(id) {
        window.location = "UpdateNotification.php?id=" + id;
    }

    function deleteNotification(id) {
        alertify.confirm('Eliminar notificación', '¿Desea eliminar?', function () {
                    window.location = "../business/DeleteNotificationAction.php?id=" + id;
                }
        , function () {
            alertify.error('Cancelado');
        });
    }
</script>

