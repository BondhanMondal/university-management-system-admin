<?php

	session_start();
	require '../model/adminModel.php';
	
	$username = $password = "";
	$usernameErr = $passwordErr = "";
	$flag = false;
	$successfulMessage = $errorMessage = "";


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

		
		$validateUser = validateUser($username, $password);

		if($validateUser)
		{
			$_SESSION['flag'] = 1;
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;

			header('location: ../view/adminhome.php');
		}
		else{
			$errorMessage = "username and password missmatch";
		}

		$_COOKIE['username'] = "";
		$_COOKIE['password'] = "";

		if(isset($_POST['remember_me'])){
			setcookie('username',$username,time()+30);
			setcookie('password',$password,time()+30);
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
	<title>Login Page</title>
	<h1 style="color: lightblue;" align="center">Login Form</h1>
</head>
<body>
	<?php
 		include '../controller/includes/head.php'
	?>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<fieldset>
			<legend>Account Information</legend>
			<table>

				<tr>
				<td><label for="username">Username<span style="color: red;">*</span>: </label></td>
				<td><input type="text" name="username" id="username" value="<?php {if(isset($_COOKIE['username'])) echo $_COOKIE['username'];}?>"></td>
				<td><span style="color: red;"><?php echo $usernameErr; ?></span></td>
			</tr>
			<tr>
				<td><label for="password">Password<span style="color: red;">*</span>: </label></td>
				<td><input type="password" name="password" id="password" value="<?php {if(isset($_COOKIE['password'])) echo $_COOKIE['password'];}?>"></td>
				<td><span style="color: red;"><?php echo $passwordErr; ?></span></td>
			</tr>
			</table>
			<input type="submit" name="login" value="LOGIN">
			<!-- <a href="registration.php">REGISTER</a> -->
			<br><br>
			<input type="checkbox" name="remember_me">Remember me
		</fieldset>
		<br>
		<span style="color: green"><?php echo $successfulMessage; ?></span>
		<span style="color: red"><?php echo $errorMessage; ?></span>
	</form>

</body>
</html>