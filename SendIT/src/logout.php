<?php
	session_start();
	
	if(isset($_SESSION["angemeldet"]) && $_SESSION["angemeldet"] == true) {
		$_SESSION = array();
		session_destroy();
		header ("Location: ../index.php"); 
	}
?>