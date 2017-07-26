<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowStudentsEnrollment.php"><i class="fa fa-arrow-circle-right"></i> Matrícula</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Matrícula</h3>
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
                                    <th>Grupo</th>
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
                                        <td><a href="CreateEnrollment.php?id=<?php echo $student->getPersonId(); ?>&name=<?php echo $student->getPersonFirstName() . " " . $student->getPersonFirstlastname() . " " . $student->getPersonSecondlastname(); ?>"><?php echo $student->getPersonFirstName(); ?></a></td>
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
                                        ?> 

                                        <?php
                                        if ($student->getStudentAdecuacy() == "0") {
                                            ?> 
                                            <td>No</td>
                                            <?php
                                        } else {
                                            ?> 
                                            <td>Si</td>
                                            <?php
                                        }
                                        ?> 
                                        <td><?php echo $student->getStudentgroup(); ?></td>
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
                                    <th>Grupo</th>
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

