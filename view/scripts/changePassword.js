function isValid() {
	var flag = false;
	var currentpassword = document.forms["cngpass"]["current_password"].value;
	var newpassword = document.forms["cngpass"]["new_password"].value;
	var confirmpassword = document.forms["cngpass"]["confirm_password"].value;


	if(currentpassword === "") {
		document.getElementById('current_passwordErr').innerHTML = "Current password can not be empty.";
		flag = true;
	} 

	if(newpassword === "") {
		document.getElementById('new_passwordErr').innerHTML = "New password can not be empty.";
		flag = true;
	} 

	if(confirmpassword === "") {
		document.getElementById('confirm_passwordErr').innerHTML = "Confirm password can not be empty.";
		flag = true;
	} 

	if(newpassword != confirmpassword "") {
		document.getElementById('confirm_passwordErr').innerHTML = "new and confirm password missmatch";
		flag = true;
	} 

	if(flag == true) {
		return false;
	}
	else
		return true;
}