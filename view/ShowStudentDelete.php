<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowStudentDelete.php"><i class="fa fa-arrow-circle-right"></i> Eliminar Estudiantes</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Eliminar Estudiantes del Cindea</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
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
                                <th>Eliminar</th>
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
                                    <td id="dni<?php echo $student->getPersonId() ?>"><?php echo $student->getPersonDni(); ?></td>
                                    <td id="name<?php echo $student->getPersonId() ?>"><?php echo $student->getPersonFirstName(); ?></td>
                                    <td id="firtsLastname<?php echo $student->getPersonId() ?>"><?php echo $student->getPersonFirstlastname(); ?></td>
                                    <td id="secondlastname<?php echo $student->getPersonId() ?>"><?php echo $student->getPersonSecondlastname(); ?></td>
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
                                        <td>Sin adecuación</td>
                                        <?php
                                    } else {
                                        ?> 
                                        <td>Con adecuación</td>
                                        <?php
                                    }
                                    ?> 
                                    <td><a  href="javascript:deleteConfirmation(<?php echo $student->getPersonId() ?>)" >Eliminar</a></td>
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
                                <th>Eliminar</th>
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

    function deleteConfirmation(id) {
        alertify.confirm('Eliminar estudiante', '¿Desea eliminar a ' +
                $("#name" + id).html() + " " +
                $("#firtsLastname" + id).html() + " " +
                $("#secondlastname" + id).html() + 
                " con cédula "+ $("#dni" + id).html()+ 
                " de la lista de estudiantes?", function () {
            window.location = "../business/DeleteStudentAction.php?id=" + id;
        }
        , function () {
            alertify.error('Cancelado');
        });
    }

</script>

