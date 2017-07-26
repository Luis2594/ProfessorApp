<?php
include './reusable/Session.php';
include './reusable/Header.php';

$assign = $_GET['assign'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowCurriculum.php"><i class="fa fa-arrow-circle-right"></i> Maya curricular</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Malla Curricular del Cindea</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Año</th>
                                <th>Nombre</th>
                                <th>Módulos</th>
                                <?php
                                if (isset($assign) && $assign == 'assign') {
                                    ?>
                                    <th>Asignar módulos</th>
                                    <?php
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../business/CurriculumBusiness.php';
                            $curriculumBusiness = new CurriculumBusiness();

                            $curriculums = $curriculumBusiness->getAll();

                            foreach ($curriculums as $curriculum) {
                                ?>
                                <tr>
                                    <td><?php echo $curriculum->getCurriculumYear(); ?></td>
                                    <td><a href="InformationCurriculum.php?id=<?php echo $curriculum->getCurriculumId(); ?>"><?php echo $curriculum->getCurriculumName(); ?></a></td>
                                    <td><a href="ShowCoursesCurriculum.php?id=<?php echo $curriculum->getCurriculumId(); ?>">Módulos</a></td>
                                    <?php
                                    if (isset($assign) && $assign == 'assign') {
                                        ?>
                                    <td><a href="AssignCourseToCurriculum.php?id=<?php echo $curriculum->getCurriculumId() ?>">Asignar módulos</a></td>
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
                                <th>Año</th>
                                <th>Nombre</th>
                                <th>Módulos</th>
                                <?php
                                if (isset($assign) && $assign == 'assign') {
                                    ?>
                                    <th>Asignar módulos</th>
                                    <?php
                                }
                                ?>
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

