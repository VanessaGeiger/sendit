<?php
	session_start();
	if( $_SESSION["admin"] )
	{
		header( "Location: admin.php" );
	}
	
	include "login.php";

	$kw_standardBetreff = "[SendIT] Kennwort vergessen";
	$kw_standardText = "Hallo IT,%0A%0Aich habe leider mein Kennwort f&uuml;r meinen SendIT Account vergessen. K&ouml;nntet ihr mir meine Kennwort nochmal zukommen lassen?%0A%0AVielen Dank!%0A%0A%0AMit freundlichen Gr&uuml;&szlig;en%0A";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
	<head>
		<title>SendIT 2.0 - Otterbach IT - Weil Marken nicht nur starke Bilder brauchen</title>
		<script src="../skripte/jquery-1.6.2.min.js" type="text/javascript"></script>
		<script src="../skripte/login_script.js" type="text/javascript"></script>
		<link href="../css/ott-ui-style.css" rel="stylesheet" type="text/css" />
		<link href="css/login_style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<img src="../grafiken/ott-ui-bg.jpg" id="hg" />
		<div id="wrapper">
			<img id="logo" src="../grafiken/ott-logo.png" />
			<span id="willkommen">SendIT 2.0 Administration</span>
			
		    <form name="login" id="login" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div id="kennwort">
					<div id="ui-icon-password" class="ui-icon" <?php if ( $kennwortERROR ) echo "style='background-position: -20px -20px;'"; ?> ></div>
					<div class="ui-input">
						<input id="eingabe_admin_kennwort" name="admin_kennwort" type="password" <?php if ( $kennwortERROR ) echo "autofocus"; ?> ></input>
					</div>
				</div>

				<div id="anmelden" class="ui-button">
					<div class="ui-button-inner">
						<span class="ui-button-text">Anmelden</span>
					</div>
				</div>
				<input class="hidden" type="submit" />
			</form>
			
		</div>
	</body>
</html>