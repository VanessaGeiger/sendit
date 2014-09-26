<?php
	session_start();
	// Eindeutige ID für Dateiupload festlegen
	$uid = uniqid();
	// Wenn nicht angemeldet, dann redirect zur Startseite (Login)
	if( !$_SESSION["angemeldet"] )
	{
		header( "Location: index.php" );
	}
	
	// Maximale Dateigröße für Upload ermitteln
	function maxDateiGroesse()
	{
		$maxUpload = ini_get( "upload_max_filesize" );
		$maxPost = ini_get( "post_max_size" );
		if ( $maxPost < $maxUpload )
		{
			return $maxPost;
		}
		else
		{
			return $maxUpload;
		}
	}
	
	$maxDateiGroesse = maxDateiGroesse();
	
	$benutzer_name = $_SESSION["name"];
	$benutzer_mail = $_SESSION["email"];
	
	$standardBetreff = "Eine neue Datei liegt f&uuml;r Sie bereit...";
	$standardText = "Guten Tag,\n\nes liegt f&uuml;r Sie eine neue Datei zum herunterladen bereit. Klicken Sie auf den unten folgenden Link, um die Datei herunterzuladen.\n\n\nMit freundlichen Gr&uuml;&szlig;en\n".$benutzer_name;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
	<head>
		<title>SendIT 2.0 - send it by SendIT - Otterbach IT</title>
		<script src="skripte/jquery-1.6.2.min.js" type="text/javascript"></script>
		<script src="skripte/ott-ui-script.js" type="text/javascript"></script>
		<script src="skripte/sendit_script.js" type="text/javascript"></script>
		<link href="css/ott-ui-style.css" rel="stylesheet" type="text/css" />
		<link href="css/sendit_style.css" rel="stylesheet" type="text/css" />
		
		<script type="text/javascript">
			$(document).ready(function() {
				set_uid("<?php echo $uid ?>");
			});
		</script>
	</head>
	<body>
		<div id="topbar">
			<div id="logout">
				<div id="topbar_user">
					<div id="ui-icon-user-dark" class="ui-icon"></div>
					<span><?php echo $benutzer_name ?></span>
					<span id="topbar_mail">(<?php echo $benutzer_mail?>)</span>
				</div>
				
				<a href="logout.php">
					<div id="abmelden" class="ui-button ui-button-dark">
						<div class="ui-button-inner">
							<span class="ui-button-text">Abmelden</span>
						</div>
					</div>
				</a>
			</div>
		</div>
		
		<img src="grafiken/ott-ui-bg.jpg" id="hg" />
		
		<div id="wrapper">
			<div id="header">
				<img id="logo" src="grafiken/ott-logo.png" />
				<span id="titel">SendIT 2.0</span>
			</div>
			
			<form id="sendit" action="upload.php" target="upload_iframe" method="post" enctype="multipart/form-data">
				<fieldset id="datei">
					<legend>Dateiangabe</legend>
					<label for="eingabe_datei">Datei<span> (maximale Dateigr&ouml;&szlig;e: 512 MB)</span></label>
					<!--
					<label for="eingabe_datei">Datei<span> (maximale Dateigr&ouml;&szlig;e: <?php echo $maxDateiGroesse; ?>)</span></label>
					-->
					
					<div id="dateiangabe">
						<div class="ui-file">
							<div id="notiz_datei" class="ui-notice">
								<div class="ui-notice-outer">
									<div class="ui-notice-arrow"></div>
									<div class="ui-notice-inner">
										<span>Bitte w&auml;hlen Sie eine Datei</span>
									</div>
								</div>
							</div>

							<div class="ui-file-name">
								<input type="text" value="bitte w&auml;hlen Sie eine Datei..." readonly="readonly"></input>
							</div>
							<div class="ui-button ui-file-choose">
								<div class="ui-button-inner">
									<span class="ui-button-text">...</span>
								</div>
								<input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key" value="<?php echo $uid; ?>" />
								<input id="eingabe_datei" name="datei" type="file" size="1"></input>
							</div>
						</div>
					</div>

					<div class="clear"></div>
					
					<div id="dateiuploadbar">
						<div class="ui-progressbar">
							<div class="ui-progressbar-inner">
								<div class="ui-progressbar-progress">
									<div class="ui-progressbar-progress-inner">
										<span class="ui-progressbar-text"><span class="ui-progressbar-text-percent">42%</span> abgeschlossen</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</fieldset>
				
				<fieldset id="email">
					<legend>E-Mail Benachrichtigung</legend>

					<label for="eingabe_empfaenger">Empf&auml;nger</label>
					<div class="ui-input-multi">
						<div class="empfaenger">
							<div class="ui-input">
								<div class="ui-notice">
									<div class="ui-notice-outer">
										<div class="ui-notice-arrow"></div>
										<div class="ui-notice-inner">
											<span>Bitte geben Sie eine g&uuml;ltige E-Mail Adresse ein</span>
										</div>
									</div>
								</div>
								<input name="empfaenger[]" type="text"></input>
							</div>
							<div class="ui-icon ui-icon-plus"></div>
							<div class="ui-icon ui-icon-minus"></div>
							<div class="clear"></div>
						</div>
					</div>

					<label for="eingabe_betreff">Betreff</label>
					<div class="betreff">
						<div class="ui-input">
							<input id="eingabe_betreff" name="betreff" type="text" value="<?php echo $standardBetreff ?>"></input>
						</div>
						<div class="clear"></div>
					</div>

					<label for="eingabe_nachricht">Nachricht</label>
					<div class="nachricht">
						<div class="ui-textarea">
							<textarea id="eingabe_nachricht" name="nachricht" rows="9"><?php echo $standardText ?></textarea>
						</div>
						<div class="clear"></div>
					</div>
				</fieldset>
				
				<div id="senden" class="ui-button">
					<div class="ui-button-inner">
						<span class="ui-button-text">SendIT</span>
					</div>
				</div>
			</form>
			
			<div id="nocheine" class="ui-popup">
				<div class="ui-popup-close"></div>
				<span class="ui-popup-text">
					Ihre Datei wurde erfolgreich hochgeladen<br />					und eine Benachrichtigung versandt.<br />					<br />					<b>M&ouml;chten Sie eine weitere Datei versenden?</b>
				</span>
				
				<a href="logout.php">
					<div id="abmelden" class="ui-button ui-button-dark">
						<div class="ui-button-inner">
							<span class="ui-button-text">Nein</span>
						</div>
					</div>
				</a>
				<a href="">
					<div id="abmelden" class="ui-button ui-button-dark">
						<div class="ui-button-inner">
							<span class="ui-button-text">Ja</span>
						</div>
					</div>
				</a>
			</div>
					
			<div id="error" class="ui-popup">
				<div class="ui-popup-close"></div>
				<span class="ui-popup-text">
					Der Upload der Datei ist leider gescheitert!<br />					<br />					<b>Bitte wenden Sie sich an ihren Ansprechpartner.</b>
				</span>
				
				<a href="">
					<div id="abmelden" class="ui-button ui-button-dark">
						<div class="ui-button-inner">
							<span class="ui-button-text">OK</span>
						</div>
					</div>
				</a>
			</div>
			
		</div>
		<!-- <iframe id="upload_iframe" style="position: absolute;" name="upload_iframe" src="#"></iframe> -->
		<iframe id="upload_iframe" class="hidden" name="upload_iframe" src="#"></iframe>
	</body>
</html>