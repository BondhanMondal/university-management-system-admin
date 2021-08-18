<?php

	session_start();
	
	require '../model/adminModel.php';

	$username = $password = $confirmpassword =  $usertype = "";
	$fullname  = $gender = $dob = $religion = $email =  $phone = "";
	$fullnameErr =  $genderErr = $dobErr = $religionErr = $emailErr = $usernameErr = $passwordErr = $usertypeErr = $phoneErr = "";
	$confirmpasswordErr = "";
	$successfulMessage = $errorMessage = "";
	$flag = false;

	$idd = $_GET['id'];
	//$usertypee = $_GET['usertype'];

	$userinfo = getAdmininfo($idd);
	for($i = 0; $i<count($userinfo); $i++) {
		$oldusername = $userinfo[$i]["username"];
		$oldpassword = $userinfo[$i]["password"];
		$oldusertype = $userinfo[$i]["usertype"];
		$oldfullname = $userinfo[$i]["fullname"];
		$oldgender   = $userinfo[$i]["gender"];
		$oldreligion = $userinfo[$i]["religion"];
		$olddob      = $userinfo[$i]["dob"];
		$oldphone    = $userinfo[$i]["phone"];
		$oldemail    = $userinfo[$i]["email"];
		$id          = $userinfo[$i]["id"];
	}

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
		// if (empty($_POST['religion'])) {
		// 	$religionErr = "Religion can not be empty";
		// 	$flag = true;
		// }
		// else
		// {
		// 	$religion = validate_input($_POST['religion']);
		// }
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
			

			$res = updateAdmin($username, $password, $usertype, $fullname, $gender, $dob, $phone, $email, $idd);
			if($res)
			{
				header('location: ../view/adminList.php');
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
			<li><a href="../view/profile.php">View Profile</a></li>
			<li><a href="../view/editprofile.php">Edit Profile</a></li>
			<li><a href="../view/changePassword.php">Change Password</a></li>
			<li><a href="../view/userList.php">User List</a></li>
			<li><a href="../view/addUser.php">Add User</a></li>
			</ul>		
			</fieldset>
		</td>
		<td>
		<fieldset style="height:500px">
			<fieldset>
				<legend>Add User</legend>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
					<a href="../view/studentList.php">Student List</a>
					<br><br>
					<a href="../view/facultyList.php">Faculty List</a>
					<br><br>
					<a href="../view/adminList.php">Admin List</a>
					<br><br>
					<a href="../view/liberianList.php">Librarian List</a>

	
					


				
			</fieldset>

		</fieldset>
		</td>
		<td>
			<fieldset style="height:500px;width:px">
				<legend>Add Admin</legend>
				<fieldset>
					<fieldset>
			<legend>Account Information</legend>
			<table>
				<tr>
				<td><label for="username">Username<span style="color: red;">*</span>: </label></td>
				<td><input type="text" name="username" id="username" value="<?php echo $oldusername?>"></td>
				<td><span style="color: red;"><?php echo $usernameErr; ?></span></td>
			</tr>
			<tr>
				<td><label for="password">Password<span style="color: red;">*</span>: </label></td>
				<td><input type="password" name="password" id="password" value="<?php echo $oldpassword?>"></td>
				<td><span style="color: red;"><?php echo $passwordErr; ?></span></td>
			</tr>
			<tr>
				<td><label for="confirmpassword">Confirm Password<span style="color: red;">*</span>: </label></td>
				<td><input type="password" name="confirmpassword" id="confirmpassword" value="<?php echo $oldpassword?>"></td>
				<td><span style="color: red;"><?php echo $confirmpasswordErr; ?></span></td>
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
				<td><input type="text" name="fullname" id="fullname" value="<?php echo $oldfullname?>"></td>
				<td><span style="color: red"><?php echo $fullnameErr; ?></span></td>
				</tr>
				<tr>
				<td><label for="gender">Gender<span style="color: red">*</span>: </label></td>
				<td>
					<input name="gender" value="Male" type="radio" id="gender" <?php if($oldgender=='Male') echo "checked";?>>Male
					<input name="gender" value="Female" type="radio" id="gender" <?php if($oldgender=='Female') echo "checked";?>>Female
					<input name="gender" value="Other" type="radio" id="gender" <?php if($oldgender=='Other') echo "checked";?>>Other
				</td>
				<td><span style="color: red"><?php echo $genderErr; ?></span></td>
			</tr>
			<!-- <tr>
				<td><label for="religion">Religion<span style="color: red">*</span>: </label></td>
					<td>
						<select name="religion">
							<option value="hindu">Hindu</option>
							<option value="muslim">Muslim</option>
							<option value="other">Other</option>
						</select>
					</td>
					<td><span style="color: red"><?php echo $religionErr; ?></span></td>
			</tr> -->
			<tr>
				<td><label for = "dob">DOB<span style="color: red">*</span>: </label></td>
				<td><input type="date" name="dob" id="dob" value="<?php echo $olddob?>"></td>
				<td><span style="color: red"><?php echo $dobErr; ?></span></td>
			</tr>
			<tr>
				<td><label for="phone">Phone<span style="color: red">*</span>: </label></td>
				<td><input type="phone" name="phone" id="phone" value="<?php echo $oldphone?>"></td>
				<td><span style="color: red"><?php echo $phoneErr; ?></span></td>
			</tr>
			<tr>
				<td><label for="email">Email<span style="color: red">*</span>: </label></td>
				<td><input type="email" name="email" id="email" value="<?php echo $oldemail?>"></td>
				<td><span style="color: red"><?php echo $emailErr; ?></span></td>
			</tr>
			</table>
		</fieldset>
					





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