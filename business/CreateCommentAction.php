<?php

include_once '../business/CommentBusiness.php';

$conversation = $_POST['conversation'];
$person = $_POST['person'];
$comment = $_POST['comment'];
$forum = $_POST['forum'];

if (isset($conversation) 
        && isset($person) 
        && isset($forum) 
        && isset($comment) && $comment != "") {

    $business = new CommentBusiness();
    $newComment = new Comment(NULL, $comment, $conversation, $person);

    if ($business->insert($newComment) != 0) {
        header("location: ../view/InformationConversation.php?action=1&msg=Registro_creado_correctamente&id=".$conversation."&forum=".$forum);
    } else {
        header("location: ../view/InformationConversation.php?action=0&msg=Registro_de_comentario_fallido&id=".$conversation."&forum=".$forum);
    }
} else {
    header("location: ../view/InformationConversation.php?action=0&msg=Error_en_los_datos_del_comentario&id=".$conversation."&forum=".$forum);
}
