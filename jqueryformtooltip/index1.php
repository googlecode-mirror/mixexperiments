<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="keywords" content="jquery,ui,easy,easyui,web">
	<meta name="description" content="easyui help you build your web page easily!">
	<title>Jquery Tooltip</title>
	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.2.custom.css">
	<style type="text/css">
		
		/* Style for form*/
		#content {
		    border-left: 1px solid #DCDCDC;
		    border-right: 1px solid #DCDCDC;
		    margin: auto;
		    overflow: hidden;
		    padding: 8px;
		}
		
		form span {
		    display: block;
		    float: left;
		    clear:both;
		    margin: 8px;
		    text-align: right;
		    vertical-align: middle;
		    width: 150px;
		}
		
		input {
			position: relative;
		    background-color: #FFFFFF;
		    border-color: #DFDFDF;
		    border-style: solid;
		    border-width: 1px;
		    color: #676767;
		    margin: 8px 3px 8px 8px;
		    padding: 2px 2px;
		}
		
		textarea, select {
		    background-color: #FFFFFF;
		    border-color: #DFDFDF;
		    border-style: solid;
		    border-width: 1px;
		    color: #676767;
		    margin: 8px 3px 8px 8px;
		    padding: 2px 2px;
		}
		
		label.error {
			color: red;
		    /*display:inline-block !important;*/
		    display:none !important;
		    width:22px;
		    height:22px;
		    vertical-align: middle;
		}
		
		.error:hover + label.error {
		    display: inline-block !important; /* se fuerza a mostrar el bloque */
		    position: absolute; /* se fuerza a que se ubique en un lugar de la pantalla */ 
		    /*left:2em;  donde va a estar */
		    width:auto; /* el ancho por defecto que va a tener */
		    padding:5px; /* la separación entre el contenido y los bordes */
		    /*background-color: #ff6611;  el color de fondo por defecto */
		    background-color: #ff6611;
		    border: 3px coral solid;
		    border-radius: 0.5em;
		    color: white;
		    opacity: 0.85;
		    z-index: 10;
		}
		
		input.error, select.error, textarea.error{
			border: 1px solid red;
		}
		input[type="radio"].error{
			background-color: red;
		}
		/* Style for form ends here*/
		
		/* Style for tooltip*/
		
		/* Style for tooltip ends*/
	</style>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate.js"></script>
	<script type="text/javascript">

	
	$(document).ready(function(){
		$("#form_tooltip").validate({
		    submitHandler: function(form) {
		        form.submit();
		    },
		    onfocusout: function(element) {
		        if ( !this.checkable(element)) {
		            this.element(element);
		        }
		    },
//		    errorPlacement: function(error, element) {
//		        
//		    },
		    success: function(element) {
		        $(element).addClass("checked");
		    }
		});
	});
	</script>
</head>
<body>
<div id="content">
	<form id="form_tooltip">
		<div>
			<span> First Name: </span>
			<input type="text" name="fname" class="required"/>
		</div>
		<div>
			<span> Last Name: </span>
			<input type="text" name="lname" class="required"/>
		</div>
		<div>
			<span> Country: </span>
			<select name="country" class="required"><option value="">--Select</option></select>
		</div>
		<div>
			<span> Message: </span>
			<textarea name="message" rows="3" cols="3" class="required"></textarea>
		</div>
		<div>
			<span> Gender: </span>
			<input type="radio" name="gender" class="required" value="male"><input type="radio" name="gender" class="required" value="female">
		</div>
		<div>
			<span> &nbsp;</span>
			<input type="submit" value="Submit">
		</div>
	</form>
</div>
</body>
</html>