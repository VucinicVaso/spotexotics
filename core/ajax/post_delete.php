<?php
/* delete post for profile.php */

include '../init.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$message  = array();                                       /* message array */
	$post_id  = $function->checkInput($_POST['postID']);       /* post id */
	$post     = $crud->find("posts", "id", $post_id);          /* post data */

	foreach (json_decode($post->images) as $image) {           /* delete post images */
		$function->deleteImage($image);
	}

	$delete = $crud->delete("posts", array('id' => $post_id)); /* delete post */

	if($delete === TRUE){				                       /* message */
		$message['success'] = "Post deleted successfully!"; 
	}else {
		$message['error'] = "Error!";
	}

	/* send message */
	if(!empty($message)){
		header("Access-Control-Allow-Origin: *");
		header("Content-type: application/json");
		echo json_encode($message);
	}	
}
?>