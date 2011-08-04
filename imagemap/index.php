<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>Orthostat</title>
<link rel="stylesheet" type="text/css" href="css/orthostate.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.2.custom.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery.ui.core.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery.ui.datepicker.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery.alerts.css"/>
<link href="css/style.css" rel="stylesheet" type="text/css"/>

<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.js"></script>

<script type="text/javascript" src="js/jquery.ui.core.js"></script>
<script type="text/javascript" src="js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="js/jquery.alerts.js"></script>
<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="js/crud.js"></script>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">	<script type="text/javascript" src="js/imagemap.js"></script>
	<!--[if IE]>
    <script defer type="text/javascript" src="/js/pngfix_map.js"></script>
    <![endif]-->
	<script type="text/javascript">

		window.onload = function(){

								};
		function checkEmailPassword(){

			email = document.getElementById("user_email").value;
			password = document.getElementById("user_password").value;
			length=password.length;
			regex = /^[a-zA-Z0-9]+([_a-zA-Z0-9-\+\.]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z0-9]{2,3})$/;
			
			if(email=="" || email=="Email"){
				document.getElementById("user_email").focus();
				jAlert("Enter Your Email");
				return false;
			}
			else if(!regex.test(email)){
				document.getElementById("user_email").focus();
				jAlert("Enter proper Email address");
				return false;
			}
			else if(password=="" || password=="Password"){
				document.getElementById("user_password").focus();
				jAlert("Enter Your Password");
				return false;
			}
			else if(length<5 || length>20){
				document.getElementById("user_password").focus();
				jAlert("Enter Your Password");
				return false;
			}
			else{
				return true;
			}
		}

		function goLocation(url){

			user_id = ""
			if(user_id=="" || user_id==null){
				jAlert("Please, Login to view this page");
			}
			else{
				window.location = url;
			}
		}

		function blankThis(element){

			if(element.value=="Email" || element.value=="Password"){
				element.value="";
			}
		}

		function fetchLatestScore(part){

			user_id = 'rajan';
			if(user_id=="" || user_id==null){

				document.getElementById('score').innerHTML = "Please login to view score";
				document.getElementById('score').style.display = "block";
			}
			else{

				document.getElementById('score').style.display = "none";
				document.getElementById('loader').style.display = "block";
				$.ajax({

					url:"control/fetchlatestscore.php",
					type:"post",
					data:"part="+part+"&user_id=",
					success: function(response){

						document.getElementById('loader').style.display = "none";
						
						var json_object = eval("("+response+")");
						
						if(json_object!="" && json_object!=null){
							
							if(json_object['test']=='null' && json_object['date']=='null' && json_object['score']=='null'){

								document.getElementById('score').innerHTML = "You have't taken any test. Please take test to view score";
								document.getElementById('score').style.display = "block";
							}
							else{
								document.getElementById('test_name').innerHTML = json_object['test'];
								document.getElementById('test_date').innerHTML = json_object['date'];
								document.getElementById('test_score').innerHTML = json_object['score'];
								document.getElementById('score').style.display = "block";
							}
						}
					},
					error: function(){
						jAlert("The operation was not completed successfully. Please, try later.");
					}
				});
			}
		}
	</script>

</head>
<body>
<div align="center">
<div class="header">
	<div class="logo">
		<div class="logo1" onclick="window.location='index.php'" style="cursor:pointer;">&nbsp;</div>
	<div class="email" style="display: block;" id="email_div">
		<form name="aurtostate_login" id="aurtostate_login" method="post" onsubmit="return checkEmailPassword();" action="index.php">
	      	<div>
	          <input name="user_email" id="user_email" type="text" class="textfield" title="Email Id" value="Email" onfocus="blankThis(this);" style="width: 130px;"/>
	      	</div>

	        <div>
	          <input name="user_password" id="user_password" type="password" class="textfield password" value="Password" title="Input Password" size="20" onfocus="blankThis(this);"/>
	        </div>
	        <div>
	        	<input type="submit" class="login" id="login" value="Log In" name="login" style="display: block;"/>
	        </div>
       	</form>
      </div>
      </div></div>

<div id="center" class="midarea" style="background-image: url('images/midarea1.gif');height:560px;">
	<div>
		<div>
			<div class="mainimg">
				<img id="mouseoverlayer" name="mouseoverlayer" src="images/spacer.gif" usemap="#imagemap" style="display: block;width: 308px;height: 560px;border: none;"/>
			</div>
			<div id="tooltip" style="display: none;">
				<div id="loader" style="display: none;">
					<img src="images/ajax-loader.gif" style="position: relative;top: 7px;"/>

				</div>
				<div id="score" style="display: none;">
					<div>
						<div class="fl col1">Test</div>
						<div class="fl col2">:</div>
						<div class="fl col3" id="test_name">&nbsp;</div>
						<div class="clr">&nbsp;</div>
					</div>

					<div>
						<div class="fl col1">Date</div>
						<div class="fl col2">:</div>
						<div class="fl col3" id="test_date">&nbsp;</div>
						<div class="clr">&nbsp;</div>
					</div>
					<div>
						<div class="fl col1">Score</div>

						<div class="fl col2">:</div>
						<div class="fl col3" id="test_score">&nbsp;</div>
						<div class="clr">&nbsp;</div>
					</div>
					
				</div>
			</div>
						<map name="imagemap">
				<area alt="" coords="120,117,40" title="Shoulders" shape="circle" nohref="nohref" onmouseover="tooltip('shoulder',event);" onmousemove="tooltip('shoulder',event);" onmouseout="imageout();"/>

				<area alt="" coords="220,117,40" title="Shoulders" shape="circle" nohref="nohref" onmouseover="tooltip('shoulder',event);" onmousemove="tooltip('shoulder',event);" onmouseout="imageout();"/>
				<area alt="" coords="110,230,225,295" title="Hips" shape="rect" nohref="nohref" onmouseover="tooltip('hip',event);" onmousemove="tooltip('hip',event);" onmouseout="imageout();"/>
				<area alt="" coords="140,395,40" title="Knees" shape="circle" nohref="nohref" onmouseover="tooltip('knee',event);" onmousemove="tooltip('knee',event);" onmouseout="imageout();"/>
				<area alt="" coords="190,395,40" title="Knees" shape="circle" nohref="nohref" onmouseover="tooltip('knee',event);" onmousemove="tooltip('knee',event);" onmouseout="imageout();"/>
			</map>
		</div>
	</div>
	<div class="menuarea">
    	 <div class="signarea">

    	        	    <input type="button" style="cursor: pointer;" value="Sign up for free" name="Sign up for free" id="signup" class="signarea1" onclick="window.location='registerupdate.php';"/>
            <div style="display: block;" id="twitter" class="twitter">
            	<a href="#"><img width="23" height="24" border="0" alt="Twitter" src="images/twitter.jpg"/></a>
            </div>
            <div style="display: block;" id="facebook" class="facebook">
            	<a href="#"><img width="23" height="24" border="0" alt="Facebook" src="images/facebook.jpg"/></a>
            </div>
                  </div>
 	     <div class="mainmenuarea">

			<div onclick="goLocation('questionareslisting.php');">
        		<a class="linca" href="#">
       	 		<p class="lincatext"><strong>Score<br/>
       	   		 Calculation <br/>
       	    	 Sheet<br/></strong>
       	  		</p></a>
        	</div>

       		
            <div class="verlin1"></div>
        	
            <div onclick="goLocation('userstestreview.php');">
            <a class="lincb" href="#">
            <p class="lincbtext"><strong>Statistical Tests</strong></p></a>
            </div>
            
            <div class="horline"></div>
        	
            <div onclick="goLocation('graph.php');">
                <a class="lincc" href="#">

                <p class="lincctext"><strong> <span style="font-size: 14px; line-height: 22px;">Graphs</span><br/>
                Log in to save results, <br/>
                graphs, complete <br/>
                and incomplete data….</strong></p></a>
            </div>
       	    
            <div class="verlin2"></div>

       	    
            <div onclick="goLocation('userstestreview.php');">
            	<a class="lincd" href="#"><p class="lincbtext"><strong>Saved Data</strong></p></a>
            </div>
   	 	 </div>
    </div>
</div>
<div class="footer">
	<div style="float:left">COPYRIGHT(C) 2010 <span style="color:#00207b;">ORTHOSTATS.COM</span>  ALL RIGHTS RESERVED. </div>

<div class="menu">
	<ul>
		<li><a href="#" class="img1">About Us</a></li>
			<li><a href="#" class="img1">Disclaimer</a></li>
			<li><a href="#" class="img3">Contact Us</a></li>
        </ul>
</div></div>
</div>
</body>

</html>
