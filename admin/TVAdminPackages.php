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

        <title>Packages</title>
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
                            <li class="active"><a href="TVAdminPackages.php">Packages</a></li>
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
                $query = "SELECT * FROM tbl_tourpackage WHERE package_purgeFlag = 1 ORDER BY package_ID DESC";  
                $result = mysqli_query($connect, $query);  
                ?>
                <!--TABLE-->
 
                <div style="padding:70px;">
                    <form method="post" action="TVAdminDestinationAdd.php"> 
                        <p style="font-size: 35px; color: #000;">
                            <strong>Tour Packages</strong> 
                            <a title="Add" href="TVAdminPackageAdd.php" name="btnAdd" class="btn btn-info btn-lg pull-right"><span class="glyphicon glyphicon-plus"></span></a>
                            <a href="TVAdminPackageRestore.php" class="btn btn-info" role="button">Restore Deleted Tour Packages</a>
                            <input type="text" id="txtbxSearch" onkeyup="SearchBar()" placeholder="Search" style="height:30px;font-size:14pt; ">
                        </p>
                        <script>
                        function SearchBar() {
                        // Declare variables 
                        var input, filter, table, tr, td, i;
                        input = document.getElementById("txtbxSearch");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("tourpackage");
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
                            <table id="tourpackage" class="table table-hover" style="width:1500px">  
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Package ID</th>
                                    <th>Package Name</th>
                                    <th>Package Description</th>
                                    <th>Price Per Head</th>
                                    <th>Destination 1</th>
                                    <th>Destination 2</th>
                                    <th>Destination 3</th>
                                    <th>Destination 4</th>
                                    <th>Destination 5</th>
                                </tr> 
                                <?php  
                                while($row = mysqli_fetch_array($result))  
                                {  
                                    ?>  
                                    <tr>
                                        <td>
                                            <a title="Edit" class="btn btn-success" href="TVAdminPackageEdit.php?id=<?php echo $row['package_ID']; ?>"><span class="glyphicon glyphicon-pencil"></span></a> 
                                        </td>
                                        <td> 
                                            <a title="Delete" class="btn btn-danger" href="TVAdminPackageDeleteTour.php?id=<?php echo$row['package_ID']; ?>" onClick="return confirm('Are you sure you want to delete?')"><span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                        <td> <?php echo $row['package_ID'];?> </td>
                                        <td> <?php echo $row['package_name'];?> </td>
                                        <td> <?php echo $row['package_description'];?> </td>
                                        <td> <?php echo $row['package_pricePerHead'];?> </td>
                                        <td> <?php echo $row['package_destination1'];?> </td>
                                        <td> <?php echo $row['package_destination2'];?> </td>
                                        <td> <?php echo $row['package_destination3'];?> </td>
                                        <td> <?php echo $row['package_destination4'];?> </td>
                                        <td> <?php echo $row['package_destination5'];?> </td>
                                    </tr>  
                           <?php
                                }
                           ?> 
                            </table>
                        </div>
                        <br>
                        <br>
                        <p style="font-size: 35px; color: #000;">
                            <strong>Custom Packages</strong>
                            <a href="TVAdminPackageRestore.php" class="btn btn-info" role="button">Restore Deleted Custom Packages</a>
                            <input type="text" id="txtbxSearch2" onkeyup="SearchBar2()" placeholder="Search" style="height:30px;font-size:14pt; ">
                        </p>
                        <script>
                        function SearchBar2() {
                        // Declare variables 
                        var input, filter, table, tr, td, i;
                        input = document.getElementById("txtbxSearch2");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("custompackage");
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
                            <?php 
                                $query = "SELECT * FROM tbl_createnewpackage WHERE np_purgeFlag = 1 ORDER BY np_ID DESC";  
                                $result = mysqli_query($connect, $query);  
                            ?>
                            <table id="custompackage" class="table table-hover" style="width:1500px">  
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Package ID</th>
                                    <th>Package Name</th>
                                    <th>Package Description</th>
                                    <th>Price Per Head</th>
                                    <th>Destination 1</th>
                                    <th>Destination 2</th>
                                    <th>Destination 3</th>
                                    <th>Destination 4</th>
                                    <th>Destination 5</th>
                                </tr> 
                                <?php  
                                while($row = mysqli_fetch_array($result))  
                                {  
                                    ?>  
                                    <tr>
                                        <td>
                                            <a title="Edit" class="btn btn-success" href="TVAdminPackageCustomEdit.php?id=<?php echo $row['np_ID']; ?>"><span class="glyphicon glyphicon-pencil"></span></a> 
                                        </td>
                                        <td> 
                                            <a title="Delete" class="btn btn-danger" href="TVAdminPackageDeleteCustom.php?id=<?php echo$row['np_ID']; ?>" onClick="return confirm('Are you sure you want to delete?')"><span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                        <td> <?php echo $row['np_ID'];?> </td>
                                        <td> <?php echo $row['np_name'];?> </td>
                                        <td> <?php echo $row['np_description'];?> </td>
                                        <td> <?php echo $row['np_pricePerHead'];?> </td>
                                        <td> <?php echo $row['np_destination1'];?> </td>
                                        <td> <?php echo $row['np_destination2'];?> </td>
                                        <td> <?php echo $row['np_destination3'];?> </td>
                                        <td> <?php echo $row['np_destination4'];?> </td>
                                        <td> <?php echo $row['np_destination5'];?> </td>
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
