<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Ver Horario</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="box" id="schedule">

        <div class="box-body no-padding">
            <div class="table-responsive">
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
                            <span id="s-1-1"></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-1-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-1-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-1-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-1-5" ></span>
                        </td>
                    </tr>
                    <!--HOUR 7:40AM - 8:20AM-->
                    <tr>
                        <td>7:40am-8:20am</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-2-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-2-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-2-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-2-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-2-5" ></span>
                        </td>
                    </tr>
                    <!--HOUR 8:20AM - 9:00AM-->
                    <tr>
                        <td>8:20am-9:00am</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-3-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-3-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-3-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-3-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-3-5" ></span>
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
                            <span id="s-4-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-4-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-4-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-4-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-4-5" ></span>
                        </td>
                    </tr>
                    <!--HOUR 9:50AM - 10:30AM-->
                    <tr>
                        <td>9:50am-10:30am</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-5-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-5-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-5-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-5-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-5-5" ></span>
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
                            <span id="s-6-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-6-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-6-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-6-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-6-5" ></span>
                        </td>
                    </tr>
                    <!--HOUR 11:20AM - 12:00MM-->
                    <tr>
                        <td>11:20am-12:00mm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-7-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-7-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-7-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-7-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-7-5" ></span>
                        </td>
                    </tr>
                    <!--HOUR 12:00MM - 12:40MM-->
                    <tr>
                        <td>12:00am-12:40mm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-8-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-8-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-8-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-8-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-8-5" ></span>
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
                    <!--HOUR 12:20:00MM - 1:00PM-->
                    <tr>
                        <td>12:20mm-1:00pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-9-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-9-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-9-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-9-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-9-5" ></span>
                        </td>
                    </tr>
                    <!--HOUR 1:00PM - 1:40PM-->
                    <tr>
                        <td>1:00pm-1:40pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-10-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-10-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-10-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-10-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-10-5" ></span>
                        </td>
                    </tr>
                    <!--HOUR 1:40PM - 2:20PM-->
                    <tr>
                        <td>1:40pm-2:20pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-11-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-11-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-11-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-11-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-11-5" ></span>
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
                    <!--HOUR 2:30PM - 3:10PM-->
                    <tr>
                        <td>2:30pm-3:10pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-12-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-12-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-12-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-12-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-12-5" ></span>
                        </td>
                    </tr>
                    <!--HOUR 3:10PM - 3:50PM-->
                    <tr>
                        <td>3:10pm-3:50pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-13-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-13-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-13-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-13-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-13-5" ></span>
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
                    <!--HOUR 4:00PM - 4:40PM-->
                    <tr>
                        <td>4:00pm-4:40pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-14-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-14-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-14-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-14-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-14-5" ></span>
                        </td>
                    </tr>
                    <!--HOUR 4:40PM - 5:20PM-->
                    <tr>
                        <td>4:40pm-5:20pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-15-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-15-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-15-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-15-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-15-5" ></span>
                        </td>
                    </tr>
                    
                    <!--BREAK-->
                    <tr>
                        <td bgcolor="gray" >NOCHE</td>
                        <!--MONDAY-->
                        <td bgcolor="gray" >NOCHE</td>
                        <!--TUESDAY-->
                        <td bgcolor="gray" >NOCHE</td>
                        <!--WEDNESDAY-->
                        <td bgcolor="gray" >NOCHE</td>
                        <!--THURSDAY-->
                        <td bgcolor="gray" >NOCHE</td>
                        <!--FRIDAY-->
                        <td bgcolor="gray" >NOCHE</td>
                    </tr>
                    
                    <!--NIGHT-->
                    <!--HOUR 5:30PM - 6:05PM-->
                    <tr>
                        <td>5:30PM-6:05pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-16-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-16-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-16-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-16-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-16-5" ></span>
                        </td>
                    </tr>
                    <!--HOUR 6:05PM - 6:40PM-->
                    <tr>
                        <td>6:05pm-6:40pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-17-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-17-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-17-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-17-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-17-5" ></span>
                        </td>
                    </tr>
                    <!--HOUR 6:40PM - 7:15PM-->
                    <tr>
                        <td>6:40pm-7:15pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-18-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-18-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-18-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-18-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-18-5" ></span>
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
                    <!--HOUR 7:25PM - 8:00PM-->
                    <tr>
                        <td>7:25pm-8:00pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-19-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-19-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-19-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-19-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-19-5" ></span>
                        </td>
                    </tr>
                    <!--HOUR 8:00PM - 8:35PM-->
                    <tr>
                        <td>8:00pm-8:35pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-20-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-20-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-20-3" ></span>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-20-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-20-5" ></span>
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
                    <!--HOUR 8:40PM - 9:15PM-->
                    <tr>
                        <td>8:40pm-9:15pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-21-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-21-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-21-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-21-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-21-5" ></span>
                        </td>
                    </tr>
                    <!--HOUR 9:15PM - 9:50PM-->
                    <tr>
                        <td>9:15pm-9:50pm</td>
                        <!--MONDAY-->
                        <td>
                            <span id="s-22-1" ></span>
                        </td>
                        <!--TUESDAY-->
                        <td>
                            <span id="s-22-2" ></span>
                        </td>
                        <!--WEDNESDAY-->
                        <td>
                            <span id="s-22-3" ></span>
                        </td>
                        <!--THURSDAY-->
                        <td>
                            <span id="s-22-4" ></span>
                        </td>
                        <!--FRIDAY-->
                        <td>
                            <span id="s-22-5" ></span>
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div><!-- /.box-body -->
        <br>
        <br>
    </div><!-- /.box -->
    <!--</div> /.col -->

</section><!-- /.content -->
<br>
<?php
include_once './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">
    
    schedule();

    function schedule() {
        $.ajax({
            type: 'POST',
            url: "../business/GetScheduleByProfessor.php",
            success: function (data)
            {
                var schedules = JSON.parse(data);
                var bool = false;
                $.each(schedules, function (i, item) {
                    bool = true;
                    $("#s-" + item.groupschedulehour + "-" + item.groupscheduleday).html(item.coursecode);
                });

                if (!bool) {
                    alertify.error("Ups! No se ha establecido ningun horario para usted!");
                }
            },
            error: function ()
            {
                alertify.error("Error de horario...");
            }
        });
    }

    function clearSpan() {
        for (var i = 1; i < 23; i++) {
            $("#s-" + i + "-1").html("");
            $("#s-" + i + "-2").html("");
            $("#s-" + i + "-3").html("");
            $("#s-" + i + "-4").html("");
            $("#s-" + i + "-5").html("");
        }
    }

</script>

