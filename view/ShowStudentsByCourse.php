<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';

if (isset($_GET['course']))
    $courseID = (int) $_GET['course'];

if (isset($_GET['group']))
    $groupID = (int) $_GET['group'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Ver módulos</a></li>
    </ol>
</section>
<br>

<?php
if (is_int($courseID) && is_int($groupID)) {
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!--SHOW MODULES RELATED TO PROFESSOR-->
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <?php
                        include_once '../business/CourseBusiness.php';

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
                            <a type="button" class="btn btn-primary pull-right" href="#">Generar informe de asistencia</a>
                            <?php
                            break;
                        }
                        ?>
                    </div>
                    <div class="box-body">
                        <table id="studentsList" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cédula</th>
                                    <th>Teléfono</th>
                                    <th>Presente</th>
                                    <th>Ausente</th>
                                    <th>Justificación</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <?php
                                $students = $business->getStudentsListByCourseAndProfessor($courseID, $groupID);
                                foreach ($students as $person) {
                                    ?>
                                    <tr>
                                        <td><?php echo $person[0]; ?></td>
                                        <td><?php echo $person[1]; ?></td>
                                        <td><?php echo $person[2]; ?></td>
                                        <td>
                                            <input value="person" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                                        </td>
                                        <td>
                                            <input value="person" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                                        </td>
                                        <td>
                                            <textarea>
                                                
                                            </textarea>
                                        </td>

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
                                    <th>Presente</th>
                                    <th>Ausente</th>
                                    <th>Justificación</th>
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
include_once './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#studentsList").dataTable();
    });

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

    var action = $.get("action");
    var msg = $.get("msg");
    if (action === "1") {
        msg = msg.replace(/_/g, " ");
        alertify.success(msg);
    }
    if (action === "0") {
        msg = msg.replace(/_/g, " ");
        alertify.error(msg);
    }
</script>

