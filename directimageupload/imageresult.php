<?php
	include_once 'resize-class.php';
	include_once 'config.php';
	include_once 'core.php';
	
	$obj = new CORE();
	$con = $obj->ConnectionOpen();
	if(isset($_POST['submit_form']) && $_POST['submit_form']!=''){
		$segment = $_POST['segment'];
		$path = $_POST['path'];
		$table = 'products_'.$segment;
		$name_column = $segment.'_name';
		$id = $table.'_id';
		
		$path = $_POST['path'];
		if ($handle = opendir($path)) {

			echo "<table cellpadding='5'>";
		    while (false !== ($file = readdir($handle))) {
				echo '<tr>';
		        if ($file != "." && $file != "..") {
		            $filename = $path."/".$file;
		            
		            echo "<td>$filename</td>";
		            $image_name_array = explode('.', $file);
		            $image_name = "";
		            for($i=0;$i<sizeof($image_name_array)-1;$i++){
		            	$image_name .= $image_name_array[$i];
		            }
		            $extension = ".".$image_name_array[sizeof($image_name_array)-1];
		            echo "<td>$image_name</td>";
		            $query = "select * from $table where $id='$image_name'";
		            //$query = "select * from $table where isbn_13='$image_name'";
		            $result = mysql_query($query) or die(mysql_error());
		            $num_rows = mysql_num_rows($result);
		            if($num_rows==1){
		            	$product_data = mysql_fetch_assoc($result);
		            	$product_name = $product_data[$segment.'_name'];
		            	$new_name = "";
		            	$new_name = $obj->ImageNamingFormat($product_name);
		            	$new_name .= $extension;
		            	$update_query = "update products_$segment set image = '$new_name' where $id='$image_name'";
		            	$update = mysql_query($update_query); 
		            	$copy=copy($filename,"temp/".$new_name);
		            	if(is_dir("upload/$segment")){
		            		echo "<td  style='color:green'>$segment: Directory Ok</td>";
			            	$image=array(0=>array("path"=>'upload/'.$segment.'/'.$new_name.'_30x40',"width"=>30,"height"=>40,"option"=>"crop"),
										 1=>array("path"=>'upload/'.$segment.'/'.$new_name.'_60x80',"width"=>60,"height"=>80,"option"=>"crop"),
										 2=>array("path"=>'upload/'.$segment.'/'.$new_name.'_120x160',"width"=>120,"height"=>160,"option"=>"crop"),
										 3=>array("path"=>'upload/'.$segment.'/'.$new_name.'_220x290',"width"=>220,"height"=>290,"option"=>"crop"),
										 4=>array("path"=>'upload/'.$segment.'/'.$new_name.'_520x690',"width"=>520,"height"=>690,"option"=>"crop")
										);
					        for($i=0;$i<count($image);$i++) {
								$resizeObj = new resize('temp/'.$new_name);
								$resizeObj -> resizeImage($image[$i]["width"], $image[$i]["height"], 'crop');
								$resizeObj -> saveImage($image[$i]["path"].".jpg", 100);
							}
		            	}else{
		            		echo "<td style='color:red'>$segment: No Such Directory</td>";
		            		exit;
		            	}
		            	echo "<td>$product_name</td>";
		            	echo "<td style='color:green'>Yes</td>";
		            }else{
		            	echo "<td>---</td>";
		            	echo "<td style='color:red'>No</td>";
		            }
		            @unlink("temp/$new_name");
		        }
				echo '</tr>';
		    }
			echo '</table>';
		    closedir($handle);
		}else{
			echo "Directory Does Not Exist<br>";
		}
	}
	$con = $obj->ConnectionClose();
?>
