<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html><head>


	<title>Orthostat</title>
	<link rel="stylesheet" type="text/css" href="graph_files/orthostate.css">
<link rel="stylesheet" type="text/css" href="graph_files/jquery-ui-1.css">
<link rel="stylesheet" type="text/css" href="graph_files/jquery.css">
<link rel="stylesheet" type="text/css" href="graph_files/jquery_002.css">
<link rel="stylesheet" type="text/css" href="graph_files/jquery_003.css">
<link href="graph_files/style.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="graph_files/jquery-1.js"></script>
<script type="text/javascript" src="graph_files/jquery-ui-1.js"></script>
<script type="text/javascript" src="graph_files/jquery_003.js"></script>
<script type="text/javascript" src="graph_files/jquery_002.js"></script>
<script type="text/javascript" src="graph_files/jquery_004.js"></script>
<script type="text/javascript" src="graph_files/jquery.js"></script>
<script type="text/javascript" src="graph_files/crud.js"></script>

<meta http-equiv="content-type" content="text/html; charset=UTF-8">	<style>
	
	#graphIframe{
		height: 220px;
		width: 620px;
	}
	
	.listing_header{
		height: 75px;
		text-align:left;
		line-height: 20px;
		padding: 2px;
		font-size: 11px;
	}
	</style>
	<!--[if IE]>
	<style>
	#graphIframe{
		height: 270px;
		width: 640px;
	}
	
	.listing_header{
		height: 75px;
		text-align:left;
		line-height: 15px;
		padding: 2px;
		font-size: 11px;
	}
	</style>
	<![endif]-->
	<script type="text/javascript">

		window.onload = function(){

							disableInputs(3);
						
			generateGraph();
		};

		var graph_fail = 0;
		function changeBackGroundColor(id,color){
			$("#"+id).animate({ backgroundColor: color }, "slow");
		}
	
		function displayError(id,message){

			document.getElementById(id).style.backgroundColor = "#FFCFCF";
			document.getElementById('exam_msg').setAttribute("class","box error");
			document.getElementById('exam_msg').innerHTML = message;
		}
		
		function calculateValues(id1,id2){
			
			expr = /^[0-9]{1,3}$/;
			flag = true;

			index = parseInt(id1.charAt(id1.length-1));
			upper_index = index+1;

			guess=id1.split("_");
			guess=guess[0];
			
			if(document.getElementById(id1).value=="" && document.getElementById(id2).value==""){

				document.getElementById(id1).style.backgroundColor = "#FFFFFF";
				document.getElementById(id2).style.backgroundColor = "#FFFFFF";
				document.getElementById('exam_msg').setAttribute("class","box");
				document.getElementById('exam_msg').innerHTML = "&nbsp;";

				if(index==2){

					document.getElementById("proportion_interval1").value="";
					document.getElementById("cumulative_interval1").value="";
				}
			}
			else if(guess=="risk" && document.getElementById(id1).value==0){

					displayError(id1,"Risk Value can not be zero");
					flag = false;
			}
			else if(guess=="failure" && document.getElementById(id2).value==0){

					displayError(id2,"Risk Value can not be zero");
					flag = false;
			}
			else{
								
				if(!expr.test(document.getElementById(id1).value)){
					
					displayError(id1,"Some data were not entered properly");

					document.getElementById("proportion_interval"+index).value="";
					document.getElementById("cumulative_interval"+index).value="";
					document.getElementById("x_error_bar"+index).value="";
					document.getElementById("y_error_bar"+index).value="";
					
					flag = false;
				}			
				else{

					document.getElementById(id1).style.backgroundColor = "#FFFFFF";
					document.getElementById('exam_msg').setAttribute("class","box");
					document.getElementById('exam_msg').innerHTML = "&nbsp;";
				}

				if(!expr.test(document.getElementById(id2).value)){
					displayError(id2,"Some data were not entered properly");
					flag = false;
				}			
				else{

					document.getElementById(id2).style.backgroundColor = "#FFFFFF";
				}

				if(expr.test(document.getElementById(id1).value) && expr.test(document.getElementById(id2).value)){
					
					document.getElementById("risk_interval"+upper_index).disabled = false;
					document.getElementById("failure_interval"+upper_index).disabled = false;
					document.getElementById(id1).setAttribute("valid","1");
					document.getElementById(id2).setAttribute("valid","1");
				}
				else{

					document.getElementById(id1).setAttribute("valid","0");
					document.getElementById(id2).setAttribute("valid","0");
				}

				if(document.getElementById(id1).value!="" && document.getElementById(id2).value!=""){

					guess=id1.split("_");
					guess=guess[0];

					id1_value = parseInt(document.getElementById(id1).value);
					id2_value = parseInt(document.getElementById(id2).value);
					if(guess=="risk"){

						if((id1_value<=id2_value) && id1!='risk_interval10'){
							
							displayError(id1,"Invalid Risk Value");
							flag = false;
						}
					}
					else if(guess=="failure"){
						if((id1_value>=id2_value) && id1!="failure_interval10"){
							displayError(id1,"Invalid Failure Value");
							flag = false;
						}
					}
				}
			}
			
			if(flag && (document.getElementById(id1).value!="" && document.getElementById(id2).value!="")){

				document.getElementById("proportion_interval1").value=1;
				document.getElementById("cumulative_interval1").value=1;
				document.getElementById("x_error_bar1").value=1;
				calculatePartionateInterval(id1,id2);
				recalculateAll();
				graph_fail = 0;
				document.getElementById('generate_graph').disabled = false;
			}
			else{
				graph_fail = 1;
				document.getElementById('generate_graph').style.disabled = true;
			}
		}

		function calculatePartionateInterval(id1,id2){

			guess_array = id1.split("_");
			guess1 = guess_array[0];
			guess2 = guess_array[1];
			index = parseInt(id1.charAt(id1.length-1));
			if(index==0)index = 10;
			lower_index = index-1;
			upper_index = index+1;
			
			if(guess1=="risk"){
				risk = parseInt(document.getElementById(id1).value);
				failure = parseInt(document.getElementById(id2).value);
			}
			else{
				risk = parseInt(document.getElementById(id2).value);
				failure = parseInt(document.getElementById(id1).value);
			}

			// proportion_interval
			proportion_interval = (risk-failure)/risk;
			proportion_interval = proportion_interval.toFixed(4);
			document.getElementById("proportion_interval"+index).value = proportion_interval;

			// cumulative_interval
			x = parseFloat(document.getElementById("cumulative_interval"+lower_index).value);
			y = proportion_interval;
			cumulative_interval = (x*y);
			cumulative_interval = cumulative_interval.toFixed(4);
			document.getElementById("cumulative_interval"+index).value = cumulative_interval;

			// x_error_bar
			if(index!=10){
				upper_error = parseInt(document.getElementById("x_axis"+upper_index).value);
				lower_error = parseInt(document.getElementById("x_axis"+index).value);
				x_error_bar = upper_error-lower_error;
				document.getElementById("x_error_bar"+index).value = x_error_bar;
			}

			// y_error_bar
			upper_error = parseFloat(document.getElementById("cumulative_interval"+index).value);
			lower_error = parseFloat(document.getElementById("cumulative_interval"+lower_index).value);
			
			y_error_bar = upper_error-lower_error;
			y_error_bar = y_error_bar.toFixed(4);
			document.getElementById("y_error_bar"+index).value = y_error_bar;
		}

		function recalculateAll(){

			for(i=2;i<=10;i++){
				risk = document.getElementById("risk_interval"+i);
				failure = document.getElementById("failure_interval"+i);

				if(risk.getAttribute("valid")=="1" && failure.getAttribute("valid")=="1"){

					risk_id = "risk_interval"+i;
					failure_id = "failure_interval"+i;
					calculatePartionateInterval(risk_id,failure_id);
				}
			}
		}
		
		function disableInputs(index){

			for(i=index;i<=10;i++){

				document.getElementById("risk_interval"+i).disabled = true;
				document.getElementById("failure_interval"+i).disabled = true;
			}
		}

		function generateGraph(){

			if(graph_fail==0){
				x_axis="";
				y_axis="";
	
				db_freq="";
				db_freq_val="";
	
				db_risk="";
				db_failure="";
				
				for(i=1;i<=10;i++){
					
					if(document.getElementById("x_axis"+i).value!="" && document.getElementById("cumulative_interval"+i).value!=""){
						if(x_axis==""){
							
							x_axis += document.getElementById("x_axis"+i).value+","+document.getElementById("x_axis"+i).value;
						}
						else{
	
							x_axis += ","+document.getElementById("x_axis"+i).value+","+document.getElementById("x_axis"+i).value;
						}
	
						if(y_axis==""){
							
							y_axis += document.getElementById("cumulative_interval"+i).value+","+document.getElementById("cumulative_interval"+i).value;
						}
						else{
	
							y_axis += ","+document.getElementById("cumulative_interval"+i).value+","+document.getElementById("cumulative_interval"+i).value;
						}
					}
	
					if(db_freq=="" && db_freq_val==""){
						db_freq_val += (document.getElementById("x_axis"+i).value!="")
						db_freq += (document.getElementById("interval"+i).value!="")
					}
					else{
						db_freq_val += ","+document.getElementById("x_axis"+i).value;
						db_freq += ","+document.getElementById("interval"+i).value;
					}
	
					if(db_risk=="" && db_failure==""){
						db_risk += (document.getElementById("risk_interval"+i).value!="")?document.getElementById("risk_interval"+i).value:0;
						db_failure += (document.getElementById("failure_interval"+i).value!="")?document.getElementById("failure_interval"+i).value:0;
					}
					else{
						db_risk += (document.getElementById("risk_interval"+i).value!="")?","+document.getElementById("risk_interval"+i).value:","+0;
						db_failure += (document.getElementById("failure_interval"+i).value!="")?","+document.getElementById("failure_interval"+i).value:","+0;
					}
				}
				
				if(x_axis=="" || y_axis==""){
					jAlert("Please fill up the form to generate chart");
					return false;
				}
				else{
	
					first_comma = x_axis.indexOf(",");
					last_comma = y_axis.lastIndexOf(",");
					
					x_axis = x_axis.substring(first_comma+1);
					y_axis = y_axis.substring(0,last_comma);
				}
				
				parameters = "t:"+x_axis+"|"+y_axis;
				graph_string = "cht=lxy&chtt=Survival Chart&chs=600x200&chxt=x,y&chxr=1,0,1,0.2|0,0,40,5&chds=0,40,0,1&chls=1&chxs=0,676767,10.5,0.5,l,676767|1,676767,10.5,0.5,l,676767&chd="+parameters+"&chma=|0,10";
	
				
				$.ajax({
	
					url: "usergraphdetails.php",
					type: "post",
					data:"freq="+db_freq+"&freq_val="+db_freq_val+"&risk="+db_risk+"&failure="+db_failure,
					async:false,
					success:function(response){
						
						document.getElementById("graphIframe").src = "http://chart.apis.google.com/chart?"+graph_string;
					},
					error:function(){
						jAlert("The operation was not completed successfully. Please, try later");
					}
				});
			}
			else{

				jAlert("Enter form values properly");
			}
		}
	</script>
</head><body>
	<div align="center">
	<form method="post" name="graph_form" id="graph_form">
		<div class="header"><div class="logo">
		<div class="logo1" onclick="window.location='/orthostat/'" style="cursor: pointer;">&nbsp;</div>
	<div class="email" id="logged_user">
		<div id="logged_user_name" style="width: 240px; line-height: 30px; float: left; text-align: right; font-weight: bold; font-size: 13px; padding-left: 20px;">&nbsp;Hi, Shivani</div>
		<div style="float: left; width: 20px;">&nbsp;</div>
        <div>
        	<input style="cursor: pointer;" class="login" id="logout" value="Log Out" name="logout" onclick="window.location='logout.php'" type="button">
        </div>
        <div class="clr">&nbsp;</div>
	</div>
	</div></div>
		<div class="midarea" style="height: auto; background-color: rgb(244, 244, 242);">
			<div style="height: 445px;">
				<div style="height: 30px; padding-top: 20px; font-weight: bold;">Graph</div>
				<div style="height: 30px;">
					<div class="box" id="exam_msg" style="padding-left: 5px; font-size: 13px; margin-top: 0px; line-height: 20px; margin-bottom: 5px;">&nbsp;</div>
				</div>
				<div>
					<div id="div_graph_parameter">
						<div class="listing_header">
							<div class="fl wb br bx" style="padding-top: 30px; height: 34px;">X-axis values</div>
							<div class="fl wb br bx" style="padding-top: 30px; height: 34px;">Interval</div>
							<div class="fl wb br bx" style="padding-top: 10px; height: 54px;">At risk in the interval</div>
							<div class="fl wb br bx" style="padding-top: 10px; height: 54px;">No. of failures during interval</div>
							<div class="fl wb br bx" style="padding-top: 0px; height: 64px;">Proportion surviving interval</div>
							<div class="fl wb br bx" style="padding-top: 0px; height: 64px; word-wrap: break-word;">Cumulative survival at end of interval<br>(Y-axis values)</div>
							<div class="fl wb br bx" style="padding-top: 30px; height: 34px; width: 100px;">X-Error bar</div>
							<div class="fl wb br bx" style="padding-top: 30px; height: 34px;">Y-Error bar</div>
							<div class="clr">&nbsp;</div>
						</div>
						<div class="listing_content" style="height: 200px;">
												
							<div class="listing_row0" id="row0">
								<div class="fl" style="width: 10px; text-align: right;">1:</div>
								<div class="fl bx1">
									<input name="x_axis1" id="x_axis1" readonly="readonly" value="0" type="text">
								</div>
								<div class="fl bx1">
									<input name="interval1" id="interval1" readonly="readonly" type="text">
								</div>
								<div class="fl bx1">
									<input name="risk_interval1" readonly="readonly" id="risk_interval1" type="text">
								</div>
								<div class="fl bx1">
									<input name="failure_interval1" readonly="readonly" id="failure_interval1" type="text">
								</div>
								<div class="fl bx1">
									<input name="proportion_interval1" id="proportion_interval1" readonly="readonly" value="1" type="text">
								</div>
								<div class="fl bx1">
									<input name="cumulative_interval1" id="cumulative_interval1" readonly="readonly" value="1" type="text">
								</div>
								<div class="fl bx1">
									<input name="x_error_bar1" id="x_error_bar1" readonly="readonly" value="1" type="text">
								</div>
								<div class="fl bx1">
									<input name="y_error_bar1" id="y_error_bar1" readonly="readonly" type="text">
								</div>
								<div class="clr">&nbsp;</div>
							</div>
							<div class="listing_row0" id="row1">
								<div class="fl" style="width: 10px; text-align: right;">2:</div>
								<div class="fl bx1">
									<input name="x_axis2" id="x_axis2" readonly="readonly" value="1" type="text">
								</div>
								<div class="fl bx1">
									<input name="interval2" id="interval2" readonly="readonly" value="0 to 1" type="text">
								</div>
								<div class="fl bx1">
									<input valid="1" style="background-color: rgb(255, 255, 255);" name="risk_interval2" id="risk_interval2" value="15" onkeyup="calculateValues('risk_interval2','failure_interval2')" type="text">
								</div>
								<div class="fl bx1">
									<input valid="1" style="background-color: rgb(255, 255, 255);" name="failure_interval2" id="failure_interval2" value="3" onkeyup="calculateValues('failure_interval2','risk_interval2')" type="text">
								</div>
								<div class="fl bx1">
									<input name="proportion_interval2" id="proportion_interval2" readonly="readonly" value="0.8000" type="text">
								</div>
								<div class="fl bx1">
									<input name="cumulative_interval2" id="cumulative_interval2" readonly="readonly" value="0.8000" type="text">
								</div>
								<div class="fl bx1">
									<input name="x_error_bar2" id="x_error_bar2" readonly="readonly" value="2" type="text">
								</div>
								<div class="fl bx1">
									<input name="y_error_bar2" id="y_error_bar2" readonly="readonly" value="-0.2000" type="text">
								</div>
								<div class="clr">&nbsp;</div>
							</div>
							<div class="listing_row0" id="row2">
								<div class="fl" style="width: 10px; text-align: right;">3:</div>
								<div class="fl bx1">
									<input name="x_axis3" id="x_axis3" readonly="readonly" value="3" type="text">
								</div>
								<div class="fl bx1">
									<input name="interval3" id="interval3" readonly="readonly" value="1 to 3" type="text">
								</div>
								<div class="fl bx1">
									<input valid="1" style="background-color: rgb(255, 255, 255);" name="risk_interval3" id="risk_interval3" value="14" onkeyup="calculateValues('risk_interval3','failure_interval3')" type="text">
								</div>
								<div class="fl bx1">
									<input valid="1" style="background-color: rgb(255, 255, 255);" name="failure_interval3" id="failure_interval3" value="2" onkeyup="calculateValues('failure_interval3','risk_interval3')" type="text">
								</div>
								<div class="fl bx1">
									<input name="proportion_interval3" id="proportion_interval3" readonly="readonly" value="0.8571" type="text">
								</div>
								<div class="fl bx1">
									<input name="cumulative_interval3" id="cumulative_interval3" readonly="readonly" value="0.6857" type="text">
								</div>
								<div class="fl bx1">
									<input name="x_error_bar3" id="x_error_bar3" readonly="readonly" value="1" type="text">
								</div>
								<div class="fl bx1">
									<input name="y_error_bar3" id="y_error_bar3" readonly="readonly" value="-0.1143" type="text">
								</div>
								<div class="clr">&nbsp;</div>
							</div>
							<div class="listing_row0" id="row3">
								<div class="fl" style="width: 10px; text-align: right;">4:</div>
								<div class="fl bx1">
									<input name="x_axis4" id="x_axis4" readonly="readonly" value="4" type="text">
								</div>
								<div class="fl bx1">
									<input name="interval4" id="interval4" readonly="readonly" value="3 to 4" type="text">
								</div>
								<div class="fl bx1">
									<input valid="1" style="background-color: rgb(255, 255, 255);" name="risk_interval4" id="risk_interval4" value="13" onkeyup="calculateValues('risk_interval4','failure_interval4')" type="text">
								</div>
								<div class="fl bx1">
									<input valid="1" style="background-color: rgb(255, 255, 255);" name="failure_interval4" id="failure_interval4" value="1" onkeyup="calculateValues('failure_interval4','risk_interval4')" type="text">
								</div>
								<div class="fl bx1">
									<input name="proportion_interval4" id="proportion_interval4" readonly="readonly" value="0.9231" type="text">
								</div>
								<div class="fl bx1">
									<input name="cumulative_interval4" id="cumulative_interval4" readonly="readonly" value="0.6330" type="text">
								</div>
								<div class="fl bx1">
									<input name="x_error_bar4" id="x_error_bar4" readonly="readonly" value="3" type="text">
								</div>
								<div class="fl bx1">
									<input name="y_error_bar4" id="y_error_bar4" readonly="readonly" value="-0.0527" type="text">
								</div>
								<div class="clr">&nbsp;</div>
							</div>
							<div class="listing_row0" id="row4">
								<div class="fl" style="width: 10px; text-align: right;">5:</div>
								<div class="fl bx1">
									<input name="x_axis5" id="x_axis5" readonly="readonly" value="7" type="text">
								</div>
								<div class="fl bx1">
									<input name="interval5" id="interval5" readonly="readonly" value="4 to 7" type="text">
								</div>
								<div class="fl bx1">
									<input valid="1" style="background-color: rgb(255, 255, 255);" name="risk_interval5" id="risk_interval5" value="12" onkeyup="calculateValues('risk_interval5','failure_interval5')" type="text">
								</div>
								<div class="fl bx1">
									<input valid="1" style="background-color: rgb(255, 255, 255);" name="failure_interval5" id="failure_interval5" value="1" onkeyup="calculateValues('failure_interval5','risk_interval5')" type="text">
								</div>
								<div class="fl bx1">
									<input name="proportion_interval5" id="proportion_interval5" readonly="readonly" value="0.9167" type="text">
								</div>
								<div class="fl bx1">
									<input name="cumulative_interval5" id="cumulative_interval5" readonly="readonly" value="0.5803" type="text">
								</div>
								<div class="fl bx1">
									<input name="x_error_bar5" id="x_error_bar5" readonly="readonly" value="4" type="text">
								</div>
								<div class="fl bx1">
									<input name="y_error_bar5" id="y_error_bar5" readonly="readonly" value="-0.0527" type="text">
								</div>
								<div class="clr">&nbsp;</div>
							</div>
							<div class="listing_row0" id="row5">
								<div class="fl" style="width: 10px; text-align: right;">6:</div>
								<div class="fl bx1">
									<input name="x_axis6" id="x_axis6" readonly="readonly" value="11" type="text">
								</div>
								<div class="fl bx1">
									<input name="interval6" id="interval6" readonly="readonly" value="7 to 11" type="text">
								</div>
								<div class="fl bx1">
									<input valid="1" style="background-color: rgb(255, 255, 255);" name="risk_interval6" id="risk_interval6" value="12" onkeyup="calculateValues('risk_interval6','failure_interval6')" type="text">
								</div>
								<div class="fl bx1">
									<input valid="1" style="background-color: rgb(255, 255, 255);" name="failure_interval6" id="failure_interval6" value="1" onkeyup="calculateValues('failure_interval6','risk_interval6')" type="text">
								</div>
								<div class="fl bx1">
									<input name="proportion_interval6" id="proportion_interval6" readonly="readonly" value="0.9167" type="text">
								</div>
								<div class="fl bx1">
									<input name="cumulative_interval6" id="cumulative_interval6" readonly="readonly" value="0.5320" type="text">
								</div>
								<div class="fl bx1">
									<input name="x_error_bar6" id="x_error_bar6" readonly="readonly" value="1" type="text">
								</div>
								<div class="fl bx1">
									<input name="y_error_bar6" id="y_error_bar6" readonly="readonly" value="-0.0483" type="text">
								</div>
								<div class="clr">&nbsp;</div>
							</div>
							<div class="listing_row0" id="row6">
								<div class="fl" style="width: 10px; text-align: right;">7:</div>
								<div class="fl bx1">
									<input name="x_axis7" id="x_axis7" readonly="readonly" value="12" type="text">
								</div>
								<div class="fl bx1">
									<input name="interval7" id="interval7" readonly="readonly" value="11 to 12" type="text">
								</div>
								<div class="fl bx1">
									<input valid="1" style="background-color: rgb(255, 255, 255);" name="risk_interval7" id="risk_interval7" value="10" onkeyup="calculateValues('risk_interval7','failure_interval7')" type="text">
								</div>
								<div class="fl bx1">
									<input valid="1" style="background-color: rgb(255, 255, 255);" name="failure_interval7" id="failure_interval7" value="1" onkeyup="calculateValues('failure_interval7','risk_interval7')" type="text">
								</div>
								<div class="fl bx1">
									<input name="proportion_interval7" id="proportion_interval7" readonly="readonly" value="0.9000" type="text">
								</div>
								<div class="fl bx1">
									<input name="cumulative_interval7" id="cumulative_interval7" readonly="readonly" value="0.4788" type="text">
								</div>
								<div class="fl bx1">
									<input name="x_error_bar7" id="x_error_bar7" readonly="readonly" value="6" type="text">
								</div>
								<div class="fl bx1">
									<input name="y_error_bar7" id="y_error_bar7" readonly="readonly" value="-0.0532" type="text">
								</div>
								<div class="clr">&nbsp;</div>
							</div>
							<div class="listing_row0" id="row7">
								<div class="fl" style="width: 10px; text-align: right;">8:</div>
								<div class="fl bx1">
									<input name="x_axis8" id="x_axis8" readonly="readonly" value="18" type="text">
								</div>
								<div class="fl bx1">
									<input name="interval8" id="interval8" readonly="readonly" value="12 to 18" type="text">
								</div>
								<div class="fl bx1">
									<input valid="1" style="background-color: rgb(255, 255, 255);" name="risk_interval8" id="risk_interval8" value="9" onkeyup="calculateValues('risk_interval8','failure_interval8')" type="text">
								</div>
								<div class="fl bx1">
									<input valid="1" style="background-color: rgb(255, 255, 255);" name="failure_interval8" id="failure_interval8" value="1" onkeyup="calculateValues('failure_interval8','risk_interval8')" type="text">
								</div>
								<div class="fl bx1">
									<input name="proportion_interval8" id="proportion_interval8" readonly="readonly" value="0.8889" type="text">
								</div>
								<div class="fl bx1">
									<input name="cumulative_interval8" id="cumulative_interval8" readonly="readonly" value="0.4256" type="text">
								</div>
								<div class="fl bx1">
									<input name="x_error_bar8" id="x_error_bar8" readonly="readonly" value="6" type="text">
								</div>
								<div class="fl bx1">
									<input name="y_error_bar8" id="y_error_bar8" readonly="readonly" value="-0.0532" type="text">
								</div>
								<div class="clr">&nbsp;</div>
							</div>
							<div class="listing_row0" id="row8">
								<div class="fl" style="width: 10px; text-align: right;">9:</div>
								<div class="fl bx1">
									<input name="x_axis9" id="x_axis9" readonly="readonly" value="24" type="text">
								</div>
								<div class="fl bx1">
									<input name="interval9" id="interval9" readonly="readonly" value="18 to 24" type="text">
								</div>
								<div class="fl bx1">
									<input valid="1" style="background-color: rgb(255, 255, 255);" name="risk_interval9" id="risk_interval9" value="6" onkeyup="calculateValues('risk_interval9','failure_interval9')" type="text">
								</div>
								<div class="fl bx1">
									<input valid="1" style="background-color: rgb(255, 255, 255);" name="failure_interval9" id="failure_interval9" value="1" onkeyup="calculateValues('failure_interval9','risk_interval9')" type="text">
								</div>
								<div class="fl bx1">
									<input name="proportion_interval9" id="proportion_interval9" readonly="readonly" value="0.8333" type="text">
								</div>
								<div class="fl bx1">
									<input name="cumulative_interval9" id="cumulative_interval9" readonly="readonly" value="0.3547" type="text">
								</div>
								<div class="fl bx1">
									<input name="x_error_bar9" id="x_error_bar9" readonly="readonly" value="2" type="text">
								</div>
								<div class="fl bx1">
									<input name="y_error_bar9" id="y_error_bar9" readonly="readonly" value="-0.0709" type="text">
								</div>
								<div class="clr">&nbsp;</div>
							</div>
							<div class="listing_row0" id="row9">
								<div class="fl" style="width: 10px; text-align: right;">10:</div>
								<div class="fl bx1">
									<input name="x_axis10" id="x_axis10" readonly="readonly" value="26" type="text">
								</div>
								<div class="fl bx1">
									<input name="interval10" id="interval10" readonly="readonly" value="24 to 26" type="text">
								</div>
								<div class="fl bx1">
									<input valid="1" style="background-color: rgb(255, 255, 255);" name="risk_interval10" id="risk_interval10" value="2" onkeyup="calculateValues('risk_interval10','failure_interval10')" type="text">
								</div>
								<div class="fl bx1">
									<input valid="1" style="background-color: rgb(255, 255, 255);" name="failure_interval10" id="failure_interval10" value="1" onkeyup="calculateValues('failure_interval10','risk_interval10')" type="text">
								</div>
								<div class="fl bx1">
									<input name="proportion_interval10" id="proportion_interval10" readonly="readonly" value="0.5000" type="text">
								</div>
								<div class="fl bx1">
									<input name="cumulative_interval10" id="cumulative_interval10" readonly="readonly" value="0.1774" type="text">
								</div>
								<div class="fl bx1">
									<input name="x_error_bar10" id="x_error_bar10" readonly="readonly" type="text">
								</div>
								<div class="fl bx1">
									<input name="y_error_bar10" id="y_error_bar10" readonly="readonly" value="-0.1773" type="text">
								</div>
								<div class="clr">&nbsp;</div>
							</div>
												</div>
					</div>
				</div>
			</div>
			<iframe src="graph_files/chart_002.png" id="graphIframe" name="graphIframe"></iframe>
			<div style="width: 30%; height: 30px; margin: 10px;" align="center">
				<input style="cursor: pointer; width: 118px; background-image: url(&quot;images/index_2_09.jpeg&quot;);" class="login" id="generate_graph" value="Generate Graph" name="generate_graph" onclick="generateGraph();" type="button">
		        <input style="cursor: pointer;" class="login" id="back" value="Back" name="back" onclick="window.location='index.php'" type="button">
			</div>
			<div class="indicator" id="indicator" align="center">&nbsp;</div>
			<div class="clr">&nbsp;</div>
		</div>
		<div class="footer"><div style="float: left;">COPYRIGHT(C) 2010 <span style="color: rgb(0, 32, 123);">ORTHOSTATS.COM</span>  ALL RIGHTS RESERVED. </div>
<div class="menu">
	<ul>
		<li><a href="#" class="img1">About Us</a></li>
			<li><a href="#" class="img1">Disclaimer</a></li>
			<li><a href="#" class="img3">Contact Us</a></li>
        </ul>
</div></div>
	</form>
	</div>
</body></html>