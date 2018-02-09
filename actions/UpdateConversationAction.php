<?php

include_once '../business/ConversationBusiness.php';

$id = $_POST['id'];
$professor = $_POST['text'];

if(isset($professor) && $professor != ""){
    $ConversationBusiness = new ConversationBusiness();
    $Conversation = new Conversation($id, NULL, $professor);
    
    if($business->update($Conversation) != 0){
        header("location: ../view/ShowConversation.php?action=1&msg=Registro_actualizado_correctamente");
    }else{
        header("location: ../view/ShowConversation.php?action=0&msg=RActualización_fallida");
    }
}else{
    header("location: ../view/ShowConversation.php?action=0&msg=Error_en_los_datos");
}
