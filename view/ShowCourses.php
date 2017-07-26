<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowCourses.php"><i class="fa fa-arrow-circle-right"></i> Módulos</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Módulos del Cindea</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Créditos</th>
                                <th>Lecciones</th>
                                <th>Tipo</th>
                                <th>Atinencia/Especialidad</th>
                                <th>Plan de estudios</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../business/CourseBusiness.php';
                            $coursesBusiness = new CourseBusiness();

                            $courses = $coursesBusiness->getAll();

                            foreach ($courses as $course) {
                                ?>
                                <tr>
                                    <td><?php echo $course->getCourseCode(); ?></td>
                                    <td><a href="InformationCourse.php?id=<?php echo $course->getCourseId() ?>"><?php echo $course->getCourseName(); ?></a></td>
                                    <td><?php echo $course->getCourseCredits(); ?></td>
                                    <td><?php echo $course->getCourseLesson(); ?></td>
                                    <td><?php echo $course->getCourseType(); ?></td>
                                    <td><?php echo $course->getSpecialityname(); ?></td>
                                    <td><a href="../../pdf/<?php echo $course->getCoursePdf() ?>" target="_blank" >Plan de estudio</a></td>
                                </tr>
                                <?php
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Créditos</th>
                                <th>Lecciones</th>
                                <th>Tipo</th>
                                <th>Atinencia/Especialidad</th>
                                <th>Plan de estudios</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<?php
include './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
    });
</script>

