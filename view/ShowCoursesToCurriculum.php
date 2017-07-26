<?php
include './reusable/Session.php';
include './reusable/Header.php';
$id = (int) $_GET['id'];
?>


<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowCourses.php"><i class="fa fa-arrow-circle-right"></i> Cursos</a></li>
    </ol>
</section>
<br>

<?php
if (isset($id) && $id != '' && is_int($id)) {
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <?php
                        include '../business/CurriculumBusiness.php';

                        $curriculumBusiness = new CurriculumBusiness();

                        $curriculums = $curriculumBusiness->getCurriculumId($id);

                        foreach ($curriculums as $curriculum) {
                            ?>
                            <h3 class="box-title">Malla: <?php echo $curriculum->getCurriculumName(); ?> </h3>
                            <br>
                            <h3 class="box-title">Año: <?php echo $curriculum->getCurriculumYear(); ?> </h3>
                        <?php } ?>
                            
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Creditos</th>
                                    <th>Lecciones</th>
                                    <!--<th>Atinencia/Especialidad</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $courses = $curriculumBusiness->getCurriculumCourseByCurriculum($id);
                                foreach ($courses as $course) {
                                    ?>
                                    <tr>
                                        <td><?php echo $course->getCourseCode(); ?></td>
                                        <td><a href="InformationCourse.php?id=<?php echo $course->getCourseId(); ?>"><?php echo $course->getCourseName(); ?></a></td>
                                        <td><?php echo $course->getCourseCredits(); ?></td>
                                        <td><?php echo $course->getCourseLesson(); ?></td>
                                        <!--<td><?php// echo $course->getSpecialityname();  ?></td>-->
                                    </tr>
                                    <?php
                                }
                                ?> 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Creditos</th>
                                    <th>Lecciones</th>
                                    <!--<th>Atinencia/Especialidad</th>-->
                                </tr>
                            </tfoot>
                        </table>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

    <?php
}
include './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
    });

</script>

