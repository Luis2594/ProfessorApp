<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowCourseUpdate.php"><i class="fa fa-arrow-circle-right"></i> Actualizar módulos</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Actualizar módulos del Cindea</h3>
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
                                <th>Períodos</th>
                                <th>Actualizar</th>
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
                                    <td><?php echo $course->getCourseName(); ?></td>
                                    <td><?php echo $course->getCourseCredits(); ?></td>
                                    <td><?php echo $course->getCourseLesson(); ?></td>
                                    <td><?php echo $course->getCourseType(); ?></td>
                                    <td><?php echo $course->getSpecialityname(); ?></td>
                                    <td><a href="UpdatePeriods.php?id=<?php echo $course->getCourseId(); ?>" >Períodos</a></td>
                                    <td><a href="UpdateCourse.php?id=<?php echo $course->getCourseId(); ?>" >Actualizar</a></td>
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
                                <th>Períodos</th>
                                <th>Actualizar</th>
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

