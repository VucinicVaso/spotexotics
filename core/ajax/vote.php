<?php
include '../init.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$message = array();
	$post    = $function->checkInput($_POST['post']);

	$create = $crud->create("votes", array('post_id' => $post, 'user_id' => $_SESSION['userdata']['id']));

	if($create){
		$post = $crud->find("posts", "id", $post);
		$crud->update("posts", "id", $post->id, array("total_votes" => $post->total_votes + 1, "daily_votes" => $post->daily_votes + 1));
		$message['success'] = "ok";
	}else {
		$message['error'] = "error";
	}

	/* send message */
	if(!empty($message)){
		header("Access-Control-Allow-Origin: *");
		header("Content-type: application/json");
		echo json_encode($message);
	}	
}
?>