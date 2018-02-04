<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowForums.php"><i class="fa fa-arrow-circle-right"></i> Foros</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Conversacies</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Crear Conversación</a></li>
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
                    <h3 class="box-title">Crear Conversación</h3>
                </div><!-- /.box-header -->
                <div class="box-footer">
                    <form role="form" id="formCreateConversation" action="../business/CreateConversationAction.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            
                            <?php
                            include_once '../business/ForumBusiness.php';
                            $business = new ForumBusiness();
                            $forum = $business->getForum($_GET['id']);
                            echo '<label>'.$forum[0]->getName().'</label>';
                            echo '<input name="forum" value="'.$forum[0]->getId().'" type="hidden"/>';
                            ?>
                                   
                        </div>
                        <div class="form-group">
                            <label>Conversación</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Nombre" required/>
                        </div>
                    </form>

                    <button onclick="valueInputs();" class="btn btn-primary" style="width: 100%">Crear Conversación</button>
                </div>
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include './reusable/Footer.php';
?>

<script type="text/javascript">

    function valueInputs() {
        var notify = $('#name').val();
        if (notify.length === 0) {
            alertify.error("Verifique el título de su conversación");
            return false;
        }

        $("#formCreateConversation").submit();
    }
    
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