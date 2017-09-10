<?php
include './reusable/Session.php';
include './reusable/Header.php';
?>

<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i>Inicio</a></li>
        <li><a href="ShowNotifications.php"><i class="fa fa-arrow-circle-right"></i>Notificaciones</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Actualizar Notificación</a></li>
    </ol>
</section>
<br>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Actualizar Notificación</h3>
                </div>
                <div class="box-footer">
                    <?php
                    include '../business/NotificationBusiness.php';

                    $business = new NotificationBusiness();
                    $notifications = $business->getNotification($_GET['id']);
                    foreach ($notifications as $newComment) {
                        ?>
                        <form role="form" id="formNotification" action="../business/UpdateNotificationAction.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id" value="<?php echo $newComment->getNotificationId() ?>"/>
                            <div class="form-group">
                                <textarea id="text" name="text" class="form-control" rows="3" required="true"><?php echo $newComment->getNotificationText() ?></textarea>
                            </div>
                        </form>
                        <button onclick="valueInputs();" style="width: 49%" class="btn btn-primary">Actualizar</button>
                        <button onclick="backPage();" style="width: 49%" class="btn btn-primary">Atrás</button>
                        <?php
                        break;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>  
</section>

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

        var text = $('#text').val();
        if (text.length === 0) {
            alertify.error("Verifique el contenido de la notificación");
            return false;
        }
        
        $("#formNotification").submit();
    }

    function backPage() {
        window.location = "ShowNotifications.php";
    }
</script>
