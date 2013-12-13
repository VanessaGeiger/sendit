<?php
	if ( $_SERVER["REQUEST_METHOD"] == "POST" )
	{
		$empfaenger = implode( ", ", $_POST["empfaenger"] );
		
		echo $empfaenger;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
	<head>
		<title>Test</title>
		<script src="sendit20/skripte/jquery-1.6.2.min.js" type="text/javascript"></script>
		<script language="javascript"  type="text/javascript">
			
		</script>
	</head>
	<body>
		<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
			<input type="text" name="empfaenger[]"></input>
			<input type="text" name="empfaenger[]"></input>
			<input type="text" name="empfaenger[]"></input>
			<input type="submit" value="senden"></input>
		</form>
	</body>
</html>