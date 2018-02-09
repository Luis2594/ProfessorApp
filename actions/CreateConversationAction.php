<?php

include_once '../business/ConversationBusiness.php';

$professor = $_POST['name'];
$forum = $_POST['forum'];

if (isset($professor) && $professor != "" && isset($forum)) {
    $business = new ConversationBusiness();
    $conv = new Conversation(NULL, $forum, $professor);

    if ($business->insert($conv) != 0) {
        header("location: ../view/ShowConversations.php?action=1&msg=Registro_creado_correctamente&id=" . $forum);
    } else {
        header("location: ../view/CreateConversation.php?action=0&msg=Registro_fallido&id=" . $forum);
    }
} else {
    header("location: ../view/CreateConversation.php?action=0&msg=Error_en_los_datos&id=" . $forum);
}
