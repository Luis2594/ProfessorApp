<?php
session_start();
if (isset($_SESSION['id'])) {
    header("location: ./Home.php");
}

include_once '../business/InstitutionBusiness.php';

$institutionBusiness = new InstitutionBusiness();
$institution = $institutionBusiness->getInstitutionObject();
if ($institution == NULL) {
    $institution = new Institution(1, "INSTITUCION", "", "", "", "", "");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            <?php
            echo $institution->getInstitutionName();
            ?>
            | Iniciar sesión</title>
            <link rel="icon" type="image/png" href="./../resource/images/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="./../resource/images/favicon-16x16.png" sizes="16x16" />
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="./../resource/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="./../resource/css/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="./../resource/css/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="./../resource/css/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

        <!--ALERTIFY-->
        <link href="./../resource/css/alertify/themes/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="./../resource/css/alertify/alertify.css" rel="stylesheet" type="text/css" />
        <link href="./../resource/css/alertify/alertify.min.css" rel="stylesheet" type="text/css" />


    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <b>Profesores</b>
                <br />
                <?php
                echo $institution->getInstitutionName();
                ?>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Iniciar Sesión</p>
                <form id="formLogin" name="formLogin" role="form" action="../actions/LoginAction.php" method="post" >
                    <div class="form-group has-feedback">
                        <input id="user" name="user" type="text" class="form-control" placeholder="Usuario" required="true"/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input id="pass" name="pass" type="password" class="form-control" placeholder="Contraseña" required="true"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row" >
                        <div class="login-box-msg" >    

                            <div class="center-block" >
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar</button>
                            </div><!-- /.col -->
                            <div class="checkbox icheck" style="display: none">
                                <label>
                                    <!--<a href="">Olvidé mi contraseña</a><br>-->
                                </label>
                            </div>
                        </div><!-- /.col -->
                    </div>
                </form>

            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <script src="./../resource/css/plugins/jQuery/jquery-3.2.1.min.js"></script>
        <!-- jQuery 2.1.3 -->
        <script src="./../resource/css/plugins/jQuery/jQuery-2.1.3.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="./../resource/css/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="./../resource/css/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!--ALERTIFY-->
        <script src="./../resource/js/alertify/alertify.js" type="text/javascript"></script>
        <script src="./../resource/js/alertify/alertify.min.js" type="text/javascript"></script>

        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
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
</html>
