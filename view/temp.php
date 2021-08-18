<?php
		if (empty($_POST['name'])) {
			$nameErr = "Please enter fullname";
			$flag = true;
		}
		else if(strlen($_POST['name']) > 50) {
			$nameErr = "Name can not be more than 50 characters";
			$flag = true;
		}
		else
		{
			$name = validate_input($_POST['name']);
		}
		///////////////////////////////////////////////////////

		if (empty($_POST['facultyid'])) {
			$facultyidErr = "Faculty id is mandatory";
			$flag = true;
		}
		else if(strlen($_POST['facultyid']) > 10) {
			$facultyidErr = "Maximum length of id is 10";
			$flag = true;
		}
		else if(is_numeric($_POST['facultyid'])) {
			$facultyid = validate_input($_POST['facultyid']);
		}
		else
		{
			$facultyidErr = "Id is consist of numbers";
			//$flag = true;
		}

		///////////////////////////////////////////////////////


		if (empty($_POST['password'])) {
			$passwordErr = "Please enter a password";
			$flag = true;
		}
		else
		{
			$password = $_POST['password'];
		}
		
		///////////////////////////////////////////////////////

		if (empty($_POST['confirmpassword'])) {
			$confirmpasswordErr = "Please enter your password";
			$flag = true;
		}
		else if ($_POST['password'] != $_POST['confirmpassword'])
		{
			$confirmpasswordErr = "password and confirm password missmatch";
			$flag = true;
		}

		///////////////////////////////////////////////////////

		if (empty($_POST['usertype'])) {
			$usertypeErr = "Please select a usertype";
			$flag = true;
		}
		else
		{
			$usertype = validate_input($_POST['usertype']);
		}

		///////////////////////////////////////////////////////

		if (empty($_POST['department'])) {
			$departmentErr = "Field can not be empty";
			$flag = true;
		}
		else if(is_numeric($_POST['department'])) {
			$departmentErr = "Department can not be numbers";
			$flag = true;
		}
		else
		{
			$department = validate_input($_POST['department']);
		}

		///////////////////////////////////////////////////////

		if (empty($_POST['programme'])) {
			$programmeErr = "Field can not be empty";
			$flag = true;
		}
		else if(is_numeric($_POST['programme'])) {
			$programmeErr = "Programme can not be numbers";
			$flag = true;
		}
		else
		{
			$programme = validate_input($_POST['programme']);
		}

		///////////////////////////////////////////////////////

		if (empty($_POST['joiningdate'])) {
			$joiningdateErr = "Joining date can not be empty";
			$flag = true;
		}
		else
		{
			$joiningdate = validate_input($_POST['joiningdate']);
		}

		///////////////////////////////////////////////////////

		if (empty($_POST['gender'])) {
			$genderErr = "Gender can not be empty";
			$flag = true;
		}
		else
		{
			$gender = validate_input($_POST['gender']);
		}

		///////////////////////////////////////////////////////

		if (empty($_POST['religion'])) {
			$religionErr = "Religion can not be empty";
			$flag = true;
		}
		else
		{
			$religion = validate_input($_POST['religion']);
		}

		///////////////////////////////////////////////////////

		if (empty($_POST['dob'])) {
			$dobErr = "Dob can not be empty";
			$flag = true;
		}
		else
		{
			$dob = validate_input($_POST['dob']);
		}

		///////////////////////////////////////////////////////

		if (empty($_POST['phone'])) {
			$phoneErr = "Contact no can not be empty";
			$flag = true;
		}
		else if(is_numeric($_POST['phone']))
		{
			$phone = validate_input($_POST['phone']);
		}
		else
		{
			$phoneErr = "Contact no has to be numbers";
			$flag = true;
		}

		///////////////////////////////////////////////////////

		if (empty($_POST['email'])) {
			$emailErr = "Email can not be empty";
			$flag = true;
		}
		else
		{
			$email = validate_input($_POST['email']);
		}

		///////////////////////////////////////////////////////


?>