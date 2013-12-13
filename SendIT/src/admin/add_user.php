<?php
	if ( $_SERVER["REQUEST_METHOD"] == "POST" )
	{
		// Benutzereingabe in Variablen speichern
		$benutzer = $_POST["benutzer"];
		$kennwort = md5( $_POST["kennwort"] );
		$name = $_POST["name"];
		$email = $_POST["email"];
		
		if ( $benutzer !== "" && $kennwort !== "" && $name !== "" && $email !== "" )
		{
			$eintrag = utf8_encode( "\n" . $benutzer . ":" . $kennwort . ":" . $name . ":" . $email . ":" );
			
			$dateiPfad = "../benutzer.usr";
			$datei = fopen($dateiPfad, "a");
			fwrite($datei, $eintrag);
			fclose($datei);
			
			$uploadPfad = "../uploads/" . $benutzer;
			$stdIndexPfad = "../index.php";
			
			if( !is_dir($uploadPfad) )
			{
				mkdir($uploadPfad, 0777);
			}
			
			copy( $stdIndexPfad, $uploadPfad . "/index.php");
			
			echo "erfolg";
			
			//header( "Location: admin.php" );
		}
		else
		{
			echo "fehler";
		}
	}
?>