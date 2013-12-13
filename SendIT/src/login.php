<?php
	if ( $_SERVER["REQUEST_METHOD"] == "POST" )
	{
		session_start();
		
		$weiterleitung = "sendit20.php";
		
		// Benutzereingabe in Variablen speichern
		$usr_benutzer = $_POST["benutzer"];
		$usr_kennwort = md5( $_POST["kennwort"] );
		
		$benutzerERROR = 1;
		$kennwortERROR = 1;
		
		//----------------------------------------------------------------------//
		// Der nachfolgende Block liest eine txt-Datei mit Benutzerdaten aus  	//
		// und vergleicht diese mit der Benutzereingabe.					  	//
		// Dieser Teil muss durch bei einer Datenbankanbindung geändert werden	//
		// Die Datei muss mit einem UTF-8 Zeichensatz codiert werden			//
		//----------------------------------------------------------------------//
		
		// Benutzerdaten-Datei (benutzer.txt) auslesen und Daten in Array speichern
		$benutzer_datei = "benutzer.usr";
		$datei = fopen($benutzer_datei, "r");
		$i = 0;
		while ( !feof($datei) )
		{
			$benutzerArray[$i] = utf8_decode( fgets($datei) );
			$i++;
		}
		fclose($datei);
		
		// Alle Benutzerdaten in Array speichern
		for ( $i = 0; $i < count($benutzerArray); $i++ )
		{
			$benutzerDatenArray = split( ":", $benutzerArray[$i] );
			
			$benutzerDaten[$benutzerDatenArray[0]]["benutzer"] = $benutzerDatenArray[0];
			$benutzerDaten[$benutzerDatenArray[0]]["kennwort"] = $benutzerDatenArray[1];
			$benutzerDaten[$benutzerDatenArray[0]]["name"] = $benutzerDatenArray[2];
			$benutzerDaten[$benutzerDatenArray[0]]["email"] = $benutzerDatenArray[3];
		}

		// Nach vorhandenen Benutzer suchen und mit Eingabe vergleichen
		// Wenn Benutzer gefunden Variable auf false setzen und
		// Benutzereingabe mit entsprechendem Kennwort vergleichen
		if ( $benutzerDaten[$usr_benutzer] )
		{
			$benutzerERROR = 0;
			
			if ( $benutzerDaten[$usr_benutzer]["kennwort"] == $usr_kennwort )
			{
				$kennwortERROR = 0;
				
				// Session Variablen setzen
		    	$_SESSION["angemeldet"] = true;
		    	$_SESSION["benutzer"] = $benutzerDaten[$usr_benutzer]["benutzer"];
		    	$_SESSION["kennwort"] = $benutzerDaten[$usr_benutzer]["kennwort"];
		    	$_SESSION["name"] = $benutzerDaten[$usr_benutzer]["name"];
		    	$_SESSION["email"] = $benutzerDaten[$usr_benutzer]["email"];
				
				header( "Location:" . $weiterleitung );
			}
		}

		header( "Location: ../index.php?benutzerERROR=$benutzerERROR&kennwortERROR=$kennwortERROR" );
		//--------------------------------------------------------------------
	}
?>