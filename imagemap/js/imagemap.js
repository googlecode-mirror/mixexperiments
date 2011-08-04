// Restore the india image
//var host = window.location.hostname;
//host = host.replace(/^www\./i,'');
//var imgroot = "http://"+host+"/orthostats/images/";
var imgroot = "images/";
var skeleton = imgroot+"main-img.gif";
var spacerimg = imgroot+"spacer.gif";
var backgroundopacity = 100;
var currenthighlighted = "";

function imageout() {
  opacity("mouseoverlayer",100,0,0);
  document.getElementById("tooltip").style.display = "none";
  
}
function tooltip(head,e) {
  //if(head != currenthighlighted) {
    currenthighlighted = head;
    // Show the mouseover images
    var image = new Image();
    image.src = imgroot+head+".gif";
    document.mouseoverlayer.src = image.src;
    opacity("mouseoverlayer",0,100,5);
  //}
  
  if(e.pageX) {
    pos_x = e.pageX-document.getElementById("center").offsetLeft+30;
    pos_y = e.pageY-document.getElementById("center").offsetTop+50;
  }
  else if(e.x) {
    pos_x = e.x+30;
    pos_y = e.y+50;
  }
  document.getElementById("tooltip").style.top = pos_y+"px";
  document.getElementById("tooltip").style.left = pos_x+"px";
  document.getElementById("tooltip").style.display = "block";
  
  fetchLatestScore(head);
  return false;
}
function opacity(id, opacStart, opacEnd, millisec) {
  var speed = Math.round(millisec / 100);
  var timer = 0;
  if(opacStart > opacEnd) {
	  changeOpac(0, id);
  } 
  else if(opacStart < opacEnd) {
	  changeOpac(100, id);
  }
  
}
function changeOpac(opacity, id) {
  var object = document.getElementById(id).style;
  object.opacity = (opacity / 100);
  object.MozOpacity = (opacity / 100);
  object.KhtmlOpacity = (opacity / 100);
  object.filter = "alpha(opacity=" + opacity + ")";
}

