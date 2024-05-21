// JavaScript Document
	$(document).ready(function(){
			  $("#destination").change(function() {
			
						$.post("loadtrips.php", $("#tripsearchform").serialize(),function(data){
							
								$("#Trip").empty().append(data);
								
							
							});	
			  });
		});