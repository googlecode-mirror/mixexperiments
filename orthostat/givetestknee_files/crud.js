function saveForm(url,form_id,render){
	// validation of input arguments
	if(url==null || form_id==null)jAlert("Invalid or Insufficient Arguments");
	var containerObject = document.getElementById(form_id);
	var elementList = containerObject.getElementsByTagName('*');
	var postData = "";
	
	// loop for concatenating all the html elements in the postData string
	for(var i=0;i<elementList.length; i++){
		
		if(elementList[i].id!=null && elementList[i].id!="" && elementList[i].value!=null){
			
			if(elementList[i].type=="checkbox"){
				if(elementList[i].checked){
					if(postData=="")postData = elementList[i].id+"="+elementList[i].value;
					else postData += "&"+elementList[i].id+"="+elementList[i].value;
				}
			}
			else if(elementList[i].type=="radio"){
				if(elementList[i].checked){
					if(postData=="")postData = elementList[i].id+"="+elementList[i].value;
					else postData += "&"+elementList[i].id+"="+elementList[i].value;
				}
			}
			else{
				if(postData=="")postData = elementList[i].id+"="+elementList[i].value;
				else postData += "&"+elementList[i].id+"="+elementList[i].value;
			}
		}
	}
	
	for(var i=0;i<elementList.length; i++){
		if(elementList[i].type == "button"){
			elementList[i].disabled = "disabled";
		}
	}
	
	document.getElementById("indicator").style.display ="block";
	// ajax call for form validation
	$.ajax({
		url: url,
		type: "post",
		data: postData,
		async:false,
		success: function(response){
			
			// hide the loading image on request completion
			document.getElementById("indicator").style.display ="none";
			var jsonObject = eval("(" + response + ")");
			
			if(jsonObject!=null && jsonObject!=""){
				
				for(var i=0;i<elementList.length; i++){
					if(elementList[i].type == "button"){
						elementList[i].disabled = false;
					}
				}
				
				var validationData = jsonObject['data'];
				
				for(key in validationData){
					
					if(render=='1'){
						
						if(validationData[key]=="null"){
							
							document.getElementById(key).style.backgroundColor = "#FFCFCF";
						}
					}
					else{
						
						var currentObject = document.getElementById(key);
						if(currentObject!=null){
							
							var currentErrorObject = document.getElementById(key+"_error");
							if(validationData[key]=="null")currentErrorObject.innerHTML = currentObject.getAttribute("errortag") + " is empty";
							else if(validationData[key]=="invalid")currentErrorObject.innerHTML = "Invalid value for " + currentObject.getAttribute("errortag");
							else if(validationData[key]=="noentry")currentErrorObject.innerHTML = "Invalid User Password";
							else if(validationData[key]=="nomatch")currentErrorObject.innerHTML = currentObject.getAttribute("errortag")+" does not match";
							else if(validationData[key]=="atleast")currentErrorObject.innerHTML = "Enter at least one contact";
							else if(validationData[key]=="already_registered")currentErrorObject.innerHTML = currentObject.getAttribute("errortag")+" is not available";
							else if(validationData[key]=="valid")currentErrorObject.innerHTML = "&nbsp;";
						}
					}
				}
				if(jsonObject['validation']['status']=="successful"){
					if(jsonObject['validation']['clearform']!="" && jsonObject['validation']['clearform']!=null){
						
						if(jsonObject['validation']['clearform']=='yes'){
							
							clearForm(form_id);
						}
					}
					if(jsonObject['validation']['message']!="" && jsonObject['validation']['message']!=null){
						
						jAlert(jsonObject['validation']['message']);
					}
					
					if(document.getElementById('exam_msg')!=null){
						document.getElementById('exam_msg').setAttribute("class","box");
						document.getElementById('exam_msg').innerHTML = "&nbsp;";
					}
					
					if(jsonObject['validation']['url']!="" && jsonObject['validation']['url']!=null){
						url = jsonObject['validation']['url'];
						window.location = url;
					}
				}
				else{
					if(render=='1'){
						
						document.getElementById('exam_msg').setAttribute("class","box error");
						document.getElementById('exam_msg').innerHTML = jsonObject['validation']['message'];
					}
				}
			}
			else{
				
				jAlert("Sorry, No Response");
			}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			jAlert("This operation could not be completed, Please try again. Contact system admin if problem persists");
		}	
	});
}

function clearForm(form_id){
	
	if(form_id==null) jAlert("Invalid or Insufficient Arguments");
	var containerObject = document.getElementById(form_id);
	var elementList = containerObject.getElementsByTagName('*');
	
	if(elementList!=null){
		
		for(var i=0;i<elementList.length; i++){
			
			if(elementList[i].id!=null && elementList[i].id!="" && elementList[i].value!=null){
				
				if(elementList[i].type=="checkbox"){
					if(elementList[i].checked)elementList[i].checked=false;
				}
				else if(elementList[i].type=="radio"){
					if(elementList[i].checked)elementList[i].checked=false;
				}
				else if(elementList[i].type=="text"){
					if(elementList[i].value!="")elementList[i].value="";
				}
				else if(elementList[i].type=="password"){
					if(elementList[i].value!="")elementList[i].value="";
				}
			}
		}
	}
}