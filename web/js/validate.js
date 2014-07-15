function validateForm() {
	var tel = document.getElementById("tel").value;
	var email = document.getElementById("email").value;
	var ok; 
	var regex = new RegExp(/^(01|02|03|04|05|06|07|08|09)[0-9]{8}/gi);						     
    $.ajax({ 
    	async: false,
		type: "GET", 
		url: "./model/validate.php",
		data : 'email=' + email + '&tel=' + tel,
		success:function(data){ 
			ok = update(data);
		} 
	});
	return ok;
}

function update(data){
	if(data=='1')
		return false;
	else
		return true;
}