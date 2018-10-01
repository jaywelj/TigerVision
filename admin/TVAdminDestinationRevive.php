<?php
//including the database connection file
include("TVConnectionString.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
//$query ="DELETE FROM tbl_destination WHERE destination_ID=$id";
$query ="UPDATE `tbl_destination` SET `destination_purgeFlag` = '1' WHERE `tbl_destination`.`destination_ID` = '$id'";
$result = mysqli_query($connect, $query);

//Restoreing Tour Package dependencies 
$queryRestoreTour = "UPDATE `tbl_tourpackage` SET `package_destination1` = '$id' WHERE `tbl_tourpackage`.`package_destination1` = 1 ";
$resultRestoreTour = mysqli_query($connect, $queryRestoreTour);

$queryRestoreTour2 = "UPDATE `tbl_tourpackage` SET `package_destination2` = '$id' WHERE `tbl_tourpackage`.`package_destination2` = 1 ";
$resultRestoreTour2 = mysqli_query($connect, $queryRestoreTour2);

$queryRestoreTour3 = "UPDATE `tbl_tourpackage` SET `package_destination3` = '$id' WHERE `tbl_tourpackage`.`package_destination3` = 1 ";
$resultRestoreTour3 = mysqli_query($connect, $queryRestoreTour3);

$queryRestoreTour4 = "UPDATE `tbl_tourpackage` SET `package_destination4` = '$id' WHERE `tbl_tourpackage`.`package_destination4` = 1 ";
$resultRestoreTour4 = mysqli_query($connect, $queryRestoreTour4);

$queryRestoreTour5 = "UPDATE `tbl_tourpackage` SET `package_destination4` = '$id' WHERE `tbl_tourpackage`.`package_destination5` = 1 ";
$resultRestoreTour5 = mysqli_query($connect, $queryRestoreTour5);



//Restoreing New Package Dependencies
$queryRestoreNP1 = "UPDATE `tbl_createnewpackage` SET `np_destination1` = '$id' WHERE `tbl_createnewpackage`.`np_destination1` = 1 ";
$resultRestoreNP1 = mysqli_query($connect, $queryRestoreNP1);

$queryRestoreNP2 = "UPDATE `tbl_createnewpackage` SET `np_destination2` = '$id' WHERE `tbl_createnewpackage`.`np_destination2` = 1 ";
$resultRestoreNP2 = mysqli_query($connect, $queryRestoreNP2);

$queryRestoreNP3 = "UPDATE `tbl_createnewpackage` SET `np_destination3` = '$id' WHERE `tbl_createnewpackage`.`np_destination3` = 1 ";
$resultRestoreNP3 = mysqli_query($connect, $queryRestoreNP3);

$queryRestoreNP4 = "UPDATE `tbl_createnewpackage` SET `np_destination4` = '$id' WHERE `tbl_createnewpackage`.`np_destination4` = 1 ";
$resultRestoreNP4 = mysqli_query($connect, $queryRestoreNP4);

$queryRestoreNP5 = "UPDATE `tbl_createnewpackage` SET `np_destination5` = '$id' WHERE `tbl_createnewpackage`.`np_destination5` = 1 ";
$resultRestoreNP5 = mysqli_query($connect, $queryRestoreNP5);
//redirecting to the display page (index.php in our case)
header("Location:TVAdminDestinations.php");
?>

