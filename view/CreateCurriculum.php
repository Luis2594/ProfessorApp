<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="CreateCurriculum.php"><i class="fa fa-arrow-circle-right"></i>Crear Maya Curricular</a></li>
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
                    <h3 class="box-title">Crear Curso</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="formCurriculum" action="../business/CreateCurriculumAction.php" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre" required=""/>
                        </div>
                        <div class="form-group">
                            <label>Año</label>
                            <input id="year" name="year" type="number" class="form-control" placeholder="Año" required=""/>
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
        var year = $('#year').val();
        var name = $('#name').val();

        if (!isInteger(year)) {
            alertify.error("Formato de año incorrecto");
            return false;
        }

        if (year.length < 4) {
            alertify.error("Año no existente");
            return false;
        }
        
        if (year < 2010) {
            alertify.error("Año muy antiguo");
            return false;
        }
        
        if (year > 2100) {
            alertify.error("Año muy lejano");
            return false;
        }

        if (name.length === 0) {
            alertify.error("Verifique el nombre de la maya curricular");
            return false;
        }

        $("#formCurriculum").submit();
    }

    function isInteger(number) {
        if (number % 1 === 0) {
            return true;
        } else {
            return false;
        }
    }

</script>