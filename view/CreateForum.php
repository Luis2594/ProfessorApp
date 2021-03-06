<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowForums.php"><i class="fa fa-arrow-circle-right"></i>Ver Foros</a></li>
        <li><a href="CreateForum.php"><i class="fa fa-arrow-circle-right"></i>Crear Foro</a></li>
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
                    <h3 class="box-title">Crear Foro</h3>
                </div><!-- /.box-header -->
                <div class="box-footer">
                    <form role="form" id="formCreateForum" action="../actions/CreateForumAction.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Módulo</label>
                            <select style="width: 100%" name="course" id="course" onchange="addGroup(this);">
                                <?php
                                include_once '../business/CourseBusiness.php';
                                $business = new CourseBusiness();
                                $courses = $business->getCoursesByProfessor($_SESSION['id']);

                                if (sizeof($courses) > 0) {
                                    echo '<option value="-1">Selecione un módulo.</option>';
                                    foreach ($courses as $course) {
                                        echo '<option value="' . $course->getCourseId() . '">' . $course->getCourseName() . '</option>';
                                    }
                                } else {
                                    echo '<option value="-1">No tiene módulos asignados.</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <input type="text" hidden="true" id="group" name="group"/>
                        <div class="form-group">
                            <label>Nombre del Foro</label>
                            <input id="forumName" name="forumName" type="text" class="form-control" placeholder="Nombre de Foro"/>
                        </div>
                    </form>

                    <button style="width: 100%" onclick="valueInputs();" class="btn btn-primary" id="send">Crear Foro</button>
                </div>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include_once './reusable/Footer.php';
?>

<script type="text/javascript">

    function valueInputs() {
        if ($('#forumName').val() === "" || $('#forumName').val() === null) {
            alertify.error("Verifique el nombre de su foro.");
            return false;
        }
        $("#formCreateForum").submit();
    }

    if ($('#course').val() === "-1") {
        $('#send').attr("disabled", true);
    }

    $("#course").change(function () {
        if ($('#course').val() === "-1") {
            $('#send').attr("disabled", true);
        }else {
        $('#send').attr("disabled", false);
    }
    });

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

    function addGroup(sel) {
        var temp = [];
        temp = sel.options[sel.selectedIndex].text.split("-");
        document.getElementById("group").value = temp[0] + "-" + temp[1].substring(0, 1);
    }
</script>