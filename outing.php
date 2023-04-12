<?php
session_start();
include "db_conn.php";

$sql = "SELECT * FROM leaves WHERE student_id='$_SESSION[id]' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

$leaves = [];

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
               <?php

if(isset($_POST['on'])){
    $id=$_SESSION['id'];

  $insert_d="INSERT INTO outing(currentDate,status,user) VALUES(now(),'1','$id')";
  $result=mysqli_query($conn,$insert_d);
  if($result){
    echo"success";
  }}
if(isset($_POST['in'])){
    $id=$_SESSION['id'];
  $insert_d="Update outing set status='0' ,in_datetime=now() where user='$id' and status='1'";
  $result=mysqli_query($conn,$insert_d);
  if($result){
    echo"success";
  }
}

     ?>
   
     <div class="hover">
    <form  method="post">
    <link rel="stylesheet" href="style1.css">
     
      <input type="submit" name="on" value="Out">
        <input type="submit" name="in" value="In">

    </form>
    </div>
    
    <div class="app-main__outer">
                    <div class="p-5">
                        <h3 style="color:black;text-align:center">Outing Register</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    
                                    
                                    <th>User Id</th>
                                   
                                    <th>Out-Time</th>
                                    <th>In-Time</th>
                                    <th>Status</th>
                                   
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $id02=$_SESSION['id'];
                                $sql2 = "SELECT * FROM outing where user='$id02'";
                                $result2 = $conn->query($sql2); 
                                  if ($result2->num_rows > 0) {
                                    // output data of each row
                                        while($row2 = $result2->fetch_assoc())
                                        {
                                           
                                            echo "<tr>";
                                         
                                            
                                            echo "<td>" . $row2['user'] . "</td>";
                                           
                                            echo "<td>" . $row2['currentDate'] . "</td>";
                                            echo "<td>" . $row2['in_datetime'] . "</td>";
                                            echo "<td>" . $row2['status'] . "</td>";
                                          
                                       
                                            echo "</tr>";
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
       
       
     </body>

     </html>



                    
                
                  
                 
         
        
  
<?php
} else {
     header("Location: student-login.php");
    exit();
}
?>
