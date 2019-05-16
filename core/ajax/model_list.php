<?php

include '../init.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){

	$message  = array();
	$brand    = $function->checkInput($_GET['brand']);

	$models = $crud->selectAll("model", 'brand_id', $brand);
	if(!empty($models)){
		$message['models'] = $models;
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