<?php
	include "log.php";

	sendit_log( "*** Starte Download der angeforderten Datei" );

	// Upload Pfad, relativ zu dieser PHP-Datei
	$uploadPfad = "uploads/";
	
	$benutzerHash = $_GET["benutzer"];
	$dateiHash = $_GET["datei"];
	
	$ordnerArray = scandir( $uploadPfad );
	
	foreach ( $ordnerArray as $ordner )
	{
		if ( md5($ordner) == $benutzerHash )
		{
			sendit_log( "Benutzer \"$ordner\" gefunden" );
			$dateienArray = scandir($uploadPfad . $ordner);
			$benutzer = $ordner;
			
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
		// Datei senden und ggfs Admin benachrichtigen
		header( "Content-Type: application/octet-stream" );
		header( "Content-Disposition: attachment; filename=\"" . $datei . "\"" );
		header( "Content-Length: " . filesize($dateiPfad) );
		header( "Cache-Control: no-cache, must-revalidate" );
		header( "Pragma: no-cache" );
		header( "Expires: 0" );
		
		sendit_log( "Download von \"$datei\"" );
		
		if ( @readfile($dateiPfad) != false )
		{
			// Benutzer benachrichtigen
			include "send_adminmail.php";
		}
		else
		{
			sendit_log( "Download der Datei gescheitert" );
		}
	}
	else
	{
		sendit_log( "Angeforderte Datei wurde nicht gefunden" );
		sendit_log( "Download der Datei gescheitert" );
		die( "Datei nicht gefunden" );
	}
?>