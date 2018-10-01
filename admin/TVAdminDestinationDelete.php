<?php
//including the database connection file
include("TVConnectionString.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
//$query ="DELETE FROM tbl_destination WHERE destination_ID=$id";
$query ="UPDATE `tbl_destination` SET `destination_purgeFlag` = '0' WHERE `tbl_destination`.`destination_ID` = '$id'";
$result = mysqli_query($connect, $query);

//Clearing Tour Package dependencies 
$queryClearTour = "UPDATE `tbl_tourpackage` SET `package_destination1` = 1 WHERE `tbl_tourpackage`.`package_destination1` = '$id' ";
$resultClearTour = mysqli_query($connect, $queryClearTour);

$queryClearTour2 = "UPDATE `tbl_tourpackage` SET `package_destination2` = 1 WHERE `tbl_tourpackage`.`package_destination2` = '$id' ";
$resultClearTour2 = mysqli_query($connect, $queryClearTour2);

$queryClearTour3 = "UPDATE `tbl_tourpackage` SET `package_destination3` = 1 WHERE `tbl_tourpackage`.`package_destination3` = '$id' ";
$resultClearTour3 = mysqli_query($connect, $queryClearTour3);

$queryClearTourTour4 = "UPDATE `tbl_tourpackage` SET `package_destination4` = 1 WHERE `tbl_tourpackage`.`package_destination4` = '$id' ";
$resultClearTour4 = mysqli_query($connect, $queryClearTour4);

$queryClearTour5 = "UPDATE `tbl_tourpackage` SET `package_destination4` = 1 WHERE `tbl_tourpackage`.`package_destination5` = '$id' ";
$resultClearTour5 = mysqli_query($connect, $queryClearTour5);



//Clearing New Package Dependencies
$queryClearNP1 = "UPDATE `tbl_createnewpackage` SET `np_destination1` = 1 WHERE `tbl_createnewpackage`.`np_destination1` = '$id' ";
$resultClearNP1 = mysqli_query($connect, $queryClearNP1);

$queryClearNP2 = "UPDATE `tbl_createnewpackage` SET `np_destination2` = 1 WHERE `tbl_createnewpackage`.`np_destination2` = '$id' ";
$resultClearNP2 = mysqli_query($connect, $queryClearNP2);

$queryClearNP3 = "UPDATE `tbl_createnewpackage` SET `np_destination3` = '1' WHERE `tbl_createnewpackage`.`np_destination3` = '$id' ";
$resultClearNP3 = mysqli_query($connect, $queryClearNP3);

$queryClearNP4 = "UPDATE `tbl_createnewpackage` SET `np_destination4` = '1' WHERE `tbl_createnewpackage`.`np_destination4` = '$id' ";
$resultClearNP4 = mysqli_query($connect, $queryClearNP4);

$queryClearNP5 = "UPDATE `tbl_createnewpackage` SET `np_destination5` = '1' WHERE `tbl_createnewpackage`.`np_destination5` = '$id' ";
$resultClearNP5 = mysqli_query($connect, $queryClearNP5);
		
//redirecting to the display page (index.php in our case)
header("Location:TVAdminDestinations.php");
?>

