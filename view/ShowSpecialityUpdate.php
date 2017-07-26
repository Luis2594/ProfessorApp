<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowSpecialityUpdate.php"><i class="fa fa-arrow-circle-right"></i> Actualizar Atinencia/Especialidad</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Actualizar Atinencia/Especialidad del Cindea</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Atinencia/Especialidad</th>
                                <th>Actualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../business/SpecialityBusiness.php';
                            $specialityBusiness = new SpecialityBusiness();
                            
                            $specialities = $specialityBusiness->getAll();
                            
                            foreach ($specialities as $speciality) {
                                ?>
                                <tr>
                                    <td><?php echo $speciality->getSpecialityName(); ?></td>
                                    <td><a href="UpdateSpeciality.php?id=<?php echo $speciality->getSpecialityId(); ?>">Actualizar</a></td>
                                </tr>
                                <?php
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Atinencia/Especialidad</th>
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
</script>

