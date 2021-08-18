function isValid() {

	var flag = false;
	var username = document.forms["regform"]["username"].value;
	var password = document.forms["regform"]["password"].value;
	var confirmpassword = document.forms["regform"]["confirmpassword"].value;
	var fullname = document.forms["regform"]["fullname"].value;
	var gender = document.forms["regform"]["gender"].value;
	var religion = document.forms["regform"]["religion"].value;
	var dob = document.forms["regform"]["dob"].value;
	var phone = document.forms["regform"]["phone"].value;
	var email = document.forms["regform"]["email"].value;





	if(username === "") {
		document.getElementById('usernameErr').innerHTML = "Username can not be empty.";
		flag = true;
	} 
	if(password === "") {
		document.getElementById('passwordErr').innerHTML = "password can not be empty";
		flag = true;
	}
	if(confirmpassword === "") {
		document.getElementById('confirmpasswordErr').innerHTML = "Confirm password can not be empty";
		flag = true;
	} 

	if(password != confirmpassword) {
		document.getElementById('confirmpasswordErr').innerHTML = "username or password missmatch";
		flag = true;
	}
	if(fullname === "") {
		document.getElementById('fullnameErr').innerHTML = "fullname can not be empty.";
		flag = true;
	}

	if(gender === "") {
		document.getElementById('genderErr').innerHTML = "Gender can not be empty.";
		flag = true;
	} 

	if(religion === "") {
		document.getElementById('religionErr').innerHTML = "Username can not be empty.";
		flag = true;
	}
	if(dob === "") {
		document.getElementById('usernameErr').innerHTML = "dob can not be empty.";
		flag = true;
	} 
	if(phone === "") {
		document.getElementById('phoneErr').innerHTML = "phone can not be empty.";
		flag = true;
	}
	if(email === "") {
		document.getElementById('emailErr').innerHTML = "Username can not be empty.";
		flag = true;
	}    







	if(flag == true) {
		return false;
	}
	else
		return true;
}