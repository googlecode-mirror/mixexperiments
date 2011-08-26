<?php
include_once '../config.php';
include_once '../core.php';
$obj = new CORE();
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'){
	$act = $_POST['act'];
	$return = "";
	if($act=='getfield'){
		$table = $_POST['table'];
		$fields = $obj->FetchTableField($table, array());
		$return = $obj->GenerateOptions($fields, array());
	}
	echo $return;
}
?>