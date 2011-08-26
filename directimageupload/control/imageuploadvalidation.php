<?php
include_once '../config.php';
include_once '../core.php';
include_once 'validation.php';
$val = new VALIDATION();

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'){
	
	// Getting the form data for validation 
	$segment = trim($_POST['segment']);
	$dbcolumn = trim($_POST['dbcolumn']);
	$path = trim($_POST['path']);
	$desti_path = trim($_POST['desti_path']);
	$imagesizes = trim($_POST['imagesizes']);
	
	//Gathering Other validation data
	$neglect = array();
	$dbcolumns = array();
	$table = 'products_'.$segment;
	$tables = $val->FetchTables($val->GetDb(), $neglect);
	if($dbcolumn!=''){
		$dbcolumns = $val->FetchTableField($table, $neglect);
	}
	
	// checking the form data
	$response = array();
	$response['data']['segment'] = $val->IsValueInArray($table, $tables);
	
	$response['data']['dbcolumn'] = $val->IsValueInArray($dbcolumn, $dbcolumns);
	$response['data']['path'] = $val->IsValidPath($path);
	$response['data']['desti_path'] = $val->IsValidPath($desti_path);
	$response['data']['imagesizes'] = $val->RegexValidation($imagesizes, '/^[0-9x,]{1,100}$/');
	if($val->CheckResponseArray($response)){
		$response['validation']['status'] = 'successful';
		$response['validation']['submit'] = 'true';
	}else{
		$response['validation']['status'] = 'fail';
		$response['validation']['clearform'] = 'yes';
		$response['validation']['message'] = 'Please Fill Data Properly';
	}
	echo json_encode($response);
}
?>