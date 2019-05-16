<?php
include '../init.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$message  = array();
	$comment  = $function->checkInput($_POST['comment']);
	$name     = $function->checkInput($_POST['name']);
	$email    = $function->checkInput($_POST['email']);
	$post_id  = $function->checkInput($_POST['post_id']);

	$comment = $crud->create("comments", array('post_id' => $post_id, 'name' => $name, 'email' => $email, 'comment' => $comment));
	if($comment){
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