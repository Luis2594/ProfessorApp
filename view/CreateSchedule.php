<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="CreateSchedule.php"><i class="fa fa-arrow-circle-right"></i> Crear Horario</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <!--<div class="row">-->
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- select -->
            <div class="form-group">
                <label>Módulo</label>
                <select id="course" name="course" class="form-control">
                    <option value="-1">Seleccione Módulo</option>
                    <option value="1">I</option>
                    <option value="2">II</option>
                    <option value="3">III</option>
                </select>
            </div>
            <div class="form-group" id="divProfessor">
                <label>Profesor</label>
                <select id="professor" name="professor" class="form-control">
                    <option value="-1">Seleccione Profesor</option>
                    <option value="1">Luis</option>
                    <option value="2">Kevin</option>
                    <option value="3">Julio</option>
                </select>
            </div>
        </div>
    </div>

    <!--<div class="col-md-6">-->
    <div class="box" id="schedule">
        
        <div class="box-footer" style="text-align: right">
            <button onclick="SetSchedule();" class="btn btn-primary">Establecer horario</button>
        </div>
        
        <div class="box-header">
            <h3 class="box-title" id="nameCourse"></h3>
        </div><!-- /.box-header -->
        
        <div class="box-body no-padding">
            <table class="table table-condensed">
                <tr>
                    <th style="width: 120px">Hora / Día</th>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Miercoles</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                </tr>
                <!--MORNING-->
                <!--HOUR 7:00AM - 7:40AM-->
                <tr>
                    <td>7:00am-7:40am</td>
                    <!--MONDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="1-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="1-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="1-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="1-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="1-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                </tr>
                <!--HOUR 7:40AM - 8:20AM-->
                <tr>
                    <td>7:40am-8:20am</td>
                    <!--MONDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="2-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="2-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="2-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="2-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="2-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                </tr>
                <!--HOUR 8:20AM - 9:00AM-->
                <tr>
                    <td>8:20am-9:00am</td>
                    <!--MONDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="3-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="3-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="3-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="3-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="3-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                </tr>
                <!--BREAK-->
                <tr>
                    <td bgcolor="gray" >RECREO</td>
                    <!--MONDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--TUESDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--WEDNESDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--THURSDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--FRIDAY-->
                    <td bgcolor="gray" >RECREO</td>
                </tr>
                <!--HOUR 9:10AM - 9:50AM-->
                <tr>
                    <td>9:10am-9:50am</td>
                    <!--MONDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="4-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="4-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="4-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="4-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="4-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                </tr>
                <!--HOUR 9:50AM - 10:30AM-->
                <tr>
                    <td>9:50am-10:30am</td>
                    <!--MONDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="5-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="5-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="5-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="5-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="5-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                </tr>
                <!--BREAK-->
                <tr>
                    <td bgcolor="gray" >RECREO</td>
                    <!--MONDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--TUESDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--WEDNESDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--THURSDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--FRIDAY-->
                    <td bgcolor="gray" >RECREO</td>
                </tr>
                <!--HOUR 10:40AM - 11:20AM-->
                <tr>
                    <td>10:40am-11:20am</td>
                    <!--MONDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="6-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="6-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="6-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="6-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="6-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                </tr>
                <!--HOUR 11:20AM - 12:00MM-->
                <tr>
                    <td>11:20am-12:00mm</td>
                    <!--MONDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="7-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="7-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="7-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="7-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="7-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                </tr>
                <!--BREAK-->
                <tr>
                    <td bgcolor="gray" >ALMUERZO</td>
                    <!--MONDAY-->
                    <td bgcolor="gray" >ALMUERZO</td>
                    <!--TUESDAY-->
                    <td bgcolor="gray" >ALMUERZO</td>
                    <!--WEDNESDAY-->
                    <td bgcolor="gray" >ALMUERZO</td>
                    <!--THURSDAY-->
                    <td bgcolor="gray" >ALMUERZO</td>
                    <!--FRIDAY-->
                    <td bgcolor="gray" >ALMUERZO</td>
                </tr>

                <!--AFTERNOON-->
                <!--HOUR 12:30:00MM - 1:10PM-->
                <tr>
                    <td>12:30mm-1:10pm</td>
                    <!--MONDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="8-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="8-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="8-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="8-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="8-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                </tr>
                <!--HOUR 1:10PM - 1:50PM-->
                <tr>
                    <td>1:10pm-1:50pm</td>
                    <!--MONDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="9-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="9-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="9-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="9-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="9-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                </tr>
                <!--HOUR 1:50PM - 2:30PM-->
                <tr>
                    <td>1:50pm-2:30pm</td>
                    <!--MONDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="10-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="10-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="10-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="10-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="10-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                </tr>
                <!--BREAK-->
                <tr>
                    <td bgcolor="gray" >RECREO</td>
                    <!--MONDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--TUESDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--WEDNESDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--THURSDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--FRIDAY-->
                    <td bgcolor="gray" >RECREO</td>
                </tr>
                <!--HOUR 2:40PM - 3:20PM-->
                <tr>
                    <td>2:40pm-3:20pm</td>
                    <!--MONDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="11-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="11-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="11-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="11-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="11-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                </tr>
                <!--HOUR 3:20PM - 4:00PM-->
                <tr>
                    <td>3:20pm-4:00pm</td>
                    <!--MONDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="12-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="12-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="12-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="12-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="12-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                </tr>
                <!--BREAK-->
                <tr>
                    <td bgcolor="gray" >RECREO</td>
                    <!--MONDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--TUESDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--WEDNESDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--THURSDAY-->
                    <td bgcolor="gray" >RECREO</td>
                    <!--FRIDAY-->
                    <td bgcolor="gray" >RECREO</td>
                </tr>
                <!--HOUR 4:10PM - 4:50PM-->
                <tr>
                    <td>4:10pm-4:50pm</td>
                    <!--MONDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="13-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="13-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="13-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="13-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="13-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                </tr>
                <!--HOUR 4:50PM - 5:30PM-->
                <tr>
                    <td>4:50pm-5:30pm</td>
                    <!--MONDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="14-1" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--TUESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="14-2" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--WEDNESDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="14-3" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--THURSDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="14-4" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                    <!--FRIDAY-->
                    <td>
                        <!-- checkbox -->
                        <input value="14-5" type="checkbox" name="check" style="width: 20px; height: 20px; text-align: center" />
                    </td>
                </tr>
            </table>
        </div><!-- /.box-body -->
        
        <div class="col-md-6">
            <!-- select -->
            <div class="form-group">
                <label id="nameCourse1"></label>
            </div>
        </div>
        <br>
        <br>
        <div class="box-footer" style="text-align: right">
            <button onclick="SetSchedule();" class="btn btn-primary">Establecer horario</button>
        </div>
    </div><!-- /.box -->
    <!--</div> /.col -->

</section><!-- /.content -->
<br>
<?php
include './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">
    $("#schedule").hide();
    $("#divProfessor").hide();

    $('#course').on('change', function () {
        if ($(this).val() !== "-1") {
            $('#nameCourse').html("Módulo: " + $('#course option:selected').html() + "<br>Profesor: " + $('#professor option:selected').html());
            $('#nameCourse1').html("Módulo: " + $('#course option:selected').html() + "<br>Profesor: " + $('#professor option:selected').html());
            $("#divProfessor").show();
            clearCheck();
        } else {
            $('#professor > option[value="-1"]').attr('selected', 'selected');
            $("#divProfessor").hide();
            $("#schedule").hide();
        }
    }
    );

    $('#professor').on('change', function () {
        if ($(this).val() !== "-1") {
            $('#nameCourse').html("Módulo: " + $('#course option:selected').html() + "<br>Profesor: " + $('#professor option:selected').html());
            $('#nameCourse1').html("Módulo: " + $('#course option:selected').html() + "<br>Profesor: " + $('#professor option:selected').html());
            $("#schedule").show();
            clearCheck();
        } else {
            $("#schedule").hide();
        }
    }
    );

    function clearCheck() {
        $("input[name=check]").each(function (index) {
            if ($(this).is(':checked')) {
                $(this).prop("checked", "");
            }
        });
    }
    
    function SetSchedule(){
        
        if($('#course').val() === "-1"){
            alertify.error("Seleccione un módulo");
            return false;
        }
        
        if($('#professor').val() === "-1"){
            alertify.error("Seleccione un profesor");
            return false;
        }
        
        var bool = false;
        var schedule = "";
        
        $("input[name=check]").each(function (index) {
            if ($(this).is(':checked')) {
                bool = true;
                schedule += $(this).val() + ",";
            }
        });
        
        if(!bool){
            alertify.error("Seleccione al menos una clase");
            return false;
        }
        
        schedule = schedule.substr(0,schedule.length - 1);
        
        alert(schedule);
        
        //insertar en BD
        
    }


</script>

