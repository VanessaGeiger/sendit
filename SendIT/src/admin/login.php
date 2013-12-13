<?php
	if ( $_SERVER["REQUEST_METHOD"] == "POST" )
	{
		session_start();
		
		$weiterleitung = "admin.php";
		
		// Benutzereingabe in Variablen speichern
		$usr_kennwort = md5( $_POST["admin_kennwort"] );
		
		$kennwortERROR = true;
		
		$adminKennwort = "6fea825e7fec5e2f5071edbe1f74d170";
		
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