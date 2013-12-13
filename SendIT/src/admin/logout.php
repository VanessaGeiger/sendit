<?php
	session_start();
	
	if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true) {
		$_SESSION = array();
		session_destroy();
		header ("Location: index.php"); 
	}
?>