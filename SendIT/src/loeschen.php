<?php
	include "log.php";

	sendit_log( "*** Starte Loeschen der angeforderten Datei" );

	// Upload Pfad, relativ zu dieser PHP-Datei
	$uploadPfad = "uploads/";
	
	$benutzerHash = $_GET["benutzer"];
	$dateiHash = $_GET["datei"];
	
	// Falls ein Trottel die Index-Datei löschen will
	if ( $dateiHash == md5( "index.php" ) )
	{
		sendit_log( "\"index.php\" wurde versucht zu loeschen" );
		die( "Netter Versuch ;o)" );
	}
	
	$ordnerArray = scandir( $uploadPfad );
	sendit_log( "Ermittle Benutzer und Datei" );
	foreach ( $ordnerArray as $ordner )
	{
		if ( md5($ordner) == $benutzerHash )
		{
			sendit_log( "Benutzer \"$ordner\" gefunden" );
			$dateienArray = scandir($uploadPfad . $ordner);
			
			foreach ( $dateienArray as $datei )
			{
				if ( md5($datei) == $dateiHash )
				{
					sendit_log( "Datei \"$datei\" gefunden" );
					$dateiName = $datei;
					$dateiPfad = $uploadPfad . $ordner . "/" . $datei;
					break;
				}
			}
		}
	}

	if ( $dateiPfad )
	{	
		// Datei löschen
		unlink($dateiPfad);
		sendit_log( "Die Datei \"$datei\" wurde erfolgreich geloescht" );
		echo "Die Datei wurde erfolgreich geloescht";
	}
	else
	{
		sendit_log( "Die Datei \"$datei\" nicht mehr vorhanden" );
		echo "Datei nicht mehr vorhanden";
	}
?>