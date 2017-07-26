<?php
include './reusable/Session.php';
include './reusable/Header.php';

$id = (int) $_GET['id'];

if (isset($id) && is_int($id)) {
    ?>

    <!-- Content Header (Page header) -->
    <section class="content-header" style="text-align: left">
        <ol class="breadcrumb">
            <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
            <li><a href="ShowSpecialities.php"><i class="fa fa-arrow-circle-right"></i> Atinencia/Especialidad</a></li>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Información Atinencia/Especialidad</a></li>
        </ol>
    </section>
    <br>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Atinencia/Especialidad</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <div class="form-group">
                                <?php
                                include '../business/SpecialityBusiness.php';
                                $specialityBusiness = new SpecialityBusiness();

                                $specialities = $specialityBusiness->getSpecialityId($id);

                                foreach ($specialities as $speciality) {
                                    ?>
                                    <label>Nombre</label>
                                    <input id="name" name="name" type="text"  value="<?php echo $speciality->getSpecialityName() ?>" class="form-control" placeholder="Nombre" required="" readonly/>

                                <?php } ?>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                    <div class="btn-group btn-group-justified">
                        <a type="button" class="btn btn-success" href="javascript:createSpeciality()">Crear</a>
                        <a type="button" class="btn btn-primary" href="javascript:updateSpeciality(<?php echo $id; ?>)">Actualizar</a>
                        <a type="button" class="btn btn-danger" href="javascript:deleteSpeciality(<?php echo $id ?>)">Eliminar</a>
                        <a type="button" class="btn btn-primary" href="javascript:showSpeciality()">Ver todas</a>
                    </div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->

    <?php
}
include './reusable/Footer.php';
?>

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

    function createSpeciality() {
        window.location = "CreateSpeciality.php";
    }

    function updateSpeciality(id) {
        window.location = "UpdateSpeciality.php?id=" + id;
    }

    function showSpeciality(id) {
        window.location = "ShowSpecialities.php";
    }

    function deleteSpeciality(id) {
        alertify.confirm('Eliminar Atinencia/Especialidad', '¿Desea eliminar la Atinencia o especialidad "' +
                $("#name").val() + '"?', function () {
            window.location = "../business/DeleteSpecialityAction.php?id=" + id;
        }
        , function () {
            alertify.error('Cancelado');
        });
    }


</script>
