<?php

	session_start();
	require '../model/adminModel.php';

	$new_password = "";
	$current_passwordErr = $new_passwordErr = $confirm_passwordErr = "";
	$successfulMessage = $errorMessage = "";
	$flag = false;


	if($_SERVER['REQUEST_METHOD'] === "POST")
	{
		if (empty($_POST['current_password'])) {
			$current_passwordErr = "Please enter your current password";
			$flag = true;
		}
		else if($_POST['current_password'] != $_SESSION['password']){
			$current_passwordErr = "Current password does not match";
			$flag = true;
		}

		if(empty($_POST['new_password'])){
			$new_passwordErr = "Please enter a new password";
			$flag = true;
		}
		if(empty($_POST['confirm_password'])){
			$confirm_passwordErr = "Confirm password can not be empty";
			$flag = true;
		}
		else if($_POST['new_password'] != $_POST['confirm_password']){
			$confirm_passwordErr = "New password and confirm password missmatch";
		}
		else {
			$new_password = validate_input($_POST['new_password']);
		}


		if(!$flag)
		{
			$username = $_SESSION['username'];
			$oldpassword = $_SESSION['password'];
			$res = updatePassword($new_password, $username, $oldpassword);

			if($res)
			{
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
	<title>Change Password Page</title>
	<script src="../view/scripts/changePassword.js"></script>
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
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="cngpass" onsubmit="return isValid();">

					
					<label for="current_password">Current Password<span style="color: red;">*</span>: </label>
					<input type="password" name="current_password" id="current_password">
					<span style="color: red;" id="current_passwordErr"><?php echo $current_passwordErr; ?></span>
					<br><br>
					<label for="new_password">New Password<span style="color: red;">*</span>: </label>
					<input type="password" name="new_password" id="new_password">
					<span style="color: red;" id="new_passwordErr"><?php echo $new_passwordErr; ?></span>
					<br><br>
					<label for="confirm_password">Confirm Password<span style="color: red;">*</span>: </label>
					<input type="password" name="confirm_password" id="confirm_password">
					<span style="color: red;" id="confirm_passwordErr"><?php echo $confirm_passwordErr; ?></span>
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