function vote(id) {
	let post_id = id;	

	$.post(ADDRESS + "core/ajax/vote.php", {post: post_id}, function(data){
		const { success, error } = data;
		if(success != ""){
			alert("THANK YOU FOR YOUR VOTE");
			location.reload();
		}else {
			alert("SOMETHING WENT WRONG. PLEASE TRY AGAIN!");
		}	
	});		
}