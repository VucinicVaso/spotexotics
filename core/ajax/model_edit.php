<?php 
include "../init.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$message  = array();
	$model_id = $function->checkInput($_POST['model_id']);
	$model    = $function->checkInput($_POST['model']);

	$edit = $crud->update("model", "id", $model_id, array('model' => $model));
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