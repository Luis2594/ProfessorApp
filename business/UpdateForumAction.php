<?php

include_once '../business/ForumBusiness.php';

$id = $_POST['id'];
$text = $_POST['name'];

if(isset($id) && isset($text) && $text != ""){
    $forumBusiness = new ForumBusiness();
    $forum = new Forum($id, $text,NULL, NULL, NULL, NULL, NULL, NULL );
    
    if($forumBusiness->update($forum) != 1){
        header("location: ../view/ShowForums.php?action=1&msg=Registro_actualizado_correctamente");
    }else{
        header("location: ../view/ShowForums.php?action=0&msg=Actualización_fallida");
    }
}else{
    //error
    header("location: ../view/ShowForums.php?action=0&msg=Error_en_los_datos");
}
