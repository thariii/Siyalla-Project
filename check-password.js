function checkPass(){

	var currentPassword = document.getElementById('currentPass').value;
	if (currentPassword == "") {
		alert("Please enter current password");
		return false;
	}

	var newPassword = document.getElementById('newPass').value;
		var fnameRGEX = /^((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})+$/;
		var fnameResult = fnameRGEX.test(newPassword);
		if (fnameResult == false) 
		{
			alert("Please enter valid password");
			return false;
		}

	var confirmPassword = document.getElementById('confirmPass').value;
	if (confirmPassword != newPassword) {
		alert("Passwords are not matching");
		return false;
	}

}


