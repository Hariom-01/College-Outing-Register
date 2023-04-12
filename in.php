<?php
session_start();
include "db_conn.php";
if (isset($_SESSION['staff_id'])) {
    $staff_id = $_SESSION['staff_id'];

    $sql = "SELECT * FROM leaves WHERE status='2'";
    $result = $conn->query($sql);
   
    $leave = [];
  
?>
<!doctype html>
    <html lang="en">
    <head>
        <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">
    </head>

    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
            <div class="app-header header">
                <div class="app-header__logo">
                    <div class="bold"><b>Staff Panel</b></div>
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
                                                <a style="padding-left:10px" class="logout-button" href="logout.php">Logout</a>
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
                <div class="app-sidebar sidebar-shadow">
                    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li>
                                    <a href="staff_dashboard.php">
                                        <i class="metismenu-icon pe-7s-add-user">
                                        </i>Application List
                                    </a>
                                </li>
                                <li>
                                    <a href="apporved_list.php">
                                        <i class="metismenu-icon pe-7s-add-user">
                                        </i>Apporved List
                                    </a>
                                </li>
                                <li>
                                    <a href="deny_list.php">
                                        <i class="metismenu-icon pe-7s-add-user">
                                        </i>Deny List
                                    </a>
                                </li>
                                <li>
                                    <a href="in.php">
                                        <i class="metismenu-icon pe-7s-add-user">
                                        </i>In-Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="app-main__outer">
                    <link rel="stylesheet" href="style1.css">
                    <div class="p-5">
                        <h3 style="color:black;text-align:center">In-Out List</h3>
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
                              
                                $sql2 = "SELECT * FROM outing";
                                $result2 = $conn->query($sql2); 
                                  if ($result2->num_rows > 0) {

                                    // output data of each row
                                        while($row2 = $result2->fetch_assoc())
                                        {
                                            $id=$row2['user'];
                                            $sql3 = "SELECT * FROM students where id='$id' ";
                                            $result3 = $conn->query($sql3); 
                                            $count=mysqli_num_rows($result3);
                                            $row3 = $result3->fetch_assoc();
                                            echo "<tr>";
                                         
                                            if($count>0){
                                            echo "<td>" . $row3['name'] . "</td>";
                                            }else{
                                                echo "<td>" . $row2['user'] . "</td>"; 
                                            }
                                           
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
            </div>
        </div>
        <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script>
    </body>
</html>
<?php
} else {
    header("Location: staff-login.php");
    exit();
}
?>