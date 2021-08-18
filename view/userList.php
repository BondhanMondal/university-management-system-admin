<?php

	session_start();
	require '../model/adminModel.php';

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
				<legend>User List</legend>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
					<a href="studentList.php">Student List</a>
					<br><br>
					<a href="facultyList.php">Faculty List</a>
					<br><br>
					<a href="adminList.php">Admin List</a>
					<br><br>
					<a href="liberianList.php">Librarian List</a>

					
					


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