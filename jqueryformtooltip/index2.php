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
		/* Style for form ends here*/
		
		/* Form validation and tooltip*/
		label.error {
			color: red;
		}
		
		input.error, select.error, textarea.error{
			border: 1px solid red;
		}
		input[type="radio"].error{
			background-color: red;
		}
		
		div.message{
		    background: transparent url('img/msg_arrow.gif') no-repeat scroll left center;
		    padding-left: 7px;
		}
		
		div.error{
		    background-color:#F3E6E6;
		    border-color: #924949;
		    border-style: solid solid solid none;
		    border-width: 2px;
		    padding: 5px;
		}
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
		    errorElement: "div",
	        wrapper: "div",  // a wrapper around the error message
	        errorPlacement: function(error, element) {
	            offset = element.offset();
	            error.insertBefore(element)
	            error.addClass('message');  // add a class to the wrapper
	            error.css('position', 'absolute');
	            error.css('left', offset.left + element.outerWidth());
	            error.css('top', offset.top);
	        },
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