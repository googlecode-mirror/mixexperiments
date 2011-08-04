<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'){
	$response = array();
	$part = $_POST['part'];
	$response['date'] = date('d-m-Y');
	$response['test'] = "Test of ".ucfirst($part);
	$response['score'] = '100';
	
	echo json_encode($response);
}
?>