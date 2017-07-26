<?php
include './reusable/Session.php';
include './reusable/Header.php';

//if(isset($_GET['id']) && isset($_GET['name'])){
//    header("location: ShowStudentsEnrollment.php");
//}else{
//    header("location: ShowStudentsEnrollment.php");
//} 

?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowStudentsEnrollment.php"><i class="fa fa-arrow-circle-right"></i>Matrícula</a></li>
        <li><a href="CreateEnrollment.php"><i class="fa fa-arrow-circle-right"></i>Matricular cursos</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <!--<div class="col-md-6">-->
    <div class="box" id="schedule">

        <div class="box-header">
            <h3 class="box-title">Cursos disponibles para matrícula del estudiante: <?php echo $_GET['name'];?></h3>
        </div><!-- /.box-header -->

        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tr>
                    <th  style="width: 120px">Matrícula</th>
                    <th>Código</th>
                    <th>Módulo</th>
                    <th>Creditos</th>
                    <th>Lecciones</th>
                    <th>Período</th>
                    <th>Atinencia/Especialidad</th>
                </tr>
                <!--Codigo PHP-->
                <?php
                include '../business/CourseBusiness.php';
                $id = $_GET['id'];
                $coursesBusiness = new CourseBusiness();

                $courses = $coursesBusiness->getAll();

                foreach ($courses as $course) {
                    ?>
                    <tr>
                        <td><input value="<?php echo $course->getCourseId(); ?>" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" /></td>
                        <td><?php echo $course->getCourseCode(); ?></td>
                        <td><a href=""><?php echo $course->getCourseName(); ?></a></td>
                        <td><?php echo $course->getCourseCredits(); ?></td>
                        <td><?php echo $course->getCourseLesson(); ?></td>
                        <td><?php echo $course->getCoursePeriod(); ?></td>
                        <td><?php echo $course->getCourseSpeciality(); ?></td>
                    </tr>
                    <?php
                }
                ?> 
            </table>
        </div><!-- /.box-body -->
        <br>
        <br>
        <div class="box-footer" style="text-align: right">
            <button onclick="SetSchedule();" class="btn btn-primary">Matricular</button>
        </div>
    </div><!-- /.box -->

        <div class="box" id="schedule">

        <div class="box-header">
            <h3 class="box-title">Cursos aprobados del estudiante: <?php echo $_GET['name'];?></h3>
        </div><!-- /.box-header -->

        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tr>
                    <th>Código</th>
                    <th>Módulo</th>
                    <th>Creditos</th>
                    <th>Lecciones</th>
                    <th>Período</th>
                    <th>Atinencia/Especialidad</th>
                </tr>
                <!--Codigo PHP-->
                <?php
                foreach ($courses as $course) {
                    ?>
                    <tr>
                        <td><?php echo $course->getCourseCode(); ?></td>
                        <td><?php echo $course->getCourseName(); ?></td>
                        <td><?php echo $course->getCourseCredits(); ?></td>
                        <td><?php echo $course->getCourseLesson(); ?></td>
                        <td><?php echo $course->getCoursePeriod(); ?></td>
                        <td><?php echo $course->getCourseSpeciality(); ?></td>
                    </tr>
                    <?php
                }
                ?> 
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
    
</section><!-- /.content -->
<br>
<?php
include './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">

    function clearCheck() {
        $("input[name=check]").each(function (index) {
            if ($(this).is(':checked')) {
                $(this).prop("checked", "");
            }
        });
    }
</script>