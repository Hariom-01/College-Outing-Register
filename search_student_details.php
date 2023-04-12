<?php

session_start(); 
include "db_conn.php";

if (isset($_POST['name'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$name = validate($_POST['name']);
    $sql = "SELECT * FROM admins WHERE (`user_name` LIKE '%".$name."%') Limit 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        var_dump($row);
        die();
    }
}
header("Location: receipt.php");

?>