<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';

$id = (int) $_SESSION['id'];

if (isset($id) && is_int($id)) {
    ?>

    <!-- Content Header (Page header) -->
    <section class="content-header" style="text-align: left">
        <ol class="breadcrumb">
            <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
            <li><a href="ShowProfile.php"><i class="fa fa-arrow-circle-right"></i> Perfil Profesor</a></li>
            <li><a href="#"><i class="fa fa-arrow-circle-right"></i> Actualizar Teléfonos</a></li>
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
                        <?php
                        include_once './business/PersonBusiness.php';
                        include_once '../domain/Person.php';

                        $personBusiness = new PersonBusiness();
                        $currentPerson = $personBusiness->getPersonId($id)[0];

                        if ($currentPerson == NULL) {
                            header("location: ./Login.php");
                        }
                        
                        foreach ($currentPerson as $current) {
                            ?>
                            <h3 class="box-title">Teléfonos de <?php
                                echo $current->getPersonFirstName()
                                . " " . $current->getPersonFirstlastname()
                                . " " . $current->getPersonSecondlastname();
                                ?></h3>
                        <?php } ?>

                    </div><!-- /.box-header -->

                    <!-- form start -->
                    <form role="form" id="f"  method="POST" action="../actions/CreatePhoneAction.php?id=<?php echo $id; ?>">
                        <div class="box-body">
                            <h3>Teléfonos Registrados</h3>
                            <?php
                            include_once '../business/PhoneBusiness.php';

                            $phoneBusiness = new PhoneBusiness();

                            $phones = $phoneBusiness->getAllPhone($id);

                            foreach ($phones as $phone) {
                                ?>
                                <table>
                                    <tr>
                                        <td>
                                            <!--<input id="phone0" name="phone0" type="text">-->
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-phone"></i>
                                                    </div>
                                                    <input readonly="" type="number" class="form-control" value="<?php echo $phone->getPhonePhone(); ?>" />
                                                </div><!-- /.input group -->
                                            </div><!-- /.form group -->
                                        </td>
                                        <td>
                                            <div class="btn-group-vertical"style="margin-top: -15px; margin-left: 15px;">
                                                <button  type="button" onclick="deletePhonePerson(<?php echo $id; ?>,<?php echo $phone->getPhoneId(); ?>);" class="btn btn-danger">Eliminar</button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            <?php } ?>
                            <!--ADD NEW PHONE-->
                            <h3>Agregar Teléfonos</h3>

                            <!--ADD PHONES-->
                            <table id="phone">
                                <tr id="tr0">
                                    <td>
                                        <input id="phones" name="phones" type="text">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <input id="phone0" name="phone0" type="number" class="form-control"  required="" />
                                            </div><!-- /.input group -->
                                        </div><!-- /.form group -->
                                    </td>
                                </tr>
                            </table>
                            <div class="btn-group-vertical" style="width: 100%">
                                
                            </div>

                        </div><!-- /.box-body -->

                    </form>

                    <div class="box-footer">
                        <button style="width: 33%" id="AddPhone" onclick="addPhone();" type="button" class="btn btn-success">Nuevo</button>
                        <button style="width: 32%" onclick="addPhonePerson();" class="btn btn-primary">Guardar</button>
                        <button style="width: 33%" onclick="goBack();" class="btn btn-default">Volver</button>
                    </div>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->

    <?php
}
include_once './reusable/Footer.php';
?>

<script type="text/javascript">
    $("#phones").hide();
    var idPhone = 1;

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

    function addPhonePerson() {
        for (var i = 0; i < idPhone; i++) {
            if ($("#phone" + i).val() === "" || !isInteger($("#phone" + i).val())) {
                alertify.error("Revise los números de teléfonos que quiere registrar!");
                return false;
            }
        }
        $('#phones').val(idPhone);
        $("#f").submit();
    }

    function isInteger(number) {
        if (number % 1 === 0) {
            return true;
        } else {
            return false;
        }
    }

    function addPhone() {
        var startTr = '<tr id=' + '"tr' + idPhone + '">';
        var startTd1 = '<td>';
        var startDiv1 = '<div class=' + '"form-group"' + '>';
        var startDiv2 = '<div class="' + 'input-group"' + '>';
        var startDiv3 = '<div class="' + 'input-group-addon"' + '>';
        var i = '<i class="' + 'fa fa-phone" ></i>';
        var endDiv3 = '</div>';
        var input = '<input id="phone' + idPhone + '" name="phone' + idPhone + '" type="number" class="form-control" required=' + '"" />';
        var endDiv2 = '</div>';
        var endDiv1 = '</div>';
        var endTd1 = '</td>';
        var startTd2 = '<td>';
        var startDiv4 = "<div class=" + '"btn-group-vertical"' + 'style="margin-top: -15px; margin-left: 15px;">';
        var button = '<button id="' + 'deletePhone' + idPhone + '" type=' + '"button"' + ' onclick=' + '"deletePhone(' + idPhone + ');" class=' + '"btn btn-danger">Eliminar</button>';
        var endDiv4 = '</div>';
        var endTd2 = '</td>';
        var endTr = '</tr>';

        var scripHtml = startTr + startTd1 + startDiv1 + startDiv2 + startDiv3 + i + endDiv3 + input + endDiv2 + endDiv1 + endTd1 + startTd2 + startDiv4 + button + endDiv4 + endTd2 + endTr;

        $('#phone tr:last').after(scripHtml);

        idPhone++;
    }

    function deletePhone(id) {
        $("#tr" + id).remove();
        idPhone--;
    }

    function deletePhonePerson(idPerson, idPhoneDelete) {
        window.location = "../actions/DeletePhoneAction.php?idPerson=" + idPerson + "&idPhone=" + idPhoneDelete;
    }
    
    function goBack(){
        window.location = "./ShowProfile.php";
    }

</script>
