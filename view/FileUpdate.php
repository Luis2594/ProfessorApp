<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';
$id = $_GET['id'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Módulos</a></li>
        <li><a href="ShowCoursesLists.php"><i class="fa fa-arrow-circle-right"></i> Ver Estudiantes</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Estudiantes</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Archivos</a></li>
        <li><a href="FileUpdate.php?id=<?php echo $id; ?>"><i class="fa fa-arrow-circle-right"></i> Actualizar Archivo</a></li>
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
                    <h3 class="box-title">Actualizar Descripción Archivo</h3>
                </div><!-- /.box-header -->
                <div class="box-footer">
                    <?php
                    include_once '../business/FileBusiness.php';

                    $business = new FileBusiness();
                    
                    $file = $business->get($id);
                    $params = "?course=" . $file->getCourse() .
                        "&professor=" . $file->getProfessor() .
                        "&year=" . $file->getYear() .
                        "&period=" . $file->getPeriod() .
                        "&group=" . $file->getGroup();
                    ?>
                    <!-- form start -->
                    <form role="form" id="formUpdate" action="../actions/FileUpdateAction.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id" value="<?php echo $file->getId() ?>"/>
                        <div class="form-group">
                            <label>Descripción</label>
                            <input id="name" name="name" type="text" class="form-control" value="<?php echo $file->getDescription() ?>" required/>
                        </div>
                    </form>
                    
                    <button onclick="valueInputs();" style="width: 49%" class="btn btn-primary">Actualizar</button>
                    
                    <button onclick="backPage();" style="width: 49%" class="btn btn-primary">Atrás</button>
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

        var text = $('#name').val();
        if (text.length === 0) {
            alertify.error("Verifique el texto.");
            return false;
        }

        $("#formUpdate").submit();
    }

    function backPage() {
        window.location = "FileShowByCourseAndProfessor.php"+ "<?php echo $params; ?>";
    }
</script>
