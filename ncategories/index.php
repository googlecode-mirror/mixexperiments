<?php



$con = mysql_connect('192.168.0.73','root','binary');
$db = mysql_selectdb('sample');

function BackTracking($cat_name, $result){
	
	$res_data = "";
	$sql = "select * from n_categories where cat_name='".$cat_name."'";
	$res = mysql_query($sql);
	$res_data = mysql_fetch_assoc($res);
	$parent_id = $res_data['parent_id'];
	$cat_name = $res_data['cat_name'];
	
	array_unshift($result['cat_name'],$cat_name);
	array_unshift($result['parent_id'],$parent_id);
		
	if($parent_id!=0){
			
		$sql = "select * from n_categories where cat_id=$parent_id";
		$res = mysql_query($sql);
		$res_data = mysql_fetch_assoc($res);
		$parent_id = $res_data['parent_id'];
		$cat_name = $res_data['cat_name'];
		if(!$parent_id==0){		
			BackTracking($cat_name, & $result);
		}else{
			array_unshift($result['cat_name'],$cat_name);
			array_unshift($result['parent_id'],$parent_id);
		}
	}
}

function PrintArray($arr){
	
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}

/*$sql = 'select * from n_categories';
$res = mysql_query($sql);

while($resdata = mysql_fetch_assoc($res)){
	
	echo $resdata['cat_name']."<br/>";
}*/
$result = array('cat_name'=>array(),'parent_id'=>array());
BackTracking('PHP', & $result);
$categories = array_combine(array_values($result['parent_id']), array_values($result['cat_name']));
//PrintArray($result);
PrintArray($categories);

?>