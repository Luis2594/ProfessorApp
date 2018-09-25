<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';
$course = (int) $_GET['course'];
$group = (int) $_GET['group'];
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Estudiantes</a></li>
        <li><a href="ShowGroupsList.php"><i class="fa fa-arrow-circle-right"></i> Ver Grupos de Estudiantes</a></li>
    </ol>
</section>
<br>
<!-- Main content -->
<section class="content">
    <div class="row">

        <!--SHOW MODULES TO PROFESSOR-->
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header row col-md-12">
                    <div class="pull-left col-md-6">
                        <h3 class="box-title">Generar informe de asistencia
                    </div>
                </div>

                <div class="box-header row col-md-12">
                    <div class="pull-left col-md-6 text-left left">
                        <div class="col-md-4">
                            <select class="btn btn-info btn-sm" style="width: 100%" id="filterMonth">
                                <option value="0">Mes</option>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="btn btn-info btn-sm" style="width: 100%" id="filterPeriod">
                                <option value="0">Periodo</option>
                                <option value="1">I</option>
                                <option value="2">II</option>
                                <option value="3">III</option>
                                <option value="4">IV</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="btn btn-info btn-sm" style="width: 100%" id="filterYear">
                                <option value="0">Año</option>
                                <?php
                                include_once '../business/FiltersBusiness.php';
                                $filtersBusiness = new FiltersBusiness();
                                $years = $filtersBusiness->getCoursesYears();

                                foreach ($years as $tmpYear) {
                                    ?>
                                    <option value="<?php echo $tmpYear; ?>" ><?php echo $tmpYear; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="box-header row col-md-12">
                    <div class="col-md-6">
                        <button onclick="generateInfo();" class="btn btn-primary btn-sm" style="width: 100%" id="search">Filtrar</button>
                    </div>
                </div>
            </div>
        </div><!-- /.col -->

    </div><!-- /.row -->
</section><!-- /.content -->
<?php
include_once './reusable/Footer.php';
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
        };
    })(jQuery);

    function generateInfo() {

        var month = $('#filterMonth').val();
        var period = $('#filterPeriod').val();
        var year = $('#filterYear').val();
        var course = <?php echo $course; ?>;
        var group =  <?php echo $group; ?>;
        var id = <?php echo $_SESSION['id']; ?>;
        
        if (month == 0 || period == 0 || year == 0){
            alertify.error("Seleccione los filtros...");
        }else{
            open("../reporter/Attendance.php?month=" + month + 
                "&period=" + period + 
                "&year=" + year + 
                "&id=" + id + 
                "&course=" + course + 
                "&group=" + group );
        }
        
    }

</script>