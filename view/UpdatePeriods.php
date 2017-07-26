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
            <li><a href="ShowCourseUpdate.php"><i class="fa fa-arrow-circle-right"></i>Actualizar Módulos</a></li>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Actualizar Períodos</a></li>
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
                        include '../business/CourseBusiness.php';

                        $courseBusiness = new CourseBusiness();

                        $courses = $courseBusiness->getCourseIdUpdate($id);

                        foreach ($courses as $course) {
                            ?>
                            <h3 class="box-title">Actualizar períodos del módulo: <?php
                                echo $course->getCourseName();
                                ?></h3>
                        <?php } ?>

                    </div><!-- /.box-header -->

                    <!-- form start -->
                    <form role="form" id="formPeriods"  method="POST" action="../business/CreatePeriodAction.php?id=<?php echo $id; ?>">
                        <div class="box-body">

                            <?php
                            include '../business/PeriodBusiness.php';

                            $periodBusiness = new PeriodBusiness();

                            $periods = $periodBusiness->getAllPeriodsByCourse($id);

                            foreach ($periods as $period) {
                                ?>
                                <table>
                                    <tr>
                                        <td>
                                            <!--<input id="phone0" name="phone0" type="text">-->
                                            <div class="form-group">
                                                <label>Período</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input readonly="" type="text" class="form-control" value="<?php echo $period->getPeriod(); ?>" />
                                                </div><!-- /.input group -->
                                            </div><!-- /.form group -->
                                        </td>
                                        <td>
                                            <div class="btn-group-vertical"style="margin-top: 9px; margin-left: 15px;">
                                                <button  type="button" onclick="deletePeriodCourse(<?php echo $id; ?>,<?php echo $period->getPeriodid(); ?>);" class="btn btn-danger">Eliminar</button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            <?php } ?>
                            <!--ADD NEW PHONE-->
                            <h3>Agregar nuevos Períodos</h3>

                            <!--ADD PERIODS-->
                            <div class="form-group">
                                <table id="period">
                                    <tr id="tr0">
                                        <td>
                                            <input id="periods" name="periods" type="text">
                                            <div class="form-group">
                                                <label>Período</label>
                                                <select id="period0" name="period0" class="form-control">
                                                </select>
                                            </div><!-- /.form group -->
                                        </td>
                                    </tr>
                                </table>
                                <div class="btn-group-vertical">
                                    <button id="AddPeriod" onclick="addPeriod();" type="button" class="btn btn-success">Agregar período</button>
                                </div>
                            </div>

                        </div><!-- /.box-body -->

                    </form>


                    <div class="box-footer">
                        <button onclick="addPeriodCourse();" class="btn btn-primary">Actualizar períodos</button>
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

    $(function () {
        $('#periods').hide();
        period(0);
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

    function addPeriodCourse() {
        $('#periods').val(idPeriod);
        $("#formPeriods").submit();
    }

    var idPeriod = 1;
    function addPeriod() {
        var startTr = '<tr id=' + '"tr' + idPeriod + '">';
        var startTd1 = '<td>';
        var startDiv1 = '<div class=' + '"form-group"' + '>';
        var label = '<label>Período</label>';
        var select = '<select id="period' + idPeriod + '" name="period' + idPeriod + '" class="form-control" />';
        var endDiv1 = '</div>';
        var endTd1 = '</td>';
        var startTd2 = '<td>';
        var startDiv4 = "<div class=" + '"btn-group-vertical"' + 'style="margin-top: 9px; margin-left: 15px;">';
        var button = '<button id="' + 'deletePeriod' + idPeriod + '" type=' + '"button"' + ' onclick=' + '"deletePeriod(' + idPeriod + ');" class=' + '"btn btn-danger">Eliminar</button>';
        var endDiv4 = '</div>';
        var endTd2 = '</td>';
        var endTr = '</tr>';

        var scripHtml = startTr + startTd1 + startDiv1 + label + select + endDiv1 + endTd1 + startTd2 + startDiv4 + button + endDiv4 + endTd2 + endTr;

        $('#period tr:last').after(scripHtml);

        period(idPeriod);
        idPeriod++;
    }

    function deletePeriod(id) {
        $("#tr" + id).remove();
    }

    function period(id) {
        $.ajax({
            type: 'GET',
            url: "../business/GetPeriods.php",
            success: function (data)
            {
                var speciality = JSON.parse(data);
                var htmlCombo = '';
                $.each(speciality, function (i, item) {
                    htmlCombo += '<OPTION VALUE="' + item.id + '">' + item.period + '</OPTION>';
                });
                $("#period" + id).html(htmlCombo);
            },
            error: function ()
            {
                alertify.error("Error ...");
            }
        });
    }

    function deletePeriodCourse(idCourse, idPeriod) {
        window.location = "../business/DeletePeriodAction.php?idCourse=" + idCourse + "&idPeriod=" + idPeriod;
    }

</script>
