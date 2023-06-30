<?php

	session_start();

	unset($_SESSION['phone_number']);
	unset($_SESSION['email']);
	session_destroy();

	header("Location: index.php");
	exit;
?>
