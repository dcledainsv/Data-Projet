<?php
	session_start();
	$_SESSION = array();
	session_destroy();
	header("Location: ../index.php?id=1");
?>