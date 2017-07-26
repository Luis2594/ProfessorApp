<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Actualizar Contraseña</a></li>
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
                <form role="form" id="form" action="../business/businessAction/" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <!--NAME-->
                        <div class="form-group">
                            <label>Contraseña actual</label>
                            <input id="pass" name="pass" type="password" class="form-control" placeholder="Contraseña actual" required=""/>
                        </div>
                        <!--NAME-->
                        <div class="form-group">
                            <label>Nueva contraseña</label>
                            <input id="passUpdate" name="passUpdate" type="password" class="form-control" placeholder="Nueva contraseña" required=""/>
                        </div>
                        <!--NAME-->
                        <div class="form-group">
                            <label>Confirmar contraseña</label>
                            <input id="passConfirm" name="passConfirm" type="password" class="form-control" placeholder="Confirmar contraseña" required=""/>
                        </div>
                    </div><!-- /.box-body -->
                </form>
                <div class="box-footer">
                    <button onclick="valueInputs();" class="btn btn-primary">Crear</button>
                </div>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include './reusable/Footer.php';
?>

<script type="text/javascript">

    function valueInputs() {
        var pass = $('#pass').val();
        var passUpdate = $('#passUpdate').val();
        var passConfirm = $('#passConfirm').val();

        if (pass !== "prueba") {
            alertify.error("La contraseña indicada no coincide con la del usuario");
            return false;
        }

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
        $("#form").submit(function () {
        });
    }


</script>

