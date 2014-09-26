<?php
	function sendit_log( $text )
	{
		$timestamp = date( "[Y-m-d h:i:s]", time() );
		$logFilePath = "logs/";
		$logFileName = date( "Y-m" ) . "_log.txt";
		$logFile = fopen( $logFilePath . $logFileName, "a" );
		
		$logString = utf8_encode( $timestamp . " " . $text . "\n" );
		fwrite( $logFile, $logString );
		fclose( $logFile );
	}
?>