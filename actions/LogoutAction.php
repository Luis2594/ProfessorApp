<?php
session_start(); //to ensure you are using same session
session_unset(); // remove all session variables
session_destroy(); //destroy the session
header("location: ../view/Login.php"); //to redirect back to "login.php" after logout
exit();