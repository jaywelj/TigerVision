        <?php
//including the database connection file
include("TVConnectionString.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
//$queryDelete ="DELETE FROM tbl_createnewpackage WHERE np_ID=$id";
$queryDelete ="DELETE FROM `tbl_payments` WHERE `tbl_payments`.`payment_ID` = '$id'";
if(mysqli_query($connect, $queryDelete))
{
    $message = "Payment Deleted!";
    echo "<script type='text/javascript'>alert('$message');</script>";
    //redirectig to the display page. In our case, it is index.php
    echo "<script type='text/javascript'>location.href = 'TVAdminPayments.php';</script>";
}
else
{
    $message = "Unsucessful";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

