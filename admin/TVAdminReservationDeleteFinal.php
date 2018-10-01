<?php
//including the database connection file
include("TVConnectionString.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$query ="DELETE FROM `tbl_reservation` WHERE `tbl_reservation`.`reservation_ID` = $id";
//$query ="UPDATE `tbl_reservation` SET `reservation_purgeFlag` = '0' WHERE `tbl_reservation`.`reservation_ID` = '$id'";
$result = mysqli_query($connect, $query);
 $message = "Reservation Deleted Successfully";
echo "<script type='text/javascript'>alert('$message');</script>";
//redirecting to the display page (index.php in our case)
header("Location:TVAdminReservationRestore.php");
?>

