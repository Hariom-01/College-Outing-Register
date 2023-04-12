<?php
include "db_conn.php";

$id=$_REQUEST['sno'];
$query = "DELETE FROM outing WHERE sno=$id"; 
$result = mysqli_query($conn,$query);
header("Location: staff_dashboard.php"); 
?>
