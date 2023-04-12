<?php
session_start();
include "db_conn.php";

$sql = "SELECT * FROM leaves WHERE student_id='$_SESSION[id]' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

$leaves = [];
$id=$_SESSION['id'];
if (isset($_SESSION['id']) && isset($_SESSION['registration'])) {
?>
   


<!doctype html>
    <html lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="style.css">
        <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">
    </head>

    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header" style="width:100%;">
            <div class="app-header header">
                <div class="app-header__logo">
                    <div class="bold"><b>Student panel</b></div>
                   

                </div>
                <div class="app-header__content">
                    <div class="app-header-right">
                        <div class="header-btn-lg pr-0">
                            <div class="widget-content p-0">
                                <div class="widget-content-wrapper">
                                    <div class="widget-content-left">
                                        <div class="btn-group">
                                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                                <img width="42" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
                                                <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                            </a>
                                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                                <a style="padding-left:10px;margin-left:0;" class="logout-button" href="logout.php">Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-main">
               <?php include"side-nav.php"; ?>
                
          <a class="logout-button" href="logout.php">Logout</a>
          <div class="container" style="background-color:#53dcf3;"> 
               <div class="form-box">
               <center><label style="color:black;text-align:center;">Hello, <?php echo $_SESSION['name']; ?></u></label></center> 
                    <h1>Leave application form</h1>
                    <center><label style="color:black;text-align:center;">Please fill in this form with all the required information.<br> After the leave request has been approved by your supervisor</u></label></center>
                    
                    <br>
                    <br>
                    
                    <?php
                     if (mysqli_num_rows($result) === 1) {
                         $leaves = mysqli_fetch_assoc($result);
                     }
                     if (isset($leaves['status'])) {
                         echo '<center><label style="color:black;text-align:center;">Your Current Leave Status is <u>'. $leaves['status']  .'.</u></label></center>.';
                     }
                
                    ?>
                    
                    <br>
                    <br>
                    <?php if (isset($_GET['success'])) { ?>
                          echo <p class="success"><?php echo $_GET['success']; ?></p>
                         <?php } else{ ?>
                    <form action="saveleaveform.php" method="post" style="margin:0 auto;">
                         <?php if (isset($_GET['error'])) { ?>
                              <p class="error"><?php echo $_GET['error']; ?></p>
                         <?php } ?>

                         <?php if (isset($_GET['success'])) { ?>
                              <p class="success"><?php echo $_GET['success']; ?></p>
                         <?php } ?>
                         <div class="form-group">
                              <label for="subject">Subject</label>
                              <input class="form-control" id="subject" type="text" name="subject">
                              <input class="form-control" id="student_id" type="hidden" value="<?php echo $_SESSION['id']; ?>" name="student_id">
                              <input class="form-control" id="student_name" type="hidden" value="<?php echo $_SESSION['name']; ?>" name="student_name">
                         </div>
                         <div class="form-group">
                              <label for="date">Leave Start Date</label>
                              <input class="form-control" id="start_date" type="date" name="start_date" min="<?php echo date("Y-m-d"); ?>">
                         </div>
                         <div class="form-group">
                              <label for="date">Leave End Date</label>
                              <input class="form-control" id="end_date" type="date" name="end_date" min="<?php echo date("Y-m-d"); ?>">
                         </div>
                         <div class="form-group">
                              <label for="roll_number">Roll Number</label>
                              <input class="form-control" id="roll_number" type="text" name="roll_number">
                         </div>
                         <div class="form-group">
                              <label for="phone_number">Phone Number</label>
                              <input class="form-control" id="phone_number" type="number" name="phone_number">
                         </div>
                         <div class="form-group">
                              <label for="class_name">Class Name</label>
                              <input class="form-control" id="class_name" type="text" name="class_name">
                         </div>
                         <div class="form-group">
                              <label for="reason">Reason</label>
                              <textarea class="form-control" id="reason" name="reason"></textarea>
                         </div>
                        <?php
$select_p="SELECT * FROM "
                        ?>
                       
                         <input class="btn btn-primary" type="submit" value="Submit" />
                    </form>
                    <?php } ?>
                 
               </div>
          </div>
            </div>
        </div>
        <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script>
    </body>
</html>
<?php
} else {
     header("Location: student-login.php");
    exit();
}
?>


