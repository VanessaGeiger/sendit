<?php
	if ( $_SERVER["REQUEST_METHOD"] == "POST" )
	{
		session_start();
		
		$weiterleitung = "admin.php";
		
		// Benutzereingabe in Variablen speichern
		$usr_kennwort = md5( $_POST["admin_kennwort"] );
		
		$kennwortERROR = true;
		
		$adminKennwort = "098F6BCD4621D373CADE4E832627B4F6";
		
		if ( $usr_kennwort == $adminKennwort )
		{
			header( "Location:" . $weiterleitung );
			$_SESSION["admin"] = true;
		}
		else
		{
			$kennwortERROR = true;
		}
	}
?>