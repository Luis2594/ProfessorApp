<?php

include_once '../business/ConversationBusiness.php';

$id = $_POST['id'];
$text = $_POST['text'];

if(isset($text) && $text != ""){
    $ConversationBusiness = new ConversationBusiness();
    $Conversation = new Conversation($id, NULL, $text);
    
    if($business->update($Conversation) != 0){
        header("location: ../view/ShowConversation.php?action=1&msg=Registro_actualizado_correctamente");
    }else{
        header("location: ../view/ShowConversation.php?action=0&msg=RActualización_fallida");
    }
}else{
    header("location: ../view/ShowConversation.php?action=0&msg=Error_en_los_datos");
}
