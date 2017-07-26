<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowProfessorUpdate.php"><i class="fa fa-arrow-circle-right"></i> Actualizar Profesores</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Actualizar Profesores del Cindea</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Actualizar</th>
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
                                    <td id="dni<?php echo $professor->getPersonId(); ?>"><?php echo $professor->getPersonDni(); ?></td>
                                    <td id="name<?php echo $professor->getPersonId() ?>"><a href="InformationProfessor.php?id=<?php echo $professor->getProfessorId(); ?>"><?php echo $professor->getPersonFirstName(); ?></a></td>
                                    <td id="firtsLastname<?php echo $professor->getPersonId() ?>"><?php echo $professor->getPersonFirstlastname(); ?></td>
                                    <td id="secondlastname<?php echo $professor->getPersonId() ?>"><?php echo $professor->getPersonSecondlastname(); ?></td>
                                    <td><a  href="UpdateProfessor.php?id=<?php echo $professor->getPersonId() ?>" >Actualizar</a></td>
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


