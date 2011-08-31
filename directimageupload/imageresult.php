<html>
<head>
	<title> Image Upload Result </title>
	<script type="text/javascript" src="js/jquery-1.4.4.js"></script>
</head>
<body>
<?php
	include_once 'resize-class.php';
	include_once 'config.php';
	include_once 'core.php';
	ini_set('memory_limit', '-1');
	set_time_limit(0);
	$obj = new CORE();
	$con = $obj->ConnectionOpen();
	if(isset($_POST) && $_POST!=''){
		
		$table = trim($_POST['segment']);
		$extr_segment = explode('_', $table);
		$segment = $extr_segment[sizeof($extr_segment)-1];
		$dbcolumn = trim($_POST['dbcolumn']);
		
		$path = trim($_POST['path']);
		$destination = trim($_POST['desti_path']).'/';
		$imagesizes = trim($_POST['imagesizes']);
	
		if ($handle = opendir($path)) {

			echo "<div id='uploadresult'><table cellpadding='5' width='100%'>";
			echo "<tr>";
			echo "<th>Source Image</th>";
			echo "<th>Renmaed As</th>";
			echo "<th>Product ID</th>";
			echo "<th>Product Name</th>";
			echo "<th>Copy Status</th>";
			echo "</tr>";
			
		    while (false !== ($file = readdir($handle))) {
		    	
		        if ($file != "." && $file != "..") {
		        	echo '<tr>';
		            $filename = $path."/".$file;
		            
		            echo "<td>$filename</td>";
		            $image_name_array = explode('.', $file);
		            $image_name = "";
		            for($i=0;$i<sizeof($image_name_array)-1;$i++){
		            	$image_name .= $image_name_array[$i];
		            }
		            $extension = ".".$image_name_array[sizeof($image_name_array)-1];
		            $query = "select * from $table where $dbcolumn='$image_name'";
		            
		            $result = mysql_query($query) or die(mysql_error());
		            $num_rows = mysql_num_rows($result);
		            if($num_rows==1){
		            	$product_data = mysql_fetch_assoc($result);
		            	$prodct_id = $product_data[$table.'_id'];
		            	$product_name = trim($product_data[$segment.'_name']);
		            	$new_name = "";
		            	$new_name = $obj->ImageNamingFormat($product_name);
		            	$setimage = $new_name.$extension;
		            	$update_query = "update $table set image = '$setimage' where $dbcolumn='$image_name'";
		            	$update = mysql_query($update_query); 
		            	if(!copy($filename,"temp/".$setimage)){
							echo "<td style='color:red'><b>$file</b> failed to copy as <b>$setimage</b></td>";		            		
		            	}else{
			            	if(is_dir("upload/$segment")){
			            		$imagesizes_array = explode(',', $imagesizes);
			            		if(sizeof($imagesizes_array)>=1){
			            			
				            		for($i=0;$i<sizeof($imagesizes_array);$i++){
				            			$xy = array();
				            			if($imagesizes_array[$i]!=''){
				            				$xy = explode('x', $imagesizes_array[$i]);
				            				$x = (int)trim($xy[0]);
				            				$y = (int)trim($xy[1]);
				            				$image[$i] = array(
															"path"=>$destination.$new_name.'_'.$imagesizes_array[$i],
			            									"width"=>$x,
															"height"=>$y,
															"option"=>"crop"
													);
				            			}
				            		}
				            		$created_by = $modify_by ='1';
				            		$created_on = $modify_on = date('Y-m-d h:i:s');
				            		$image_field = array('segment','product_table','product_table_column','product_master_id','product_name','source_path','source_file_name','destination_path','destination_file_name','image_sizes','created_by','created_on','modify_by','modify_on');
				            		$image_data = array('segment'=>$segment,'product_table'=>$table,'product_table_column'=>$dbcolumn,'product_master_id'=>$prodct_id,'product_name'=>$product_name,'source_path'=>$path,'source_file_name'=>$file,'destination_path'=>$destination,'destination_file_name'=>$setimage,'image_sizes'=>$imagesizes,'created_by'=>$created_by,'created_on'=>$created_on,'modify_by'=>$modify_by,'modify_on'=>$modify_on);
				            		$insert = $obj->InsertSimple('direct_image_upload', $image_field, $image_data, 0, '', '', 0);
							        for($i=0;$i<count($image);$i++) {
										$resizeObj = new resize('temp/'.$setimage);
										$resizeObj -> resizeImage($image[$i]["width"], $image[$i]["height"], 'crop');
										$resizeObj -> saveImage($image[$i]["path"].".jpg", 100);
									}
			            		}
			            	}else{
			            		echo "<td style='color:red'>$segment: No Such Directory</td>";
			            		exit;
			            	}
			            	echo "<td style='color:green;'><b>$file</b> copied as <br><b>$setimage</b> Successfully</td>";
			            	unlink("temp/$setimage");
		            	}
		            	echo "<td>$prodct_id</td>";
		            	echo "<td>$product_name</td>";
		            	echo "<td style='color:green'>Yes</td>";
		            }else{
		            	echo "<td>---</td>";
		            	echo "<td>---</td>";
		            	echo "<td style='color:red'>No</td>";
		            }
		            echo '</tr>';
		        }
		    }
			echo '</table></div>';
		    closedir($handle);
		}else{
			echo "Directory Does Not Exist<br>";
		}
	}
	$con = $obj->ConnectionClose();
?>
</body>
</html>
