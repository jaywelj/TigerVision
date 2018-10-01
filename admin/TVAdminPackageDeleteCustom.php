		<?php
//including the database connection file
include("TVConnectionString.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
//$queryDelete ="DELETE FROM tbl_createnewpackage WHERE np_ID=$id";
$queryDelete ="UPDATE `tbl_createnewpackage` SET `np_purgeFlag` = '0' WHERE `tbl_createnewpackage`.`np_ID` = '$id'";
if(mysqli_query($connect, $queryDelete))
{
	$message = "Package Archieved!";
	echo "<script type='text/javascript'>alert('$message');</script>";
	//redirectig to the display page. In our case, it is index.php
	echo "<script type='text/javascript'>location.href = 'TVAdminPackages.php';</script>";
}
else
{
	$message = "Unsucessful";
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

