var imageArray = new Array();
imageArray[0] = "images/American Airlines Arena.jpg";
imageArray[1] = "images/Audi R8.jpg";
imageArray[2] = "images/Big Boat.jpg";
imageArray[3] = "images/Biggest Miami Mansion.jpg";
imageArray[4] = "images/Ferrari 458 Italia.jpg";
imageArray[5] = "images/Ford GT.jpg";
imageArray[6] = "images/Gator Teeth.jpg";
imageArray[7] = "images/Indianapolis 500 Corvette.jpg";
imageArray[8] = "images/Lamborghinis.jpg";
imageArray[9] = "images/Lamborgnini Miami.jpg";
imageArray[10] = "images/Lotus Evora.jpg";
imageArray[11] = "images/Mercedes Benz SLR AMG McLaren.jpg";
imageArray[12] = "images/Mercedes Benz SLS AMG.jpg";
imageArray[13] = "images/Miami Mansion.jpg";
imageArray[14] = "images/Miami Vice Mansion.jpg";
imageArray[15] = "images/Pose with Alligator.jpg";
imageArray[16] = "images/Rolls Royces.jpg";
imageArray[17] = "images/South Beach Paradise.jpg";
imageArray[18] = "images/Super Alligator Wrestling.jpg";
imageArray[19] = "images/Wrestling.jpg";

//create cookie for remembering which picture was selected from the gallery
function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

//read the picture that was selected from the previous page
function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

//erase the stored image from memory
function eraseCookie(name) {
	createCookie(name,"",-1);
}

//this function is called when the cropping page appears, it takes care of some of the visual elements
function displayPage(){
//	var i = readCookie("cookieName");
//	document.getElementById("spot1").src = imageArray[i];
}


function getPrice(){
	var box = document.getElementById("price");
	var size = document.getElementById("size").value;
	if(size==="")
		box.value = "";
	else
		box.value = (((0.25 * size) +10)*1.13);
}


function checkEmptyBoxes(){
	var a = document.getElementById("size");
	var b = document.getElementById("fullname");
	var d = document.getElementById("province");
	var e = document.getElementById("address");
	var f = document.getElementById("city");
	var g = document.getElementById("pc");
	var h = document.getElementById("email");
	var i = document.getElementById("creditnum");
	
	if((a.value==="")||(b.value==="")||(c.value==="")||(d.value==="")||(e.value==="")||(f.value==="")||(g.value==="")||(h.value==="")||(i.value==="")){
		alert("You forgot to fill some information.");
	}
	
}

function checkEmptyUpload(){
	var i = document.getElementById("upPic");
	
	if(i.value===""){
		alert("You forgot to fill some information.");
	}
	
}


function getImageLocation(loco){
	var v = loco + 1000;
	document.getElementById("locbox").value = v;
}

