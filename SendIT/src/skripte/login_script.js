$(document).ready(function() {
	
	// Login Daten senden
	$("#anmelden").click(function() {
		$("#login").submit();
	});
	
	// Wenn "Enter"-Taste gedrückt wurde, Formular senden
	$("input").keydown(function(event) {
		if (event.keyCode == "13")
		{
			$("#login").submit();
		}
	});

});