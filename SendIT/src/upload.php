<?php
	include "log.php";

	sendit_log( "*** Starte Upload der Datei ***" );

	session_start();
	// Wenn Benutzer Ordner nicht vorhanden, dann neu anlegen
	$targetPath = "uploads/" . $_SESSION["benutzer"];
	if( !is_dir($targetPath) )
	{
		if ( @mkdir($targetPath, 0777) )
		{
			sendit_log( "$targetPath wurde neu angelegt" );
		}
	}
	
	$targetFilePath = $targetPath . "/" . basename( $_FILES["datei"]["name"] );
	$targetFileSize = $_FILES["datei"]["size"];
	
	sendit_log( "Datei: $targetFilePath" );
	sendit_log( "Groesse: $targetFileSize Bytes" );
	// Datei hochladen
	if( @move_uploaded_file($_FILES["datei"]["tmp_name"], $targetFilePath) )
	{
		sendit_log( "Upload von \"$targetFilePath\" erfolgreich abgeschlossen" );
		chmod( $targetFilePath, 0755 );
		sendit_log( "Zugriffsrechte von \"$targetFilePath\" geaendert (0755)" );
		
		$result = 1;
		include "send_mail.php";
	}
	else
	{
		$result = 0;
		sendit_log( "Upload von \"$targetFilePath\" gescheitert" );
	}
?>

<script language="javascript" type="text/javascript">
	window.top.window.uploadComplete(<?php echo $result ?>);
</script>