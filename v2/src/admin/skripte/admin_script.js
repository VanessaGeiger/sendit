$(document).ready(function() {
	$("#add").click(function() {
		var usr_data = $("#add_user").serialize();
		
		$.post("add_user.php", usr_data, function(data) {
			if( data == "erfolg" )
			{
				$("#nocheinen").show();
			}
			else
			{
				$("#fehler").show();
			}
		});
		
		//$("#add_user").submit();
	});
	
	$("#eingabe_benutzer").change(function() {
		var benutzer = $(this).val();
		benutzer = benutzer.split("-");
		
		if (benutzer.length == 2)
		{
			var email = benutzer[0] + "." + benutzer[1] + "@otterbach.de";
		}
		
		if ( email !== "" )
		{
			$("#eingabe_email").val( email );
		}
	});
});