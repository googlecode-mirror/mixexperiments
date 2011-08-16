<?php
	include_once 'resize-class.php';
	if(isset($_POST['path']) && $_POST['path']!=''){
		echo $_POST['path']."<br>";
		$path = $_POST['path'];
		if ($handle = opendir($path)) {
		    //echo "Directory handle: $handle\n";
		
		    /* This is the correct way to loop over the directory. */
		    while (false !== ($file = readdir($handle))) {
		        if ($file != "." && $file != "..") {
		            //echo "$file<br/>";
		            $filename = $path."/".$file;
		            $fh = fopen($filename, "r");
		            $content = fread($fh,filesize($filename));
		            //content = strip_tags($content);
		            	$copy=@copy($_FILES["file"]["tmp_name"],"../../../upload/".$postpix.$_FILES["file"]["name"]);
						$image=array(0=>array("path"=>'upload/book/'.$name.'_35x35',"width"=>30,"height"=>35,"option"=>"crop"),
									 1=>array("path"=>'upload/book/'.$name.'_60x60',"width"=>60,"height"=>60,"option"=>"crop"),
									 2=>array("path"=>'upload/book/'.$name.'_100x100',"width"=>100,"height"=>100,"option"=>"crop"),
									 3=>array("path"=>'upload/book/'.$name.'_225x225',"width"=>225,"height"=>225,"option"=>"crop"),
									 4=>array("path"=>'upload/book/'.$name.'_400x400',"width"=>400,"height"=>400,"option"=>"crop")
									);
				        for($i=0;$i<count($image);$i++) {
							$resizeObj = new resize('upload/'.$filename);
							$resizeObj -> resizeImage($image[$i]["width"], $image[$i]["height"], 'crop');
							$resizeObj -> saveImage($image[$i]["path"].".jpg", 100);
						}
		            fclose($fh);
		            @unlink("temp/$file");
		            echo $filename."<br/><hr/><br/>";
		        }
		    }
		    closedir($handle);
		}else{
			echo "Directory Does Not Exist<br>";
		}
	}
?>