<?php
include './reusable/Session.php';
include './reusable/Header.php';
$id = (int) $_GET['id'];
if (isset($id) && is_int($id)) {
    ?>

    <!-- Content Header (Page header) -->
    <section class="content-header" style="text-align: left">
        <ol class="breadcrumb">
            <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
            <li><a href="ShowStudentUpdate.php"><i class="fa fa-arrow-circle-right"></i>Actualizar Estudiante</a></li>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Actualizar Grupos</a></li>
        </ol>
    </section>
    <br>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <?php
                        include '../business/PersonBusiness.php';

                        $personBusiness = new PersonBusiness();

                        $persons = $personBusiness->getPersonId($id);

                        foreach ($persons as $person) {
                            ?>
                            <h3 class="box-title">Actualizar grupos de: <?php
                                echo $person->getPersonFirstName()
                                . " " . $person->getPersonFirstlastname()
                                . " " . $person->getPersonSecondlastname();
                                ?></h3>
                        <?php } ?>

                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="formGroup" action="../business/UpdateGroupAction.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                        <div class="box-body">

                            <?php
                            include '../business/GroupBusiness.php';

                            $groupBusiness = new GroupBusiness();

                            $groups = $groupBusiness->getGroupByPerson($id);

                            foreach ($groups as $group) {

                                if ($group->getPriority() == 1) {
                                    ?>
                                    <!--MAIN GROUP-->
                                    <div class="form-group">
                                        <label>Grupo con mayor carga académica</label>
                                        <input id="mainGroupTemp" name="mainGroupTemp" readonly="" value="<?php echo $group->getGroupid(); ?>" />
                                        <input readonly="" value="<?php echo $group->getGroupnumber(); ?>" class="form-control" />
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <!--MAIN GROUP-->
                                    <div class="form-group">
                                        <label>Grupo secundario</label>
                                        <input id="secundaryGroupTemp" name="secundaryGroupTemp" readonly="" value="<?php echo $group->getGroupid(); ?>" />
                                        <input readonly="" value="<?php echo $group->getGroupnumber(); ?>" class="form-control" />
                                    </div>
                                    <?php
                                }
                            }
                            ?>

                            <h3>Actualizar grupos</h3>

                            <!--MAIN GROUP-->
                            <div class="form-group">
                                <label>Grupo con mayor carga académica</label>
                                <select id="mainGroup" name="mainGroup" class="form-control">
                                </select>
                            </div>

                            <!--SECUNDARY GROUP-->
                            <div class="form-group">
                                <label>Grupo secundario</label>
                                <select id="secundaryGroup" name="secundaryGroup" class="form-control">
                                </select>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                    <div class="box-footer">
                        <button onclick="updateGroup();" class="btn btn-primary">Actualizar</button>
                    </div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->

    <?php
}
include './reusable/Footer.php';
?>

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

    (function () {
        $("#mainGroupTemp").hide();
        $("#secundaryGroupTemp").hide();
        groups();
    })();

    function groups() {
        $.ajax({
            type: 'GET',
            url: "../business/GetGroups.php",
            success: function (data)
            {
                var group = JSON.parse(data);
                var htmlCombo = '';
                var htmlMainGroup = '<OPTION VALUE="-1">Seleccionar grupo principal</OPTION>';
                htmlMainGroup += '<OPTION VALUE="0">Eliminar grupo principal</OPTION>';
                var htmlSecundaryGroup = '<OPTION VALUE="-1">Seleccionar grupo secunadario</OPTION>';
                htmlSecundaryGroup += '<OPTION VALUE="0">ELiminar grupo secundario</OPTION>';
                var bool = 0;
                $.each(group, function (i, item) {
                    bool = 1;
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.number + '</OPTION>';
                });

                htmlMainGroup += htmlCombo;
                $("#mainGroup").html(htmlMainGroup);
                htmlSecundaryGroup += htmlCombo;
                $("#secundaryGroup").html(htmlSecundaryGroup);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function updateGroup() {
        if ($("#mainGroup").val() == 0) {
            alertify.confirm('Eliminar Grupo principal', '¿Desea eliminar el grupo principal?', function () {
                $("#formGroup").submit();
            }
            , function () {
                return;
            });
        }

        if ($("#secundaryGroup").val() == 0) {
            alertify.confirm('Eliminar Grupo secunadario', '¿Desea eliminar el grupo secundario?', function () {
                $("#formGroup").submit();
            }
            , function () {
                return;
            });
        }

        if ($("#mainGroup").val() == 0 && $("#secundaryGroup").val() == 0) {
            alertify.confirm('Eliminar Grupos', '¿Desea eliminar ambos grupos?', function () {
                $("#formGroup").submit();
            }
            , function () {
                return;
            });
        }

        if ($("#mainGroup").val() > 0 || $("#secundaryGroup").val() > 0) {
            $("#formGroup").submit();
        }
    }

</script>
