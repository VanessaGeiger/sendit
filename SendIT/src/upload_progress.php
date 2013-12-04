<?php
	if( isset($_GET["progress_key"]) )
	{
		$status = apc_fetch("upload_".$_GET["progress_key"]);
		if ( $status["current"] == $status["total"] )
		{
			echo "completed";
		}
		else
		{
			echo $status["current"]/$status["total"]*100;
		}
	}
?>