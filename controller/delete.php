<?php

	session_start();
	require_once('../model/adminModel.php');

	
	$id = $_GET['id'];
	$usertype = $_GET['usertype'];
	
	if($usertype == "admin") {
		$res = deleteAdmin($id, $usertype);
		if($res)
			{
				header('location: ../view/adminList.php');
			}
			else {
			$errorMessage = "Error while deleting.";
			}
	}
	elseif ($usertype == "student") {
		$res = deleteStudent($id, $usertype);
		if($res)
			{
				header('location: ../view/studentList.php');
			}
			else {
			$errorMessage = "Error while deleting.";
			}
	}
	elseif ($usertype == "faculty") {
		$res = deleteFaculty($id, $usertype);
		if($res)
			{
				header('location: ../view/facultyList.php');
			}
			else {
			$errorMessage = "Error while deleting.";
			}
	}
	else {
		$res = deleteLibrarian($id, $usertype);
		if($res)
		{
			header('location: ../view/liberianList.php');
		}
		else {
			$errorMessage = "Error while deleting.";
			}
	}

	
?>