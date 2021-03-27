function check() {
	var x = document.getElementById('txtCat');
	var y = document.getElementById('txtTle').value;
	if(x.options.selectedIndex==0 && y=='') {
		alert("Please choose a preference or book title!!!");
	}
}

function c_ON(x) {
	document.getElementById("r"+x).style.backgroundColor="#FFFF00";
}

function c_OFF(x) {
	document.getElementById("r"+x).style.backgroundColor="#00FF00";
}


