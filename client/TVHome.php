<!DOCTYPE html>
<html lang="en">
	<head>
		<title>TigerVision</title>
		<link rel="shortcut icon" href = "images/tigerVisionIcon.ico">
		<meta charset="utf-8">
		<meta http-equiv = "X-UA-Compatible" content="IE-edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
		<link href="customcss/TVHome.css" rel="stylesheet" type="text/css">
		<link href="customcss/TVcss.css" rel="stylesheet" type="text/css">
		<style>
		</style>
	</head>
	<body >
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
					<a class="navbar-brand" href="TVHome.php" style=" padding:5px;" ><img src="images/headerLogo.png"></a>
				</div>
				<!-- menu -->
				<div class="collapse navbar-collapse navbar-right " id="mynavbar">
					<ul class="nav navbar-nav">
						<li class="active"><a href="TVHome.php"><strong>HOME</strong></a></li>
						<li><a href="TVReserveATour.php"><strong>RESERVE A TOUR</strong></a></li>
						<li><a href="TVDestinationsOffered.php"><strong>DESTINATIONS OFFERED</strong></a></a></li>
						<li><a href="TVPayment.php"><strong>PAYMENT</strong></a></a></li>
						<li><a href="TVAboutUs.php"><strong>ABOUT US</strong></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!--CAROUSEL-->
		<div class="container-fluid">
			<div class="row">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner"  >
						<div class="item active">
							<img src="images/header_road2.jpg" alt="road1img"  style="width:100%;">
							<!-- 1st Picture -->
							<div>
								<p id="tgr" style="font-family:Axettac Demo; color:White; font-size: 100px;">TigerVision</p>
								<p id="cmpy" style="font-family:Axettac Demo; color:White; font-size: 50px;">Travel & Tours Company</p>
								<div class="_btnHomeReserve">
									<a href="TVReserveATour.php" class="_btnReserveNow btn btn-warning" style="vertical-align:middle"><span><p style="font-family:Calibri; color:White; font-size: 23px;"><strong>BOOK NOW</strong></p></span></a>
								</div>
								<div>
									<p id="tag" style="font-family:Strawberry Blossom; color:white; font-size: 77px;top:55%;">Service is our Strength,</p>
									<p id="tag" style="font-family:Strawberry Blossom; color:white; font-size: 77px; top:65%;	"> Travel is our Passion.</p>
								</div>
							</div>
						</div>

						<!-- 2nd Picture -->
						<div class="item">
							<img src="images/header_road4.jpg" alt="road3img" style="width:100%;">
							<p id="tgr" style="font-family:Axettac Demo; color:White; font-size: 100px;">TigerVision</p>
							<p id="cmpy" style="font-family:Axettac Demo; color:White; font-size: 50px;">Travel & Tours Company</p>
							<div class="_btnHomeReserve">
								<a href="TVDestinationsOffered.php" class="_btnReserveNow btn btn-danger" style="vertical-align:middle"><span><p style="font-family:Calibri; color:White; font-size: 18px;"><strong>VIEW DESTINATIONS</strong></p></span></a>
							</div>
							<div>
									<p id="tag" style="font-family:Strawberry Blossom; color:white; font-size: 75px;top:55%;">Difficult roads often leads to</p>
									<p id="tag" style="font-family:Strawberry Blossom; color:white; font-size: 90px; top:65%;">Beautiful Destinations.</p>
								</div>
						</div>

						<!-- 3rd Picture -->
						
						<div class="item">
							<img src="images/header_road3.jpg" alt="road2img" style="width:100%;">
							<p id="tgr" style="font-family:Axettac Demo; color:White; font-size: 100px;">TigerVision</p>
							<p id="cmpy" style="font-family:Axettac Demo; color:White; font-size: 50px;">Travel & Tours Company</p>
							<div class="_btnHomeReserve">
								<a href="TVPayment.php" class="_btnReserveNow btn btn-success" style="vertical-align:middle"><span><p style="font-family:Calibri; color:White; font-size: 23px;"><strong>PAY NOW</strong></p></span></a>
							</div>
							<div>
									<p id="tag" style="font-family:Strawberry Blossom; color:white; font-size: 77px;top:55%;">Price is what you Pay,</p>
									<p id="tag" style="font-family:Strawberry Blossom; color:white; font-size: 77px; top:65%;">Experience is what you Get.</p>
								</div>
						</div>
					</div>
					<!-- Left and right controls -->
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</body>
	<footer>
		<div class="contacts" align="center" style="font-family: Eras ITC; font-size: 15px; border-style:solid; border-color: #ff9900; border-right:none; border-left: none; background-color: #ff9900;">
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
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</html>
