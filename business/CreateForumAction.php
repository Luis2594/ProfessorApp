<?php
include_once '../business/ForumBusiness.php';
include_once '../business/CourseBusiness.php';
session_start();
$text = $_POST['forumName'];
$course = $_POST['course'];
$group = $_POST['group'];
        
if (isset($text) && $text != "" && isset($course) && isset($group)) {
    if ((int)$course != -1) {
        $forumBusiness = new ForumBusiness();
        $courseBusiness = new GroupBusiness();
        $forum = new Forum(NULL, $text , $course, $courseBusiness->getGroupByNumber($group)->getGroupid(), $_SESSION['id']);
        if ($forumBusiness->insert($forum) != 0) {
            header("location: ../view/ShowForums.php?action=1&msg=Registro_creado_correctamente");
        } else {
            header("location: ../view/CreateForum.php?action=0&msg=Registro_fallido");
        }
    } else {
        header("location: ../view/CreateForum.php?action=0&msg=No_tiene_cursos_registrados.");
    }
} else {
    header("location: ../view/CreateForum.php?action=0&msg=Error_en_los_datos");
}
