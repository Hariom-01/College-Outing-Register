<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['registration']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$registration = validate($_POST['registration']);
	$pass = validate($_POST['password']);

	if (empty($registration)) {
		header("Location: student-login.php?error=Registration is required");
	    exit();
	}else if(empty($pass)){
        header("Location: student-login.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = $pass;

        
		$sql = "SELECT * FROM students WHERE registration='$registration' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['registration'] === $registration && $row['password'] === $pass) {
            	$_SESSION['registration'] = $row['registration'];
            	$_SESSION['id'] = $row['id'];
            	$_SESSION['name'] = $row['name'];
				header("Location: home.php");
		        exit();
            }else{
				header("Location: student-login.php?error=Incorect Registration or password");
		        exit();
			}
		}else{
			header("Location: student-login.php?error=Incorect Registration or password");
	        exit();
		}
	}
	
}else{
	header("Location: student-login.php");
	exit();
}