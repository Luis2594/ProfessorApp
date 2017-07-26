<?php
include './reusable/Session.php';
include './reusable/Header.php';
$enrollment = $_GET['enrollment'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowStudents.php"><i class="fa fa-arrow-circle-right"></i> Estudiantes</a></li>
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
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Cédula</th>
                                    <th>Nombre</th>
                                    <th>Primer Apellido</th>
                                    <th>Segundo Apellido</th>
                                    <th>Edad</th>
                                    <th>Género</th>
                                    <th>Adecuación</th>
                                    <th>Historial Académico</th>
                                    <?php
                                    if (isset($enrollment) && $enrollment == "enrollment") {
                                        ?>
                                        <th>Matrícular</th>
                                    <?php } ?>
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
                                        <td><?php echo $student->getPersonDni(); ?></td>
                                        <td><a href="InformationStudent.php?id=<?php echo $student->getPersonId(); ?>"><?php echo $student->getPersonFirstName(); ?></a></td>
                                        <td><?php echo $student->getPersonFirstlastname(); ?></td>
                                        <td><?php echo $student->getPersonSecondlastname(); ?></td>
                                        <td><?php echo $student->getPersonAge(); ?></td>
                                        <?php
                                        if ($student->getPersonGender() == "1") {
                                            ?> 
                                            <td>Hombre</td>
                                            <?php
                                        } else {
                                            ?> 
                                            <td>Mujer</td>
                                            <?php
                                        }

                                        if ($student->getStudentAdecuacy() == "0") {
                                            ?>
                                            <td>Sin adecuación</td>
                                            <?php
                                        }

                                        if ($student->getStudentAdecuacy() == "1") {
                                            ?>
                                            <td>No significativa</td>
                                            <?php
                                        }

                                        if ($student->getStudentAdecuacy() == "2") {
                                            ?>
                                            <td>Significativa</td>
                                            <?php
                                        }?>
                                            <td><a href="AcademicHistorial.php?id=<?php echo $student->getPersonId(); ?>">Historial Académico</a></td>
                                        <?php    
                                        if (isset($enrollment) && $enrollment == "enrollment") {
                                            ?>
                                            <td><a href="Enrollment.php?id=<?php echo $student->getPersonId(); ?>">Matrícular</a></td>
                                            <?php
                                        }
                                        ?>
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
                                    <th>Edad</th>
                                    <th>Género</th>
                                    <th>Adecuación</th>
                                    <th>Historial Académico</th>
                                    <?php
                                    if (isset($enrollment) && $enrollment == "enrollment") {
                                        ?>
                                        <th>Matrícular</th>
                                    <?php } ?>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
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

