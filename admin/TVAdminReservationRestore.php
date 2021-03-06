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

        <title>Reservations</title>
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
                        <a href="index.php">
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
                    <li class="active">
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
                $query = "SELECT * FROM tbl_reservation WHERE reservation_purgeFlag = 0";  
                $result = mysqli_query($connect, $query);  
                //ORDER BY reservation_ID DESC
                ?>
                <!--TABLE-->
 
                <div style="padding:70px;">
                    <form method="post" action="TVAdminReservationAdd.php"> 
                        <p style="font-size: 35px; color: #000;">
                            <strong>Restore Reservations</strong> 
                            
                                <a href="TVAdminReservations.php" class="btn btn-info" role="button">Back to Reservations</a>
                                <input type="text" id="txtbxSearch" onkeyup="SearchBar()" placeholder="Search" style="height:30px;font-size:14pt;">
                        </p>
                        <script>
                        function SearchBar() {
                        // Declare variables 
                        var input, filter, table, tr, td, i;
                        input = document.getElementById("txtbxSearch");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("reservation_deleted");
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
                            <table id="reservation_deleted" class="table table-hover" style="width:1500px">  
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Reservation ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Contact Number</th>
                                    <th>Email Address</th>
                                    <th>Address</th>
                                    <th>Date Applied</th>
                                    <th>Date Planned</th>
                                    <th>Package ID</th>
                                    <th>Package Type</th>
                                    <th>Reservation Status</th>
                                    <th>Total Heads</th>
                                    <th>Price Per Head</th>
                                    <th>Total Price</th>
                                    <th>Amount Paid</th>
                                    <th>Amount Due</th>
                                </tr> 
                                <?php  
                                while($row = mysqli_fetch_array($result))  
                                {  
                                    ?>  
                                    <tr>
                                        <td>
                                            <a title="restore" class="btn btn-success" href="TVAdminReservationRevive.php?id=<?php echo $row['reservation_ID']; ?>"><span class="glyphicon glyphicon-plus"></span></a> 
                                        </td>
                                        <td> 
                                            <a title="Delete" class="btn btn-danger" href="TVAdminReservationDeleteFinal.php?id=<?php echo $row['reservation_ID']; ?>" onClick="return confirm('Are you sure you want to delete?')"><span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                        <td> <?php echo $row['reservation_ID'];?> </td>
                                        <td> <?php echo $row['reservation_firstName'];?> </td>
                                        <td> <?php echo $row['reservation_lastName'];?> </td>
                                        <td> <?php echo $row['reservation_contactNum'];?> </td>
                                        <td> <?php echo $row['reservation_emailAdd'];?> </td>
                                        <td> <?php echo $row['reservation_address'];?> </td>
                                        <td> <?php echo $row['reservation_dateApplied'];?> </td>
                                        <td> <?php echo $row['reservation_plannedDate'];?> </td>
                                        <td> <?php echo $row['reservation_packageID'];?> </td>
                                        <td> <?php echo $row['reservation_packageType'];?> </td>
                                        <td> <?php echo $row['reservation_status'];?> </td>
                                        <td> <?php echo $row['reservation_totalHead'];?> </td>
                                        <td> <?php echo $row['reservation_pricePerHead'];?> </td>
                                        <td> <?php echo $row['reservation_totalPrice'];?> </td>
                                        <td> <?php echo $row['reservation_paid'];?> </td>
                                        <td> <?php echo $row['reservation_debt'];?> </td>
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
