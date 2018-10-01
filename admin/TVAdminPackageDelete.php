		<?php
//including the database connection file
include("TVConnectionString.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$queryDelete ="DELETE FROM tbl_tourpackage WHERE package_ID=$id";
if(mysqli_query($connect, $queryDelete))
{
	//redirectig to the display page. In our case, it is index.php
	echo "<script type='text/javascript'>location.href = 'TVAdminPackages.php';</script>";
}
else
{
	$message = "Unsucessful";
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

