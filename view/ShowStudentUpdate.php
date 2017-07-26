<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowStudentUpdate.php"><i class="fa fa-arrow-circle-right"></i> Actualizar Estudiantes</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Actualizar Estudiantes del Cindea</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Télefonos</th>
                                <th>Grupos</th>
                                <th>Actualizar</th>
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
                                    <td><?php echo $student->getPersonFirstName(); ?></td>
                                    <td><?php echo $student->getPersonFirstlastname(); ?></td>
                                    <td><?php echo $student->getPersonSecondlastname(); ?></td>
                                    <td><a href="UpdatePhones.php?id=<?php echo $student->getPersonId(); ?>">Télefonos</a></td>
                                    <td><a href="UpdateGroup.php?id=<?php echo $student->getPersonId(); ?>">Grupos</a></td>
                                    <td><a href="UpdateStudent.php?id=<?php echo $student->getPersonId(); ?>">Actualizar</a></td>
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
                                <th>Télefonos</th>
                                <th>Grupos</th>
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

