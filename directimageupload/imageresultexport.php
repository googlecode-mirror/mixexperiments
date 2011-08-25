<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'){
	$filename = trim($_POST['file']);
	$contents = $_POST['data'];
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
	print $contents;
}
?>