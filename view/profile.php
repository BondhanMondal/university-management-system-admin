<?php

	session_start();
	require '../model/adminModel.php';

	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	
	$userinfo = getuserinfo($username, $password);
	for($i = 0; $i<count($userinfo); $i++) {
		$username = $userinfo[$i]["username"];
		$usertype = $userinfo[$i]["usertype"];
		$fullname = $userinfo[$i]["fullname"];
		$gender   = $userinfo[$i]["gender"];
		$religion = $userinfo[$i]["religion"];
		$dob      = $userinfo[$i]["dob"];
		$phone    = $userinfo[$i]["phone"];
		$email    = $userinfo[$i]["email"];
		$id       = $userinfo[$i]["id"];
	}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile Page</title>
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
					<legend>Profile</legend>
					Username: <?php echo $username;?>
					<br><br>
					User-Type: <?php echo $usertype;?>
					<br><br>
					Full-Name: <?php echo $fullname;?>
					<br><br>
					Gender: <?php echo $gender;?>
					<br><br>
					Religion: <?php echo $religion;?>
					<br><br>
					Date of Birth: <?php echo $dob;?>
					<br><br>
					Contact Number: <?php echo $phone;?>
					<br><br>
					Email: <?php echo $email;?>

					
				</fieldset>
			</fieldset>
		</td>
	</table>
	<fieldset>
		<?php include '../controller/includes/footer.php'?>
	</fieldset>

</body>
</html>