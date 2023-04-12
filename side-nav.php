<div class="app-sidebar sidebar-shadow">
                    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li>
                                <link rel="stylesheet" href="style.css">
                                    <a href="application.php?id= <?php echo $_SESSION['id']; ?>">
                                        <i class="metismenu-icon pe-7s-add-user">
                                        </i>Application Status
                                    </a>
                                </li>
                                <li>
                                    <a href="profile.php?id=<?php echo $_SESSION['id']; ?>">
                                        <i class="metismenu-icon pe-7s-add-user">
                                        </i>Student Profile
                                    </a>
                                </li>
                                <li>
                                <a href="home.php?id=<?php echo $_SESSION['id']; ?>">
                                        <i class="metismenu-icon pe-7s-add-user">
                                        </i>New Application 
                                    </a>
                                </li>
                                <li>
                                    <a href="outing.php?id=<?php echo $_SESSION['id']; ?>">
                                        <i class="metismenu-icon pe-7s-add-user">
                                        </i>IN-OUT
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
