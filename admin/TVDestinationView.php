<?php
//including the database connection file
include_once("TVDODatabaseConnection.php");
include("TVDOEdit.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM tbl_destination ORDER BY destination_ID DESC"); // using mysqli_query instead
?>
<div class="container" style="width:100%">
  <h2>Destinations</h2>
  <div class="table-responsive" >       
  <table class="table table-hover">
    <thead>
      <tr>
        <th></th>
        <th>Destination Name</th>
        <th>Address</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Description</th>
        <th>Image</th>
        <th>Price Minimum</th>
        <th>Price Maximum</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
          while($res = mysqli_fetch_array($result)) { 

            echo "<tr>";   
            echo "<td>".$res['destination_ID']."</td>";
            echo "<td>".$res['destination_name']."</td>";
            echo "<td>".$res['destination_address']."</td>";
            echo "<td>".$res['destination_email']."</td>";  
            echo "<td>".$res['destination_contacts']."</td>";
            echo "<td>".$res['destination_link']."</td>";
            echo "<td>".$res['destination_description']."</td>";
            echo "<td><a href='DestinationImages/".$res['destination_image']."'>DestinationImages/".$res['destination_image']."</td>";
            echo "<td>".$res['destination_pricemin']."</td>";
            echo "<td>".$res['destination_pricemax']."</td>";   
            echo "<td>
                      <li><a href=# data-toggle=modal data-target=#modalEdit>edit</a></li>
                      <li><a href=# data-toggle=modal data-target=#modalEdit>delete</a></li>
                </td>";
            
          }
          ?>
      
    </tbody>
  </table>
</div>
</div>