<?php 

	include 'dbconnect.php';
	
	function createUser($username, $password, $usertype, $fullname, $gender, $religion, $dob, $phone, $email) {
		$conn = connect();
		$stmt = $conn->prepare("INSERT INTO ADMIN (username, password, usertype, fullname, gender, religion, dob, phone, email)
			Values(?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param("sssssssss", $username, $password, $usertype, $fullname, $gender, $religion, $dob, $phone, $email);
		return $stmt->execute();

	}

	function validateUser($username, $password) {
		$conn = connect();
		$stmt = $conn->prepare("SELECT * FROM ADMIN WHERE username = ? and password = ?");
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		$records = $stmt->get_result();
		return $records->num_rows === 1;
	}

	function getuserinfo($username, $password) {
		$conn = connect();
		$stmt = $conn->prepare("SELECT * FROM ADMIN WHERE username = ? and password = ?");
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		$records = $stmt->get_result();
		return $records->fetch_all(MYSQLI_ASSOC);
	}

	function updateUserById($username, $fullname, $gender, $dob, $phone, $email, $id) {
		$conn = connect();
		$stmt = $conn->prepare("UPDATE admin SET username=?, fullname=?, gender=?, dob=?, phone=?, email=? WHERE id=?");
		$stmt->bind_param("ssssssi", $username, $fullname, $gender, $dob, $phone, $email, $id);
		return $stmt->execute();

	}

	function updatePassword($newpassword, $username, $password) {
		$conn = connect();
		$stmt = $conn->prepare("UPDATE admin SET password=? WHERE username=? and password=?");
		$stmt->bind_param("sss", $newpassword, $username, $password);
		return $stmt->execute();

	}

	function getAllUsers() {
		$conn = connect();
		$stmt = $conn->prepare("SELECT * FROM ADMIN");
		$stmt->execute();
		$records = $stmt->get_result();
		return $records->fetch_all(MYSQLI_ASSOC);		
	}

	function addStudent($name, $studentid, $password, $usertype, $programme, $department, $admissiondate, $gender, $religion, $dob, $phone, $email) {
		$conn = connect();
		$stmt = $conn->prepare("INSERT INTO STUDENTS (Name, Student_id, Password, Usertype, Programme, Department, Admission_date, Gender, Religion, Dob, Contact_no, Email)
			Values(?,?,?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param("ssssssssssss", $name, $studentid, $password, $usertype, $programme, $department, $admissiondate, $gender, $religion, $dob, $phone, $email);
		return $stmt->execute();
	}

	function addFaculty($name, $facultyid, $password, $usertype, $department, $joiningdate, $gender, $religion, $dob, $phone, $email) {
		$conn = connect();
		$stmt = $conn->prepare("INSERT INTO FACULTY (Name, Faculty_id, Password, Usertype, Department, Joining_date, Gender, Religion, Dob, Contact_no, Email)
			Values(?,?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param("sssssssssss", $name, $facultyid, $password, $usertype, $department, $joiningdate, $gender, $religion, $dob, $phone, $email);
		return $stmt->execute();
	}

	function addLiberian($name, $liberianid, $password, $usertype, $department, $joiningdate, $gender, $religion, $dob, $phone, $email) {
		$conn = connect();
		$stmt = $conn->prepare("INSERT INTO LIBERIAN (Name, Liberian_id, Password, Usertype, Department, Joining_date, Gender, Religion, Dob, Contact_no, Email)
			Values(?,?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param("sssssssssss", $name, $liberianid, $password, $usertype, $department, $joiningdate, $gender, $religion, $dob, $phone, $email);
		return $stmt->execute();
	}

	function getAllStudents() {
		$conn = connect();
		$stmt = $conn->prepare("SELECT * FROM STUDENTS");
		$stmt->execute();
		$records = $stmt->get_result();
		return $records->fetch_all(MYSQLI_ASSOC);		
	}

	function getAllFaculty() {
		$conn = connect();
		$stmt = $conn->prepare("SELECT * FROM FACULTY");
		$stmt->execute();
		$records = $stmt->get_result();
		return $records->fetch_all(MYSQLI_ASSOC);		
	}

	function getAllLiberian() {
		$conn = connect();
		$stmt = $conn->prepare("SELECT * FROM LIBERIAN");
		$stmt->execute();
		$records = $stmt->get_result();
		return $records->fetch_all(MYSQLI_ASSOC);		
	}

	// function deleteUser($id, $usertype) {
	// 	$conn = connect();
	// 	$stmt = $conn->prepare("DELETE  FROM STUDENTS,ADMIN,LIBERIAN,LIBERIAN WHERE id = ? and Usertype = ?");
	// 	$stmt->bind_param("is", $id, $usertype);
	// 	return $stmt->execute();
	// }
	function deleteAdmin($id, $usertype) {
		$conn = connect();
		$stmt = $conn->prepare("DELETE  FROM ADMIN WHERE id = ? and usertype = ?");
		$stmt->bind_param("is", $id, $usertype);
		return $stmt->execute();
	}
	function deleteStudent($id, $usertype) {
		$conn = connect();
		$stmt = $conn->prepare("DELETE  FROM STUDENTS WHERE id = ? and usertype = ?");
		$stmt->bind_param("is", $id, $usertype);
		return $stmt->execute();
	}
	function deleteFaculty($id, $usertype) {
		$conn = connect();
		$stmt = $conn->prepare("DELETE  FROM FACULTY WHERE id = ? and usertype = ?");
		$stmt->bind_param("is", $id, $usertype);
		return $stmt->execute();
	}
	function deleteLibrarian($id, $usertype) {
		$conn = connect();
		$stmt = $conn->prepare("DELETE  FROM LIBERIAN WHERE id = ? and usertype = ?");
		$stmt->bind_param("is", $id, $usertype);
		return $stmt->execute();
	}

	function getAdmininfo($id) {
		$conn = connect();
		$stmt = $conn->prepare("SELECT * FROM ADMIN WHERE id = ?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$records = $stmt->get_result();
		return $records->fetch_all(MYSQLI_ASSOC);
	}

	function updateAdmin($username, $password, $usertype, $fullname, $gender, $dob, $phone, $email, $id) {
		$conn = connect();
		$stmt = $conn->prepare("UPDATE ADMIN SET username=?, password=?, usertype=?, fullname=?, gender=?, dob=?, phone = ?, email=? WHERE id=?");
		$stmt->bind_param("ssssssssi", $username, $password, $usertype, $fullname, $gender, $dob, $phone, $email, $id);
		return $stmt->execute();

	}

	function getStudentinfo($id) {
		$conn = connect();
		$stmt = $conn->prepare("SELECT * FROM STUDENTS WHERE id = ?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$records = $stmt->get_result();
		return $records->fetch_all(MYSQLI_ASSOC);
	}

	function updateStudent($name, $studentid, $password, $usertype, $programme, $department, $admissiondate, $gender, $dob, $phone, $email, $idd) {
		$conn = connect();
		$stmt = $conn->prepare("UPDATE STUDENTS SET Name=?, Student_id=?, Password=?, Usertype=?, Programme=?, Department=?, Admission_date=?, Gender=?, Dob=?, Cpntact_no=?, Email=? WHERE id=?");
		$stmt->bind_param("sssssssssssi", $name, $studentid, $password, $usertype, $programme, $department, $admissiondate, $gender, $dob, $phone, $email, $idd );
		return $stmt->execute();
	}

	// function liveSearch( $name) {
	// 	$conn = connect();
	// 	$sql = "select * from users where username like '%{$name}%'";
	// 	$result = mysqli_query($conn, $sql);
	// 	return $result->fetch_all(MYSQLI_ASSOC)

	// }





?>