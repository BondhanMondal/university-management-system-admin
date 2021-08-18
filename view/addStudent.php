<?php

	session_start();
	require '../model/adminModel.php';

	$nameErr = $studentidErr = $passwordErr = $confirmpasswordErr = $programmeErr = $departmentErr= $usertypeErr= "";
	$admissiondateErr = $genderErr = $religionErr = $dobErr = $phoneErr = $emailErr = "";

	$name = $studentid = $password = $usertype = $programme = $department = $admissiondate = $gender = $religion = $dob = $phone = $email = "";

	$successfulMessage = $errorMessage = "";
	$flag = false;

	if($_SERVER['REQUEST_METHOD'] === "POST")
	{
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
		if (empty($_POST['studentid'])) {
			$studentidErr = "Student id is mandatory";
			$flag = true;
		}
		else if(strlen($_POST['studentid']) > 10) {
			$studentidErr = "Maximum length of id is 10";
			$flag = true;
		}
		else if(is_numeric($_POST['studentid'])) {
			$studentid = validate_input($_POST['studentid']);
		}
		else
		{
			$studentidErr = "Id is consist of numbers";
			$flag = true;
		}

		if (empty($_POST['password'])) {
			$passwordErr = "Please enter a password";
			$flag = true;
		}
		else
		{
			$password = $_POST['password'];
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
		if (empty($_POST['admissiondate'])) {
			$admissiondateErr = "Admission date can not be empty";
			$flag = true;
		}
		else
		{
			$admissiondate = validate_input($_POST['admissiondate']);
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
		if (empty($_POST['email'])) {
			$emailErr = "Email can not be empty";
			$flag = true;
		}
		else
		{
			$email = validate_input($_POST['email']);
		}


		if(!$flag)
		{
			

			$res = addStudent($name, $studentid, $password, $usertype, $programme, $department, $admissiondate, $gender, $religion, $dob, $phone, $email);
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
	<title>User List Page</title>
</head>
<body>
	<fieldset>
		<?php  include '../controller/includes/header.php'  ?>
	</fieldset>
	<table>
		<td>
			<fieldset style="height:500px;width:300px">
			<h3>Actions</h3> &nbsp &nbsp 
			<hr/>
			<ul>
			<li><a href="profile.php">View Profile</a></li>
			<li><a href="editprofile.php">Edit Profile</a></li>
			<li><a href="changePassword.php">Change Password</a></li>
			<li><a href="userList.php">User List</a></li>
			<li><a href="addUser.php">Add User</a></li>
			</ul>		
			</fieldset>
		</td>
		<td>
		<fieldset style="height:500px">
			<fieldset>
				<legend>Add User</legend>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
					<a href="addStudent.php">Add Student</a>
					<br><br>
					<a href="addFaculty.php">Add Faculty</a>
					<br><br>
					<a href="addAdmin.php">Add Admin</a>
					<br><br>
					<a href="addLiberian.php">Add Librarian</a>

	
					


				
			</fieldset>

		</fieldset>
		</td>
		<td>
			<fieldset style="height:500px;width:px">
				<legend>Add Student</legend>
				<fieldset>
					<table>
						<tr>
							<td><label for="name">Name<span style="color: red;">*</span>: </label></td>
							<td><input type="text" name="name" id="name"></td>
							<td><span style="color: red;"><?php echo $nameErr; ?></span></td>
						</tr>
						<tr>
							<td><label for="studentid">Id<span style="color: red;">*</span></label></td>
							<td><input type="text" name="studentid" id="studentid"></td>
							<td><span style="color: red;" id="studentidErr"><?php echo $studentidErr; ?></td>
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
							<td><input type="text" name="usertype" id="usertype" value="student" readonly=""></td>
							<td><span style="color: red"><?php echo $usertypeErr; ?></span></td>
						</tr>						
						<tr>
							<td><label for="programme">Programme<span style="color: red;">*</span>: </label></td>
							<td><input type="text" name="programme" id="programme"></td>
							<td><span style="color: red;" id="programmeErr"><?php echo $programmeErr; ?></span></td>
						</tr>
						<tr>
							<td><label for="department">Department<span style="color: red;">*</span>: </label></td>
							<td><input type="text" name="department" id="department"></td>
							<td><span style="color: red;" id="departmentErr"><?php echo $departmentErr; ?></span></td>
						</tr>
						<tr>
							<td><label for="admissiondate">Admission Date<span style="color: red;">*</span>: </label></td>
							<td><input type="date" name="admissiondate" id="admissiondate"></td>
							<td><span style="color: red;" id="admissiondateErr"><?php echo $admissiondateErr; ?></span></td>
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
							<td><label for="phone">Contact No<span style="color: red">*</span>: </label></td>
							<td><input type="phone" name="phone" id="phone"></td>
							<td><span style="color: red" id="phoneErr"><?php echo $phoneErr; ?></span></td>
						</tr>
						<tr>
							<td><label for="email">Email<span style="color: red">*</span>: </label></td>
							<td><input type="email" name="email" id="email"></td>
							<td><span style="color: red" id="emailErr"><?php echo $emailErr; ?></span></td>
						</tr>												
																												
					</table>
					





					<br><br>
					<input type="submit" name="submit" value="REGISTER">
					<br><br>
					<span style="color: green"><?php echo $successfulMessage; ?></span>
					<span style="color: red"><?php echo $errorMessage; ?></span>
				</fieldset>
				
						
			</fieldset>
		</td>
		
	</table>
	<fieldset>
		<?php include '../controller/includes/footer.php'?>
	</fieldset>
	</form>

</body>
</html>