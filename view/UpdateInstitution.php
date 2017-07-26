<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowInstitutionUpdate.php"><i class="fa fa-arrow-circle-right"></i>Ver Institución</a></li>
        <li><a href="UpdateInstitution.php"><i class="fa fa-arrow-circle-right"></i>Actualizar Institución</a></li>
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
                    <h3 class="box-title">Información Institución</h3>
                </div><!-- /.box-header -->

                <?php
                include './business/InstitutionBusiness.php';

                $institutionBusiness = new InstitutionBusiness();
                $institutions = $institutionBusiness->getInstitution();
                $bool = false;
                foreach ($institutions as $institution) {
                    ?>
                    <!-- form start -->
                    <form role="form" id="formUpdateInstitution" action="../business/UpdateInstitutionAction.php" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="box-body">
                        <div class="form-group">
                            <input id="id" name="id" type="hidden" class="form-control" placeholder="Nombre" required value="<?php echo $institution->getInstitutionId()?>" hidden="true"/>
                        </div><div class="form-group">
                            <label>Nombre</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre" required value="<?php echo $institution->getInstitutionName()?>"/>
                        </div>
                        <div class="form-group">
                            <label>Misión</label>
                            <input id="mission" name="mission" type="text" class="form-control" placeholder="Mission" required value="<?php echo $institution->getInstitutionMission()?>"/>
                        </div>
                        <div class="form-group">
                            <label>Visión</label>
                            <input id="view" name="view" type="text" class="form-control" placeholder="Visión" required value="<?php echo $institution->getInstitutionView()?>"/>
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <input id="address" name="address" type="text" class="form-control" placeholder="Dirección" required value="<?php echo $institution->getInstitutionAddress()?>"/>
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input id="phone" name="phone" type="text" class="form-control" placeholder="Teléfono" required value="<?php echo $institution->getInstitutionPhone()?>"/>
                        </div>
                        <div class="form-group">
                            <label>Fax</label>
                            <input id="fax" name="fax" type="text" class="form-control" placeholder="Nombre" required value="<?php echo $institution->getInstitutionFax()?>"/>
                        </div>
                    </div><!-- /.box-body -->
                        </div>
                    </form>

                    <div class="pull-left">
                        <button onclick="valueInputs();" class="btn btn-primary">Actualizar</button>
                    </div>
                    <div class="pull-right">
                        <button onclick="backPage();" class="btn btn-primary">Atrás</button>
                    </div>

                    <?php
                }//fin del for
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

    function valueInputs() {
        
        var name = $('#name').val();
        if (name.length === 0) {
            alertify.error("Verifique el nombre de la institución");
            return false;
        }
        
        var phone = $('#phone').val();
        if (phone.length === 0) {
            alertify.error("Verifique el teléfono de la institución");
            return false;
        }
        
        var address = $('#address').val();
        if (address.length === 0) {
            alertify.error("Verifique la dirección de la institución");
            return false;
        }

        var mission = $('#mission').val();
        if (mission.length === 0) {
            alertify.error("Verifique la misión de la institución");
            return false;
        }
        
        var view = $('#view').val();
        if (view.length === 0) {
            alertify.error("Verifique la visión de la institución");
            return false;
        }
        
        var fax = $('#fax').val();
        if (fax.length === 0) {
            alertify.error("Verifique el fax de la institución");
            return false;
        }
        
        $("#formUpdateInstitution").submit();
    }

    function backPage() {
        window.location = "InformationInstitution.php";
    }
</script>
