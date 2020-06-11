<?php require_once('./PHP/initialize.php'); ?>
<?php if (!isset($_SESSION['set'])) {
	header("Location:login.php");
}
?>