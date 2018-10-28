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
					<a class="navbar-brand" href="index.php" style=" padding:5px;" ><img src="images/headerLogo.png"></a>
				</div>
				<!-- menu -->
				<div class="collapse navbar-collapse navbar-right" id="mynavbar">
					<ul class="nav navbar-nav">
						<li><a href="index.php"><strong>HOME</strong></a></li>
						<li><a href="TVReserveATour.php"><strong>RESERVE A TOUR</strong></a></li>
						<li class="active"><a href="TVDestinationsOffered.php"><strong>DESTINATIONS OFFERED</strong></a></a></li>
						<li><a href="TVPayment.php"><strong>PAYMENT</strong></a></a></li>
						<li><a href="TVAboutUs.php"><strong>ABOUT US</strong></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="row" style="margin:50px;">
		<div class="container-fluid">
		<p style="font-family: Strawberry Blossom; font-size:100px; text-align: center; border-style:solid; border-color: #ff9900; border-right:none; border-left: none; margin-bottom:50px">Destinations Offered</p>
		<!--Destinations-->
		<?php
                include("TVConnectionString.php");  
                $destinationQuery = "SELECT * FROM tbl_destination WHERE destination_purgeFlag = 1 AND destination_ID != 1 ORDER BY destination_ID  DESC";  
                $destinationArray = mysqli_query($connect, $destinationQuery);  
                ?>

        
		
			<?php
			while($destination = mysqli_fetch_array($destinationArray))  
                {
                $i = 1;
            echo '<a href="'.$destination[5].'"target="_blank"; class="btn button1" style="margin-bottom: 4px;white-space: normal;overflow: hidden; width:31.7%">';
			echo '<img src="data:image/jpeg;base64,'.base64_encode($destination['destination_image'] ).'"width="180" alt="'.$destination[1].'" style="padding-top: 2px;"/>';
			echo '<h2>'.$destination[1].'.</h2>';
			echo '<p>'.$destination[7].'.</p>';
			echo '</a>';
			if ($i % 3 === 0) {
				echo "<p>     </p>";
				echo "<p>     </p>";
			} 

			else
			{

			}
		} ?>
		</div>
	</div>

		
	</body>
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
