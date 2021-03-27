var myVar;

function mF(){
	myVar=setInterval( function(){ showTime() },1000);
}
	
function showTime(){
	var x= new Date();
	var stime=x.toLocaleTimeString();
	document.getElementById("placetime").innerHTML=stime;
}