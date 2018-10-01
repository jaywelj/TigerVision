<?php
session_start();
$_accessLevel = $_SESSION['adminAccessLevel'];
if ($_accessLevel=='Admin'){
} else if ($_accessLevel=='Staff') {
    echo'<script> document.getElementById("userdiv").style.display ="none"; </script>';
} else {
    header("Location: TVAdminLogout.php");
}
    // incwluding the database connection file=\]
    include_once("TVConnectionString.php");
    $paymentID = $_GET['id'];

    //selecting data associated with this particular id
    $result = mysqli_query($connect, "SELECT * FROM tbl_payments WHERE payment_ID = $paymentID");

    while($res = mysqli_fetch_array($result))
    {
        $payment_ID = $res['payment_ID'];
        $payment_name = $res['payment_name'];
        $payment_proof = $res['payment_proof'];
        $payment_amount = $res['payment_amount'];
        $payment_date = $res['payment_date'];
        $payment_method = $res['payment_method'];
        $payment_type = $res['payment_type'];
        $payment_reservationID = $res['payment_reservationID'];
        $payment_processed = $res['payment_processed'];
    }

    $queryReservation = "SELECT * FROM `tbl_reservation` WHERE reservation_purgeFlag = 1";

    // for method 1/

    $resultReservation = mysqli_query($connect, $queryReservation);
    $queryReservationEqualID = "SELECT * FROM `tbl_reservation` WHERE reservation_ID = $payment_reservationID";

    // for method 1/

    $resultReservationEqualID = mysqli_query($connect, $queryReservationEqualID);


    // for method 1/
    if(isset($_POST['btnUpdate']))
    {   

                    $TempDatePaidYear = mysqli_real_escape_string($connect, $_POST['datepaid_year']);
                    $TempDatePaidDay = mysqli_real_escape_string($connect, $_POST['datepaid_day']);
                    $TempDatePaidMonth = mysqli_real_escape_string($connect, $_POST['datepaid_month']);
                    
                    $VarcharPaymentDatePaid =$TempDatePaidYear . ' ' . $TempDatePaidDay . ' ' . $TempDatePaidMonth;

                    $VarcharPaymentID = mysqli_real_escape_string($connect, $_POST['hiddenPaymentID']);
                    $VarcharPaymentName = mysqli_real_escape_string($connect, $_POST['txtbxPaymentName']);
                    
                    $VarcharPaymentPaid = mysqli_real_escape_string($connect, $_POST['txtbxPaymentAmount']);
                    $VarcharPaymentReservationID = mysqli_real_escape_string($connect, $_POST['dropdownPaymentReservationID']);
                    //$VarcharPaymentType = mysqli_real_escape_string($connect, $_POST['dropdownPaymentType']);
                    $VarcharPaymentMethod = mysqli_real_escape_string($connect, $_POST['txtbxPaymentMethod']);

                    $CurrentDate = date('Y-m-d H:i:s');
                    $DateCurrentString = strtotime($CurrentDate);
                    $DatePaidString = strtotime($VarcharPaymentDatePaid);

                    //$varcharPaymentImage = addslashes(file_get_contents($_FILES["imgPaymentImage"]["tmp_name"]));

                    $queryReservation2 = "SELECT * FROM `tbl_reservation` WHERE reservation_debt != 0 AND reservation_purgeFlag = 1 AND reservation_ID = $VarcharPaymentReservationID";
                    $resultReservation2 = mysqli_query($connect, $queryReservation2);
                    
                    while($row = mysqli_fetch_array($resultReservation2)){
                        $reservation_ID = $row['reservation_ID'];
                        $reservation_totalPrice = $row['reservation_totalPrice'];
                        $reservation_debt = $row['reservation_debt'];
                    
                    if ($VarcharPaymentPaid == $reservation_totalPrice || $VarcharPaymentPaid > $reservation_totalPrice)
                    {
                        $VarcharPaymentType = "Paid Full";
                        $message = "Paid Full!";
                    }
                    else{
                        $VarcharPaymentType = "Paid Partially";
                        $message = "Paid Partially!";
                    }
                

        // checking empty fields
        if(empty($VarcharPaymentPaid)) 
        {   
            if(empty($VarcharPaymentPaid)) 
            {
                echo "<font color='red'>Amount field is empty.</font><br/>";
            }
        }               
        else 
        {   

            $queryEdit = "UPDATE `tbl_payments` SET `payment_name` = '$VarcharPaymentName', `payment_date` = '$VarcharPaymentDatePaid', `payment_method` = '$VarcharPaymentMethod', `payment_type` = 'Paid Partially',`payment_amount` = '$VarcharPaymentPaid',`payment_reservationID` = '$VarcharPaymentReservationID', `payment_emailStatus` = 'Not Emailed' WHERE `tbl_payments`.`payment_ID` = $paymentID";

            if(mysqli_query($connect,$queryEdit))
            {
                $message = "Payment updated successfully!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                //redirectig to the display page. In our case, it is index.php
                echo "<script type='text/javascript'>location.href = 'TVAdminPayments.php';</script>";
                
                if($payment_processed == 1){
                    $queryUpdateReservationPaid = "UPDATE `tbl_reservation` SET `reservation_paid` = `reservation_paid` + $VarcharPaymentPaid WHERE `tbl_reservation`.`reservation_ID` = $VarcharPaymentReservationID";

                            $reservationnewdebt = $reservation_debt - $VarcharPaymentPaid;
                            if($reservationnewdebt < 0){
                                $VarcharReservationChange = abs($reservationnewdebt);

                                $queryUpdateReservationChange = "UPDATE `tbl_reservation` SET `reservation_change` = $VarcharReservationChange WHERE `tbl_reservation`.`reservation_ID` = $VarcharPaymentReservationID";
                                $reservation_debt = 0;
                            }

                            $queryGettingLastPaymentID = "SELECT * FROM tbl_reservation WHERE reservation_ID = $payment_reservationID$paymentReservationID";
                            $resulto = mysqli_query($connect, $queryGettingLastPaymentID);
                            if ($resu = mysqli_fetch_array($resulto))
                            {
                                $change = $resu['reservation_debt'] - $VarcharPaymentPaid;

                                if($change < 0)
                                {
                                    $change = abs($change);
                                
                                    $queryUpdateReservationChange = "UPDATE `tbl_reservation` SET `reservation_change` = $change WHERE `tbl_reservation`.`reservation_ID` = $VarcharPaymentReservationID";
                                    mysqli_query($connect, $queryUpdateReservationChange);
                                   
                                    $VarcharPaymentPaid = $resu['reservation_debt'];
                                }

                            }
                            $queryUpdateReservationDebt = "UPDATE `tbl_reservation` SET `reservation_debt` = `reservation_debt` - $VarcharPaymentPaid WHERE `tbl_reservation`.`reservation_ID` = $VarcharPaymentReservationID";
                            if(mysqli_query($connect, $queryUpdateReservationPaid))
                            {
                                if(mysqli_query($connect, $queryUpdateReservationDebt))
                                {
                            $queryGettingReservation = "SELECT * FROM tbl_reservation WHERE reservation_ID = $VarcharPaymentReservationID";

                            $resultGettingReservation = mysqli_query($connect, $queryGettingReservation);

                            while($res = mysqli_fetch_array($resultGettingReservation))
                            {   
                                $reservation_ID = $res['reservation_ID'];
                                $reservation_firstName = $res['reservation_firstName'];
                                $reservation_lastName = $res['reservation_lastName'];
                                $reservation_type = $res['reservation_type'];
                                $reservation_schoolName = $res['reservation_schoolName'];
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
                            }
                            
                            if($reservation_debt<$reservation_paid || $reservation_debt == $reservation_paid)
                                    {
                                $queryUpdateStatusAccepted = "UPDATE `tbl_reservation` SET `reservation_status` = 'Accepted' WHERE `tbl_reservation`.`reservation_ID` = $VarcharPaymentReservationID";
                                $result = mysqli_query($connect, $queryUpdateStatusAccepted);

                                $queryUpdateProcessed = "UPDATE `tbl_payments` SET `payment_processed` = 0";
                                $result = mysqli_query($connect, $queryUpdateProcessed);
                                    }
                            elseif($reservation_totalPrice == $reservation_paid)
                            {
                                $queryUpdateStatusFullyPaid = "UPDATE `tbl_reservation` SET `reservation_status` = 'Fully Paid' WHERE `tbl_reservation`.`reservation_ID` = $VarcharPaymentReservationID";
                                $result2 = mysqli_query($connect, $queryUpdateStatusFullyPaid);
                                     }
                            $varcharReservationID = $reservation_ID;
$varcharPaymentIDG = $paymentID;
//$varcharPaymentMethod = "Bank";
//$varcharPaymentType = "Paid Full";
$reservationQuery="SELECT * FROM tbl_reservation WHERE reservation_ID = $varcharReservationID";
$paymentQuery="SELECT * FROM tbl_payments WHERE payment_ID = $varcharPaymentIDG";
$reservationArray=mysqli_query($connect,$reservationQuery);
$paymentArray=mysqli_query($connect,$paymentQuery);
while($res=mysqli_fetch_array($reservationArray))
{
    $varcharReservationFirstName = $res['reservation_firstName'];
    $varcharReservationLastName = $res['reservation_lastName'];
    $varcharReservationType = $res['reservation_type'];
    $varcharReservationSchoolName = $res['reservation_schoolName'];
    $varcharReservationContactNum = $res['reservation_contactNum'];
    $varcharReservationEmailAdd = $res['reservation_emailAdd'];
    $varcharReservationAddress = $res['reservation_address'];
    $varcharReservationDateApplied = $res['reservation_dateApplied'];
    $varcharReservationPlannedDate = $res['reservation_plannedDate'];
    $varcharReservationPackageID = $res['reservation_packageID'];
    $varcharReservationPackageType = $res['reservation_packageType'];
    $varcharReservationStatus = $res['reservation_status'];
    $varcharReservationTotalHead = $res['reservation_totalHead'];
    $varcharReservationTotalPrice = $res['reservation_totalPrice'];
    $varcharPartialPrice = $varcharReservationTotalPrice/2;
    $varcharReservationPricePerHead = $res['reservation_pricePerHead'];
    $varcharReservationPaid = $res['reservation_paid'];
    $varcharReservationDebt = $res['reservation_debt'];
    $varcharPaymentChange = $res['reservation_change'];
}
while($res2=mysqli_fetch_array($paymentArray))
{
    $varcharPaymentID = $res2['payment_ID'];
    $varcharPaymentName = $res2['payment_name'];
    $varcharPaymentAmount = $res2['payment_amount'];
    $varcharPaymentDate = $res2['payment_date'];
    $varcharPaymentMethod = $res2['payment_method'];
    $varcharPaymentType = $res2['payment_type'];
    $varcharPaymentReservationID = $res2['payment_reservationID'];
    $varcharPaymentProcessed = $res2['payment_processed'];
    $varcharPaymentEmailStatus = $res2['payment_emailStatus'];
}
$varcharReservationDebt = $varcharReservationDebt + $varcharPaymentAmount - $varcharPaymentChange;
$varcharPaymentLeft = $varcharReservationDebt +  $varcharPaymentChange - $varcharPaymentAmount;
include('fpdf17/fpdf.php');
$voucher = new FPDF('p','mm','A4');
$voucher->AddPage();
$voucher->SetFont('Arial','B','24');

$voucher->Cell(130  ,10 ,"TigerVision Travel and Tours Co.",0,0);
$voucher->Cell(59   ,10 ,"",0,1);
$voucher->Image("Images/LogoTigerVision.png"    ,169    ,10 ,30 ,30);


$voucher->Cell(189  ,5  ,"",0,1);

$voucher->SetFont('Arial','','12');
$voucher->Cell(130  ,5  ,"G/F One Victoria Plaza, A. Mabini Street,",0,0);
$voucher->Cell(59   ,5  ,"",0,1);

$voucher->SetFont('Arial','','12');
$voucher->Cell(130  ,5  ,"Kapasigan, Pasig City, Philippines, 1800",0,0);
$voucher->Cell(30   ,5  ,"",0,0);
$voucher->Cell(29   ,5  ,"",0,1);

$voucher->SetFont('Arial','','12');
$voucher->Cell(130  ,5  ,"Phone +63 26334493",0,0);
$voucher->Cell(30   ,5  ,"",0,0);
$voucher->Cell(29   ,5  ,"",0,1);

$voucher->Line(10   ,45 ,199    ,45);

$voucher->SetFont('Arial','B','12');
$voucher->Cell(189  ,10 ,"",0,1);
$voucher->Cell(95   ,5  ,"Paid By",0,0);
$voucher->Cell(94   ,5  ,"",0,1);

$voucher->SetFont('Arial','','12');
$voucher->Cell(15   ,5  ,"",0,0);
$voucher->Cell(40   ,5  ,"$varcharPaymentName",0,0);
$voucher->Cell(134  ,5  ,"",0,1);

$voucher->Cell(15   ,5  ,"",0,0);
$voucher->Cell(40   ,5  ,"OR#$varcharPaymentID",0,0);
$voucher->Cell(134  ,5  ,"",0,1);
$voucher->Cell(15   ,5  ,"",0,0);
$voucher->Cell(40   ,5  ,"$varcharPaymentDate",0,0);
$voucher->Cell(134  ,5  ,"",0,1);
$voucher->Cell(15   ,5  ,"",0,0);
$voucher->Cell(40   ,5  ,"Under: $varcharReservationFirstName $varcharReservationLastName",0,0);
$voucher->Cell(134  ,5  ,"",0,1);

$voucher->SetFont('Arial','B','12');
$voucher->Cell(189  ,10 ,"",0,1);
$voucher->Cell(95   ,5  ,"Reservation Description",0,0);
$voucher->Cell(94   ,5  ,"Package Description",0,1);

$voucher->SetFont('Arial','','12');
$voucher->SetFont('Arial','','12');
$voucher->Cell(15   ,5  ,"",0,0);
$voucher->Cell(40   ,5  ,"Reservation ID",0,0);
$voucher->Cell(40   ,5  ,"$varcharReservationID",0,0);
$voucher->Cell(15   ,5  ,"",0,0);
$voucher->Cell(39   ,5  ,"Package ID",0,0);
$voucher->Cell(40   ,5  ,"$varcharReservationPackageID",0,1);

if($varcharReservationPackageType   == "tour package")
{
    $packageQuery="SELECT * FROM tbl_reservation INNER JOIN tbl_tourpackage ON tbl_reservation.reservation_packageID=tbl_tourpackage.package_ID WHERE tbl_reservation.reservation_packageID = $varcharReservationPackageID and tbl_reservation.reservation_ID = $varcharReservationID";
    $packageArray=mysqli_query($connect, $packageQuery);
    while($res1=mysqli_fetch_array($packageArray))
    {
        $varcharPackageName=$res1['package_name'];
        $varcharPackageDestination1=$res1['package_destination1'];
        $varcharPackageDestination2=$res1['package_destination2'];
        $varcharPackageDestination3=$res1['package_destination3'];
        $varcharPackageDestination4=$res1['package_destination4'];
        $varcharPackageDestination5=$res1['package_destination5'];
    }
}
else
{
    $packageQuery="SELECT * FROM tbl_reservation INNER JOIN tbl_createnewpackage ON tbl_reservation.reservation_packageID=tbl_createnewpackage.np_ID WHERE tbl_reservation.reservation_packageID = $varcharReservationPackageID and tbl_reservation.reservation_ID = $varcharReservationID";
    $packageArray=mysqli_query($connect, $packageQuery);
    while($res1=mysqli_fetch_array($packageArray))
    {
        $varcharPackageName=$res1['np_name'];
        $varcharPackageDestination1=$res1['np_destination1'];
        $varcharPackageDestination2=$res1['np_destination2'];
        $varcharPackageDestination3=$res1['np_destination3'];
        $varcharPackageDestination4=$res1['np_destination4'];
        $varcharPackageDestination5=$res1['np_destination5'];
    }
}
if(!empty($varcharPackageDestination1))
{
    $destinationQuery="SELECT * FROM tbl_destination WHERE destination_ID=$varcharPackageDestination1";
    $destinationArray=mysqli_query($connect, $destinationQuery);
    while($res1=mysqli_fetch_array($destinationArray))
    {
        $varcharDestinationName1=$res1['destination_name'];
    }
}
if(!empty($varcharPackageDestination2))
{
    $destinationQuery="SELECT * FROM tbl_destination WHERE destination_ID=$varcharPackageDestination2";
    $destinationArray=mysqli_query($connect, $destinationQuery);
    while($res1=mysqli_fetch_array($destinationArray))
    {
        $varcharDestinationName2=$res1['destination_name'];
    }
}
if(!empty($varcharPackageDestination3))
{
    $destinationQuery="SELECT * FROM tbl_destination WHERE destination_ID=$varcharPackageDestination3";
    $destinationArray=mysqli_query($connect, $destinationQuery);
    while($res1=mysqli_fetch_array($destinationArray))
    {
        $varcharDestinationName3=$res1['destination_name'];
    }
}
if(!empty($varcharPackageDestination4))
{
    $destinationQuery="SELECT * FROM tbl_destination WHERE destination_ID=$varcharPackageDestination4";
    $destinationArray=mysqli_query($connect, $destinationQuery);
    while($res1=mysqli_fetch_array($destinationArray))
{
    $varcharDestinationName4=$res1['destination_name'];
}
}
if(!empty($varcharPackageDestination5))
{
    $destinationQuery="SELECT * FROM tbl_destination WHERE destination_ID=$varcharPackageDestination5";
    $destinationArray=mysqli_query($connect, $destinationQuery);
    while($res1=mysqli_fetch_array($destinationArray))
    {
        $varcharDestinationName5=$res1['destination_name'];
    }
}
$voucher->Cell(15   ,5  ,"",0,0);
$voucher->Cell(40   ,5  ,"Type",0,0);
$voucher->Cell(40   ,5  ,"$varcharReservationType",0,0);
$voucher->Cell(15   ,5  ,"",0,0);
$voucher->Cell(39   ,5  ,"Package Name",0,0);
$voucher->SetFont('Arial','','8');
$voucher->Cell(40   ,5  ,"$varcharPackageName",0,1);
$voucher->Cell(15   ,5  ,"",0,0);
$voucher->SetFont('Arial','','12');
$voucher->Cell(40   ,5  ,"Date Applied",0,0);
$voucher->Cell(40   ,5  ,"$varcharReservationDateApplied",0,0);
$voucher->Cell(15   ,5  ,"",0,0);
$voucher->Cell(39   ,5  ,"Package Type",0,0);
$voucher->Cell(40   ,5  ,"$varcharReservationPackageType",0,1);
$voucher->Cell(15   ,5  ,"",0,0);
$voucher->Cell(40   ,5  ,"Date Planned",0,0);
$voucher->Cell(40   ,5  ,"$varcharReservationPlannedDate",0,0);
$voucher->Cell(15   ,5  ,"",0,0);
$voucher->Cell(79   ,5  ,"",0,1);
$voucher->Cell(15   ,5  ,"",0,0);
$voucher->Cell(40   ,5  ,"Status",0,0);
$voucher->Cell(40   ,5  ,"$varcharReservationStatus",0,0);
$voucher->Cell(15   ,5  ,"",0,0);
$voucher->Cell(79   ,5  ,"",0,1);

$voucher->SetFont('Arial','B','12');
$voucher->Cell(189  ,10 ,"",0,1);

$voucher->Cell(189  ,5  ,"Destinations",0,1);

$voucher->SetFont('Arial','','12');

$packageQuery="SELECT tbl_toupackage.package_name FROM tbl_reservation  INNER JOIN tbl_packages ON tbl_reservation.reservation_packageID=tbl_tourpackage.package_ID WHERE tbl_reservation.reservation_ID = $varcharReservationID";
$packageArray=mysqli_query($connect, $packageQuery);

$voucher->SetFont('Arial','','12');
if(!empty($varcharPackageDestination1))
{
    $voucher->Cell(15   ,5  ,"",0,0);
    $voucher->Cell(39   ,5  ,"Destination 1",0,0);
    $voucher->Cell(150  ,5  ,"$varcharDestinationName1",0,1);
}
if(!empty($varcharPackageDestination2))
{
    $voucher->Cell(15   ,5  ,"",0,0);
    $voucher->Cell(39   ,5  ,"Destination 2",0,0);
    $voucher->Cell(150  ,5  ,"$varcharDestinationName2",0,1);
}
if(!empty($varcharPackageDestination3))
{
    $voucher->Cell(15   ,5  ,"",0,0);
    $voucher->Cell(39   ,5  ,"Destination 3",0,0);
    $voucher->Cell(150  ,5  ,"$varcharDestinationName3",0,1);
}
if(!empty($varcharPackageDestination4))
{
    $voucher->Cell(15   ,5  ,"",0,0);
    $voucher->Cell(39   ,5  ,"Destination 4",0,0);
    $voucher->Cell(150  ,5  ,"$varcharDestinationName4",0,1);
}
if(!empty($varcharPackageDestination5))
{
    $voucher->Cell(15   ,5  ,"",0,0);
    $voucher->Cell(39   ,5  ,"Destination 5",0,0);
    $voucher->Cell(150  ,5  ,"$varcharDestinationName5",0,1);
}
$varcharReservationTotalPrice = number_format($varcharReservationTotalPrice,2);
$varcharReservationPricePerHead  = number_format($varcharReservationPricePerHead,2);
$varcharPartialPrice = number_format($varcharPartialPrice,2);
$varcharReservationDebt = number_format($varcharReservationDebt,2);
$varcharPaymentAmount= number_format($varcharPaymentAmount,2);
$varcharPaymentLeft = number_format($varcharPaymentLeft,2);
$varcharPaymentChange = number_format($varcharPaymentChange,2);
$voucher->Cell(189  ,10 ,"",0,1);

$voucher->Cell(189  ,00 ,"",1,1);
$voucher->SetFont('Arial','B','12');
$voucher->Cell(47   ,7  ,"Package ID",1,0,'C');
$voucher->Cell(47   ,7  ,"Quantity/Heads",1,0,'C');
$voucher->Cell(47   ,7  ,"Price/Head",1,0,'C');
$voucher->Cell(48   ,7  ,"Total Price",1,1,'C');
$voucher->SetFont('Arial','','12');
$voucher->Cell(47   ,10 ,"$varcharReservationPackageID",1,0,'C');
$voucher->Cell(47   ,10 ,"$varcharReservationTotalHead",1,0,'C');
$voucher->Cell(47   ,10 ,"Php $varcharReservationPricePerHead",1,0,'C');
$voucher->SetFont('Arial','B','12');
$voucher->Cell(48   ,10 ,"Php $varcharReservationTotalPrice",1,1,'C');

$voucher->Cell(189  ,10 ,"",0,1);

$voucher->SetFont('Arial','','14');
$voucher->Cell(13   ,7  ,"",0,0);
$voucher->Cell(65   ,7  ,"",0,0);
$voucher->Cell(65   ,7  ,"Payment Method:",0,0);
$voucher->Cell(48   ,7  ,"$varcharPaymentMethod ",0,1);

$voucher->SetFont('Arial','','14');
$voucher->Cell(13   ,7  ,"",0,0);
$voucher->Cell(65   ,7  ,"",0,0);
$voucher->Cell(65   ,7  ,"Payment Type:",0,0);
$voucher->Cell(48   ,7  ,"$varcharPaymentType",0,1);
$voucher->Cell(13   ,7  ,"",0,0);
$voucher->Cell(65   ,7  ,"",0,0);
$voucher->Cell(65   ,7  ,"Outstanding Balance:",0,0);
$voucher->SetFont('Arial','B','14');


$voucher->Cell(18   ,7  ,"Php",0,0);
$voucher->Cell(28   ,7  ,"$varcharReservationDebt",0,1,'R');
$voucher->Cell(13   ,7  ,"",0,0);
$voucher->Cell(65   ,7  ,"",0,0);
$voucher->SetFont('Arial','','14');

$voucher->SetFont('Arial','','14');
$voucher->Cell(65   ,7  ,"Less Amount Paid",0,0,'I');
$voucher->Cell(18   ,7  ,"Php",0,0);
$voucher->Cell(28   ,7  ,"$varcharPaymentAmount",0,1,'R');
$voucher->Cell(13   ,7  ,"",0,0);
$voucher->Cell(65   ,7  ,"",0,0);
$voucher->SetFont('Arial','B','14');
$voucher->Cell(65   ,10  ,"New Balance",0,0);
$voucher->Cell(18   ,10  ,"Php",0,0);
$voucher->Cell(28   ,10  ,"$varcharPaymentLeft",1,1,'R');
$voucher->Cell(13   ,7  ,"",0,0);
$voucher->Cell(65   ,7  ,"",0,0);
$voucher->Cell(65   ,10  ,"Change",0,0);
$voucher->Cell(18   ,10  ,"Php",0,0);
$voucher->Cell(28   ,10  ,"$varcharPaymentChange",1,1,'R');
$voucher->Cell(189  ,10 ,"",0,1);
$voucher->Line(10   ,45 ,199  ,45);


//$voucher->SetFont('Arial','','12');
//$voucher->Cell(189    ,5  ,"*I have accepted the terms and condition*",0,1,'C');

$voucher->Line(10   ,266    ,199    ,266);
$voucher->SetY(250);
$voucher->Cell(189  ,5  ,"Reminder:",0,1,'C');
$voucher->Cell(189  ,5  ,"50% of the total payment must be settled 7 days before the date planned",0,1,'C');
$voucher->Cell(189  ,5  ,"to process the reservation.",0,1,'C'); 
$voucher->SetFont('Arial','B','14');
$voucher->Cell(189  ,10 ,"--THANK YOU FOR BOOKING A RESERVATION!--",0,1,'C');



$pdfoutputfile = 'filestobesent/' .$varcharPaymentID. 'receipt.pdf';
$pdfdoc = $voucher->Output($pdfoutputfile, 'F');
$voucher->Output();



                                }
                            }
                    
                }

            }

            else
            {
                $message = "Query Error!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
                }
        }
    } 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Edit Payment</title>
        <link rel="shortcut icon" href = "images/tigerVisionIcon.ico">
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="admincss/TVAdminSideBar.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <!-- Select Month -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript">
            function month()
            {
                var selected_month = document.getElementById("months").value;
                if(selected_month=="February")
                {
                    $("#day").html("<option value=''>Day</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option>");
                }
                else if(selected_month=="April"||selected_month=="June"||selected_month=="September"||selected_month=="November")
                {
                    $("#day").html("<option value=''>Day</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option>");
                }
                else if(selected_month=="January"||selected_month=="March"||selected_month=="May"||selected_month=="July"||selected_month=="August"||selected_month=="October"||selected_month=="December")
                {
                    $("#day").html("<option value=''>Day</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option>");
                }
                else
                {
                     $("#day").html("<option value=''>Day</option>");
                }
            }
        </script>
    </head>
    
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                     <img src="images/headerLogo.png"></img>
                </div>
                
                <ul class="list-unstyled components">
                    <p></p>
                    <li>
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
                    <li class="active">
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
            <div id="content" class="modal-body" style="padding:70px;">
                <form name="form1" method="post" enctype="multipart/form-data">
                        <p style="font-size: 35px; color: #000;">
                            <strong>Edit Payments</strong> 
                        </p>
                        <table border="0">
                        <div class="form-group">
                            <tr> 
                            <label>Paid Under The Name Of (Reservation ID - Name)</label>
                            <select name="dropdownPaymentReservationID" class="form-control" required>
                                <?php while($row = mysqli_fetch_array($resultReservationEqualID)):; ?>
                                    <option value="<?php echo $row[0];?>" selected><?php echo $row[0];echo" - ";echo $row[1];echo" ";echo $row[2]; ?></option>
                                <?php endwhile; ?>
                                <?php while($row = mysqli_fetch_array($resultReservation)):;?>
                                    <option value="<?php echo $row[0];?>"><?php echo $row[0];echo" - ";echo $row[1];echo" ";echo $row[2]; ?></option>
                                <?php endwhile;?>
                            </select>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr> 
                                <label>Name</label>
                                <input required
                                pattern="^([a-zA-Z.]+\s)*[a-zA-Z.]+$"
                                style="text-transform:capitalize;"
                                type="text"
                                name="txtbxPaymentName"
                                value="<?php echo $payment_name; ?>"
                                class="form-control">
                            </tr>
                        </div>
                        <br>

                        <div class="form-group">
                        <tr>
                        <?php if (empty($payment_proof)) {
                                                        echo '<button type="button" data-toggle="modal" data-target="#ModalImage"><img src="default.jpg" width="250" /></button>';
                                                    }
                                                    else{echo '<button type="button" data-toggle="modal" data-target="#ModalImage"><img src="data:image/jpeg;base64,'.base64_encode($payment_proof).'" height="200" "/></button>';} ?>
                        <div id="ModalImage" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><?php echo''.$payment_name.'`s Image Clearer';?></h4>
                              </div>
                              <div class="modal-body">
                                <?php if (empty($payment_proof)) {
                                                        echo '<img class="img-responsive" src="default.jpg" style="max-height:1500px;" />';
                                                    }
                                                    else {echo '<img class="img-responsive" src="data:image/jpeg;base64,'.base64_encode($payment_proof).'" style="max-height:1500px;" />';} ?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>

                          </div>
                        </div>
                        <br>
                        </tr>
                        </div>

                        <div class="form-group">
                            <tr> 
                                <label>Payment Amount (Php)</label>
                                <input type="number" placeholder="0.00" required step="0.01" pattern="^\d+(?:\.\d{1,2})?$" min="1"
                                name="txtbxPaymentAmount" value="<?php echo $payment_amount; ?>" class="form-control">
                            </tr>
                        </div>
                        <br>
                    
                        <div class="form-group">
                            <tr>
                            <label>Payment Method</label>
                            <br>
                            <select class="form-control" name="txtbxPaymentMethod" style="width:33%; display:inline-block;">
                                <?php
                                
                                echo'<option>'.$payment_method.'</option>';
                                ?>
                                <option>Bank</option>
                                <option>Money Remittance</option>
                                <option>On-site</option>
                            </select>
                        </tr>
                        
                        </div>
                        <div class="form-group">
                            <?php
                            $year="";
                            for ($i=0; $i<4; $i++)
                            {
                                if($payment_date[$i] != " ")
                                $year .= $payment_date[$i];
                            }
                            
                            ?>
                            <br>
                            <label>Date Paid</label>
                            <br>
                            <select required class="form-control" name="datepaid_year" style="width:33%; display:inline-block;">
                                <?php
                                echo "<option>".$year."</option>";
                                for ($i = 2018; $i <= 2050; $i++)
                                {
                                    echo'<option  value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>
                            <select class="form-control" name="datepaid_month" style="width:33%; display:inline-block;" onchange="month()" id="months" required>
                                <?php
                                $month="";
                                for ($i=7; $i<20; $i++)
                                {
                                    if($payment_date[$i] != " ")
                                    $month .= $payment_date[$i];
                                        
                                }
                                echo'<option>'.$month.'</option>';
                                ?>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            <select id="day" class="form-control" name="datepaid_day" style="width:33%; display:inline-block;" required>
                                <?php
                                $day="";
                                for ($i=4; $i<7; $i++)
                                {
                                    if($payment_date[$i] != " ")
                                    $day .= $payment_date[$i];
                                }
                                echo'<option>'.$day.'</option>';
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <tr> 
                                <input type="hidden" name="hiddenPaymentID" value=<?php echo $_GET['id'];?>>
                                <a href="TVAdminPayments.php" type="btn" name="btnCancel" class="form-control pull-right btn-danger" style="width:25%; margin:5px";><center>Cancel</center></a>
                                <input type="submit" name="btnUpdate" value="Update" class="form-control pull-right btn-success" style="width:25%; margin: 5px";>
                            </tr>
                        </div>
                        </table>

                </form>
            </div>
</div>

        <!-- jQuery CDN -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    </body>
</html>
