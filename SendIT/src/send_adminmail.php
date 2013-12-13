<?php
	include "log.php";

	sendit_log( "*** Starte Versand der E-Mail Benachrichtigung [DOWNLOAD] ***" );

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
	if ( $benutzerDaten[$benutzer] )
	{
		$adminName = $benutzerDaten[$benutzer]["name"];
		$adminMail = $benutzerDaten[$benutzer]["email"];
	}
	
	$benutzer = $benutzerDaten[$benutzer]["benutzer"];
	sendit_log( "Benutzer: $benutzer" );
	sendit_log( "E-Mail: $adminMail" );
	sendit_log( "Datei: $dateiName" );

	// E-Mail Header
	$mailHeader  = "From: $adminName <$adminMail>\n";
	$mailHeader .= "MIME-Version: 1.0\n";
	$mailHeader .= "X-Mailer: PHP v" . phpversion() . "\n";
	$mailHeader .= "Content-Transfer-Encoding: 8bit\n";
	$mailHeader .= "Content-Type: text/html; charset=iso-8859-1";
	
	// E-Mail Betreff
	$mailBetreff = "[SendIT] Die Datei $dateiName wurde heruntergeladen...";
	
	// E-Mail Text
	$serverName = $_SERVER["SERVER_NAME"];
	$skriptPfadArray = split( "/", $_SERVER["PHP_SELF"] );
	array_pop( $skriptPfadArray );
	$skriptPfad = implode( "/", $skriptPfadArray );
	
	$loeschenLink = "http://" . $serverName . $skriptPfad ."/loeschen.php?benutzer=" . $benutzerHash . "&datei=" . $dateiHash;
	
	$mailBody  = "Hallo $adminName,<br /><br />soeben wurde die Datei <b>$dateiName</b> heruntergeladen.<br /><br />Wenn die Datei nicht mehr ben&ouml;tigt wird, k&ouml;nnen Sie sie &uuml;ber folgenden Link l&ouml;schen:<br />";
	$mailBody .= "<a href='$loeschenLink'>$dateiName <b>l&ouml;schen</b></a>";
	$mailBody .= "<br /><br /><br />Viele Gr&uuml;&szlig;e<br />Ihr SendIT Team";
	
	if ( @mail($adminMail, $mailBetreff, $mailBody, $mailHeader) )
	{
		sendit_log( "E-Mail wurde versandt" );
	}
	else
	{
		sendit_log( "E-Mail Versand gescheitert" );
	}
?>