<?php
include './reusable/Session.php';
include './reusable/Header.php';
$id = (int) $_GET['id'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="CreateCurriculum.php"><i class="fa fa-arrow-circle-right"></i>Crear Malla Curricular</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Información de Malla Curricular</a></li>
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
                        <h3 class="box-title">Información de Malla Curricular</h3>
                    </div><!-- /.box-header -->
                    <?php
                    include '../business/CurriculumBusiness.php';

                    $curriculumBusiness = new CurriculumBusiness();

                    $curriculums = $curriculumBusiness->getCurriculumId($id);

                    foreach ($curriculums as $curriculum) {
                        ?>
                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input readonly="" value="<?php echo $curriculum->getCurriculumName(); ?>" type="text" class="form-control" placeholder="Nombre" required=""/>
                                </div>
                                <div class="form-group">
                                    <label>Año</label>
                                    <input readonly="" value="<?php echo $curriculum->getCurriculumYear(); ?>" type="text" class="form-control" placeholder="Año" required=""/>
                                </div>
                            </div><!-- /.box-body -->
                        </form>

                        <div class="btn-group btn-group-justified">
                            <a type="button" class="btn btn-success" href="javascript:createCurriculum()">Crear</a>
                            <a type="button" class="btn btn-primary" href="javascript:updateCurriculum(<?php echo $id ?>)">Actualizar</a>
                            <a type="button" class="btn btn-danger" href="javascript:deleteCurriculum(<?php echo $id ?>)">Eliminar</a>
                            <a type="button" class="btn btn-primary" href="javascript:showCourses(<?php echo $id ?>)">Ver módulos</a>
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

    function createCurriculum() {
        window.location = "CreateCurriculum.php?";
    }

    function updateCurriculum(id) {
        window.location = "UpdateCurriculum.php?id=" + id;
    }
    
    function showCourses(id) {
        window.location = "ShowCoursesCurriculum.php?id=" + id;
    }

    function deleteCurriculum(id) {
        alertify.confirm('Eliminar malla curricular', "¿Desea eliminar la malla curricular?", function () {
                    window.location = "../business/DeleteCurriculumAction.php?id=" + id;
                }
        , function () {
            alertify.error('Cancelado');
        });
    }

</script>