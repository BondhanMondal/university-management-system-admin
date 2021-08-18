<?php 

	function connect() {
		$conn = new mysqli("localhost", "bondhan", "123456", "university_management_system");
		if($conn->connect_errno) {
			die("Connection failed due to" . $conn->connect_error);
		}
		return $conn;
	}

	connect();


?>