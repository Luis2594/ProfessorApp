<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowCourseUpdate.php"><i class="fa fa-arrow-circle-right"></i>Actualizar Módulos</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Actualizar Módulo</a></li>
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
                    <h3 class="box-title">Actualizar Módulo</h3>
                </div><!-- /.box-header -->

                <?php
                include '../business/CourseBusiness.php';

                $courseBusiness = new CourseBusiness();
                $id = (int) $_GET['id'];

                $courses = $courseBusiness->getCourseId($id);

                foreach ($courses as $course) {
                    ?>
                    <!-- form start -->
                    <form role="form" id="formCourse" action="../business/UpdateCourseAction.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                            <!--CODE-->
                            <div class="form-group">
                                <label>Código</label>
                                <input id="code" name="code" type="number" class="form-control" placeholder="Código" required="" value="<?php echo $course->getCourseCode(); ?>" />
                            </div>
                            <!--NAME-->
                            <div class="form-group">
                                <label>Nombre</label>
                                <input id="name" name="name"type="text" class="form-control" placeholder="Nombre" required="" value="<?php echo $course->getCourseName(); ?>" />
                            </div>
                            <!--CREDITS-->
                            <div class="form-group">
                                <label>Creditos</label>
                                <input id="credits" name="credits" type="text" class="form-control" placeholder="Creditos" required="" value="<?php echo $course->getCourseCredits(); ?>" />
                            </div>
                            <!--LESSONS-->
                            <div class="form-group">
                                <label>Lecciones</label>
                                <input id="lessons" name="lessons" type="number" class="form-control" placeholder="Lecciones" required="" value="<?php echo $course->getCourseLesson(); ?>" />
                            </div>
                            <!--SPECIALITY-->
                            <div class="form-group">
                                <label>Atinencia/Especialidad</label>
                                <input id="specialityTemp" type="text" class="form-control" placeholder="Atinencia/Especialidad" required="" readonly value="<?php echo $course->getSpecialityname(); ?>" />
                                <select id="speciality" name="speciality" class="form-control">
                                </select>
                            </div>
                            <!--TYPE-->
                            <div class="form-group">
                                <label>Tipo de curso</label>
                                <input id="typeCourseTemp" type="number" class="form-control" placeholder="Convencional" required="" readonly value="<?php echo $course->getCourseType() ?>" />
                                <select id="typeCourse" name="typeCourse" class="form-control">
                                </select>
                            </div>
                            <!--PDF-->
                            <!--PDF-->
                            <div class="form-group">
                                <label for="exampleInputFile">Cronograma</label>
                                <input id="schedule" name="schedule" type="file" accept=".pdf">
                                <p class="help-block">Subir archivo con extensión .pdf</p>
                            </div>
                            <div class="form-group">
                                <a href=" http://www.cindeaturrialba.com/pdf/<?php echo $course->getCoursePdf() ?>" target="_blank" >Plan de estudios</a>
                            </div>
                            <input id="codeTemp" value="<?php echo $course->getCourseCode(); ?>">
                        </div><!-- /.box-body -->
                    </form>
                    <?php
                    break;
                } // end of FOR
                ?>
                <div class="btn-group btn-group-justified">
                    <a type="button" class="btn btn-primary" href="javascript:updateCourse()">Actualizar</a>
                </div>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include './reusable/Footer.php';
?>

<script type="text/javascript">
    $("#codeTemp").hide();

    $(function () {
        speciality();
        typeCourse();

    });

    function speciality() {
        $.ajax({
            type: 'GET',
            url: "../business/GetSpecialities.php",
            success: function (data)
            {
                var speciality = JSON.parse(data);
                var htmlCombo = '';
                var bool = 0;
                $.each(speciality, function (i, item) {
                    bool = 1;
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.name + '</OPTION>';
                });
                $("#speciality").html(htmlCombo);
                $('#speciality option:contains("' + $("#specialityTemp").val() + '")').attr('selected', 'selected');
                $("#specialityTemp").hide();
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function typeCourse() {
        $.ajax({
            type: 'GET',
            url: "../business/GetTypeCourse.php",
            success: function (data)
            {
                var type = JSON.parse(data);
                var htmlCombo = '';
                $.each(type, function (i, item) {
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.type + '</OPTION>';
                });
                $("#typeCourse").html(htmlCombo);
                $("#typeCourse option[value=" + $("#typeCourseTemp").val() + "]").attr("selected", true);
                $("#typeCourseTemp").hide();
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function updateCourse() {
        valueInputs();
    }

    function valueInputs() {
        var codeTemp = $("#codeTemp").val();
        var code = $('#code').val();
        var name = $('#name').val();
        var credits = $('#credits').val();
        var lesson = $('#lessons').val();

        if (!isInteger(code)) {
            alertify.error("Formato de código incorrecto");
            return false;
        }

        if (name.length === 0) {
            alertify.error("Verifique el nombre del curso");
            return false;
        }

        if (!isInteger(credits)) {
            alertify.error("Número de créditos no valido.");
            return false;
        }

        if (!isInteger(lesson)) {
            alertify.error("Número de lecciones no valido.");
            return false;
        }

        if (code === codeTemp) {
            $("#formCourse").submit();
        } else {
            confirmCode(code);
        }
    }

    function isInteger(number) {
        if (number % 1 === 0) {
            return true;
        } else {
            return false;
        }
    }

    function confirmCode(code) {
        $.ajax({
            type: 'GET',
            url: "../business/ConfirmCode.php",
            data: {"code": code},
            success: function (data)
            {
                if (data == true) {
                    $("#formCourse").submit();
                } else {
                    alertify.error("Ya existe un módulo con ese número de código");
                }
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

</script>