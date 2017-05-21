function disable_password(){
	var password = document.getElementById("password").value;
	var repeat_password = document.getElementById("repeat_password").value;
	if(password == repeat_password){
		document.getElementById("button_registrar").disabled = false;
	}else{
		document.getElementById("button_registrar").disabled = true;
	}
}

function disable_repeatPassword(){
	var password = document.getElementById("password").value;
	var repeat_password = document.getElementById("repeat_password").value;
	if(password == repeat_password){
		document.getElementById("button_registrar").disabled = false;
	}else{
		document.getElementById("button_registrar").disabled = true;
		alert("Las oontraseñas no coinciden!!!");
	}
}




/*var obtener_login = function(data){

	
}*/