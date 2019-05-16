<?php
include '../init.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$message  = array();
	$user     = $function->checkInput($_POST['user']);

	/* delete users'posts */
	$delete_users_posts = $crud->delete("posts", array("spotter", $user));
	/* delete user */
	$delete_user        = $crud->delete("users", array('id' => $user));

	if($delete_user === TRUE) {
		$message['success'] = "User deleted successully!";
	}else {
		$message['error'] = "Error! Please try again.";
	}
	 

	/* send message */
	if(!empty($message)){
		header("Access-Control-Allow-Origin: *");
		header("Content-type: application/json");
		echo json_encode($message);
	}	
}
?>