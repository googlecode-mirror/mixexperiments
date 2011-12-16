<?php
if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "image/pjpeg"))
	&& ($_FILES["file"]["size"] < 2000000)){
		
  	if ($_FILES["file"]["error"] > 0){
  		
    	echo "Error: " . $_FILES["file"]["error"] . "<br />";
    }else{
    	
	    copy($_FILES['file']['tmp_name'], 'upload/'.$_FILES["file"]["name"]);
	    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
	    echo "Type: " . $_FILES["file"]["type"] . "<br />";
	    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
	    echo "Stored in: Upload folder";
	    
	    //$img_info = getimagesize('upload/'.$_FILES["file"]["name"]);
	    $img_info = getimagesize($_FILES['file']['tmp_name']);
    	
    	//echo 'Image Info:'.;
    	if(!isset($img_info['mime']) || $img_info['mime']==''){
    		echo "<br>Invalid file, Invalid MIME";
    	}else{
    		echo "<pre>Image Info: ";
	    	print_r($img_info); 
	    	echo "</pre>";
    	}
    }
}else{
	
	echo "Invalid file";
}
?>