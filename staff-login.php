<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="staff-login-check.php" method="post">
     	<h2>Staff Login</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Staff Id</label>
     	<input type="text" name="staff_id" placeholder="Staff Id"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
          <a href="staff-registration.php" class="ca">Create an account</a>
     </form>
</body>
</html>