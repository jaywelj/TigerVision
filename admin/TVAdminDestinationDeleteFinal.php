<?php
//including the database connection file
include("TVConnectionString.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$query ="DELETE FROM tbl_destination WHERE destination_ID=$id";
//$query ="UPDATE `tbl_destination` SET `destination_purgeFlag` = '0' WHERE `tbl_destination`.`destination_ID` = '$id'";
$result = mysqli_query($connect, $query);
$message = "Destination Deleted Successfully!";
	echo "<script type='text/javascript'>alert('$message');</script>";
	//redirectig to the display page. In our case, it is index.php
	echo "<script type='text/javascript'>location.href = 'TVAdminPackages.php';</script>";
//redirecting to the display page (index.php in our case)
header("Location:TVAdminDestinations.php");
?>

