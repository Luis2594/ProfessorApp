<?php 

session_start();

if (!isset($_SESSION['id'])) {
    header("location: ./Login.php");
}
if (!isset($_SESSION['type'])) {
    header("location: ./Login.php");
}
if (!isset($_SESSION['name'])) {
    header("location: ./Login.php");
}
if (!isset($_SESSION['img'])) {
    header("location: ./Login.php");
}
?>

