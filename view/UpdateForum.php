<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowForums.php"><i class="fa fa-arrow-circle-right"></i> Foros</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Actualizar Foro</a></li>
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
                    <h3 class="box-title">Actualizar Foro</h3>
                </div><!-- /.box-header -->
                <div class="box-footer">
                    <?php
                    include_once '../business/ForumBusiness.php';

                    $ForumBusiness = new ForumBusiness();
                    $id = $_GET['id'];
                    $Forums = $ForumBusiness->getForum($id);
                    foreach ($Forums as $current) {
                        ?>
                        <!-- form start -->
                        <form role="form" id="formUpdateForum" action="../actions/UpdateForumAction.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id" value="<?php echo $current->getId() ?>"/>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input id="name" name="name" type="text" class="form-control" value="<?php echo $current->getName() ?>" required/>
                            </div>
                        </form>
                        
                        <button onclick="valueInputs();" style="width: 49%" class="btn btn-primary">Actualizar</button>
                        
                        <button onclick="backPage();" style="width: 49%" class="btn btn-primary">Atrás</button>
                        <?php
                        break;
                    }//fin del for
                    ?>

                </div>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
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

    function valueInputs() {

        var text = $('#name').val();
        if (text.length === 0) {
            alertify.error("Verifique el nombre de su foro.");
            return false;
        }

        $("#formUpdateForum").submit();
    }

    function backPage() {
        window.location = "ShowForums.php";
    }
</script>
