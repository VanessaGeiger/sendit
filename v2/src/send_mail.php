<?php
	include "log.php";

	sendit_log( "*** Starte Versand der E-Mail Benachrichtigung [UPLOAD] ***" );

	session_start();
	
	// E-Mail Header
	$benutzerName = $_SESSION["name"];
	$benutzerEmail = $_SESSION["email"];
	
	$empfaengerSerial = implode( ", ", $_POST["empfaenger"] );
	
	sendit_log( "Absender: $benutzerName" );
	sendit_log( "Empfaenger: $empfaengerSerial" );

	$mailHeader  = "From: $benutzerName <$benutzerEmail>\n";
	$mailHeader .= "MIME-Version: 1.0\n";
	$mailHeader .= "X-Mailer: PHP v" . phpversion() . "\n";
	$mailHeader .= "Content-Transfer-Encoding: 8bit\n";
	$mailHeader .= "Content-Type: text/html; charset=UTF-8";

	// E-Mail Betreff
	$mailBetreff = $_POST["betreff"];
	
	// Download Link zusammensetzen
	$serverName = $_SERVER["SERVER_NAME"];
	$skriptPfadArray = split( "/", $_SERVER["PHP_SELF"] );
	array_pop( $skriptPfadArray );
	$skriptPfad = implode( "/", $skriptPfadArray );
	
	$downloadHash = md5( $_FILES["datei"]["name"] );
	$benutzerHash = md5( $_SESSION["benutzer"] );
	$downloadLink = "http://" . $serverName . $skriptPfad ."/download.php?benutzer=" . $benutzerHash . "&datei=" . $downloadHash;

	// E-Mail Body
	//$mailBody  = nl2br(htmlspecialchars($_POST["nachricht"], ENT_COMPAT | ENT_XHML, 'ISO-8859-1'));
	$mailBody  = nl2br(htmlentities($_POST["nachricht"], ENT_COMPAT | ENT_XHML, 'ISO-8859-1'));
	$mailBody .= "<br /><br /><br /><b>Downloadlink:</b><br /><a href='{$downloadLink}'>{$_FILES['datei']['name']}</a><br /><br />";
	$mailBody .= "Sollten Sie keine HTML-Mails empfangen k&ouml;nnen, kopieren Sie den folgenden Link in ihren Internet Browser:<br />";
	$mailBody .= "$downloadLink";
	// E-Mail versenden
	if( @mail($empfaengerSerial, $mailBetreff, $mailBody, $mailHeader) ) {
		$result = 1;
	sendit_log( "E-Mail erfolgreich versandt" );
	} else {
		$result = 0;
      sendit_log( "Senden der E-Mail gescheitert" );
	}
?>