<?php
include './reusable/Header.php';
require '../resource/log/ErrorHandler.php';
//ErrorHandler::Log(__METHOD__, "algo", $_SESSION["id"]);
?>


<div class="row special v-m" style="height:100vh; display:table; width:100%; margin-right:auto; vertical-align:middle">
    <img src="../resource/images/cindeaTurrialba.ico" class="img-responsive img-circle center-block "/>
</div>

<?php
include './reusable/Footer.php';
?>

<script>
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