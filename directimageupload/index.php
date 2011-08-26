<?php 
include_once 'config.php';
include_once 'core.php';

$obj = new CORE();
?>
<html>
<head>
<link rel="stylesheet" href="css/jquery-ui-1.8.10.custom.css">
<link rel="stylesheet" href="css/jquery.alerts.css">
<style type="text/css">
p,.imp{
	color: red;
}

</style>
<script type="text/javascript" src="js/crud.js"></script>
<script type="text/javascript" src="js/jquery-1.4.4.js"></script>
<script type="text/javascript" src="js/jquery.alerts.js"></script>
<script type="text/javascript">
	SetImageSizes = function() {
						sizes = document.getElementById('sizes').value;
						sizescsv = sizes.replace(/\n\r?/g,',');
						document.getElementById('imagesizes').value = sizescsv;
					};

	GetTableFields = function (id,value){
						$.ajax({
							url:'control/ajaxprocess.php',
							type:'post',
							data:'act=getfield&table='+value,
							success:function(response){
								$('#'+id).html(response);
							}
						});
					};
</script>	
</head>
<body>

<!-- imageresult.php -->
<form action="imageresult.php" method='post' name='directimageupload' id='directimageupload'>
	
	<table border="0px">
		<tr style="font-weight: bold;">
			<td>Server: </td>
			<td colspan="2" class="imp"><?php echo $obj->HostName();?></td>
		</tr>
		<tr style="font-weight: bold;">
			<td>Dabase Connected: </td>
			<td colspan="2" class="imp"><?php echo $obj->GetDb();?></td>
		</tr>
		<tr>
			<td>Segment: </td>
			<td>
				<input type="text" name='segment' id='segment' errortag='Segment'/>
			</td>
			<td><p id='segment_error'></p></td>
		</tr>
		<tr>
			<td>Table: </td>
			<td>
				<select name='table' id='table' onchange="GetTableFields('table_fields',this.value);">
				<?php 
					$tables = $obj->FetchTables($obj->GetDb(), "products_%",array());
					echo $obj->GenerateOptions($tables, array());
				?>
				</select>
			</td>
			<td><p id='segment_error'></p></td>
		</tr>
		<tr>
			<td>Table Fields: </td>
			<td>
				<select name='table_fields' id='table_fields'>
					<option value="">-- Select --</option>
				</select>
			</td>
			<td><p id='segment_error'></p></td>
		</tr>
		<tr>
			<td>DB Column: </td>
			<td>
				<input type="text" name='dbcolumn' id='dbcolumn' errortag='DB column'/>
				
			</td>
			<td><p id='dbcolumn_error'></p></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2">Note: Segment respected DB Table column <br/>matching image name e.g. products_book_id</td>
		</tr>
		<tr>
			<td>Source Path: </td>
			<td>
				<input type="text" name='path' id='path' errortag='Path'/>
			</td>
			<td><p id='path_error'></p></td>
		</tr>
		<tr>
			<td>Destination Path: </td>
			<td>
				<input type="text" name='desti_path' id='desti_path' errortag='Destination Path'/>
			</td>
			<td><p id='desti_path_error'></p></td>
		</tr>
		<tr>
			<td>Image Size: </td>
			<td>
				<textarea name='sizes' id='sizes' cols="16" rows="5" wrap='physical' onblur="SetImageSizes()" /></textarea>
				<input type="hidden" name='imagesizes' id='imagesizes' value="" errortag='Image Sizes'/>
			</td>
			<td><p id='imagesizes_error'></p></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="button" name="submit_form" value="Submit" onclick="saveForm('control/imageuploadvalidation.php','directimageupload')"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><p style="display: none;" id='pleasewait'>Please Wait... <img src="images/ajax-loader.gif"></p></td>
		</tr>
	</table>
</form>
</body>
</html>
