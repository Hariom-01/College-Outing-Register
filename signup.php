<!DOCTYPE html>
<html>
<head>
	<title>Student Registeration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="signup-check.php" method="post">
     	<h2>Student Registeration</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Registeration Number</label>
          <?php if (isset($_GET['registration'])) { ?>
               <input type="text" 
                      name="registration" 
                      placeholder="Registeration Number"
                      value="<?php echo $_GET['registration']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="registration" 
                      placeholder="Registeration Number"><br>
          <?php }?>

          <label>Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'><br>
          <?php }?>

          <label>Class Name</label>
          <?php if (isset($_GET['class_name'])) { ?>
               <input type="text" 
                      name="class_name" 
                      placeholder="Class Name"
                      value="<?php echo $_GET['class_name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="class_name" 
                      placeholder="Class Name"><br>
          <?php }?>

          <label>Roll Number</label>
          <?php if (isset($_GET['roll_number'])) { ?>
               <input type="text" 
                      name="roll_number" 
                      placeholder="Roll Number"
                      value="<?php echo $_GET['roll_number']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="roll_number" 
                      placeholder="Roll Number"><br>
          <?php }?>

     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>Re Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>

     	<button type="submit">Sign Up</button>
          <a href="student-login.php" class="ca">Already have an account?</a>
     </form>
</body>
</html>