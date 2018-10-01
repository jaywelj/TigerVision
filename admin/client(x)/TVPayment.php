<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Destinations Offered</title>
		<link rel="shortcut icon" href = "images/tigerVisionIcon.ico">
		<meta charset="utf-8">
		<meta http-equiv = "X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
		
		<link href="customcss/TVcss.css" rel="stylesheet" type="text/css">
		<link href="customcss/TVDestinationsOffered.css" rel="stylesheet" type="text/css">

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 

		<style>
		</style>
	</head>
	<body>
		<!-- NAVBAR -->
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<!-- logo -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="TVHome.html" style=" padding:5px;" ><img src="images/headerLogo.png"></a>
				</div>
				<!-- menu -->
				<div class="collapse navbar-collapse navbar-right" id="mynavbar">
					<ul class="nav navbar-nav">
						<li><a href="TVHome.php"><strong>HOME</strong></a></li>
						<li><a href="TVReserveATour.php"><strong>RESERVE A TOUR</strong></a></li>
						<li><a href="TVDestinationsOffered.php"><strong>DESTINATIONS OFFERED</strong></a></a></li>
						<li class="active"><a href="TVPayment.php"><strong>PAYMENT</strong></a></a></li>
						<li><a href="TVAboutUs.php"><strong>ABOUT US</strong></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!--Payments-->
		<div class="container-fluid" style="margin:50px">
			<p style="font-family: Strawberry Blossom; font-size:100px; text-align: center; border-style:solid; border-color: #ff9900; border-right:none; border-left: none; margin-bottom:50px">Payment</p>
			 <div id="content" class="modal-body" style="padding:0px; margin:30px 190px 80px 190px; margin-bottom: 150px; ">
				<form name="form1" method="post" enctype="multipart/form-data">
					<p style="font-size: 35px; color: #000;">
                        <strong>Add a payment to your Reservation</strong> 
                    </p>
					<table border="0">
						<div class="form-group">
							<tr> 
								<label>Name of Payer</label>
								<input type="text" name="txtbxPayerName" id="txtbxPayerName" class="form-control">
							</tr>
						</div>
						<div class="form-group">
							<tr> 
								<label>Reservation No.</label>
								<input type="number" name="txtbxReservationNo" id="txtbxReservationNo" class="form-control">
							</tr>
						</div>
						<div class="form-group">
							<tr> 
								<label>Receipt/Payment Slip</label>
								<input type="file" name="txtbxReciept" id="txtbxReciept" class="form-control">
							</tr>
						</div>
						<div class="form-group">
							<tr>
								<input type="button" name="btnAddPayment" value="Add Payment" id="HAHA" style="font-family:Arial; font-weight:bold;" class="btn btn-info btn-lg pull-right btnAddPayment">
							</tr>
						</div>
					</table>
					<div id="confirmPaymentModal" class="modal fade">
						<div class="modal-dialog modal-lg">
							<div class="modal-content" style="border-radius:35px;">
								<div class="modal-header" style="background-color: #f6c25f; border-radius:35px 35px 0px 0px; color:white">
									<button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal" style="margin:7px 7px 0px 0px;"></button>
									<h4 class="modal-title text-center" style="margin-left: 25px;" Book Package><strong>PAYMENT</strong> </h4>
								</div>
								<div class="modal-body" id="modalBody">
								</div>
								<input type="submit" title="Confirm" id="confirmPackage" name="confirmPackage" href="" value="CONFIRM PAYMENT" class="text-center btn btn-warning" style="height:55px; width:100%; border-radius: 0px 0px 35px 35px; ">
							</div>
						</div>
					</div>
				</form>
            </div>
		</div>
	</body>
	<?php
	include_once('TVConnectionString.php');
	
	if(isset($_POST['confirmPackage']))
	{
		$varcharReservationID=$_POST['txtbxReservationNo'];
		$varcharPayerName=$_POST['txtPayerName'];
		$varcharPaymentImage = addslashes(file_get_contents($_FILES["txtbxReciept"]["tmp_name"]));
		echo "<script type='text/javascript'>alert('$varcharReservationID');</script>";
		echo "<script type='text/javascript'>alert('$varcharPayerName');</script>";
		$queryInsertingInitialPayment = "INSERT INTO `tbl_payments` (`payment_ID`, `payment_name`, `payment_proof`, `payment_amount`, `payment_date`, `payment_method`, `payment_type`, `payment_reservationID`, `payment_processed`, `payment_emailStatus`) VALUES (NULL, '$varcharPayerName', '$varcharPaymentImage', NULL, NULL, NULL, NULL, '$varcharReservationID', '1', 'Not Emailed')";
		$resultInsertingInitialPayment = mysqli_query($connect, $queryInsertingInitialPayment);
	}
	?>

	<footer>
		<div class="contacts" align="center" style="font-family: Eras ITC; font-size: 15px; border-style:solid; border-color: #ff9900; 		border-right:none; border-left: none; margin-bottom: 0px; margin-top: 20px; background-color: #ff9900;">
			<p style="font-size:25px; text-align: center;"> <b>Contact Us</b>
			<br>
			</p>
			<p>a
			<b>Office Address</b>
			<br> 
			G/F One Victoria Plaza, A. Mabini Street, Kapasigan, Pasig City, Philippines
			<br>
			<b>Contact Numbers</b>
			<br>
			+63 26334493| 0927 2451158 | 0923 5367319
			<br>
			<b> Email Address</b>
			<br> 
			tigervisiontravelco@gmail.com
			<br> 
			<b>FB Page </b>
			<br> 
			www.facebook.com/tigervisiontravelco
			
		</div>
	</footer>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</html>

<script>
	$(document).ready(function(){
		$('.btnAddPayment').click(function(){
			var payerName = document.getElementById('txtbxPayerName').value;
			var reservationNo = document.getElementById('txtbxReservationNo').value;
			var recieptImage = document.getElementById('txtbxReciept').value;
			if(payerName=="")
			{
					alert("Please input a Payer Name")
			}
			else if(reservationNo=="")
			{
					alert("Please input the Reservation No")
			}
			else if(recieptImage=="")
			{
					alert("Please upload the reciept")
			}
			else
			{
				$.ajax({
					url:"TVConfirmReservationDetails.php",
					method:"post",
					data:
					{
						reservationNo:reservationNo,
						payerName:payerName
					},
					success:function(data)
					{
						$('#modalBody').html(data);
						$('#confirmPaymentModal').modal("show");
					}

				});
			}
		});
	});
</script>


