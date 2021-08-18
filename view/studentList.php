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
					<legend>Student List</legend>
					<fieldset>

						<?php
						echo "<table border='1'>
						<tr>
							<td>ID</td>
							<td>Name</td>
							<td>Student Id</td>
							<td>Password</td>
							<td>User-Type</td>
							<td>Programme</td>
							<td>Department</td>
							<td>Admission Date</td>
							<td>Gender</td>
							<td>Religion</td>
							<td>Dob</td>
							<td>Contact No</td>
							<td>Email</td>
							<td>Action</td>


						</tr>";
						

						$data = getAllStudents(); 
 						for($i = 0; $i<count($data); $i++)
						{
							echo "

									<tr>
										<td>{$data[$i]['id']}</td>
										<td>{$data[$i]['Name']}</td>
										<td>{$data[$i]['Student_id']}</td>
										<td>{$data[$i]['Password']}</td>
										<td>{$data[$i]['Usertype']}</td>
										<td>{$data[$i]['Programme']}</td>
										<td>{$data[$i]['Department']}</td>
										<td>{$data[$i]['Admission_date']}</td>
										<td>{$data[$i]['Gender']}</td>
										<td>{$data[$i]['Religion']}</td>
										<td>{$data[$i]['Dob']}</td>
										<td>{$data[$i]['Contact_no']}</td>
										<td>{$data[$i]['Email']}</td>
										<td><a href='../controller/editStudent.php?id={$data[$i]['id']}'>Edit</a> |
								    	<a href='../controller/delete.php?id={$data[$i]['id']}&usertype={$data[$i]['Usertype']}'>Delete</a>
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