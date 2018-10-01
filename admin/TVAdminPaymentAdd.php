<?php
session_start();
$_accessLevel = $_SESSION['adminAccessLevel'];
if ($_accessLevel=='Admin'){
} else if ($_accessLevel=='Staff') {
    echo'<script> document.getElementById("userdiv").style.display ="none"; </script>';
} else {
    header("Location: TVAdminLogout.php");
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Add a Payment</title>
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
                    <li >
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
            <div id="content">
                <?php

                // php select option value from database
                include("TVConnectionString.php");

                $queryReservation = "SELECT * FROM `tbl_reservation` WHERE reservation_debt != 0 AND reservation_purgeFlag = 1";
                $resultReservation = mysqli_query($connect, $queryReservation);
                
                
                ?>
				<div class="modal-body" style="padding:70px;">
		          	<form method="post">
		          		<p style="font-size: 35px; color: #000;">
                            <strong>Add a Payment</strong> 
                        </p>
			            <div class="form-group">
                            <label>Name</label>
                            <input required
                            pattern="^([a-zA-Z.]+\s)*[a-zA-Z.]+$"
                            style="text-transform:capitalize;"
                            type="text"
                            name="txtbxPaymentName"
                            class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="hiddenPaymentImage" value=NULL>
                        </div>
                        <div class="form-group">
                            <label>Amount Paid (Php)</label>
                            <input type="number" placeholder="0.00" required step="0.01" pattern="^\d+(?:\.\d{1,2})?$" name="txtbxPaymentAmount" class="form-control" min="1">
                        </div>
                        <div class="form-group">
                            <label>Date Paid</label>
                            <br>
                                <select class="form-control" name="datepaid_year" style="width:33%; display:inline-block;" required>
                                    <option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
                                    <?php
                                    for ($i = 2019; $i <= 2100; $i++) 
                                    {
                                        echo'<option  value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                                <select class="form-control" name="datepaid_month" style="width:33%; display:inline-block;" onchange="month()" id="months" required>
                                    <option value=" ">Month</option>
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
                                    <option value="">Day</option>
                                </select>
                            </div>
                        
                        <div class="form-group">
                            <input type="hidden" name="hiddenPaymentMethod" value="On-site">
                        </div>

                        <!--<div class="form-group">
                            <label>Payment Type</label>
                            <br>
                            <select class="form-control" name="dropdownPaymentType" style="width:33%; display:inline-block";>
                            <option>Paid Partially</option>
                            <option>Paid Full</option>
                            </select>
                        </div>-->

                        <div class="form-group"> 
                            <label>Reservation ID (Select Reservation ID - Name)</label>
                            <select name="dropdownPaymentReservationID" class="form-control" required>
                                <?php while($row = mysqli_fetch_array($resultReservation)):;?>
                                    <option value="<?php echo $row[0];?>"><?php echo $row[0];echo" - ";echo $row[1];echo" ";echo $row[2]; ?></option>
                                <?php endwhile;?>
                            </select>
                        </div>
                        
                        <!--<div class="form-group">
                            <label>Price Per Head</label>
                            <input type="text" name="txtbxPricePerHead" class="form-control">
                        </div>-->
                        <br>
                        <br>
						<tr>
							<a href="TVAdminPayments.php" type="btn" name="btnCancel" class="form-control pull-right btn-danger" style="width:18%; text-align:center; margin:5px;">Cancel</a>
							<input type="submit" name="btnAddRecord" value="Add" class="form-control pull-right btn-success" style="width:18%;  margin:5px;">
						</tr>
					</form>
				</div>			  
			    <?php
                if(isset($_POST['btnAddRecord'])) 
                {
                    //including the database connection file
                    include_once("TVConnectionString.php");
                    

                    $TempDatePaidYear = mysqli_real_escape_string($connect, $_POST['datepaid_year']);
                    $TempDatePaidDay = mysqli_real_escape_string($connect, $_POST['datepaid_day']);
                    $TempDatePaidMonth = mysqli_real_escape_string($connect, $_POST['datepaid_month']);
                    
                    $VarcharPaymentDatePaid =  $TempDatePaidYear . ' ' . $TempDatePaidDay . ' ' . $TempDatePaidMonth;

                    $VarcharPaymentName = mysqli_real_escape_string($connect, $_POST['txtbxPaymentName']);
                    $VarcharPaymentProof = mysqli_real_escape_string($connect, $_POST['hiddenPaymentImage']);
                    $VarcharPaymentPaid = mysqli_real_escape_string($connect, $_POST['txtbxPaymentAmount']);
                    $VarcharPaymentReservationID = mysqli_real_escape_string($connect, $_POST['dropdownPaymentReservationID']);
                    //$VarcharPaymentType = mysqli_real_escape_string($connect, $_POST['dropdownPaymentType']);
                    $VarcharPaymentMethod = mysqli_real_escape_string($connect, $_POST['hiddenPaymentMethod']);

                    $CurrentDate = date('Y-m-d H:i:s');
                    $DateCurrentString = strtotime($CurrentDate);
                    $DatePaidString = strtotime($VarcharPaymentDatePaid);
                    //$DateAppliedString = strtotime($VarcharPaymentDateApplied);

                    $queryReservation2 = "SELECT * FROM `tbl_reservation` WHERE reservation_debt != 0 AND reservation_purgeFlag = 1 AND reservation_ID = $VarcharPaymentReservationID";
                    $resultReservation2 = mysqli_query($connect, $queryReservation2);
                    
                    while($row = mysqli_fetch_array($resultReservation2))
                    {
                        $reservation_ID = $row['reservation_ID'];
                        $reservation_totalPrice = $row['reservation_totalPrice'];
                        $reservation_debt = $row['reservation_debt'];
                    
	                    if ($VarcharPaymentPaid == $reservation_totalPrice)
	                    {
	                        $VarcharPaymentType = "Paid Full";
	                    }
	                    else if ($VarcharPaymentPaid == $reservation_totalPrice & $reservation_debt = 0)
	                    { 
	                       $VarcharPaymentType = "Paid Full";
	                    }
	                    else
	                    {
	                        $VarcharPaymentType = "Paid Partially";
	                    }
               		}
                    //$VarcharPaymentHeads = mysqli_real_escape_string($connect, $_POST['txtbxPaymentHeads']);
                    // checking empty fields
                    if(empty($VarcharPaymentName)) 
                    {
                                
                        if(empty($VarcharPaymentName)) 
                        {
                            $message = "Enter a valid name!";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        //link to the previous page
                        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
                    } 
                    else 
                    { 
                        // if all the fields are filled (not empty) 
                        //insert data to database   
                        //$queryAdd = "INSERT INTO `tbl_reservation` (`reservation_ID`, `reservation_firstName`, `reservation_lastName`, `reservation_contactNum`, `reservation_emailAdd`, `reservation_address`, `reservation_dateApplied`, `reservation_PaidDate`, `reservation_packageID`, `reservation_packageType`, `reservation_status`,`reservation_totalHead`,`reservation_pricePerHead`,`reservation_totalPrice`,`reservation_debt`,`reservation_paid`, reserve_purgeFlag`) VALUES (NULL, '$VarcharPaymentFirstName', '$VarcharPaymentLastName', '$VarcharPaymentContactNum','$VarcharPaymentEmail', '$VarcharPaymentAddress', '$VarcharPaymentDateApplied', '$VarcharPaymentDatePaid', '$VarcharPackageID', '$VarcharPackageType','$VarcharPaymentHeads','$VarcharPaymentPricePerHead', $VarcharPaymentTotal, '$VarcharPaymentDebt','$VarcharPaymentPaid' , 'Pending', '1')";
                        $queryAdd ="INSERT INTO `tbl_payments` (`payment_ID`, `payment_name`, `payment_proof`, `payment_amount`, `payment_date`, `payment_method`, `payment_type`, `payment_reservationID` , `payment_processed`, `payment_emailStatus`,`payment_purgeFlag`) VALUES (NULL, '$VarcharPaymentName', NULL, '$VarcharPaymentPaid', '$VarcharPaymentDatePaid', '$VarcharPaymentMethod', '$VarcharPaymentType', '$VarcharPaymentReservationID', 1, 'Not Emailed', 1)";
                        if(mysqli_query($connect, $queryAdd))
                        {
                            $message = "Payment added successfully!";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            //redirectig to the display page. In our case, it is index.php
                            echo "<script type='text/javascript'>location.href = 'TVAdminPayments.php';</script>";
                            $queryGettingLastPaymentID = "SELECT * FROM tbl_payments ORDER BY payment_ID DESC LIMIT 1";
                                $resultGettingLastPaymentID = mysqli_query($connect, $queryGettingLastPaymentID);
                                while($reso=mysqli_fetch_array($resultGettingLastPaymentID))
                                {
                                    $varcharPaymentIDF = $reso['payment_ID'];
                                    $varcharPaymentReservationIDF = $reso['payment_reservationID'];
                                }
                            //echo "<script type='text/javascript'>location.href = 'TVAdminPaymentReceiptMail.php?id=$varcharPaymentIDF';</script>";
                            $queryUpdateReservationPaid = "UPDATE `tbl_reservation` SET `reservation_paid` = `reservation_paid` + $VarcharPaymentPaid WHERE `tbl_reservation`.`reservation_ID` = $VarcharPaymentReservationID";
                            
                            $queryGettingLastPaymentID = "SELECT * FROM tbl_reservation WHERE reservation_ID = $varcharPaymentReservationIDF";
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
                                        $reservation_change = $res['reservation_change'];
		                            }
		                            
		                            if($reservation_debt<$reservation_paid || $reservation_debt == $reservation_paid)
		                            {
		                                $queryUpdateStatusAccepted = "UPDATE `tbl_reservation` SET `reservation_status` = 'Accepted' WHERE `tbl_reservation`.`reservation_ID` = $VarcharPaymentReservationID";
		                                $resultUpdateStatusAccepted = mysqli_query($connect, $queryUpdateStatusAccepted);
		                            }
		                            elseif ($reservation_paid == $reservation_totalPrice) 
		                            {
		                                 $queryUpdateStatusFullPaid = "UPDATE `tbl_reservation` SET `reservation_status` = 'Fully Paid' WHERE `tbl_reservation`.`reservation_ID` = $VarcharPaymentReservationID";
		                                $resultUpdateStatusFullPaid = mysqli_query($connect, $queryUpdateStatusFullPaid);
		                                     
		                            }
									$varcharReservationID = $VarcharPaymentReservationID;
									$varcharPaymentIDG = $varcharPaymentIDF;
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

									include('TVAdminVoucher.php');
                                }
                            }
                            
                        }
                        else
                        {
                            $message = "Query Error";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            //redirectig to the display page. In our case, it is index.php
                            echo "<script type='text/javascript'>location.href = 'TVAdminReservations.php';</script>";
                        }
                    }
                }

                ?>
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


		
