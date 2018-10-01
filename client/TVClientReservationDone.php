
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Reserve A Tour</title>
		<link rel="shortcut icon" href = "images/tigerVisionIcon.ico">
		<meta charset="utf-8">
		<meta http-equiv = "X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
		<link href="customcss/TVcss.css" rel="stylesheet" type="text/css">
		<link href="customcss/TVReserveATour2.css" rel="stylesheet" type="text/css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
		<style>
		</style>
	</head>
	<body >
		<!-- NAVBAR -->
		<nav class="navbar navbar-default" role="navigation" >
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
				<div class="collapse navbar-collapse navbar-right " id="mynavbar">
					<ul class="nav navbar-nav" >
						<li><a href="TVHome.php" ><strong>HOME</strong></a></li>
						<li class="active"><a href="TVReserveATour.php"><strong>RESERVE A TOUR</strong></a></li>
						<li><a href="TVDestinationsOffered.php"><strong>DESTINATIONS OFFERED</strong></a></li>
						<li><a href="TVPayment.php"><strong>PAYMENT</strong></a></a></li>
						<li><a href="TVAboutUs.php"><strong>ABOUT US</strong></a></li>
					</ul>
				</div>
			</div>
		</nav>

		<!--Package List-->
		<div class="container-fluid">
			<div class="row">
				<p style="font-family: Strawberry Blossom; font-size:100px; text-align: center; border-style:solid; border-color: #ff9900; border-right:none; border-left: none; margin-bottom:10px">THANK YOU!</p>
			</div>
			<p style="font-family: Eras ITC; font-size:25px; text-align: center; margin:30px">Your reservationhas been successfully placed and under review for approval. <br>Please wait as we will contact you as soon as possible. <br>You may refer to the reservation number below for inquiry.<br> Contact us if you have more information </p>
			<p style="font-family: Eras ITC; font-size:120px; text-align: center; margin:20px"><?php $reserveid=$_GET['id']; echo $reserveid; $reservetype=$_GET['type']; $varcharPaymentType=$_GET['pt']; $varcharPaymentMethod=$_GET['pm'];?> </p>
			<?php
			$varcharPaymentMethodNoSpace = str_replace(' ', '', $varcharPaymentMethod);
			?>
			<center><a class="btn btn-primary btn-lg" style="font-size: 30px; font-family: Eras ITC;" href="TVHome.php">HOME</a><a class="btn btn-primary btn-lg" style="font-size: 30px; font-family: Eras ITC;margin-left: 30px" href="TVClientGenerateReservationVoucher<?php echo $varcharPaymentMethodNoSpace?>.php?
				<?php echo"id=$reserveid&type=$reservetype&pm=$varcharPaymentMethod&pt=$varcharPaymentType";?>" >Print Voucher</a></center>
		</div>
	</body>
				
				
	<footer>
		<div class="contacts" align="center" style="font-family: Eras ITC; font-size: 15px; border-style:solid; border-color: #ff9900; 		border-right:none; border-left: none; margin-bottom: 0px; margin-top: 90px; background-color: #ff9900;">
			<p style="font-size:25px; text-align: center;"> <b>Contact Us</b>
			<br>
			</p>
			<p>
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
			</p>
		</div>
	</footer>

	<script>
		$(document).ready(function(){
			$('.btnBook').click(function(){
				var package_ID = $(this).attr("id");
				var htmllink = "TVReservationForm.php?id=";
				var finalLink = htmllink.concat(package_ID);

				document.getElementById("confirmPackage").href=finalLink+"&type=tour package"; 

				$.ajax({
					url:"TVGetPackageDetails.php",
					method:"post",
					data:{package_ID:package_ID},
					success:function(data){
						$('#modalBody').html(data);
						$('#reserve_package_modal').modal("show");
					}
				})

			});
		});
	</script>
	<script>
		$(document).ready(function(){
			$('.btnCreate').click(function(){
				$('#create_package_modal').modal("show");
			});
		});
	</script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</html>
