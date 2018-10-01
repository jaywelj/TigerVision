<?php 
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
    }

    $queryReservation = "SELECT * FROM `tbl_reservation`";
    					if (empty($payment_proof)) {
                                                        echo '<img src="default.jpg" width="250" />';
                                                    }
                                                    else{
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($payment_proof).'" />';
                    }
                        ?>