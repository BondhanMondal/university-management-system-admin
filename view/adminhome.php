<html>
<head>
   <title>Admin Home Page</title>
    <style>
        #aa {
            font-size: 40px;
            color: green;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
<fieldset>
<?php
session_start();
 include '../controller/includes/header.php'?>
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
<td id="aa">
<?php echo "Welcome ".$_SESSION['username']."";?>
</td>
</table>
<fieldset>
<?php include '../controller/includes/footer.php'?>
</fieldset>

</body>
<html>