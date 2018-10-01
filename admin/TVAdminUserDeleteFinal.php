<?php
//including the database connection file
include("TVConnectionString.php");

//getting id of the data from url
$userID = $_GET['id'];

//deleting the row from table
$query ="DELETE FROM `tbl_adminlogin` WHERE `tbl_adminlogin`.`admin_adminName` = '$userID'";
$result = mysqli_query($connect, $query);
$message = "User Deactivated Successfully!";
	echo "<script type='text/javascript'>alert('$message');</script>";
	//redirectig to the display page. In our case, it is index.php
	echo "<script type='text/javascript'>location.href = 'TVAdminPackages.php';</script>";
//redirecting to the display page (index.php in our case)
header("Location:TVAdminUserDelete.php");
?>

