<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowSpecialityDelete.php"><i class="fa fa-arrow-circle-right"></i> Eliminar Atinencia/Especialidade</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Eliminar Atinencia/Especialidad del Cindea</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Atinencia/Especialidad</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../business/SpecialityBusiness.php';
                            $specialityBusiness = new SpecialityBusiness();

                            $specialities = $specialityBusiness->getAll();

                            foreach ($specialities as $speciality) {
                                ?>
                                <tr>
                                    <td id="name<?php echo $speciality->getSpecialityId(); ?>"><?php echo $speciality->getSpecialityName(); ?></td>
                                    <td><a href="javascript:deleteConfirmation(<?php echo $speciality->getSpecialityId(); ?>)">Eliminar</a></td>
                                </tr>
                                <?php
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
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
        alertify.confirm('Eliminar Atinencia/Especialidad', '¿Desea eliminar la Atinencia/Especialidad "' +
                $("#name" + id).html() + " " +
                '"?', function () {
                    window.location = "../business/DeleteSpecialityAction.php?id=" + id;
                }
        , function () {
            alertify.error('Cancelado');
        });
    }

</script>

