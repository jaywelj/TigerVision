<?php

if(isset($_POST['reservationNo']))
{
	$varcharPayerName=$_POST['payerName'];
	$varcharReservationNo=$_POST['reservationNo'];
	$output = '';
	include("TVConnectionString.php");  
	$reservationQuery="SELECT reservation_lastname, reservation_firstname FROM tbl_reservation WHERE reservation_ID=$varcharReservationNo";
	$reservationArray=mysqli_query($connect,$reservationQuery);

	while($res=mysqli_fetch_array($reservationArray))
	{
		$firstname=$res['reservation_firstname'];
		$lastname=$res['reservation_lastname'];
	}
	$output ='
	<div class="content"> 
	<p style="font-family: Strawberry Blossom; font-size:100px; text-align: center; border-style:solid; border-color: #ff9900; border-right:none; border-left: none; margin:0px 50px 30px 50px">Payment</p>

	<p style="font-family: Cambria; font-size:40px; text-align: center;  margin:0px 50px 0px 50px">Reservation No</p>
	<p style="font-family: Cambria; font-weight:bold; font-size:100px; text-align: center;  margin:0px 50px 0px 50px">'.$varcharReservationNo.'</p>

	
	';
	if(!empty($firstname)&&!empty($firstname))
	{
		$output.='
		<p style="font-family: Cambria;  font-size:30px; text-align: center;  margin:0px 50px 0px 50px">Reservation Made By:</p>
		<p style="font-family: Cambria; font-weight:bold; font-size:30px; text-align: center;  margin:0px 50px 0px 50px">'.$firstname.' '.$lastname.'</p>
		<p style="font-family: Cambria;  font-size:30px; text-align: center;  margin:0px 50px 0px 50px">Payment By:</p>

		<p style="font-family: Cambria; font-weight:bold; font-size:30px; text-align: center;  margin:0px 50px 0px 50px">'.$varcharPayerName.'</p>
		</div> 
		';
	}
	else
	{
		$output.='
		<p style="font-family: Cambria; font-weight:bold; font-size:30px; text-align: center;  margin:0px 50px 0px 50px">Sorry, we cannot any reservation associated with this number.</p>';
	}
	
}

echo $output;
?>