<?php
/**
 * @author: Rajan Rawal
 * @desc: This file add, delete or update the record in the db table using AJAX
 */
$link = mysql_connect('192.168.0.73','root','binary') or die(mysql_error());
$db = mysql_selectdb('sample',$link);
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'){
	$act = $_POST['act'];
	if($act=='add'){
		$roll_no = $_POST['roll_no'];
		$name = $_POST['name'];
		$sql = "select * from student_master where name='$name'";
		$res = mysql_query($sql);
		$num_rows = mysql_numrows($res);
		if($num_rows>=1){
			// Checking data aleady in table
			echo "Student Already Exists";
		}else{
			// Insert data if student does not exist
			$sql = "INSERT INTO student_master (roll_no,name)values('$roll_no','$name')";
			echo $sql;exit;
			$insert = mysql_query($sql);
			$id = mysql_insert_id();
			if($insert){
				echo $id;
			}else{
				echo "Insert Error";
			}			
		}
	}elseif($act=='update'){
		$id = $_POST['id'];
		$roll_no = $_POST['roll_no'];
		$name = $_POST['name'];
		$sql = "update student_master set roll_no='$roll_no', name='$name' where student_master_id='$id'";
		$update = mysql_query($sql);
		if($update){
			echo "updated";	
		}else{
			echo "Update Error";
		}
	}elseif($act=='delete'){
		$id = $_POST['id'];
		$sql = "delete from student_master where student_master_id='$id'";
		$delete = mysql_query($sql);
		if($delete){
			echo "deleted";	
		}else{
			echo "Delete Error";
		}
	}
}
?>