/* delete post for profile.php */
function delete_post(id){
	let post_id = id;	

	$.post(ADDRESS + "core/ajax/post_delete.php", {postID: post_id}, function(data){
		const { success, error } = data;
		if(success != "" || success != null){
			location.reload();
		}else {
			alert(error);
		}
	});	
}
