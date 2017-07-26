<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ExistingEnrollment.php"><i class="fa fa-arrow-circle-right"></i> Matrícula existente de Estudiantes</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Estudiantes del Cindea</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Adecuación</th>
                                <th>Grupo</th>
                                <th>Actualizar matrícula</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../business/StudentBusiness.php';
                            $studentBusiness = new StudentBusiness();
                            
                            $students = $studentBusiness->getAll();
                            
                            foreach ($students as $student) {
                                ?>
                                <tr>
                                    <td><?php echo $student->getCourseCode(); ?></td>
                                    <td><?php echo $student->getCourseName(); ?></td>
                                    <td><?php echo $student->getCourseCredits(); ?></td>
                                    <td><?php echo $student->getCourseLesson(); ?></td>
                                    <td><?php echo $student->getCoursePeriod(); ?></td>
                                    <td><?php echo $student->getCourseSpeciality(); ?></td>
                                    <td><a href="">Actualizar matrícula</a></td>
                                </tr>
                                <?php
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Adecuación</th>
                                <th>Grupo</th>
                                <th>Actualizar matrícula</th>
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

