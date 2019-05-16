<?php

include '../init.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$message  = array();
	$comment  = $_POST['comment'];

	$delete = $crud->delete("comments", array('id' => $comment));
	if($delete === TRUE){
		$message['success'] = "Comment deleted successfully!"; 
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