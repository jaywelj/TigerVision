<?php
session_start();
$_accessLevel = $_SESSION['adminAccessLevel'];
if ($_accessLevel=='Admin'){
} else if ($_accessLevel=='Staff') {
header("Location: TVAdminDestinations.php");
} else {
    header("Location: TVAdminLogout.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Collapsible sidebar using Bootstrap 3</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="admincss/TVAdminSideBar.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    </head>
    <body style="overflow: hidden;">
        <div class="wrapper" >
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                     <img src="images/headerLogo.png">  
                </div>

                 <ul class="list-unstyled components">
                    <p></p>
                    <li >
                        <a href="TVAdminDashboard.php">
                            <i class="glyphicon glyphicon-home"></i>
                            Dashboard
                        </a>
                        <!--<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Dashboard</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Home 1</a></li>
                            <li><a href="#">Home 2</a></li>
                            <li><a href="#">Home 3</a></li>
                        </ul>-->
                    </li>
                    <li>
                        <a href="TVAdminReservations.php">
                        <i class="glyphicon glyphicon-calendar"></i>
                        Reservations</a>              
                    </li>
                    <li>
                      <a href="TVAdminPayments.php">
                      <i class="glyphicon glyphicon-usd"></i>
                      Payments</a>              
                    </li>
                    <li>
                        <a href="#Maintenance" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-wrench"></i>
                        Maintenance<span class="caret" ></span></a>

                        <ul class="collapse list-unstyled" id="Maintenance">
                            <li><a href="TVAdminDestinations.php">Destinations Offered</a></li>
                            <li><a href="TVAdminPackages.php">Packages</a></li>
                            <li class="active"><a href="TVAdminUsers.php">Users</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown" >
                                    <a style="height: 80px;   font-size:18px; font-family: Arial;" class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user" style="top:8px;"> ACCOUNT</span>
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                      <li style="font-size: 20px"><a  href="TVAdminAccounts.php"> <span class="glyphicon glyphicon-user" style="margin-right: 10px; top:3px;"></span>View Account</a></li>
                                      <li style="font-size: 20px"><a href="TVAdminLogout.php"><span class="glyphicon glyphicon-off" style="margin-right: 10px; top:3px;"></span>Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!--<ul class="list-unstyled CTAs">
                    <li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
                    <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>
                </ul>-->
            </nav>

            <!-- Page Content Holder -->
            <div id="content" style="overflow: hidden;">
                <!-- VIEW -->
                <?php
               //including the database connection file
include_once("TVConnectionString.php");
//
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($connect, "SELECT * FROM tbl_adminlogin WHERE `admin_purgeFlag` = 0 ORDER BY admin_adminName DESC "); // using mysqli_query instead
                ?>
                <div style="padding:70px;">
                    <form method="post" action="TVAdminUserAdd.php"> 
                        <p style="font-size: 35px; color: #000;">
                            <strong>Restore Users</strong> 
                            <a href="TVAdminUsers.php" class="btn btn-info" role="button">Back To Users</a>
                            <input type="text" id="txtbxSearch2" onkeyup="SearchBar2()" placeholder="Search" style="height:30px;font-size:14pt; ">
                        </p>
                        <script>
                        function SearchBar2() {
                        // Declare variables 
                        var input, filter, table, tr, td, i;
                        input = document.getElementById("txtbxSearch2");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("user");
                        tr = table.getElementsByTagName("tr");

                        // Loop through all table rows, and hide those who don't match the search query
                        for (i = 0; i < tr.length; i++) {
                          td = tr[i].getElementsByTagName("td")[0];
                          if (td) {
                            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                              tr[i].style.display = "";
                            } else {
                              tr[i].style.display = "none";
                            }
                          } 
                        }
                        }
                        </script>
                        

                    <div class="table-responsive" >       
                        <table id="user" class="table table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Admin Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Password</th>
                                    <th>Contact Number</th>
                                    <th>Birthdate</th>
                                    <th>Access Level</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php  
                                while($row = mysqli_fetch_array($result))  
                                {  
                                    ?>  
<tr>
                                        <td>
                                            <a title="restore" class="btn btn-success" href="TVAdminUserRevive.php?id=<?php echo$row['admin_adminName']; ?>"><span class="glyphicon glyphicon-plus"></span></a> 
                                        </td>
                                        <td> 
                                            <a title="Delete" class="btn btn-danger" href="TVAdminUserDeleteFinal.php?id=<?php echo$row['admin_adminName']; ?>" onClick="return confirm('Are you sure you want to delete?')"><span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                        <td> <?php echo $row['admin_adminName'];?> </td>
                                        <td> <?php echo $row['admin_firstName'];?> </td>
                                        <td> <?php echo $row['admin_lastName'];?> </td>
                                        <td> <?php echo $row['admin_password'];?> </td>
                                        <td> <?php echo $row['admin_contactNum'];?> </td>
                                        <td> <?php echo $row['admin_birthDate'];?> </td>
                                        <td> <?php echo $row['admin_accessLevel'];?> </td>
                                        <td> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['admin_image'] ).'"width="50" height="50" />';?> </td>
                                        </tr>  
                           <?php
                                }
                           ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END OF VIEW -->
                <!-- ADD -->
                <!-- Modal -->
           

                                    












                
                <!-- END OF ADD -->
                <!-- EDIT -->
                <!-- Modal -->
                <!-- END OF EDIT -->

            </div>
        </div>

        <!-- jQuery CDN -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    </body>
</html>
