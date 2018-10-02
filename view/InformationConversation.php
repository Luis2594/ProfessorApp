<?php
include_once './reusable/Session.php';
include_once './reusable/Header.php';
?>

<!-- Content Header (Page header) -->
<section class="content-header" style="text-align: left">
    <ol class="breadcrumb">
        <li><a href="Home.php"><i class="fa fa-arrow-circle-right"></i> Inicio</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Foro</a></li>
        <li><a href="#"><i class="fa fa-arrow-circle-right"></i>Conversación</a></li>
    </ol>
</section>
<br>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <div class="box box-primary" >
                <?php
                $id = $_GET['id'];
                $forumId = $_GET['forum'];
                include_once '../business/ConversationBusiness.php';
                $conversationsBusiness = new ConversationBusiness();
                $conversation = $conversationsBusiness->getConversation($id)[0];

                include_once '../business/ForumBusiness.php';
                $forumBusiness = new ForumBusiness();
                $forum = $forumBusiness->getForum($forumId);
                ?>

                <div class="box-header">
                    <h3 class="box-title"><b><?php echo $forum[0]->getName(); ?></b></h3><br/><br/>
                    <h1 class="box-title"><?php echo $conversation->getForumConversation() ?></h1>
                </div><!-- /.box-header -->
                <div style="overflow-y:scroll;height: 70%">
                    <?php
                    include_once '../business/CommentBusiness.php';
                    $commentBusiness = new CommentBusiness();
                    $comments = $commentBusiness->getCommentsByConversation($id);
                    foreach ($comments as $comment) {
                        ?>
                        <div class="box-footer">
                            <div class="form-group">
                                <label><?php echo $comment->getPerson(); ?></label>
                            </div>
                            <div class="form-group">
                                <textarea style="resize: none;" class="form-control" rows="3" disabled><?php echo $comment->getComment(); ?></textarea>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box-footer box-title">
                <label>Nuevo Comentario</label>
                <form role="form" id="formCreateComment" action="../actions/CreateCommentAction.php" method="POST" enctype="multipart/form-data">
                    <input hidden="true" value="<?php echo $id; ?>" name="conversation"/>
                    <input hidden="true" value="<?php echo $_SESSION['id']; ?>" name="person"/>
                    <input hidden="true" value="<?php echo $forumId; ?>" name="forum"/>
                    <div class="form-group">
                        <textarea id="comment" name="comment" class="form-control" rows="3" placeholder="Comentario" required="true"></textarea>
                    </div>
                </form>

                <button onclick="valueInputs();" class="btn btn-primary" style="width: 100%" id="send">Comentar</button>
            </div>
        </div>
    </div>   <!-- /.row -->
</section><!-- /.content -->

<?php
include_once './reusable/Footer.php';
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
        var notify = $('#comment').val();
        if (notify.length === 0) {
            alertify.error("Verifique el texto de su comentario.");
            return false;
        }

        $("#formCreateComment").submit();
    }

</script>
