<?php
include './reusable/Session.php';
include './reusable/Header.php';
$assign = $_GET['assign'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowProfessors.php"><i class="fa fa-arrow-circle-right"></i> Profesores</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Profesores del Cindea</h3>
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
                                    <th>Correo</th>
                                    <th>Género</th>
                                    <th>Módulos</th>
                                    <?php
                                    if (isset($assign) && $assign == "assign") {
                                        ?>
                                        <th>Asignar módulos</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../business/ProfessorBusiness.php';
                                $professorBusiness = new ProfessorBusiness();
                                //capture all professor as instances of ProfessorAll
                                $professors = $professorBusiness->getAll();

                                foreach ($professors as $professor) {
                                    ?>
                                    <tr>
                                        <td><?php echo $professor->getPersonDni(); ?></td>
                                        <td><a href="InformationProfessor.php?id=<?php echo $professor->getPersonId(); ?>"><?php echo $professor->getPersonFirstName(); ?></a></td>
                                        <td><?php echo $professor->getPersonFirstlastname(); ?></td>
                                        <td><?php echo $professor->getPersonSecondlastname(); ?></td>
                                        <td><?php echo $professor->getPersonEmail(); ?></td>
                                        <?php
                                        if ($professor->getPersonGender() == "1") {
                                            ?> 
                                            <td>Hombre</td>
                                            <?php
                                        } else {
                                            ?> 
                                            <td>Mujer</td>
                                            <?php }
                                        ?>
                                        <td><a href="ShowCoursesProfessor.php?id=<?php echo $professor->getPersonId(); ?>">Módulos</a></td>
                                        <?php
                                        if (isset($assign) && $assign == "assign") {
                                            ?>
                                            <td><a href="AssignCourseToProfessor.php?id=<?php echo $professor->getPersonId(); ?>">Asignar módulos</a></td>
                                        <?php } ?>

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
                                    <th>Correo</th>
                                    <th>Género</th>
                                    <th>Módulos</th>
                                    <?php
                                    if (isset($assign) && $assign == "assign") {
                                        ?>
                                        <th>Asignar módulos</th>
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

