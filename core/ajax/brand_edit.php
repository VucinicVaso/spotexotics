<?php 
include "../init.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$message  = array();
	$brand_id = $function->checkInput($_POST['brand_id']);
	$brand    = $function->checkInput($_POST['brand']);

	$edit = $crud->update("brand", "id", $brand_id, array('brand' => $brand));
	if($edit){
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