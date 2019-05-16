<?php
include '../init.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$message  = "";
	$brand_id = $function->checkInput($_POST['brand_id']);

	$delete_brand = $crud->delete("brand", array('id' => $brand_id));
	$delete_types = $crud->delete("model", array('brand_id' => $brand_id));
	$message = "ok"; 

	/* send message */
	if(!empty($message)){
		header("Access-Control-Allow-Origin: *");
		header("Content-type: application/json");
		echo json_encode($message);
	}	
}
?>