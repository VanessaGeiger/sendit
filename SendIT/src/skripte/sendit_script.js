var uid = "";
function set_uid(php_uid) {
	uid = php_uid;
}

// E-Mail Adressen Validierung
function validateEmail(emailadr)
{
	// Regular Expression zum Testen einer E-Mail Adresse
	var email_reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	return email_reg.test(emailadr);
}

// Wenn Upload abgeschlossen wird diese Funktion aufgerufen
function uploadComplete(result)
{
	if ( result == 1 )
	{
		$(".ui-progressbar-progress").width("100%");
		$(".ui-progressbar-text").html("Der Upload wurde erfolgreich abgeschlossen!");
		$(".ui-progressbar").addClass("ui-progress-completed");
		$("#nocheine").show();
		
		var dateiWert = $("input[type='file']").val();
		var dateiWertArray = dateiWert.split("\\");
		$("label[for='eingabe_datei']").children("span").html( " " + dateiWertArray[dateiWertArray.length-1] + " wurde erfolgreich hochgeladen" );
	}
	else
	{
		$(".ui-progressbar-text").html("Der Upload ist gescheitert!");
		$(".ui-progressbar").addClass("ui-progress-error");
		$("#error").show();
	}
}

$(document).ready(function() {
	$("#senden").click(function() {
		// Mehrfach Empfänger zusammensetzen und Input Wert neu setzen
		$(".ui-notice").hide();

		var empfaengerArray = new Array();
		var empfaengerInputs =  $(".empfaenger").children().children("input");
		for ( var i = 0; i < empfaengerInputs.length; i++ )
		{
			if ( $(empfaengerInputs[i]).val() !== "" )
			{
				empfaengerArray.push( $(empfaengerInputs[i]).val() );
			}
		}

		var empfaenger = empfaengerArray.join(",");
		
		var fileError = false;
		var emailError = false;
		var formError = false;
		
		if( $("input[type='file']").val() == "" )
		{
			$("input[type='file']").parent().parent().children(".ui-notice").show();
			fileError = true;
		}
		
		if ( empfaenger == "" )
		{
			// Wenn kein Empfänger eingegeben, bei erstem Eingabefeld Notiz zeigen
			$(empfaengerInputs[0]).parent().children(".ui-notice").show();
			emailError = true;
		}
		else
		{
			// jedes Empfänger Eingabefeld auf Richtigkeit prüfen
			for ( var i = 0; i < empfaengerInputs.length; i++ )
			{
				if ( $(empfaengerInputs[i]).val() !== "" )
				{
					$(empfaengerInputs[i]).parent().children(".ui-notice").show();
					emailError = !validateEmail($(empfaengerInputs[i]).val());
				}
			}
		}
		// Form Error Variable setzen
		formError = fileError || emailError;
		
		if ( !formError )
		{
			// Alle Notizfelder verstecken
			$(".ui-notice").hide();
			// Eingabefelder inaktiv setzen
			$("input").addClass("disabled");
			$("input").attr("readonly", "readonly");
			// Textareas inaktiv setzen
			$("textarea").addClass("disabled");
			$("textarea").attr("readonly", "readonly");
			// Icons verstecken
			$(".ui-icon-plus").hide();
			$(".ui-icon-minus").hide();
			// Text des Datei Label mit Name der Datei ergänzen
			var dateiWert = $("input[type='file']").val();
			var dateiWertArray = dateiWert.split("\\");
			$("label[for='eingabe_datei']").children("span").html( " " + dateiWertArray[dateiWertArray.length-1] + " wird hochgeladen..." );
			
			// Alle leeren Eingabefelder löschen
			$(".empfaenger").children().children("input[value='']").parent().parent().remove();
			
			// Form absenden (POST)
			$("#sendit").submit();
		}
	});
	
	// Login Daten senden
	$("#sendit").submit(function() {
		$("#dateiangabe").hide();
		$(".ui-progressbar-progress").width(0);
		$("#dateiuploadbar").show();
		
		// Pro 1/5 Sekunde Status des Upload abfragen und Progressbar aktualisieren/animieren
		var intervall = setInterval(function() {
			$.get("upload_progress.php", {progress_key: uid}, function(data) {
				prozent = parseInt(data);
				if( data == "completed")
				{
					clearInterval(intervall);
				}
				else
				{
					// Text und Balkengröße auf entsprechende Prozent setzen
					$(".ui-progressbar-progress").width(data + "%");
					$(".ui-progressbar-text-percent").html(parseInt(data) + "%");
				}
			});
		}, 200);
		
		return true;
	});
});