<?php
	
	session_start();
	$_SESSION['flag'] = 0;
	require '../model/adminModel.php';

	$username = $password = $confirmpassword =  $usertype = "";
	$fullname  = $gender = $dob = $religion = $email =  $phone = "";
	$fullnameErr =  $genderErr = $dobErr = $religionErr = $emailErr = $usernameErr = $passwordErr = $usertypeErr = $phoneErr = "";
	$confirmpasswordErr = "";
	$successfulMessage = $errorMessage = "";
	$flag = false;

	if($_SERVER['REQUEST_METHOD'] === "POST")
	{
		if (empty($_POST['username'])) {
			$usernameErr = "Please enter username";
			$flag = true;
		}
		else
		{
			$username = validate_input($_POST['username']);
		}
		if (empty($_POST['password'])) {
			$passwordErr = "Please enter a password";
			$flag = true;
		}
		else
		{
			$password = validate_input($_POST['password']);
		}
		if (empty($_POST['confirmpassword'])) {
			$confirmpasswordErr = "Please enter your password";
			$flag = true;
		}
		else if ($_POST['password'] != $_POST['confirmpassword'])
		{
			$confirmpasswordErr = "password and confirm password missmatch";
			$flag = true;
		}
		
		if (empty($_POST['usertype'])) {
			$usertypeErr = "Please select a usertype";
			$flag = true;
		}
		else
		{
			$usertype = validate_input($_POST['usertype']);
		}
		if (empty($_POST['fullname'])) {
			$fullnameErr = "Fullname can not be empty";
			$flag = true;
		}
		else
		{
			$fullname = validate_input($_POST['fullname']);
		}
		if (empty($_POST['gender'])) {
			$genderErr = "Gender can not be empty";
			$flag = true;
		}
		else
		{
			$gender = validate_input($_POST['gender']);
		}
		if (empty($_POST['religion'])) {
			$religionErr = "Religion can not be empty";
			$flag = true;
		}
		else
		{
			$religion = validate_input($_POST['religion']);
		}
		if (empty($_POST['dob'])) {
			$dobErr = "Dob can not be empty";
			$flag = true;
		}
		else
		{
			$dob = validate_input($_POST['dob']);
		}
		if (empty($_POST['email'])) {
			$emailErr = "Email can not be empty";
			$flag = true;
		}
		else
		{
			$email = validate_input($_POST['email']);
		}
		if (empty($_POST['phone'])) {
			$phoneErr = "Phone can not be empty";
			$flag = true;
		}
		else
		{
			$phone = validate_input($_POST['phone']);
		}

		if(!$flag)
		{
			

			$res = createUser($username, $password, $usertype, $fullname, $gender, $religion, $dob, $phone, $email);
			if($res)
			{
				$successfulMessage = "Sucessfully saved.";
			}
			else {
			$errorMessage = "Error while saving.";
			}

		}
		
		

	}



	function validate_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	}
	
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>REGISTRATION PAGE</title>
	<h1 style="color: lightblue;" align="center">REGISTRATION FORM</h1>
	<script src="../view/scripts/registration.js"></script>
</head>
<body>
	<?php
 		include '../controller/includes/head.php'
	?>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="regform" onsubmit="return isValid();">
		<fieldset>
			<legend>Account Information</legend>
			<table>
				<tr>
				<td><label for="username">Username<span style="color: red;">*</span>: </label></td>
				<td><input type="text" name="username" id="username"></td>
				<td><span style="color: red;" id="usernameErr"><?php echo $usernameErr; ?></span></td>
			</tr>
			<tr>
				<td><label for="password">Password<span style="color: red;">*</span>: </label></td>
				<td><input type="password" name="password" id="password"></td>
				<td><span style="color: red;" id="passwordErr"><?php echo $passwordErr; ?></span></td>
			</tr>
			<tr>
				<td><label for="confirmpassword">Confirm Password<span style="color: red;">*</span>: </label></td>
				<td><input type="password" name="confirmpassword" id="confirmpassword"></td>
				<td><span style="color: red;" id="confirmpasswordErr"><?php echo $confirmpasswordErr; ?></span></td>
			</tr>
			<tr>
				<td><label for="usertype">User Type<span style="color: red">*</span>: </label></td>
				<!-- <td>
					<select name="usertype">
						<option value="student">Student</option>
						<option value="teacher">Teacher</option>
						<option value="liberian">Liberian</option>
						<option value="admin">Admin</option>      
					</select>
				</td> -->
				<td><input type="text" name="usertype" id="usertype" value="admin" readonly=""></td>
				<td><span style="color: red"><?php echo $usertypeErr; ?></span></td>
				</tr>
			</table>
		</fieldset>
		<fieldset>
			<legend>User Information</legend>
			<table>
				<tr>
				<td><label for="fullname">Full Name<span style="color: red">*</span>: </label></td>
				<td><input type="text" name="fullname" id="fullname"></td>
				<td><span style="color: red" id="fullnameErr"><?php echo $fullnameErr; ?></span></td>
				</tr>
				<tr>
				<td><label for="gender">Gender<span style="color: red">*</span>: </label></td>
				<td>
					<input name="gender" value="Male" type="radio" id="gender">Male
					<input name="gender" value="Female" type="radio" id="gender">Female
					<input name="gender" value="Other" type="radio" id="gender">Other
				</td>
				<td><span style="color: red" id="genderErr"><?php echo $genderErr; ?></span></td>
			</tr>
			<tr>
				<td><label for="religion">Religion<span style="color: red">*</span>: </label></td>
					<td>
						<select name="religion">
							<option value="hindu">Hindu</option>
							<option value="muslim">Muslim</option>
							<option value="other">Other</option>
						</select>
					</td>
					<td><span style="color: red" id="religionErr"><?php echo $religionErr; ?></span></td>
			</tr>
			<tr>
				<td><label for = "dob">DOB<span style="color: red">*</span>: </label></td>
				<td><input type="date" name="dob" id="dob"></td>
				<td><span style="color: red" id="dobErr"><?php echo $dobErr; ?></span></td>
			</tr>
			<tr>
				<td><label for="phone">Phone<span style="color: red">*</span>: </label></td>
				<td><input type="phone" name="phone" id="phone"></td>
				<td><span style="color: red" id="phoneErr"><?php echo $phoneErr; ?></span></td>
			</tr>
			<tr>
				<td><label for="email">Email<span style="color: red">*</span>: </label></td>
				<td><input type="email" name="email" id="email"></td>
				<td><span style="color: red" id="emailErr"><?php echo $emailErr; ?></span></td>
			</tr>
			</table>
		</fieldset>
		<input type="submit" name="submit" value="REGISTER">
		<!-- <a href="login.php">Login</a> -->
		<br><br>
		<span style="color: green"><?php echo $successfulMessage; ?></span>
		<span style="color: red"><?php echo $errorMessage; ?></span>
	</form>

</body>
</html>

<?php

	require '../controller/includes/footer.php';

		
?>
