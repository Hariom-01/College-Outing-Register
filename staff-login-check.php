<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['staff_id']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$staff_id = validate($_POST['staff_id']);
	$pass = validate($_POST['password']);

	if (empty($staff_id)) {
		header("Location: staff-login.php?error=Staff Id is required");
	    exit();
	}else if(empty($pass)){
        header("Location: staff-login.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM staffs WHERE staff_id='$staff_id' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['staff_id'] === $staff_id && $row['password'] === $pass) {
            	$_SESSION['staff_id'] = $row['staff_id'];
            	$_SESSION['name'] = $row['name'];
				
				header("Location: staff_dashboard.php");
		        exit();
            }else{
				header("Location: staff-login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: staff-login.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: staff-login.php");
	exit();
}