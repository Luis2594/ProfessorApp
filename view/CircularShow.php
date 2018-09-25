<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="CircularShow.php"><i class="fa fa-arrow-circle-right"></i> Circulares</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Circulares</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="tablaCirculares" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Ver Archivo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include '../business/CircularBusiness.php';
                                $business = new CircularBusiness();

                                $entities = $business->getAll();

                                foreach ($entities as $entity) {
                                    ?>
                                    <tr>
                                        <td><?php echo $entity->getCircularDescription(); ?></td>
                                        <td><?php echo $entity->getCircularDate(); ?></td>
                                        <td>
                                            <a type="button" class="btn btn-primary btn-sm" target="_blank" href="../../documents/circular/<?php echo $entity->getCircularGUID(); ?>.pdf" >Ver Archivo</a>
                                        </td>
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
    
    $(function () {
        $("#tablaCirculares").dataTable();
    });
</script>

