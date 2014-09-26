$(document).ready(function() {
	//********** Eingabefelder **********//
	$("input[type='text'][value!=''][readonly!='readonly']").addClass("default");
	$("textarea[value!=''][readonly!='readonly']").addClass("default");
	
	// Standardtexte der Eingabefelder und Textareas in Array speichern
	var std_text = new Array();
	var inputs = $("input[type='text'][readonly!='readonly']");
	var textareas = $("textarea");
	for(i = 0; i < inputs.length; i++)
	{
		std_text[inputs[i].name] = inputs[i].value;
	}
	for(i = 0; i < textareas.length; i++)
	{
		std_text[textareas[i].name] = textareas[i].value;
	}
	// Bei Fokus Wert des Feldes löschen, wenn er leer ist oder Standardtext enthält
	$("input[type='text'][readonly!='readonly']").focus(function() {
		if(!$(this).hasClass("disabled")) {
			if(this.value == std_text[this.name]) {
				$(this).val("");
				$(this).removeClass("default");
			}
		}
	});
	// Beim Verlassen des Feldes ggf. Klasse "default" hinzufügen und Standardtext einfügen
	$("input[type='text'][readonly!='readonly']").blur(function() {
		if(!$(this).hasClass("disabled")) {
			if( this.value == "" || this.value == std_text[this.name]) {
				$(this).val(std_text[this.name]);
				$(this).addClass("default");
			}
		}
	});
	// Bei Focus Klasse "default" entfernen und kompletten Text markieren
	$("textarea").focus(function() {
		if(!$(this).hasClass("disabled")) {
			if(this.value == std_text[this.name]) {
				$(this).removeClass("default");
				$(this).select();
			}
		}
	});
	// Beim Verlassen des Feldes Klasse "default" hinzufügen und ggf. Standardtext einfügen
	$("textarea").blur(function() {
		if(!$(this).hasClass("disabled")) {
			if($(this).val() == "" || $(this).val() == std_text[this.name]) {
				$(this).val(std_text[this.name]);
				$(this).addClass("default");
			}
		}
	});
	
	
	//********** Mehrfacheingabe **********//
	function setButtonVisibility(inputs)
	{
		for(var i = 0; i < inputs.length; i++)
		{
			if (inputs.length > 1)
			{
				$(inputs[i]).children(".ui-icon-minus").show();
			}
			else
			{
				$(inputs[i]).children(".ui-icon-minus").hide();
			}
		}
	}
	
	// Weiteres Eingabefeld hinzufügen
	$(".ui-icon-plus").click(function() {
		// Eltern-DIV klonen und nach aktuellem DIV einfügen
		var new_input = $(this).parent().clone(true);
		$(this).parent().after(new_input);
		// Wert des Eingabefeld des geklonten DIV-Elements leeren
		$(this).parent().next().children(".ui-input").children("input").val("");
		
		var inputs = $(this).parent().parent().children();
		setButtonVisibility(inputs);
	});
	
	// Aktuelles Eingabefeld entfernen
	$(".ui-icon-minus").click(function() {
		var multiInputs = $(this).parent().parent();

		$(this).parent().remove();
		
		var inputs = multiInputs.children();
		setButtonVisibility(inputs);
	});
	
	
	//********** Dropdown **********//
	$(".ui-dropdown-button").hover(function() {
		if($(this).parent().parent().children(".ui-dropdown-list").css("display") == "none") {
			$(this).addClass("ui-dropdown-button-hover");
		}
	}, function() {
		$(this).removeClass("ui-dropdown-button-hover");
	});
	
	$(".ui-dropdown-button").click(function() {
		if($(this).parent().parent().children(".ui-dropdown-list").css("display") == "none") {
			$(this).addClass("ui-dropdown-button-active");
			$(this).parent().parent().children(".ui-dropdown-list").show();
		} else {
			$(this).removeClass("ui-dropdown-button-active");
			$(this).parent().parent().children(".ui-dropdown-list").hide();
		}
	});
	
	$(".ui-dropdown-list ul li").click(function() {
		$(this).parent().parent().parent().parent().children(".ui-dropdown-input-highlight").children(".ui-dropdown-button").removeClass("ui-dropdown-button-active");
		$(this).parent().parent().parent().hide();
		
		list_value = $(this).html();
		$(this).parent().parent().parent().parent().children(".ui-dropdown-input-highlight").children(".ui-dropdown-input").html(list_value);
		
		$(this).parent().parent().parent().parent().children("input").val(list_value);
	});
	
	$("#hg").click(function() {
		$(".ui-dropdown-button").removeClass("ui-dropdown-button-active");
		$(".ui-dropdown-list").hide();
	});
	
	
	//********** Dateiwahl **********//
	$(".ui-file-choose input[type='file']").change(function() {
		var fileValueArray = this.value.split("\\");
		$(this).parent().parent().children(".ui-file-name").children("input[type='text']").val( fileValueArray[fileValueArray.length-1] );
	});


	//********** Popup **********//
	$(".ui-popup-close").click(function () {
		$(this).parent().hide();
	});
});