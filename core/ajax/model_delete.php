<?php
include '../init.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$message  = "";
	$model_id  = $_POST['model_id'];

	$delete = $crud->delete("model", array('id' => $model_id));
	$message = "ok"; 

	/* send message */
	if(!empty($message)){
		header("Access-Control-Allow-Origin: *");
		header("Content-type: application/json");
		echo json_encode($message);
	}	
}
?>