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

        <title>Payments</title>
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
                    <li class="active"> 
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
                            <li id="user"><a href="TVAdminUsers.php">Users</a></li>
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
                $query = "SELECT * FROM tbl_payments WHERE payment_purgeFlag = 1 GROUP BY payment_ID DESC";  
                $result = mysqli_query($connect, $query);  
                //ORDER BY reservation_ID DESC
                ?>
                <!--TABLE-->
 
                <div style="padding:70px;">
                    <form method="post" action="TVAdminPaymentAdd.php"> 
                        <p style="font-size: 35px; color: #000;">
                            <strong>Payments</strong> 
                            <button title="Add" type="submit" name="btnAdd" class="btn btn-info btn-lg pull-right" ><span class="glyphicon glyphicon-plus"></button>
                                <a href="TVAdminPaymentRestore.php" class="btn btn-info" role="button">Restore Deleted Payments</a>
                                <!--<a href="TVAdminReservationPDF.php" class="btn btn-info" role="button">Print</a>-->
                                <input type="text" id="txtbxSearch" onkeyup="SearchBar()" placeholder="Search" style="height:30px;font-size:14pt; ">
                        </p>
                        <script>
                        function SearchBar() {
                        // Declare variables 
                        var input, filter, table, tr, td, i;
                        input = document.getElementById("txtbxSearch");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("reservation");
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
                            <table id="reservation" class="table table-hover" style="width:1500px">  
                                <tr>
                                   <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Payment ID</th>
                                    <th>Paid Under Reservation ID</th>
                                    <th>Proof</th>
                                    <th>Amount Paid</th>
                                    <th>Date Of Payment</th>
                                    <th>Payment Method</th>
                                    <th>Payment Type</th>
                                    <th>Paid By</th>
                                    <th>Emailed Status</th>
                                </tr> 
                                <?php  
                                while($row = mysqli_fetch_array($result))  
                                {  
                                    $paymentIDFetch = $row['payment_ID'];
                                    $payment_proof = $row['payment_proof'];
                                    $payment_reservationIDSend = $row['payment_reservationID'];
                                    if (empty($payment_proof)) {
                                        $image = "default.jpg";
                                        }

                                    $queryGettingReservationID = "SELECT * FROM tbl_reservation WHERE reservation_ID = $payment_reservationIDSend";
                                    $resultGettingReservationID = mysqli_query($connect, $queryGettingReservationID);
                                    while ($res = mysqli_fetch_array($resultGettingReservationID))
                                    {
                                        $reservationIDFetch = $res['reservation_ID'];
                                    

                                    ?>  
                                    <tr>
                                        <td>
                                            <a title="Edit" class="btn btn-success" href="TVAdminPaymentEdit.php?id=<?php echo $row['payment_ID']; ?>"><span class="glyphicon glyphicon-pencil"></span></a> 
                                        </td>
                                        <td> 
                                            <a title="SendReceipt" class="btn btn-info" href="TVAdminPaymentReceiptMail.php?reservationid=<?php echo $reservationIDFetch; ?>&paymentid=<?php echo $row['payment_ID']; ?>" onClick="return confirm('Are you sure you want to resend email?')"><span class="glyphicon glyphicon-envelope"></span></a>
                                        </td>
                                        <td> 
                                            <a title="GenerateReceipt" class="btn btn-warning" href="TVAdminPaymentReceipt.php?reservationid=<?php echo $reservationIDFetch; ?>&paymentid=<?php echo $row['payment_ID']; ?>" onClick="return confirm('Are you sure you want to regenerate pdf?')" target="_blank"><span class="glyphicon glyphicon-file"></span></a>
                                        </td>
                                        <td> 
                                            <a title="DeletePayment" class="btn btn-danger" href="TVAdminPaymentDelete.php?id=<?php echo$row['payment_ID']; ?>" onClick="return confirm('Are you sure you want to delete?')"><span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                        <td> <?php echo $paymentIDFetch ?> </td>
                                        <td> <?php echo $row['payment_reservationID'];?> </td>
                                        <td> <?php 
                                                    if (empty($payment_proof)) {
                                                        echo '<a target="_blank" href="TVPaymentImage.php?id='.$paymentIDFetch.' "><img src="default.jpg" width="250" /></a>';
                                                    }
                                                    else{
                                                    echo '<a target="_blank" href="TVPaymentImage.php?id='.$paymentIDFetch.' "><img src="data:image/jpeg;base64,'.base64_encode($payment_proof).'" width="250" /></a>'; } ?> </td>
                                        <td> <?php echo $row['payment_amount'];?> </td>
                                        <td> <?php echo $row['payment_date'];?> </td>
                                        <td> <?php echo $row['payment_method'];?> </td>
                                        <td> <?php echo $row['payment_type'];?> </td>
                                        <td> <?php echo $row['payment_name'];?> </td>
                                        <td> <?php echo $row['payment_emailStatus'];?> </td>
                                    </tr>  
                           <?php
                                }
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
