<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['staff_id']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$staff_id = validate($_POST['staff_id']);
	$pass = validate($_POST['password']);
	$department = validate($_POST['department']);
	$class = validate($_POST['class']);
	$subject = validate($_POST['subject']);
	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'staff_id='. $staff_id. '&name='. $name;


	if (empty($staff_id)) {
		header("Location: signup.php?error=Staff Id is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($name)){
        header("Location: signup.php?error=Name is required&$user_data");
	    exit();
	}
	else if(empty($department)){
        header("Location: signup.php?error=Department is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM staffs WHERE staff_id='$staff_id' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The staff id is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO staffs(staff_id, password, name,class,department,subject) VALUES('$staff_id', '$pass', '$name','$class','$department','$subject')";
           $result2 = mysqli_query($conn, $sql2);
      
           if ($result2) {
            $_SESSION['staff_id'] = $staff_id;
           	 header("Location: staff_dashboard.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}