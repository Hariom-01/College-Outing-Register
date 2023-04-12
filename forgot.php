<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['registration'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$registration = validate($_POST['registration']);

	if (empty($registration)) {
		header("Location: forgot.php?error=Registration No. is required");
	    exit();
    } else {
        $sql = "SELECT * FROM students WHERE registration='$registration'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FORGOT PASSWORD</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <form action="forgot.php" method="post">
            <h2>FORGOT PASSWORD</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>Registration</label>
            <input type="text" name="registration" placeholder="Registration"><br>
            <?php 
                if (isset($row['registration'])) {
                    echo "<p>Your password is: ".$row['password']."</p>";
                }
            ?>

            <button type="submit">Forgot Password</button>
        </form>
    </body>
</html>