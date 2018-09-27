<?php
include './reusable/Session.php';
include './reusable/Header.php';

$course = (int) $_GET['course'];
$professor = (int) $_GET['professor'];
$year = (int) $_GET['year'];
$period = (int) $_GET['period'];
$group = (int) $_GET['group'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Módulos</a></li>
        <li><a href="ShowCoursesLists.php"><i class="fa fa-arrow-circle-right"></i> Ver Estudiantes</a></li>
        <li><a href="ShowStudentsByCourse.php?course=<?php echo $course; ?>&period=<?php echo $period; ?>&year=<?php echo $year; ?>&group=<?php echo $group; ?>&professor=<?php echo $_SESSION['id']; ?>"><i class="fa fa-arrow-circle-right"></i> Estudiantes</a></li>
        <li><a href="FileShowByCourseAndProfessor.php?course=<?php echo $course; ?>&period=<?php echo $period; ?>&year=<?php echo $year; ?>&group=<?php echo $group; ?>&professor=<?php echo $_SESSION['id']; ?>"><i class="fa fa-arrow-circle-right"></i> Archivos</a></li>
        <li><a href="FileCreate.php"><i class="fa fa-arrow-circle-right"></i> Enviar Archivo</a></li>
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
                    <h3 class="box-title">Enviar Archivo</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box-footer">
                    <form role="form" id="formFile" action="../actions/FileCreateAction.php" method="POST" enctype="multipart/form-data">
                        <!-- textarea -->
                        <div class="form-group">
                            <textarea id="description" name="description" class="form-control" rows="3" placeholder="Descripción" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" name="fileToUpload" id="fileToUpload" required>
                        </div>
                        <input id="course" name="course" type="hidden" value="<?php echo $course; ?>" class="form-control" required="required"/>
                        <input id="group" name="group" type="hidden" value="<?php echo $group; ?>" class="form-control" required="required"/>
                        <input id="year" name="year" type="hidden" value="<?php echo $year; ?>" class="form-control" required="required"/>
                        <input id="period" name="period" type="hidden" value="<?php echo $period; ?>" class="form-control" required="required"/>
                        <input id="professor" name="professor" type="hidden" value="<?php echo $_SESSION["id"]; ?>" class="form-control" required="required"/>
                    </form>
                    <button onclick="valueInputs();" style="width: 100%" class="btn btn-primary">Enviar</button>
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
        var notify = $('#description').val();
        if (notify.length === 0) {
            alertify.error("Verifique el texto.");
            return false;
        }

        $("#formFile").submit();
    }

</script>