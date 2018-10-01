<?php  
session_start();
$_accessLevel = $_SESSION['adminAccessLevel'];
if ($_accessLevel=='Admin'){
} else if ($_accessLevel=='Staff') {
    echo'<script> document.getElementById("userdiv").style.display ="none"; </script>';
} else {
    header("Location: TVAdminLogout.php");
}
 //$connect = mysqli_connect("localhost", "root", "", "testing");  
 include("TVConnectionString.php"); 
 $query = "SELECT reservation_packageType, count(*) as number FROM tbl_reservation WHERE reservation_purgeFlag = 1 GROUP BY reservation_packageType";

 $query2 = "SELECT np_destination1, count(*) as number FROM tbl_createnewpackage GROUP BY np_destination1";
 $query3 = "SELECT * FROM tbl_reservation";
 $query3two = "SELECT * FROM tbl_reservation WHERE reservation_purgeFlag = 1 ORDER BY reservation_plannedDate ASC";
 $query4 = "SELECT COUNT(*) as number FROM tbl_reservation WHERE reservation_purgeFlag = 1";
 $query5 = "SELECT COUNT(*) as number FROM tbl_tourpackage WHERE package_purgeFlag = 1";
 $query6 = "SELECT COUNT(*) as number FROM tbl_createnewpackage WHERE np_purgeFlag = 1";
 $query7 = "SELECT `reservation_status` , count(*) as number FROM tbl_reservation WHERE reservation_purgeFlag = 1 GROUP BY reservation_status";
 $query8 = "SELECT `package_destination1`, count(*) as number FROM tbl_tourpackage GROUP BY `package_destination1`";
 $query9 = "SELECT reservation_debt, count(*) as number FROM tbl_reservation GROUP BY reservation_debt";
 $query9two = "SELECT `payment_method`, count(*) as number FROM tbl_payments GROUP BY `payment_method` ";
 $query10 = "SELECT COUNT(*) as number FROM tbl_reservation WHERE reservation_purgeFlag = 0";
 $query11 = "SELECT COUNT(*) as number FROM tbl_tourpackage WHERE package_purgeFlag = 0";
 $query12 = "SELECT COUNT(*) as number FROM tbl_createnewpackage WHERE np_purgeFlag = 0";
 $query13 = "SELECT COUNT(*) as number FROM tbl_payments WHERE payment_purgeFlag = 1";
 $query14 = "SELECT COUNT(*) as number FROM tbl_payments WHERE payment_purgeFlag = 0";

 $result = mysqli_query($connect, $query); 
 $result2 = mysqli_query($connect, $query2);
 $result3 = mysqli_query($connect, $query3);
 $result3two = mysqli_query($connect, $query3two);
 $result4 = mysqli_query($connect, $query4);     
 $result5 = mysqli_query($connect, $query5);
 $result6 = mysqli_query($connect, $query6);
 $result7 = mysqli_query($connect, $query7);
 $result8 = mysqli_query($connect, $query8);   
 $result9 = mysqli_query($connect, $query9);
 $result9two = mysqli_query($connect, $query9two);                          
 $result10 = mysqli_query($connect, $query10);
 $result11 = mysqli_query($connect, $query11);
 $result12 = mysqli_query($connect, $query12);
 $result13 = mysqli_query($connect, $query13);
 $result14 = mysqli_query($connect, $query14);                           
      ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Dashboard</title>
        <link rel="shortcut icon" href = "images/tigerVisionIcon.ico">
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="admincss/TVAdminSideBar.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <link href="css/TVDestinationsOffered.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                     <img src="Images/headerLogo.png">  
                </div>

                <ul class="list-unstyled components">
                    <p></p>
                    <li class="active">
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
                <style type='text/css'>
                  .bold-green-font {
                    font-weight: bold;
                    color: green;
                  }

                  .bold-font {
                    font-weight: bold;
                  }

                  .right-text {
                    text-align: right;
                 }

                  .large-font {
                    font-size: 15px;
                  }

                  .italic-darkblue-font {
                    font-style: italic;
                    color: darkblue;
                  }

                  .italic-purple-font {
                    font-style: italic;
                    color: purple;
                  }

                  .underline-blue-font {
                    text-decoration: underline;
                    color: blue;
                  }
                
                  .gold-border {
                    border: 3px solid gold;
                  }

                  .deeppink-border {
                    border: 3px solid deeppink;
                  }

                  .orange-background {
                    background-color: orange;
                  }

                  .orchid-background {
                    background-color: orchid;
                  }

                  .beige-background {
                   background-color: beige;
                  }

                </style>
 
                <div style="padding:40px;">
                    <form method="post" action="TVAdminDestinationAdd.php"> 
                        <p style="font-size: 35px; color: #000;">
                            <strong>Dashboard</strong> 
                        </p>
                        <script type="text/javascript" src="js/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Package Type', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["reservation_packageType"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      //title: 'Percentage of Package Type, Reserved',  
                      //is3D:true,
                      width: 300,
                      height: 260,  
                      pieHole: 0.2,
                      backgroundColor: { fill:'transparent' }
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script> 

           <script type="text/javascript" src="js/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart2);  
           function drawChart2()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Package Type', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result7))  
                          {  
                               echo "['".$row["reservation_status"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      //title: 'Percentage of Package Type, Reserved',  
                      //is3D:true,
                      width: 300,
                      height: 260,  
                      pieHole: 0.2,
                      backgroundColor: { fill:'transparent' }
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));  
                chart.draw(data, options);  
           }  
           </script>

           <script type="text/javascript" src="js/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart3);  
           function drawChart3()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['State', "Number"],  
                          <?php  
                          while($row = mysqli_fetch_array($result9two))  
                          {     
                                $payment_method = $row['payment_method'];
                                $i = 0;
                                $status = array("Active", "Archived");
                               echo "['".$row['payment_method']."', ".$row["number"]."],";
                               $i++;
                          }  
                          ?>  
                     ]);  
                var options = {  
                      //title: '0 -> Archived, 1 -> Active',  
                      //is3D:true,
                      width: 300,
                      height: 260,  
                      pieHole: 0.2,
                      backgroundColor: { fill:'transparent' }
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart3'));  
                chart.draw(data, options);  
           }  
           </script>  

<script type="text/javascript" src="js/loader.js"></script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable2);

      function drawTable2() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'reservation ID');
        data.addColumn('string', 'Month');
        data.addRows([
          <?php  
                          while($row = mysqli_fetch_array($result3))  
                          {  
                              $reservation_plannedDate = $row['reservation_plannedDate'];
                              $planneddatemonth = (string)date('m', strtotime($reservation_plannedDate));
              
                               echo "['".$row["reservation_ID"]."', '".$planneddatemonth."'],";  
                          }  
                          ?>  
        ]);
        var options = {
               showRowNumber: true,
               width: '100%', 
               height: '100%'
            };
        var table = new google.visualization.Table(document.getElementById('table_div2'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }


</script>
<script type="text/javascript" src="js/loader.js"></script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Destination ID');
        data.addColumn('number', 'Selected How Many Times');
        data.addRows([
          <?php  
                          while($row = mysqli_fetch_array($result2))  
                          {  

                            
              
                               echo "['".$row["np_destination1"]."', ".$row["number"]."],";  
                          }  
                          ?>  
        ]);
        var options = {
               showRowNumber: true,
               width: '100%', 
               height: '100%'
            };
        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
</script>
<script type="text/javascript" src="js/loader.js"></script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable3);

      function drawTable3() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Destination ID');
        data.addColumn('number', 'Selected How Many Times');
        data.addRows([
          <?php  
                          while($row = mysqli_fetch_array($result8))  
                          {  

                            
              
                               echo "['".$row["package_destination1"]."', ".$row["number"]."],";  
                          }  
                          ?>  
        ]);
        var options = {
               showRowNumber: true,
               width: '100%', 
               height: '100%'
            };
        var table = new google.visualization.Table(document.getElementById('table_div3'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
</script>


        
    <div class="row">    
        
        <div class="col-sm-4">
             <div style="width:350px;" style="padding:70px;">
                <!--<h3 align="center">Make Simple Pie Chart by Google Chart API with PHP Mysql</h3> 
                <br />-->
                <h2 align="center">Ratio of Reserved Package Types</h2>  
                <div id="piechart" style="width: 180px; height: 300px;"></div>
                  
           </div>
        </div>

           <div class="col-sm-4">
             <div style="width:350px;" style="padding:70px;">
                <!--<h3 align="center">Make Simple Pie Chart by Google Chart API with PHP Mysql</h3> 
                <br />-->
                <h2 align="center">Ratio of Reservation Status</h2>  
                <div id="piechart2" style="width: 180px; height: 300px;"></div>
                  
           </div>
          </div>

          <div class="col-sm-4">
             <div style="width:350px;" style="padding:70px;">
                <!--<h3 align="center">Make Simple Pie Chart by Google Chart API with PHP Mysql</h3> 
                <br />-->
                <h2 align="center">Ratio Of Payment Methods</h2>  
                <div id="piechart3" style="width: 180px; height: 300px;"></div>
                  
           </div>
          </div>

    </div>

    <div class="row">
        <div class="col-sm-4">
            <div style="width:300px;" style="padding:70px;">
               <h2 align="center">Famous Months Of Reservation</h2>
                <div id="table_div2" style="width: 300px; height: 300px;"></div>
           </div>
         </div>
    
        
           <div class="col-sm-4">
            <div style="width:300px;" style="padding:70px;">
               <h2 align="center">Top Destinations in Custom Packages</h2>
                <div id="table_div" style="width: 300px; height: 300px;"></div>
           </div>
         </div>

         <div class="col-sm-4">
            <div style="width:300px;" style="padding:70px;">
               <h2 align="center">Top Destinations in Tour Packages</h2>
                <div id="table_div3" style="width: 300px; height: 300px;"></div>
           </div>
         </div>
         </div>

         <div class="row">
         <div class="col-sm-6">
            <div style="width:300px; height:300px; border-radius:150px;" style="padding:70px;">
               <h2 align="center">Number Of Reservations</h2>
                <a href="TVAdminReservations.php" class="btn button1">
                <?php 
                while($row = mysqli_fetch_array($result4))  
                          {  
        echo "<h2>".$row[0]."</h2>";
      }
        ?>
      </a>
      <h2 align="center">Number Of Tour Packages</h2>
                <a href="TVAdminPackages.php" class="btn button1">
                <?php 
                while($row = mysqli_fetch_array($result5))  
                          {  
        echo "<h2>".$row[0]."</h2>";
      }
        ?>
      </a>
      <h2 align="center">Number Of Custom Packages</h2>
                <a href="TVAdminPackages.php" class="btn button1">
                <?php 
                while($row = mysqli_fetch_array($result6))  
                          {  
        echo "<h2>".$row[0]."</h2>";
      }
        ?>
      </a>
      <h2 align="center">Number Of Payments</h2>
                <a href="TVAdminPayments.php" class="btn button1">
                <?php 
                while($row = mysqli_fetch_array($result13))  
                          {  
        echo "<h2>".$row[0]."</h2>";
      }
        ?>
      </a>  
           </div>
         </div>

         <div class="col-sm-6">
            <div style="width:300px;" style="padding:70px;">
               <h2 align="center">Number Of Deleted Reservations</h2>
                <a href="TVAdminReservationRestore.php" class="btn button1">
                <?php 
                while($row = mysqli_fetch_array($result10))  
                          {  
        echo "<h2>".$row[0]."</h2>";
      }
        ?>
      </a>
      <h2 align="center">Number Of Deleted Tour Packages</h2>
                <a href="TVAdminPackageRestore.php" class="btn button1">
                <?php 
                while($row = mysqli_fetch_array($result11))  
                          {  
        echo "<h2>".$row[0]."</h2>";
      }
        ?>
      </a>
      <h2 align="center">Number Of Deleted Custom Packages</h2>
                <a href="TVAdminPackageRestore.php" class="btn button1">
                <?php 
                while($row = mysqli_fetch_array($result12))  
                          {  
        echo "<h2>".$row[0]."</h2>";
      }
        ?>
      </a>  
      <h2 align="center">Number Of Deleted Payments</h2>
                <a href="TVAdminPaymentRestore.php" class="btn button1">
                <?php 
                while($row = mysqli_fetch_array($result14))  
                          {  
        echo "<h2>".$row[0]."</h2>";
      }
        ?>
      </a> 
           </div>
         </div>

        </div>

        <div class="row">
         <div class="col-sm-12">
            <div style="width:100%;" style="padding:70px;">
               <h2 align="center">Dates of Reservations</h2>
               <input type="text" id="txtbxSearch" onkeyup="SearchBar()" placeholder="Search" style="height:30px;font-size:14pt;" class="pull-right">
                        
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
                <table id="reservation" style="width:100%">
                  <tr>
                  <th>Reservation ID</th>
                  <th>Name</th> 
                  <th>Date Applied</th>
                  <th>Date Planned</th>
                  </tr>
                <?php
                while($res = mysqli_fetch_array($result3two))  
                          {  
                              $reservation_ID = $res['reservation_ID'];
    $reservation_firstName = $res['reservation_firstName'];
    $reservation_lastName = $res['reservation_lastName'];
    $reservation_dateApplied = $res['reservation_dateApplied'];
    $reservation_plannedDate = $res['reservation_plannedDate'];
  
    $dateappliedyear = date('Y', strtotime($reservation_dateApplied));
    $dateappliedday = date('d', strtotime($reservation_dateApplied));
    $dateappliedmonth = date('m', strtotime($reservation_dateApplied));
    $planneddateyear = date('Y', strtotime($reservation_plannedDate));
    $planneddateday = date('d', strtotime($reservation_plannedDate));
    $planneddatemonth = date('m', strtotime($reservation_plannedDate));
                echo"<tr>
                <td>".$reservation_ID."</td>
                <td>".$reservation_firstName." ".$reservation_lastName."</td>
                <td>".$dateappliedyear." ".$dateappliedmonth." ".$dateappliedday."</td>
                <td>".$planneddateyear." ".$planneddatemonth." ".$planneddateday."</td>
                </tr>";
              }

                ?>
                </table>
           </div>
         </div>
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
   <!-- while($res = mysqli_fetch_array($result3))  
  {

    $reservation_ID = $res['reservation_ID'];
    $reservation_firstName = $res['reservation_firstName'];
    $reservation_lastName = $res['reservation_lastName'];
    $reservation_contactNum = $res['reservation_contactNum'];
    $reservation_emailAdd = $res['reservation_emailAdd'];
    $reservation_address = $res['reservation_address'];
    $reservation_dateApplied = $res['reservation_dateApplied'];
    $reservation_plannedDate = $res['reservation_plannedDate'];
    $reservation_packageID = $res['reservation_packageID'];
    $reservation_packageType = $res['reservation_packageType'];
    $reservation_status = $res['reservation_status'];
    $reservation_totalHead = $res['reservation_totalHead'];
    $reservation_totalPrice = $res['reservation_totalPrice'];
    $reservation_pricePerHead = $res['reservation_pricePerHead'];
    $reservation_paid = $res['reservation_paid'];
    $reservation_debt = $res['reservation_debt'];
  
    $dateappliedyear = date('Y', strtotime($reservation_dateApplied));
    $dateappliedday = date('d', strtotime($reservation_dateApplied));
    $dateappliedmonth = date('m', strtotime($reservation_dateApplied));
    $planneddateyear = date('Y', strtotime($reservation_plannedDate));
    $planneddateday = date('d', strtotime($reservation_plannedDate));
    $planneddatemonth = date('m', strtotime($reservation_plannedDate));
  


    echo " ['".$reservation_ID."".$reservation_firstName."', new Date(".$dateappliedyear.",".$dateappliedmonth.",".$dateappliedday."), new Date(".$planneddateyear.",".$planneddatemonth.",".$planneddateday.")], ";
  }-->
</html>
