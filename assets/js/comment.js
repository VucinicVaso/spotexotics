$(function(){

 	$("#comment_msg").hide();
 	let msg = "";

	/* create profile */
	$(document).on('submit', '#comment_form', function(e){
		e.preventDefault();
		var commentData = new FormData($(this)[0]);

 		$.ajax({
			type: "POST",	
			url: ADDRESS + "core/ajax/comment_create.php",
			data: commentData,
			success: function(data){	
				const { success, error } = data;
				if(success != ""){
					$("#comment_msg").show();
					msg = "<p class='alert alert-info'>Comment created!</p>"; 
					location.reload();
				}else {
					$("#comment_msg").show();
					msg = "<p class='alert alert-warning'>Error please try again!</p>"; 
				}				
			},
			error: function(){
				//
			},
			cache: false,
			contentType: false,
			processData: false			
		});
	});

});
