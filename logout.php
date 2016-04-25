<?php
	require_once("includes/sessions.php");
	session_start();
	unset($_SESSION['login']);
	session_unset();
	session_destroy();
	header("Location: login.php");
?>