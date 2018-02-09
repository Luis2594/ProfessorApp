<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowCoursesProfessor.php"><i class="fa fa-arrow-circle-right"></i>Ver Módulos</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Información del Módulo</a></li>
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
                    <h3 class="box-title">Información  del Módulo</h3>
                </div><!-- /.box-header -->

                <?php
                include_once '../business/CourseBusiness.php';

                $courseBusiness = new CourseBusiness();
                $id = (int) $_GET['id'];

                $courses = $courseBusiness->getCourseId($id);

                foreach ($courses as $course) {
                    ?>
                    <!-- form start -->
                    <form role="form">
                        <div class="box-body">
                            <!--CODE-->
                            <div class="form-group">
                                <label>Código</label>
                                <input id="code" name="code" type="number" class="form-control" placeholder="Código" required="" readonly value="<?php echo $course->getCourseCode(); ?>" />
                            </div>
                            <!--NAME-->
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" required="" readonly value="<?php echo $course->getCourseName(); ?>" />
                            </div>
                            <!--CREDITS-->
                            <div class="form-group">
                                <label>Creditos</label>
                                <input type="text" class="form-control" placeholder="Creditos" required="" readonly value="<?php echo $course->getCourseCredits(); ?>" />
                            </div>
                            <!--LESSONS-->
                            <div class="form-group">
                                <label>Lecciones</label>
                                <input type="number" class="form-control" placeholder="Lecciones" required="" readonly value="<?php echo $course->getCourseLesson(); ?>" />
                            </div>
                            <!--SPECIALITY-->
                            <div class="form-group">
                                <label>Atinencia/Especialidad</label>
                                <input type="text" class="form-control" placeholder="Atinencia/Especialidad" required="" readonly value="<?php echo $course->getSpecialityname(); ?>" />
                            </div>
                            <!--TYPE-->
                            <div class="form-group">
                                <label>Tipo de curso</label>
                                <!--IF-->
                                <?php
                                if ($course->getCourseType() == 1) {
                                    ?>
                                    <input type="text" class="form-control" placeholder="Convencional" required="" readonly value="Convencional" />
                                    <?php
                                }

                                if ($course->getCourseType() == 2) {
                                    ?>
                                    <input type="text" class="form-control" placeholder="Emergente" required="" readonly value="Emergente" />
                                    <?php
                                }

                                if ($course->getCourseType() == 3) {
                                    ?>
                                    <input type="text" class="form-control" placeholder="Opcional" required="" readonly value="Opcional" />
                                <?php }
                                ?>
                            </div>
                            <!--PDF-->
                            <div class="form-group">
                                <a href="../../pdf/<?php echo $course->getCoursePdf() ?>" target="_blank" >Plan de estudios</a>
                            </div>
                            <div class="box-footer">
                                <a href="ShowCoursesProfessor.php" style="width: 100%" class="btn btn-primary">Módulos</a>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                    <?php
                    break;
                } // end of FOR
                ?>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include_once './reusable/Footer.php';
?>