<html>
	<body>
	<form action="afterupload.php" method="post" enctype="multipart/form-data">
		<label for="file">Filename:</label>
		<input type="file" name="file" id="file" /><br />
		<input type="submit" name="submit" value="Submit" />
	</form>
	<?php
		function printCase($case='two'){
			switch ($case){
				case 'three':
					echo "first Case is :";
					break;
				case 'two':
					echo "Second Case is :";
					break;
				case 'one':
					echo "Third Case is :";
					break;
			}	
		}

		printCase();
	?>
	</body>
</html>