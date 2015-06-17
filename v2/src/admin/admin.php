<?php
	session_start();
	// Wenn nicht angemeldet, dann redirect zu Startseite (Login)
	if( !$_SESSION["admin"] )
	{
		//header( "Location: index.php" );
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
	<head>
		<title>SendIT 2.0 Administration - Otterbach IT - Weil Marken nicht nur starke Bilder brauchen</title>
		<script src="../skripte/jquery-1.6.2.min.js" type="text/javascript"></script>
		<script src="../skripte/ott-ui-script.js" type="text/javascript"></script>
		<script src="skripte/admin_script.js" type="text/javascript"></script>
		<link href="../css/ott-ui-style.css" rel="stylesheet" type="text/css" />
		<link href="css/admin_style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="topbar">
			<div id="logout">
				<div id="topbar_user">
					<div id="ui-icon-user-dark" class="ui-icon"></div>
					<span>admin</span>
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
		
		<img src="../grafiken/ott-ui-bg.jpg" id="hg" />
		
		<div id="wrapper">
			<div id="header">
				<img id="logo" src="../grafiken/ott-logo.png" />
				<span id="slogan">SendIT 2.0 Administration [ALPHA]</span>
			</div>
			
			<form id="add_user" action="add_user.php" method="post">
				<fieldset id="email">
					<legend>Benutzer hinzuf&uuml;gen</legend>

					<label for="eingabe_benutzer">Benutzer</label>
					<div class="benutzer">
						<div class="ui-input">
							<input id="eingabe_benutzer" name="benutzer" type="text"></input>
						</div>
						<div class="clear"></div>
					</div>

					<label for="eingabe_kennwort">Kennwort</label>
					<div class="kennwort">
						<div class="ui-input">
							<input id="eingabe_kennwort" name="kennwort" type="text"></input>
						</div>
						<div class="clear"></div>
					</div>

					<label for="eingabe_name">Name <span>(Vorname Nachname)</span></label>
					<div class="name">
						<div class="ui-input">
							<input id="eingabe_name" name="name" type="text"></input>
						</div>
						<div class="clear"></div>
					</div>

					<label for="eingabe_email">E-Mail</label>
					<div class="email">
						<div class="ui-input">
							<input id="eingabe_email" name="email" type="text"></input>
						</div>
						<div class="clear"></div>
					</div>
				</fieldset>
								
				<div id="add" class="ui-button">
					<div class="ui-button-inner">
						<span class="ui-button-text">Hinzuf&uuml;gen</span>
					</div>
				</div>
				<a href="">
					<div id="reset" class="ui-button">
						<div class="ui-button-inner">
							<span class="ui-button-text">Zur&uuml;cksetzen</span>
						</div>
					</div>
				</a>
			</form>
			
			<div id="nocheinen" class="ui-popup">
				<div class="ui-popup-close"></div>
				<span class="ui-popup-text">
					Benutzer wurde erfolgreich hinzugef&uuml;gt.<br />
					<br />
					<b>M&ouml;chten Sie einen weiteren Benutzer hinzuf&uuml;gen?</b>
				</span>
				
				<a href="logout.php">
					<div id="nein" class="ui-button ui-button-dark">
						<div class="ui-button-inner">
							<span class="ui-button-text">Nein</span>
						</div>
					</div>
				</a>
				<a href="">
					<div id="ja" class="ui-button ui-button-dark">
						<div class="ui-button-inner">
							<span class="ui-button-text">Ja</span>
						</div>
					</div>
				</a>
			</div>
			
			<div id="fehler" class="ui-popup">
				<div class="ui-popup-close"></div>
				<span class="ui-popup-text">
					Es ist ein Fehler aufgetreten!
				</span>
				
				<a href="">
					<div id="fehler_ok" class="ui-button ui-button-dark">
						<div class="ui-button-inner">
							<span class="ui-button-text">OK</span>
						</div>
					</div>
				</a>
			</div>
			
		</div>
	</body>
</html>