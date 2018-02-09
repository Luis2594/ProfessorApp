<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="ShowForums.php"><i class="fa fa-arrow-circle-right"></i> Foros</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Foros</h3>
                    <a type="button" class="btn btn-primary pull-right" href="CreateForum.php">Añadir Foro</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Curso</th>
                                <th>Conversaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once '../business/ForumBusiness.php';
                            include_once '../business/CourseBusiness.php';
                            $forumBusiness = new ForumBusiness();
                            $courseBusiness = new CourseBusiness();
                            $forums = $forumBusiness->getForumByProfessor($_SESSION['id']);
                            foreach ($forums as $current) {
                                $resultCourses = $courseBusiness->getCourseId($current->getCourse());
                                $myCourse = $resultCourses[0];
                                ?>
                                <tr>
                                    <td><?php echo $current->getName(); ?></td>
                                    <td><?php echo $myCourse->getCourseName(); ?></td>
                                    <td>
                                        <a href="ShowConversations.php?id=<?php echo $current->getId(); ?>">Conversaciones</a>
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-primary" href="javascript:updateForum(<?php echo $current->getId() ?>)">Actualizar</a>
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-danger" href="javascript:deleteForum(<?php echo $current->getId() ?>)">Eliminar</a>
                                    </td>
                                </tr>

                                <?php
                            }
                            ?> 
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Curso</th>
                                <th>Conversaciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<?php
include_once './reusable/Footer.php';
?>

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
    });


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

    function updateForum(id) {
        window.location = "UpdateForum.php?id=" + id;
    }

    function deleteForum(id) {
        alertify.confirm('Eliminar Foro', '¿Desea eliminar?', function () {
            window.location = "../actions/DeleteForumAction.php?id=" + id;
        }
        , function () {
            alertify.error('Cancelado');
        });
    }
</script>

