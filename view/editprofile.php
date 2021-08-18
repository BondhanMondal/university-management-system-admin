<?php

	session_start();
	require '../model/adminModel.php';

 	$usernameErr = $fullnameErr = $dobErr = $phoneErr = $emailErr = "";
 	$errorMessage = $successfulMessage = "";
 	$username = $fullname = $gender = $dob = $phone = $email = "";
 	$flag = false;

	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	
	$userinfo = getuserinfo($username, $password);
	for($i = 0; $i<count($userinfo); $i++) {
		$oldusername = $userinfo[$i]["username"];
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
		if (empty($_POST['gender'])) {
			$errorMessage = "Please select gender";
			$flag = true;
		}
		else
		{
			$gender= validate_input($_POST['gender']);
		}
		if (empty($_POST['fullname'])) {
			$fullnameErr = "Fullname can not be empty";
			$flag = true;
		}
		else
		{
			$fullname = validate_input($_POST['fullname']);
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
			$res = updateUserById($username, $fullname, $gender, $dob, $phone, $email, $id);

			if($res)
			{
				header('location: editprofile.php');
				$successfulMessage = "Password Successfully Changed";
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
	<title>Edit Profile Page</title>
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
				<legend>Edit Profile</legend>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
					<label for="username">User name<span style="color: red">*</span>: </label>
					<input type="text" name="username" id="username" value="<?php echo $oldusername;?>">
					<span style="color: red"><?php echo $usernameErr; ?></span>
					<br><br>
					<label for="firstname">Full Name<span style="color: red">*</span>: </label>
					<input type="text" name="fullname" id="fullname" value="<?php echo $oldfullname;?>">
					<span style="color: red"><?php echo $fullnameErr; ?></span>
					<br><br>
					<label for = "dob">Date of Birth<span style="color: red">*</span>: </label>
					<input type="date" name="dob" id="dob" value="<?php echo $olddob;?>">
					<span style="color: red"><?php echo $dobErr; ?></span>
					<br><br>
					<label for="phone">Phone<span style="color: red">*</span>: </label>
					<input type="phone" name="phone" id="phone" value="<?php echo $oldphone;?>">
					<span style="color: red"><?php echo $phoneErr; ?></span>
					<br><br>
					<label for="email">Email<span style="color: red">*</span>: </label>
					<input type="email" name="email" id="email" value="<?php echo $oldemail;?>">
					<span style="color: red"><?php echo $emailErr; ?></span>
					<br><br>
					<label for="gender">Gender<span style="color: red">*</span>: </label>
					<input name="gender" value="Male" type="radio" id="gender" <?php if($oldgender=='Male') echo "checked";?>>Male
					<input name="gender" value="Female" type="radio" id="gender" <?php if($oldgender=='Female') echo "checked";?>>Female
					<input name="gender" value="Other" type="radio" id="gender" <?php if($oldgender=='Other') echo "checked";?>>Other
	
					<br><br>
					<input type="submit" name="submit" value="SUBMIT">
					<br>
					<span style="color: green"><?php echo $successfulMessage; ?></span>
					<span style="color: red"><?php echo $errorMessage; ?></span>


				</form>
			</fieldset>
		</fieldset>
		</td>
	</table>
	<fieldset>
		<?php include '../controller/includes/footer.php'?>
	</fieldset>

</body>
</html>