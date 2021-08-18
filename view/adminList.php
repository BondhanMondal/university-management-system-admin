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

					
					


				
			</fieldset>
			<td>
				<fieldset style="height:500px;width:px">
					<legend>Admin List</legend>
					<fieldset>

						<?php
						echo "<table border='1'>
						<tr>
							<td>ID</td>
							<td>Name</td>
							<td>Username</td>
							<td>Password</td>
							<td>User Type</td>
							<td>Gender</td>
							<td>Religion</td>
							<td>DOB</td>
							<td>Phone</td>
							<td>Email</td>
							<td>Action</td>


						</tr>";
						

						$data = getAllUsers(); 
 						for($i = 0; $i<count($data); $i++)
						{
							echo "

									<tr>
										<td>{$data[$i]['id']}</td>
										<td>{$data[$i]['fullname']}</td>
										<td>{$data[$i]['username']}</td>
										<td>{$data[$i]['password']}</td>
										<td>{$data[$i]['usertype']}</td>
										<td>{$data[$i]['gender']}</td>
										<td>{$data[$i]['religion']}</td>
										<td>{$data[$i]['dob']}</td>
										<td>{$data[$i]['phone']}</td>
										<td>{$data[$i]['email']}</td>
										<td><a href='../controller/editAdmin.php?id={$data[$i]['id']}&usertype={$data[$i]['usertype']}'>Edit</a> |
								    	<a href='../controller/delete.php?id={$data[$i]['id']}&usertype={$data[$i]['usertype']}'>Delete</a>
								</td>


									
							";
						}
						echo "</table>";

						

					?>
						
					</fieldset>

					
				</fieldset>
			</td>
		</fieldset>
		</td>
	</table>
	<fieldset>
		<?php include '../controller/includes/footer.php'?>
	</fieldset>

	</form>

</body>
</html>