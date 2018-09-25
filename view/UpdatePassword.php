<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowProfile.php"><i class="fa fa-arrow-circle-right"></i> Perfil</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Actualizar Contraseña</a></li>
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
                    <h3 class="box-title">Actualizar Contraseña</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="formPass" action="../business/UpdatePassword.php" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <!--NAME-->
                        <div class="form-group">
                            <label>Contraseña Actual</label>
                            <input id="pass" name="pass" type="password" class="form-control" placeholder="Contraseña actual" required=""/>
                        </div>
                        <!--NAME-->
                        <div class="form-group">
                            <label>Nueva Contraseña</label>
                            <input id="passUpdate" name="passUpdate" type="password" class="form-control" placeholder="Nueva contraseña" required=""/>
                        </div>
                        <!--NAME-->
                        <div class="form-group">
                            <label>Confirmar Contraseña</label>
                            <input id="passConfirm" name="passConfirm" type="password" class="form-control" placeholder="Confirmar contraseña" required=""/>
                        </div>
                    </div><!-- /.box-body -->
                </form>
                <div class="box-footer">
                    <button onclick="valueInputs();" style="width: 49%" class="btn btn-primary">Actualizar</button>
                    <button onclick="backPage();" style="width: 49%" class="btn btn-primary">Ver Perfil</button>
                </div>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include_once './reusable/Footer.php';
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
        var pass = $('#pass').val();
        var passUpdate = $('#passUpdate').val();
        var passConfirm = $('#passConfirm').val();

        if (passUpdate.length < 8) {
            alertify.error("La nueva contraseña debe de tener minimo 8 caracteres");
            return false;
        }

        if (passUpdate === pass) {
            alertify.error("La nueva contraseña es igual a la actual");
            return false;
        }

        if (passConfirm !== passUpdate) {
            alertify.error("Verifique la confirmación de la contraseña");
            return false;
        }
        $("#formPass").submit();
    }

    function backPage() {
        window.location = "ShowProfile.php";
    }

</script>

