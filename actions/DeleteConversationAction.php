<?php

include_once './ConversationBusiness.php';

if(isset($_GET['id']) && isset($_GET['forum'])){
    $ConversationBusiness = new ConversationBusiness();
    if($ConversationBusiness->delete($_GET['id'])){
        header("location: ../view/ShowConversations.php?action=1&msg=Registro_eliminado_correctamente&id=".$_GET['forum']);
    }else{
        header("location: ../view/ShowConversations.php?action=0&msg=Error_al_eliminar_registro&id=".$_GET['forum']);
    }
}else{
    header("location: ../view/ShowConversations.php?action=0&msg=Error_al_capturar_los_datos&id=".$_GET['forum']);
}
