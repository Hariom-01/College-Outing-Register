<!DOCTYPE html>
<html>
<head>
	<title>Staff Registeration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="staff-registration-check.php" method="post">
     	<h2>Staff Registeration</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Staff Id</label>
          <?php if (isset($_GET['staff_id'])) { ?>
               <input type="text" 
                      name="staff_id" 
                      placeholder="Staff Id"
                      value="<?php echo $_GET['staff_id']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="staff_id" 
                      placeholder="Staff Id"><br>
          <?php }?>

          <label>Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"><br>
          <?php }?>

          <label>Department</label>
          <?php if (isset($_GET['department'])) { ?>
               <input type="text" 
                      name="department" 
                      placeholder="Department"
                      value="<?php echo $_GET['department']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="department" 
                      placeholder="Department"><br>
          <?php }?>

          <label>Class Name</label>
          <?php if (isset($_GET['class'])) { ?>
               <input type="text" 
                      name="class" 
                      placeholder="Class Name"
                      value="<?php echo $_GET['class']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="class" 
                      placeholder="Class Name"><br>
          <?php }?>

          <label>Subject</label>
          <?php if (isset($_GET['subject'])) { ?>
               <input type="text" 
                      name="subject" 
                      placeholder="Subject"
                      value="<?php echo $_GET['subject']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="subject" 
                      placeholder="Subject"><br>
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
          <a href="staff-login.php" class="ca">Already have an account?</a>
     </form>
</body>
</html>