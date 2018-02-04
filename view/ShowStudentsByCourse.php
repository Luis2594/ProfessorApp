<?php
include './reusable/Session.php';
include './reusable/Header.php';
$courseID = (int) $_GET['course'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Ver módulos</a></li>
    </ol>
</section>
<br>

<?php
if (isset($courseID) && is_int($courseID)) {
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!--SHOW MODULES RELATED TO PROFESSOR-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <?php
                        include '../business/CourseBusiness.php';

                        $business = new CourseBusiness();

                        $courses = $business->getCourseId($courseID);
                        foreach ($courses as $item) {
                            ?>
                            <h3 class="box-title">
                                <b>
                                    <?php
                                    echo $item->getCourseName();
                                    ?>
                                </b>
                                
                            </h3>
                        <a type="button" class="btn btn-primary pull-right" href="../tools/export_data/ExportStudentsList.php?course=<?php echo $courseID;?>&professor=<?php echo $_SESSION['id'];?>">Exportar</a>
                        <?php break; } ?>
                    </div>
                    <div class="box-body">
                        <table id="studentsList" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cédula</th>
                                    <th>Teléfono</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <?php 
                                $students = $business->getStudentsListByCourseAndProfessor($courseID, $_SESSION['id']);
                                foreach ($students as $person){
                                    ?>
                                    <tr>
                                    <td><?php echo $person[0]; ?></td>
                                    <td><?php echo $person[1]; ?></td>
                                    <td><?php echo $person[2]; ?></td>
                                    </tr>    
                                    <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cédula</th>
                                    <th>Teléfono</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div><!-- /.col -->

        </div><!-- /.row -->
    </section><!-- /.content -->

    <?php
}
include './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">
    (function ($) {
        $.get = function (key) {
            key = key.replace(/[\[]/, '\\[');
            key = key.replace(/[\]]/, '\\]');
            var pattern = "[\\?&]" + key + "=([^&#]*)";
            var regex = new RegExp(pattern);
            var url = unescape(window.location.href);
            var results = regex.exec(url);
            if (results === null) {
                return null;
            } else {
                return results[1];
            }
        }
    })(jQuery);
    
    $(function () {
        $("#studentsList").dataTable();
    });
</script>

