<?php
	require_once('./PHP/initialize.php');

	UNSET($_SESSION['set']);
	header("Location:index.php");
?>