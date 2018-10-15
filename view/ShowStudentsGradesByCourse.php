<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';

$course = (int) $_GET['course'];
$professor = (int) $_GET['professor'];
$year = (int) $_GET['year'];
$period = (int) $_GET['period'];
$group = (int) $_GET['group'];

$params = "course=" . $course .
            "&professor=" . $professor .
            "&year=" . $year .
            "&period=" . $period .
            "&group=" . $group;
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Módulos</a></li>
        <li><a href="ShowCoursesLists.php"><i class="fa fa-arrow-circle-right"></i> Ver Estudiantes</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Calificaciones</a></li>
    </ol>
</section>
<br>

<?php
if (isset($course) && is_int($course) && isset($professor) && is_int($professor) && isset($year) && is_int($year) && isset($year) && is_int($year) && isset($group) && is_int($group)) {
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

                        $courses = $business->getCourseId($course);
                        foreach ($courses as $item) {
                            ?>
                            <h3 class="box-title">
                                <b> 
                                    Calificaciones:
                                </b>
                                <?php
                                    echo $item->getCourseName();
                                ?>
                            </h3>
                            <a type="button" class="btn btn-info btn-sm pull-right" title="Exportar datos a archivo EXCEL."
                            href="../actions/ExportStudentsGradesByCourseAndProfessorAction.php?<?php echo $params; ?>">Exportar</a>
                            <a type="button" class="btn btn-info btn-sm pull-right" title="Generar reporte." style="margin-left:5px;margin-right:5px;" 
                            href="#">Reporte</a>
                            <?php
                            break;
                        }
                        ?>
                    </div>
                    <div class="table-responsive">
                        <div class="box-body">
                            <table id="studentsList" class="table table-bordered table-striped" style="width:100%">
                                <thead style="font-size: 11px;">
                                    <tr>
                                        <th >Nombre</th>
                                        <!-- <th >Nivel</th> -->
                                        <th >Cotidiano 30%</th>
                                        <th >Tareas 10%</th>
                                        <th >Pruebas 30%</th>
                                        <th >Proyecto 20%</th>
                                        <th >Asistencia 10%</th>
                                        <th >Convocatoria I</th>
                                        <th style="font-size: 11px;" >Convocatoria II</th>
                                        <th >Promoción</th>
                                        <th >Nota</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody" style="font-size: 12px;">
                                    <?php
                                    $rows = $business->getStudentsGradesByCourseAndProfessor($course, $professor, $period, $year, $group);
                                    foreach ($rows as $row) {
                                        ?>
                                        <tr>
                                            <td ><label><?php echo $row[0]; ?></label><input hidden value="<?php echo $row[1]; ?>" id="level_<?php echo $row[11]; ?>"/></td>
                                            <td><input min="0" max="30" style="width:80px;text-align: right;" step="0.01" id="classWork_<?php echo $row[11]; ?>" name="classWork_<?php echo $row[11]; ?>" type="number" value="<?php echo $row[2]; ?>"/></td>
                                            <td><input min="0" max="10" style="width:80px;text-align: right;" step="0.01" id="homeWork_<?php echo $row[11]; ?>" name="homeWork_<?php echo $row[11]; ?>" type="number" value="<?php echo $row[3]; ?>"/></td>
                                            <td><input min="0" max="30" style="width:80px;text-align: right;" step="0.01" id="test_<?php echo $row[11]; ?>" name="test_<?php echo $row[11]; ?>" type="number" value="<?php echo $row[4]; ?>"/></td>
                                            <td><input min="0" max="20" style="width:80px;text-align: right;" step="0.01" id="projects_<?php echo $row[11]; ?>" name="projects_<?php echo $row[11]; ?>" type="number" value="<?php echo $row[5]; ?>"/></td>
                                            <td><input min="0" max="10" style="width:80px;text-align: right;" step="0.01" id="atendance_<?php echo $row[11]; ?>" name="atendance_<?php echo $row[11]; ?>" type="number" value="<?php echo $row[6]; ?>"/></td>
                                            <td><input min="0" max="100" style="width:80px;text-align: right;" step="0.01" id="recovery1_<?php echo $row[11]; ?>" name="recovery1_<?php echo $row[11]; ?>" type="number" value="<?php echo $row[7]; ?>"/></td>
                                            <td><input min="0" max="100" style="width:80px;text-align: right;" step="0.01" id="recovery2_<?php echo $row[11]; ?>" name="recovery2_<?php echo $row[11]; ?>" type="number" value="<?php echo $row[8]; ?>"/></td>
                                            <td><input min="0" max="100" style="width:80px;text-align: right;" step="0.01" id="promotion_<?php echo $row[11]; ?>" name="promotion_<?php echo $row[11]; ?>" type="number" value="<?php echo $row[9]; ?>"/></td>
                                            <td><input min="0" max="100" style="width:80px;text-align: right;" id="finalgrade_<?php echo $row[11]; ?>" name="finalgrade_<?php echo $row[11]; ?>" type="number" value="<?php echo $row[10]; ?>" readonly/></td>
                                        </tr>    
                                        <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot style="font-size: 11px;">
                                    <tr>
                                        <th >Nombre</th>
                                        <!-- <th >Nivel</th> -->
                                        <th >Cotidiano 30%</th>
                                        <th >Tareas 10%</th>
                                        <th >Pruebas 30%</th>
                                        <th >Proyecto 20%</th>
                                        <th >Asistencia 10%</th>
                                        <th >Convocatoria I</th>
                                        <th style="font-size: 11px;">Convocatoria II</th>
                                        <th >Promoción</th>
                                        <th >Nota</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
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
    $(document).ready(function () {
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

    $( "input[type='number']" ).change(function() {
        //configure data
        var id = this.id.split("_")[1];
        var updateType = this.id.split("_")[0];
        var urlString = "../actions/GradesUpdateAction.php?action="+updateType+"&<?php echo $params; ?>";
        
        //min validation
        if ($( this ).val() < 0){
            $( this ).val(0)
        }

        //max validation
        switch(updateType){
            case "classWork":
                if ($(this).val() > 30) {
                    $(this).val(30);
                }
                break;
            case "homeWork":
                if ($( this ).val() > 10) {
                    $( this ).val(10);
                }
                break;
            case "test":
                if ($( this ).val() > 30) {
                    $( this ).val(30);
                }
                break;            
            case "projects":
                if ($( this ).val() > 20) {
                    $( this ).val(20);
                }
                break;            
            case "atendance":
                if ($( this ).val() > 10) {
                    $( this ).val(10);
                }
                break;            
            case "recovery1":
                if ($( this ).val() > 100) {
                    $( this ).val(100);
                }
                break;            
            case "recovery2":
                if ($( this ).val() > 100) {
                    $( this ).val(100);
                }
                break;            
            case "promotion":
                if ($( this ).val() > 100) {
                    $( this ).val(100);
                }
                break;
            default://final grade
                if ($( this ).val() > 100) {
                    $( this ).val(100);
                }
                break;
        }

        //ajax save
        var request = $.ajax({
                type: 'POST',
                url: urlString,
                data: {id:id, data:$( this ).val()},
            });

        //information output
        request.done(function(msg) {
            if (updateType != "finalgrade"){
                alertify.success("Guardado", 1);
            }
        });

        request.fail(function(jqXHR, textStatus) {
            alertify.error("Error"  + jqXHR.toString(), 1.5);
        });

        //final grade update
        if ("finalgrade" != updateType){
            if ($("#promotion_"+id).val() > 0){//in case of promotion
                $("#finalgrade_"+id).val($("#promotion_"+id).val());
                //fire change event to save the final grade
                var element = document.getElementById("finalgrade_"+id);
                var event = new Event('change');
                element.dispatchEvent(event);
            }else{//if no promotion
                if ($("#recovery2_"+id).val() > 0){//in case of recovery 2
                    $("#finalgrade_"+id).val($("#recovery2_"+id).val());
                    //fire change event to save the final grade
                    var element = document.getElementById("finalgrade_"+id);
                    var event = new Event('change');
                    element.dispatchEvent(event);
                }else{//if no recovery
                    if ($("#recovery1_"+id).val() > 0){//in case of recovery 1
                        $("#finalgrade_"+id).val($("#recovery1_"+id).val());
                        //fire change event to save the final grade
                        var element = document.getElementById("finalgrade_"+id);
                        var event = new Event('change');
                        element.dispatchEvent(event);
                    }else{//if no recovery
                        //normal procedure to save final grade
                        var resul = parseInt($("#classWork_"+id).val(), 10)+
                        parseInt($("#homeWork_"+id).val(), 10)+
                        parseInt($("#test_"+id).val(), 10)+
                        parseInt($("#projects_"+id).val(), 10)+
                        parseInt($("#atendance_"+id).val(), 10);
                        $("#finalgrade_"+id).val(resul);

                        //fire change event to save the final grade
                        var element = document.getElementById("finalgrade_"+id);
                        var event = new Event('change');
                        element.dispatchEvent(event);
                    }
                }
            }
        }

        debugger;
        //configure color
        if ($("#level_"+id).val().substring(0, 3) == "III"){
            if (parseInt($("#finalgrade_"+id).val()) >= 70){
                $("#finalgrade_"+id).css("background-color", "#00cc00");
            }else{
                $("#finalgrade_"+id).css("background-color", "#ff471a");
            }
        }else{
            if (parseInt($("#finalgrade_"+id).val()) >= 65){
                $("#finalgrade_"+id).css("background-color", "#00cc00");
            }else{
                $("#finalgrade_"+id).css("background-color", "#ff471a");
            }
        }
    });
</script>

