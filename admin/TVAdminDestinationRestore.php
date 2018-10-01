<?php
session_start();
$_accessLevel = $_SESSION['adminAccessLevel'];
if ($_accessLevel=='Admin'){
} else if ($_accessLevel=='Staff') {
    echo'<script> document.getElementById("userdiv").style.display ="none"; </script>';
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

        <title>Destinations</title>
        <link rel="shortcut icon" href = "images/tigerVisionIcon.ico">
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="admincss/TVAdminSideBar.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    </head>
    <body>
        <div class="wrapper">
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
                            <li class="active"><a href="TVAdminDestinations.php">Destinations Offered</a></li>
                            <li><a href="TVAdminPackages.php">Packages</a></li>
                            <li><a href="TVAdminUsers.php">Users</a></li>
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

            <!-- Page Content Holder -->
            <div id="content">
                <!--TABLE VIEW-->
                <!--CONNECTION STRING-->
                <?php

                include("TVConnectionString.php");  
                $query = "SELECT * FROM tbl_destination WHERE `destination_purgeFlag` = 0 ORDER BY destination_ID DESC";  
                $result = mysqli_query($connect, $query);  
                ?>
                <!--TABLE-->
 
                <div style="padding:70px;">
                    <form method="post" action="TVAdminDestinationAdd.php"> 
                        <p style="font-size: 35px; color: #000;">
                            <strong>Restore Destinations</strong> 
                            <a href="TVAdminDestinations.php" class="btn btn-info" role="button">Back to Destinations</a>
                            <input type="text" id="txtbxSearch" onkeyup="SearchBar()" placeholder="Search" style="height:30px;font-size:14pt; ">
                        </p>
                        <script>
                        function SearchBar() {
                        // Declare variables 
                        var input, filter, table, tr, td, i;
                        input = document.getElementById("txtbxSearch");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("destination");
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
                        
                        <div class="table-responsive" id="destination_table">  
                            <table id="destination" class="table table-hover" style="width:1500px">  
                                <tr>  
                                    <th></th>
                                    <th></th>
                                    <th>Destination ID</th>
                                    <th>Destination Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th style="width: 120px;">Contact</th>
                                    <th>Link</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th style="width: 70px;">Price</th>
                                </tr>  
                                <?php  
                                while($row = mysqli_fetch_array($result))  
                                {  
                                    ?>  
                                    <tr>
                                        <td>
                                            <a title="Restore" class="btn btn-success" href="TVAdminDestinationRevive.php?id=<?php echo$row['destination_ID']; ?>"><span class="glyphicon glyphicon-plus"></span></a> 
                                        </td>
                                        <td> 
                                            <a title="Delete" class="btn btn-danger" href="TVAdminDestinationDeleteFinal.php?id=<?php echo$row['destination_ID']; ?>" onClick="return confirm('Are you sure you want to delete?')"><span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                        <td> <?php echo $row['destination_ID'];?> </td>
                                        <td> <?php echo $row['destination_name'];?> </td>
                                        <td> <?php echo $row['destination_address'];?> </td>
                                        <td> <?php echo $row['destination_email'];?> </td>
                                        <td> <?php echo $row['destination_contacts'];?> </td>
                                        <td> <a href="<?php echo $row['destination_link'];?>" target="_blank"><?php echo $row['destination_link'];?></a></td>
                                        <td> <?php echo $row['destination_description'];?> </td>
                                        <td> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['destination_image'] ).'"width="200" />';?> </td>
                                        <td> <?php echo $row['destination_price'];?> </td>
                                        </tr>  
                           <?php
                                }
                           ?> 
                            </table>
                        </div>
                    </form>
                </div>
            </div>
            <!--END OF TABLE-->
            <!--END OF TABLE VIEW-->
        </div>
        <!-- jQuery CDN -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    </body>
</html>
