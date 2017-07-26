<?php
include './reusable/Session.php';
include './reusable/Header.php';
$id = (int) $_GET['id'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="CreateSpeciality.php"><i class="fa fa-arrow-circle-right"></i>Crear Atinencia/Especialidad</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Información de Atinencia/Especialidad</a></li>
    </ol>
</section>
<br>

<?php
if (isset($id) && $id != '' && is_int($id)) {
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Información de Atinencia/Especialidad</h3>
                    </div><!-- /.box-header -->
                    <?php
                    include '../business/SpecialityBusiness.php';

                    $specialityBusiness = new SpecialityBusiness();

                    $specialities = $specialityBusiness->getSpecialityId($id);

                    foreach ($specialities as $speciality) {
                        ?>
                        <!-- form start -->
                        <form id="formSpeciality" role="form" action="../business/UpdateSpecialityAction.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input id="name" name="name" value="<?php echo $speciality->getSpecialityName(); ?>" type="text" class="form-control" placeholder="Nombre" required=""/>
                                </div>
                            </div><!-- /.box-body -->
                        </form>
                        <div class="box-footer">
                            <button onclick="valueInputs();" class="btn btn-primary">Actualizar</button>
                        </div>

                    <?php } ?>
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

    function valueInputs() {

        var name = $('#name').val();

        if (name.length === 0) {
            alertify.error("Verifique el nombre de la Atinencia/Especialidad");
            return false;
        }

        $("#formSpeciality").submit();
    }

</script>