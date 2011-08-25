// Crud.js
// @Version: 1.0
// @Author: Rajan Y. Rawal
// @desc :  This function creates the parameter string, which is sent to validation file using ajax
// 			The function receives the response and decodes the response ajax and based on the response the function validates
//			the from or throws error in the page
function saveForm(url,form_id){
	
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
	//alert(postData);return false;
	for(var i=0;i<elementList.length; i++){
		if(elementList[i].type == "button"){
			elementList[i].disabled = "disabled";
		}
	}
	
	// ajax call for form validation
	$.ajax({
		url: url,
		type: "post",
		data: postData,
		beforeSend: function(){
			$('#pleasewait').show();
		},
		complete: function(){
			$('#pleasewait').hide();
		},
		success: function(response){
			// hide the loading image on request completion
			
			var jsonObject = eval("(" + response + ")");
			
			if(jsonObject!=null && jsonObject!=""){
				
				for(var i=0;i<elementList.length; i++){
					if(elementList[i].type == "button"){
						elementList[i].disabled = false;
					}
				}
				
				var validationData = jsonObject['data'];
				
				for(key in validationData){
					
					var currentObject = document.getElementById(key);
					
					if(currentObject!=null){
						
						var currentErrorObject = document.getElementById(key+"_error");
						
						if(validationData[key]=="valid"){
							currentErrorObject.innerHTML = "";
						}else{
							validationMsg = jsonObject['msg'];
							if(validationMsg!="" && validationMsg!=null && validationMsg[key]!="" && validationMsg[key]!=null){
								currentErrorObject.innerHTML = validationMsg[key];
							}else{
								if(validationData[key]=="null")currentErrorObject.innerHTML = currentObject.getAttribute("errortag") + " is empty";
								else if(validationData[key]=="invalid")currentErrorObject.innerHTML = "Invalid value for " + currentObject.getAttribute("errortag");
								else if(validationData[key]=="noentry")currentErrorObject.innerHTML = "Invalid User Password";
								else if(validationData[key]=="nomatch")currentErrorObject.innerHTML = currentObject.getAttribute("errortag")+" does not match";
								else if(validationData[key]=="notagree")currentErrorObject.innerHTML = " Please agree terms and condition";
								else if(validationData[key]=="atleast")currentErrorObject.innerHTML = "Enter at least one contact";
								else if(validationData[key]=="already_registered")currentErrorObject.innerHTML = currentObject.getAttribute("errortag")+" is already registered";
								else if(validationData[key]=="below18")currentErrorObject.innerHTML = "You must be atleast 18 year old";
								else if(validationData[key]=="valid")currentErrorObject.innerHTML = "";
							}
						}
					}
				}
				
				if(jsonObject['validation']['status']=="zerorow"){
					document.getElementById('zerorow').style.display = "block";
				}
				if(jsonObject['validation']['status']=="successful"){
					if(jsonObject['validation']['clearform']!="" && jsonObject['validation']['clearform']!=null){
						
						if(jsonObject['validation']['clearform']=='yes'){
							
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
									else if(elementList[i].type=="hidden"){
										if(elementList[i].value!=""){};
									}
									else{
										if(elementList[i].value!="" && elementList[i].type!="button")elementList[i].value="";
									}
								}
							}
						}
					}
					if(jsonObject['validation']['submit']=="true"){
						document.getElementById(form_id).submit();
					}
				}else if(jsonObject['validation']['status']=="fail"){
					jAlert('The operation was not completed successfully. Please, try later.');
				}
				if(jsonObject['validation']['redirect']!="" && jsonObject['validation']['redirect']!=null){
					
					window.location = jsonObject['validation']['redirect'];
				}
				if(jsonObject['validation']['hideform']=="yes" && jsonObject['validation']['hideform']!=null){
					document.getElementById('div_'+form_id).style.display = 'none';
				}
				if(jsonObject['validation']['message']!="" && jsonObject['validation']['message']!=null){
					jAlert(jsonObject['validation']['message']);
				}
			}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown){
			jAlert("This operation could not be completed, Please try again. Contact system admin if problem persists",'Alert',function(){
				$('#plaesewait').hide();
				$('form input[type=button]').attr('disabled','');
			});
		}	
	});
}