<html>
	<head>
		<title>jQuery Ajax</title>
		<link type="text/css" rel="stylesheet" href="css/jquery-ui-1.8.10.custom.css">
		<link type="text/css" rel="stylesheet" href="css/jquery.alerts.css">
		<link type="text/css" rel="stylesheet" href="css/style.css">
		<!-- Including main jQuery file -->
		<script type="text/javascript" src="js/jquery-1.4.4.js"></script>
		<script type="text/javascript" src="js/jquery.alerts.js"></script>
		<script type="text/javascript">

			function IsNumeric(val) {
	
				if (isNaN(parseFloat(val))) {
					return false;
				}else{
					return true;
				}
			}
			
			function Add(){
				roll_no = document.getElementById('roll_no').value;
				name = document.getElementById('name').value;
				$.ajax({
					url:'add-delete.php',
					type:'post',
					data:'act=add&roll_no='+roll_no+'&name='+name,
					beforeSend: function(){
						$('#loader').show();
					},
					complete: function(){
						$('#loader').hide();
					},
					success: function(response){
						
						if(IsNumeric(response)){
							inner = "<div id='student_"+response+"' style='display: block;'>"+
										"<span class='x-span' onclick=\"Edit('"+response+"')\" id='edit_"+response+"'><img title='Edit' src='images/user_edit.png'></span>"+
										"<span onclick=\"Delete('"+response+"')\" class='x-span' id='delete_"+response+"'><img title='Delete' src='images/user_delete.png'></span>&nbsp;"+
										"<span id='rollno_"+response+"'>"+roll_no+"</span>&nbsp;<span id='name_"+response+"'>"+name+"</span>"+
									"</div>";
							$('#div_output').prepend(inner);
							jAlert("Student Added Successfully","Inserted",function(){
								document.getElementById('name').value = "";
								document.getElementById('roll_no').value = "";
							});
						}else{
							jAlert(response,'',function(){
								document.getElementById('name').value = "";
								document.getElementById('roll_no').value = "";
							});
						}
					},
					error: function(){
						jAlert('The operation was not completed successfully. Please try again later');
					}
				});
			};
			function Delete(id){
				
				$.ajax({
					url:'add-delete.php',
					type:'post',
					data:'act=delete&id='+id,
					beforeSend: function(){
						$('#loader').show();
					},
					complete: function(){
						$('#loader').hide();
					},
					success: function(response){
						if(response=='deleted'){
							$('#student_'+id).remove();
							jAlert("Student Deleted Successfully");
						}else{
							jAlert(response);
						}
					},
					error: function(){
						jAlert('The operation was not completed successfully. Please try again later');
					}
				});
			}
			
			function Edit(id){
				rollno = $('#rollno_'+id).html();
				name = $('#name_'+id).html();
				$('#roll_no').attr('value',rollno);
				$('#name').attr('value',name);
				$('#update_id').attr('value',id);
				
				$('#cancel').show('fast',function(){
					$('#add').hide('fast',function(){
						$('#update').show('fast');
					});
					$('#student_'+id).hide('slow');
				});
			}

			function Update(){
				id = $('#update_id').attr('value');
				rollno = $('#roll_no').attr('value');
				name = $('#name').attr('value');
				$.ajax({
					url:'add-delete.php',
					type:'post',
					data:'act=update&id='+id+'&roll_no='+rollno+'&name='+name,
					beforeSend: function(){
						$('#loader').show();
					},
					complete: function(){
						$('#loader').hide();
					},
					success: function(response){
						if(response=='updated'){
							$('#rollno_'+id).html(rollno);
							$('#name_'+id).html(name);
							Cancel();
							jAlert("Student Updated Successfully");
						}else{
							jAlert(response);
						}
					},
					error: function(){
						jAlert('The operation was not completed successfully. Please try again later');
					}
				});
			}
			function Cancel(){
				$('#div_output div:hidden').show('slow',function(){
					$('#roll_no').attr('value','');
					$('#name').attr('value','');
					$('#update_id').attr('value','');
					$('#update').hide('fast',function(){
						$('#add').show('fast');
						$('#cancel').hide('fast');
					});
				});
			}
		</script>
	</head>
	<body>
		<div id='div_connect'>
		<?php 
			$link = mysql_connect('192.168.0.73','root','binary') or die(mysql_error());
			$db = mysql_selectdb('sample',$link);
			
			if($db){
		?>
			<span style="background-color: green;color: #fff;">Database Connected!!!</span>
		<?php		
			}else{
		?>
			<span style="background-color: red;color: #fff;">Database Not Connected!!!</span>
		<?php		
			}
		?>
		</div>
		
		<div id='div_input'>
			<input type="hidden" name="update_id" id='update_id' value=""/>
			<table>
				<tr>
					<td>Roll No:</td>
					<td colspan="2"><input type="text" name='roll_no' id='roll_no'/></td>
				</tr>
				<tr>
					<td>Student name:</td>
					<td colspan="2"><input type="text" name='name' id='name'/></td>
				</tr>
				<tr>
					<td><span id='loader' style="display: none;">Please Wait...<img alt="Please Wait..." src="images/ajax-loader.gif"></span></td>
					<td><input type="button" name='add' id="add" value="Add" onclick="Add()"><input type="button" name='update' id="update" value="Update" onclick="Update()" style="display: none;"></td>
					<td><input type="button" name='cancel' id="cancel" value="Cancel" onclick="Cancel()" style="display: none;"></td>
				</tr>
			</table>
		</div>
		<div id='div_output'>
		<?php 
			$query = 'select * from student_master order by student_master_id desc';
			$res = mysql_query($query);
			while($data = mysql_fetch_assoc($res)){
				$id = $data['student_master_id'];
				$roll_no = $data['roll_no'];
				$name = $data['name'];
		?>
			<div id='student_<?php echo $id;?>'><span id='edit_<?php echo $id;?>' onclick="Edit('<?php echo $id;?>')" class="x-span"><img src="images/user_edit.png" title="Edit"/></span><span id='delete_<?php echo $id;?>' class="x-span" onclick="Delete('<?php echo $id;?>')"><img src="images/user_delete.png" title="Delete"/></span>&nbsp;<span id='rollno_<?php echo $id;?>'><?php echo $roll_no;?></span>&nbsp;<span id='name_<?php echo $id;?>'><?php echo $name;?></span></div>
		<?php		
			}
		?>
		</div>
	</body>
</html>