<?php
    $reservationID = $_GET['reservationid'];
    $paymentID = $_GET['paymentid'];

    include("TVConnectionString.php");  
    $queryReservation = "SELECT * FROM tbl_reservation WHERE reservation_ID = $reservationID";
    $queryPayment = "SELECT * FROM tbl_payments WHERE payment_ID = $paymentID";

    $resultReservation = mysqli_query($connect, $queryReservation);
    $resultPayment = mysqli_query($connect, $queryPayment);
    while($res = mysqli_fetch_array($resultReservation))
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
    while($res2 = mysqli_fetch_array($resultPayment)){
        $payment_ID = $res2['payment_ID'];
        $payment_name = $res2['payment_name'];
        $payment_proof = $res2['payment_proof'];
        $payment_amount = $res2['payment_amount'];
        $payment_date = $res2['payment_date'];
        $payment_method = $res2['payment_method'];
        $payment_type = $res2['payment_type'];
        $payment_reservationID = $res2['payment_reservationID'];
        $payment_processed = $res2['payment_processed'];
    }

   $mailto = "$reservation_emailAdd";

   require 'dependencyphp/PHPMailer-master/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl';
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 587
   $mail ->IsHTML(true);
   $mail ->Username = "tigervisionconfirm@gmail.com";
   $mail ->Password = "tigervision123";
   $mail ->SetFrom("tigervisionconfirm@gmail.com");
   $mail ->Subject = 'OR#'.$payment_ID.'';
   $mail ->Body = 'Hi! '.$reservation_firstName.' '.$reservation_lastName.' We have received your payment worth '.$payment_amount.' Paid By '.$payment_name.' under your reservation ID '.$reservation_ID.' On the date '.$payment_date.' with the method '.$payment_method.' and '.$payment_type.' <br> Refer to sent attachment for more details';
   $mail ->AddAddress($mailto);
   $mail ->addAttachment('filestobesent/'.$paymentID.'receipt.pdf');

   if(!$mail->Send())
   {
       $message = "Mail Not Sent!";
       echo "<script type='text/javascript'>alert('$message');</script>";
                            //redirectig to the display page. In our case, it is index.php
       echo "<script type='text/javascript'>location.href = 'TVAdminPayments.php';</script>";
       
   }
   else
   {
       $message = "Mail Sent Successfully!";
       echo "<script type='text/javascript'>alert('$message');</script>";
                            //redirectig to the display page. In our case, it is index.php
       echo "<script type='text/javascript'>location.href = 'TVAdminPayments.php';</script>";

       $queryUpdateEmailed = "UPDATE `tbl_payments` SET `payment_emailStatus` = 'Emailed' WHERE `tbl_payments`.`payment_ID` = $paymentID";
       $resultUpdateEmailed = mysqli_query($connect, $queryUpdateEmailed);
   }
?>




   

