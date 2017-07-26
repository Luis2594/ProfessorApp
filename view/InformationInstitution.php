<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowSpecialities.php"><i class="fa fa-arrow-circle-right"></i> Institución</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Información Institución</a></li>
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
                    <h3 class="box-title">Institución</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="form" >
                    <div class="box-body">
                        <div class="form-group">
                            <?php
                            include './business/InstitutionBusiness.php';
                            $institutionBusiness = new InstitutionBusiness();
                            $institutions = $institutionBusiness->getInstitution();
                            $found = false;

                            foreach ($institutions as $institution) {
                                ?>
                                <input id="id" name="id" type="hidden"  value="<?php echo $institution->getInstitutionId() ?>" class="form-control" required readonly/>
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input id="name" name="name" type="text"  value="<?php echo $institution->getInstitutionName() ?>" class="form-control" placeholder="Nombre" required readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Misión</label>
                                    <input id="mission" name="mission" type="text" value="<?php echo $institution->getInstitutionMission() ?>" class="form-control" placeholder="Mission" required readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Visión</label>
                                    <input id="view" name="view" type="text" value="<?php echo $institution->getInstitutionView() ?>" class="form-control" placeholder="Visión" required readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input id="address" name="address" type="text" value="<?php echo $institution->getInstitutionAddress() ?>" class="form-control" placeholder="Dirección" required readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input id="phone" name="phone" type="text" value="<?php echo $institution->getInstitutionPhone() ?>" class="form-control" placeholder="Teléfono" required readonly/>
                                </div>
                                <div class="form-group">
                                    <label>Fax</label>
                                    <input id="name" name="name" type="text" value="<?php echo $institution->getInstitutionFax() ?>" class="form-control" placeholder="Nombre" required readonly/>
                                </div>
                                <div class="btn-group btn-group-justified">
                                    <a type="button" class="btn btn-primary" href="javascript:updateInstitution()">Actualizar</a>
                                </div>
                                <?php
                                $found = true;
                                break;
                            }
                            ?>
                        </div>
                    </div><!-- /.box-body -->
                </form>

                <?php
                if (!$found) {
                    ?>
                    <div class="btn-group btn-group-justified">
                        <a type="button" class="btn btn-success" href="javascript:createInstitution()">Crear</a>
                    </div>
                    <?php
                }
                ?>

            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
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

    function createInstitution() {
        window.location = "CreateInstitution.php?";
    }

    function updateInstitution() {
        window.location = "UpdateInstitution.php";
    }

</script>