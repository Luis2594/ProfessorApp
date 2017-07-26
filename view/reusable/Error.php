<?php
include './reusable/Header.php';
if (isset($_GET['md5'])){
    $md5 = $_GET['md5'];
} else {
    $md5 = "Lo sentimos, inténtelo de nuevo.";
}
?>

<div class="alert alert-danger">
    <strong>Error! </strong> <?php echo $md5; ?>
</div>

<?php
include './reusable/Footer.php';
?>
