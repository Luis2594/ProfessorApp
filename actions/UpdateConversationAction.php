<?php

include_once '../business/ConversationBusiness.php';

$id = $_POST['id'];
$name = $_POST['name'];

if (isset($name) && $name != "") {

    $ConversationBusiness = new ConversationBusiness();
    $Conversation = new Conversation($id, NULL, $name);

    $dataRetrived = $ConversationBusiness->getConversation($id)[0];

    if ($ConversationBusiness->update($Conversation) != 0) {
        header("location: ../view/ShowConversations.php?id=" . $dataRetrived->getForumId() . "&action=1&msg=Registro_actualizado_correctamente");
    } else {
        header("location: ../view/ShowConversations.php?id=" . $dataRetrived->getForumId() . "&action=0&msg=Actualización_fallida");
    }
} else {
    header("location: ../view/ShowConversations.php?id=" . $dataRetrived->getForumId() . "&action=0&msg=Error_en_los_datos");
}
