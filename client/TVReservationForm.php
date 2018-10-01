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
		<link href="customcss/TVReservationForm.css" rel="stylesheet" type="text/css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

		<script type="text/javascript">
            function month()
            {
                var selected_month = document.getElementById("dateplanned_month").value;
                if(selected_month=="February")
                {
                    $("#dateplanned_day").html("<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option>");
                }
                else if(selected_month=="April"||selected_month=="June"||selected_month=="September"||selected_month=="November")
                {
                    $("#dateplanned_day").html("<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option>");
                }
                else if(selected_month=="January"||selected_month=="March"||selected_month=="May"||selected_month=="July"||selected_month=="August"||selected_month=="October"||selected_month=="December")
                {
                    $("#dateplanned_day").html("<option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option>");
                }
                else
                {
                     $("#dateplanned_day").html("<option value=''>Day</option>");
                }
            }
        </script>
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
					<ul class="nav navbar-nav">
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
			<div class="row" >
				<p style="font-family: Strawberry Blossom; font-size:100px; text-align: center; border-style:solid; border-color: #ff9900; border-right:none; border-left: none; ">Reservation Form</p>
				<!--<table style="font-family: Eras ITC;">
					<Caption style="font-family: Strawberry Blossom; font-size: 50px"> Package Inclutions: </caption>
					<tr>
						<td width=50%>
							<ul style ="list-style-type:square">
								<li>Air-conditioned tourist bus equipped with TV, DVD, and sound system with maximum sitting capacity of 49 persons. 45 bus payees + 4 teachers.
								<li>Php 100,000.00 comprehensive insurance coverage with Medical Reimbursement for each of the students, teachers and staff joining the tour while on-board.
								<li>Programming and reservation on the chosen iteneraries.
								<li>Entrance fees,Parking Fees, Toll 
								<li>Free tarpaulin per bus
							</ul>				
						</td>
						<td width=50%>
							<ul style ="list-style-type:square">
								<li>Redcross Emergency First-Aid and Basic Life Support Trained Tour Facilitator.
								<li>Teachers joining the tour will be free of charge, maximum of 4 teachers per bus only
								<li>Meal allowance of Php 200.00 per teacher, maximum of 4 teachers
								<li>Games and prizes on board							
								<li>TIGERVISION TRAVEL & TOURS CO. "Safety Guide and Risk Management Handout for Educational Field Trip"
							</ul>
						</td>
					</tr>
				</table>-->
				<?php
                include("TVConnectionString.php");  
                $package_ID = $_GET['id'];
                $package_type = $_GET['type'];
                if($package_type=="custom package")
                {
                	$packageQuery = "SELECT * FROM tbl_createnewpackage ORDER BY np_ID DESC";  
                }
                else if($package_type=="tour package")
                {
                	$packageQuery = "SELECT * FROM tbl_tourpackage ORDER BY package_ID DESC";  
                }
                $packageArray = mysqli_query($connect, $packageQuery); 
                ?>

                <div class="container">
					<div class="row"  style="margin:0px">
				<section>
		        <div class="wizard">
		            <div class="wizard-inner">
		                <div class="connecting-line"></div>
		                <ul class="nav nav-tabs" role="tablist">

		                    <li role="presentation" class="active">
		                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
		                            <span class="round-tab">
		                                <i><strong>1</strong></i>
		                            </span>
		                        </a>
		                    </li>

		                    <li role="presentation" class="disabled">
		                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
		                            <span class="round-tab">
		                                <i><strong>2</strong></i>
		                            </span>
		                        </a>
		                    </li>
		                    <li role="presentation" class="disabled">
		                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
		                            <span class="round-tab">
		                                <i><strong>3</strong></i>
		                            </span>
		                        </a>
		                    </li>
		                    <li role="presentation" class="disabled">
		                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
		                            <span class="round-tab">
		                                <i><strong>4</strong></i>
		                            </span>
		                        </a>
		                    </li>
		                    <li role="presentation" class="disabled">
		                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
		                            <span class="round-tab">
		                                <i><strong>5</strong></i>
		                            </span>
		                        </a>
		                    </li>
		                </ul>
		            </div>
           		 	<form method="post">
           		 		<!-- Step 1 reservation -->
                		<div class="tab-content">
                    		<div class="tab-pane active" role="tabpanel" id="step1">
                        		<div style="border-bottom: 1px solid gray">
                        				<h2>Step 1</h2>
                        		</div>
                        		<p style="font-size: 35px; color: #000; margin-bottom: 30px;" >
	                          		<strong>CLIENT TYPE</strong> 
	                    		</p>
		                        <div style="margin-top:30px;">
						            <h2 class="text-center" > <strong>Are you a </strong></h2>
						            <div class="form-group" >
							        	<div >
							        		<center>
								        		<table style="border-bottom: 1px  solid gray">
								        			<tr >
										          		<td data-toggle="buttons" class="text-center" style="margin:20px;">
										          			<label class="btn btn-warning" style="margin:20px; outline: none; width: 300px; height: 300px; border-radius: 150px; border:#ff9900 solid 2px" onclick="document.getElementById('groupdiv').style.display ='none'; document.getElementById('schooldiv').style.display ='block'; document.getElementById('schooladon').style.display ='block'; document.getElementById('txtbxUserSchoolName').required = true;" >
										          			<input  type="radio" id="r1" name="r1" value="school" >
										          			<i  class="glyphicon glyphicon-book" style="font-size: 200px; padding: 40px 15px 0px 0px";>
										          			</i>
										          			</label>
										          		</td>
										          		<td data-toggle="buttons" class="text-center" style="margin:20px;">
										          			<label class="btn btn-warning" style="margin:20px; outline: none; width: 300px; height: 300px; border-radius: 150px; border:#ff9900 solid 2px" onclick="document.getElementById('schooldiv').style.display ='none'; document.getElementById('groupdiv').style.display ='block'; document.getElementById('schooladon').style.display ='none'; document.getElementById('txtbxUserSchoolName').required = false;">
										          			<input  type="radio" id="r2" name="r1" value="group" >
										          			<i  class="glyphicon glyphicon-user" style="font-size: 200px; padding: 30px 0px 0px 0px";>
										          			</i>
										          			</label>
										          		</td>
									          		</tr>
									          		<tr class="text-center" >
									          			<td>	
									          				<h3>SCHOOL</h3>
									          			</td>

									          			<td>	
								          					<h3>GROUP OF PEOPLE</h3>
									          			</td>
									          		</tr>
								          		</table>
							          		</center>
							       		</div>
						    		</div>
		                        </div>
                        		<br>
                        		<ul class="list-inline pull-right">
                            		<li><button id="btnFirstPage" name="btnFirstPage" type="button" class="btn btn-info btn-lg" style="margin-top:30px">PROCEED</button></li>
                        		</ul>
		                    </div>

		                    <!-- Step 2 reservation -->
                    		<div class="tab-pane" role="tabpanel" id="step2">
		                        <div style="border-bottom: 1px solid gray">
		                        	<h2>Step 2</h2>
		                        </div>
		                        <p style="font-size: 35px; color: #000; margin-bottom: 30px;">
		                            <strong>CLIENT DETAILS</strong> 
		                        </p>
		                        <div class="modal-body" style="padding:70px;">
		                        	
							            <div class="form-group">
				                            <label>First Name*</label>
				                            <input type="text" name="txtbxUserFirstName" id="txtbxUserFirstName" class="form-control" pattern="^([a-zA-Z.]+\s)*[a-zA-Z.]+$" style="text-transform:capitalize;" required="required">
				                        </div>
				                        <div class="form-group">
				                            <label>Last Name*</label>
				                            <input type="text" name="txtbxUserLastName" id="txtbxUserLastName" class="form-control" pattern="^([a-zA-Z.]+\s)*[a-zA-Z.]+$"style="text-transform:capitalize;" required="required">
				                        </div>
				                        <div class="form-group" id="schooldiv"> 
				                            <label>School Name*</label>
				                            <input type="text" name=txtbxUserSchoolName id="txtbxUserSchoolName" class="form-control" style="text-transform: capitalize;" required="required">
				                        </div>
				                        <div class="form-group" id="groupdiv" style="display:none;"> 
				                            <input type="hidden" name="HiddenUserSchoolName" class="form-control" value="NULL">
				                        </div>

				                        <div class="form-group">
				                            <label>Contact Number*</label>
				                            <input type="tel" name="txtbxUserContactNum" id="txtbxUserContactNum" class="form-control" type='tel' pattern="[0-9]{2}-[0-9]{7,9}" placeholder="Telephone: 02-xxxxxxx | Mobile: 09-xxxxxxxxx" title = "Use these format - Telephone: 02-xxxxxxx | Mobile: 09-xxxxxxxxx" required="required">
				                        </div>
				                        <div class="form-group">
				                            <label>Email Address*</label>
				                            <input type="email" name="txtbxUserEmail" id="txtbxUserEmail" class="form-control" required="required">
				                        </div>
				                        <div class="form-group">
				                            <label>Address*</label>
				                            <p>House Number, Building and Street Name*</p>
				                            <input type="text" name=txtbxAddressDetailsName id="txtbxAddressDetailsName" class="form-control" style="text-transform: capitalize;" required="required" placeholder = "Unit Number, Building Name or Lot/Block Number, House Number, Street Name">
				                            <p style="padding-top: 5px;">Province*</p>
				                            <input type="text" name=txtbxAddressProvinceName id="txtbxAddressProvinceName" class="form-control" style="text-transform: capitalize;" required="required" placeholder = "Province Name">
				                            <p style="padding-top: 5px;">City/Municipality*</p>
				                            <input type="text" name=txtbxAddressCityMunicipalityName id="txtbxAddressCityMunicipalityName" class="form-control" style="text-transform: capitalize;" required="required" placeholder = "City Name/Municipality Name">
				                            <p style="padding-top: 5px;">Barangay</p>
				                            <input type="text" name=txtbxAddressBarangayName id="txtbxAddressBarangayName" class="form-control" style="text-transform: capitalize;" required="required" placeholder = "Barangay Name">
				                        </div>

				                        <div class="form-group">
				                            <label>No of People Joining The Tour*</label>
				                            <input type="number" name="txtbxUserHeads" id="txtbxUserHeads" class="form-control" min="3" required="required">
			                        	</div> 	
				                    <br>
				                <br>
								</div>
								<ul class="list-inline pull-right" >
		                            <li><button  type="button" class="btn btn-default btn-lg prev-step">PREVIOUS</button></li>
		                            <li><button id="btnSecondPage" name="btnSecondPage" type="button" class="btn btn-info btn-lg">PROCEED</button></li>
	                        	</ul> 
                    		</div>

                    		<!--Sterp 3 reservation -->
                    		<div class="tab-pane" role="tabpanel" id="step3">
		                        <div style="border-bottom: 1px solid gray">
		                        	<h2>Step 3</h2>
		                        </div>
	                        	<p style="font-size: 35px; color: #000;">
		                            <strong>PACKAGE DETAILS</strong> 
		                        </p>
		                        <div class="modal-body" style="padding:70px 70px 0px 70px; margin-bottom: 30px;">
		                        <?php
								
								if(isset($package_ID))
								{
									
									include("TVConnectionString.php");  
									$output = '';
									if($package_type=="tour package")
									{
										include('TVClientTourAdd.php');
									}
									if($package_type=="custom package")
									{
										include('TVClientCustomAdd.php');
									}
									

								    $output .='
								    	</div>
								    ';
									echo $output;
								}
								?>
								<div class="form-group" style="padding:20px;">
		                            <!--<label>Date Applied</label>-->
		                            <br><br>
		                            <select id="dateapplied_year" class="form-control" name="dateapplied_year" style="width:33%; display:none" >
		                                <option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>
		                                <?php
		                                for ($i = 2018; $i >= 1900; $i--) 
		                                {
		                                    echo'<option  value="' . $i . '">' . $i . '</option>';
		                                }
		                                ?>
		                            </select>

		                            <select id="dateapplied_day" class="form-control" name="dateapplied_day" style="width:33%; display:none;" >
		                                <option value="<?php echo date('j'); ?>"><?php echo date('j'); ?></option>
		                                <?php
		                                for ($i = 1; $i <= 31; $i++) 
		                                {
		                                    echo'<option class=  value="' . $i . '">' . $i . '</option>';
		                                }
		                                ?>
		                            </select>
		                            <select id="dateapplied_month" class="form-control" name="dateapplied_month" style="width:33%; display:none" >
		                                <option value="<?php echo date('F'); ?>"><?php echo date('F'); ?></option>;
		                                <option value="01">January</option>
		                                <option value="02">February</option>
		                                <option value="03">March</option>
		                                <option value="04">April</option>
		                                <option value="05">May</option>
		                                <option value="06">June</option>
		                                <option value="07">July</option>
		                                <option value="08">August</option>
		                                <option value="09">September</option>
		                                <option value="10">October</option>
		                                <option value="11">November</option>
		                                <option value="12">December</option>
		                            </select>
		                        </div>
		                        <div class="form-group" style="padding:20px;">
		                            <label>Date Planned</label>
		                            <br>
		                            <select id="dateplanned_year" class="form-control" name="dateplanned_year" style="width:33%; display:inline-block;" required="required">
		                                <?php
		                                echo'<option value="">Year</option>';
		                                for ($i = 2018; $i <= 2100; $i++) {
		                                echo'<option  class=  value="' . $i . '">' . $i . '</option>';
		                                }
		                                ?>
		                            </select>

		                            <select onchange="month()" id="dateplanned_month" class="form-control" name="dateplanned_month" style="width:33%; display:inline-block;" required="required">
		                            <option value="">Month</option>;
		                            <!--<option>Month</option>;-->
		                            <option>January</option>
		                            <option>February</option>
		                            <option>March</option>
		                            <option>April</option>
		                            <option>May</option>
		                            <option>June</option>
		                            <option>July</option>
		                            <option>August</option>
		                            <option>September</option>
		                            <option>October</option>
		                            <option>November</option>
		                            <option>December</option>
		                            </select>

		                            <select id="dateplanned_day" class="form-control" name="dateplanned_day" style="width:33%; display:inline-block;" required="required">
		                                <option value="">Day</option>
		                            </select>     
		                        </div>
		                        <br>
		                        <div class="form-group" id="tourpackagediv"  style="display:none;"> 
		                            <label>Tour Package</label>
		                            <select name="dropdownTourPackageID" class="form-control">
		                                <option disbled value="NULL">--- Select Package ---</option>
		                                <?php while($row2 = mysqli_fetch_array($result2)):;?>    
		                                <option value="<?php echo $row2[0];?>|<?php echo $row2[2];?>">
		                                    <?php echo $row2[1];?>
		                                </option>
		                                    <?php endwhile;?>
		                            </select>
		                        </div>
		                        <div class="form-group" id="custompackagediv" style="display:none;"> 
		                            <label>Custom Package</label>
		                            <select name="dropdownCustomPackageID" class="form-control">
		                                <option value="NULL">--- Select Package ---</option>
		                                <?php while($row1 = mysqli_fetch_array($result1)):;?>
		                                <option value="<?php echo $row1[0];?>|<?php echo $row1[2];?>">
		                                <?php echo $row1[1];?>  
		                                </option>
		                                <?php endwhile;?>
		                            </select>
		                        </div>
		                        <div class="form-group">
		                            <input type="hidden" name="priceeach" id="priceeach" value="<?php echo $price; ?>" class="form-control">
	                        	</div>
		                        <div class="col-lg-12">
									<div class="panel panel-success">
										<div class="panel-heading text-center"><h1><strong>Price per Head</strong></h1></div>
										<h1 class="	text-center"><strong>Php <?php echo $price; ?>.00/head</strong></h1>
									</div>
								</div>
							</div>
		                        <ul class="list-inline pull-right" style="margin-top:30px">
		                            <!--<li><button type="button" class="btn btn-default next-step">Skip</button></li>-->
		                            <li><button type="button" class="btn btn-default btn-lg prev-step">PREVIOUS</button></li>
		                            <li><button id="btnThirdPage" name="btnThirdPage" type="button" class="btn btn-info btn-lg">PROCEED</button></li>
		                        </ul>
		                    </div>
		                    <!-- Step 4 reservation -->
		                    <div class="tab-pane" role="tabpanel" id="step4">
		                        <div style="border-bottom: 1px solid gray">
		                        	<h2>Step 4</h2>
		                        </div>
		                         
	                        	<p style="font-size: 35px; color: #000; margin-bottom: 30px;">
		                            <strong>PAYMENT OPTION</strong> 
		                        </p>
		                        <div class="col-lg-12">
									<div class="panel panel-success">
										<div class="panel-heading text-center"><h1><strong>Total Price</strong></h1></div>

										<h1 class="	text-center" id="totalpriceh1"></h1>
									</div>
								</div>
		                        <h2 class="text-center" > <strong>Select Mode of Payment </strong></h2>
					            <div class="form-group" >
						        	<div >
						        		<center>
							        		<table style="border-bottom: 1px  solid gray">
							        			<tr >
									          		<td data-toggle="buttons" class="text-center" style="margin:20px;">
									          			<label id="BankDeposit" class="btn btn-warning active" style="margin:20px; outline: none; width: 300px; height: 300px; border-radius: 50px; border:#ff9900 solid 2px" onclick="document.getElementById('divBankDeposit').style.display ='block'; document.getElementById('divWalkIn').style.display ='none'; document.getElementById('divMoneyRemittance').style.display ='none'; return false;" >
									          			<input  type="radio" id="radioBankDeposit" name="modeOfPayment" value="Bank Deposit" >
									          			<i  class="glyphicon glyphicon-credit-card" style="font-size: 200px; padding: 45px 0px 0px 0px";>
									          			</i>
									          			</label>
									          		</td>
									          		<td data-toggle="buttons" class="text-center" style="margin:20px;">
									          			<label id="MoneyRemittance" class="btn btn-warning active" style="margin:20px; outline: none; width: 300px; height: 300px; border-radius: 50px; border:#ff9900 solid 2px" onclick="document.getElementById('divMoneyRemittance').style.display ='block'; document.getElementById('divWalkIn').style.display ='none'; document.getElementById('divBankDeposit').style.display ='none'; return false;" >
									          			<input  type="radio" id="radioMoneyRemittance" name="modeOfPayment" value="Money Remittance" >
									          			<i  class="glyphicon glyphicon-usd" style="font-size: 200px; padding: 40px 15px 0px 0px";>
									          			</i>
									          			</label>
									          		</td>
									          		<td data-toggle="buttons" class="text-center" style="margin:20px;">
									          			<label id="WalkIn" class="btn btn-warning active" style="margin:20px; outline: none; width: 300px; height: 300px; border-radius: 50px; border:#ff9900 solid 2px" onclick="document.getElementById('divWalkIn').style.display ='block'; document.getElementById('divBankDeposit').style.display ='none'; document.getElementById('divMoneyRemittance').style.display ='none'; return false;" >
									          			<input  type="radio" id="radioWalkIn" name="modeOfPayment" value="Walk In" >
									          			<i  class="glyphicon glyphicon-user" style="font-size: 200px; padding: 40px 0px 0px 0px";>
									          			</i>
									          			</label>
									          		</td>
								          		</tr>
								          		<tr class="text-center" >
								          			<td>	
								          				<h3>Bank Deposit</h3>
								          			</td>

								          			<td>	
							          					<h3>Money Remittance</h3>
								          			</td>
								          			<td>	
							          					<h3>Walk In</h3>
								          			</td>
								          		</tr>
							          		</table>
							          		<div class="row" style="margin-top:30px"  >
									        	<div class="col-lg-12">
										            <div class="panel panel-warning	" id="divBankDeposit" style="display:none;">
										               	<div class="panel-heading">
										               		<h4>BANK ACCOUNT INFORMATION</h4>
										               	</div>
										      			<div class="panel-body tet-center">
										      				<table>
										      					<tr>
										      						<td>
										      							<h5 style="font-weight: bold">BDO Account Information</h5>
										      						</td>
										      					</tr>
										      					<tr>
										      						<td>
										      							<p> BDO Account no.:</p>
										      						</td>
										      						<td>
										      							<p> 000 251 395 758</p>
										      						</td>
										      					</tr>
										      					<tr>
										      						<td>
										      							<p> BDO Account name:</p>
										      						</td>
										      						<td>
										      							<p>TIMOTHY JOHN B CABOTAGE</p>
										      						</td>
										      					</tr>
										      				</table>
										      				<p>
										      			</div>
										      		</div>
										      	</div>
										    </div>
										    <div class="row" style="margin:0" >
									        	<div class="col-lg-12">
										            <div class="panel panel-warning" id="divMoneyRemittance" style="display:none;">
										               	<div class="panel-heading ">
										               		<h4>REMITTANCE INFORMATION</h4>
										               	</div>
										      			<div class="panel-body tet-center">
										      				<table>
										      					<tr>
										      						<td>
										      							<h5 style="font-weight: bold">Consignee Details</h5>
										      						</td>
										      					</tr>
										      					
										      					<tr>
										      						<td>
										      							<p>Name:</p>
										      						</td>
										      						<td>
										      							<p>TIMOTHY JOHN B CABOTAGE</p>
										      						</td>
										      					</tr>
										      					<tr>
										      						<td>
										      							<p>Contact No.:</p>
										      						</td>
										      						<td>
										      							<p>09085443328 / 642-1814</p>
										      						</td>
										      					</tr>
										      					<tr>
										      						<td>
										      							<p>Address:</p>
										      						</td>
										      						<td>
										      							<p>G/F One Victoria Plaza, A Mabini, Kapasigan, Pasig City</p>
										      						</td>
										      					</tr>
										      					<tr>
										      						<td>
										      							<p>Date of Birth:</p>
										      						</td>
										      						<td>
										      							<p>January 31, 1971</p>
										      						</td>
										      					</tr>
										      				</table>
										      			</div>
										      		</div>
										      	</div>
										    </div>
										    <div class="row" style="margin:0" >
									        	<div class="col-lg-12">
										            <div class="panel panel-warning" id="divWalkIn" style="display:none;">
										               	<div class="panel-heading ">
										               		<h4>OFFICE ADDRESS</h4>
										               	</div>
										      			<div class="panel-body">
										      				<table>
										      					<tr>
										      						<td>
										      							<h5 style="font-weight: bold">Office Address</h5>
										      						</td>
										      					</tr>
										      					
										      					<tr>
										      						<td>
										      							<p>See us at</p>
										      						</td>
										      						<td>
										      							<p>G/F One Victoria Plaza, A Mabini, Kapasigan, Pasig City</p>
										      						</td>
										      					</tr>
										      				</table>
							      							<img style="width: 700px;" src="../admin/Images/map.png" >
										      			</div>
										      		</div>
										      	</div>
										    </div>
										    <form class="form-group">
										    	<label>Type of Payment</label>
										    	<select id="paymenttype" class="form-control text-center" name="optionPaymentType" style="margin-left:10px;display:inline-block; width: 50%">
										    		<option value="NULL" disabled="disabled" selected="selected">--------Select Type of Payment--------</option>
					                                <option value="Partial Payment">Partial Payment</option>
					                                <option value="Full Payment">Full Payment</option>
					                            </select>
					                        </form>
						          		</center>
						       		</div>
					    		</div>
					    		<br><br><br>
		                        <ul class="list-inline pull-right">
		                            <!--<li><button type="button" class="btn btn-default next-step">Skip</button></li>-->
		                            <li><button type="button" class="btn btn-default btn-lg prev-step">PREVIOUS</button></li>
		                            <li><button type="button" class="btn btn-info btn-lg"  id="btnFourthPage">PROCEED</button></li>
		                        </ul>
		                    </div>
		                    <div class="tab-pane" role="tabpanel" id="complete">
		                    	<div style="border-bottom: 1px solid gray">
		                        	<h2>Step 5</h2>
		                        </div>
	                        	<p style="font-size: 35px; color: #000; margin-bottom: 30px" >
		                            <strong>PRIVACY POLICY</strong> 
		                        </p>
		                    	<div class="container" style="margin:50px;">
			                    	<h1>Welcome to our Privacy Policy</h1>
									TigerVision Travel and Tours Co. is located at:<br/>
									<address>
									  TigerVision Travel and Tours Co.<br/>G/F One Victoria Plaza, A. Mabini Street., Kapasigan <br/>6326334493	</address>

									<p>It is TigerVision Travel and Tours Co.’s policy to respect your privacy regarding any information we may collect while operating our website. This Privacy Policy applies to <a href="http://tigervisiontravelandtours.com">tigervisiontravelandtours.com</a> (hereinafter, "us", "we", or "tigervisiontravelandtours.com"). We respect your privacy and are committed to protecting personally identifiable information you may provide us through the Website. We have adopted this privacy policy ("Privacy Policy") to explain what information may be collected on our Website, how we use this information, and under what circumstances we may disclose the information to third parties. This Privacy Policy applies only to information we collect through the Website and does not apply to our collection of information from other sources.</p>
									<p>This Privacy Policy, together with the Terms and conditions posted on our Website, set forth the general rules and policies governing your use of our Website. Depending on your activities when visiting our Website, you may be required to agree to additional terms and conditions.</p>

									<h2>Website Visitors</h2>
									<p>Like most website operators, TigerVision Travel and Tours Co. collects non-personally-identifying information of the sort that web browsers and servers typically make available, such as the browser type, language preference, referring site, and the date and time of each visitor request. TigerVision Travel and Tours Co.’s purpose in collecting non-personally identifying information is to better understand how TigerVision Travel and Tours Co.’s visitors use its website. From time to time, TigerVision Travel and Tours Co. may release non-personally-identifying information in the aggregate, e.g., by publishing a report on trends in the usage of its website.</p>
									
									<h2>Gathering of Personally-Identifying Information</h2>
									<p>Certain visitors to TigerVision Travel and Tours Co.’s websites choose to interact with TigerVision Travel and Tours Co. in ways that require TigerVision Travel and Tours Co. to gather personally-identifying information. The amount and type of information that TigerVision Travel and Tours Co. gathers depends on the nature of the interaction. For example, we ask visitors who sign up for a blog at http://tigervisiontravelandtours.com to provide a username and email address.</p>
									
									<h2>Security</h2>
									<p>The security of your Personal Information is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.</p>

									<h2>Links To External Sites</h2>
									<p>Our Service may contain links to external sites that are not operated by us. If you click on a third party link, you will be directed to that third party's site. We strongly advise you to review the Privacy Policy and terms and conditions of every site you visit.</p>
									<p>We have no control over, and assume no responsibility for the content, privacy policies or practices of any third party sites, products or services.</p>

									<h2>Privacy Policy Changes</h2>
									<p>Although most changes are likely to be minor, TigerVision Travel and Tours Co. may change its Privacy Policy from time to time, and in TigerVision Travel and Tours Co.’s sole discretion. TigerVision Travel and Tours Co. encourages visitors to frequently check this page for any changes to its Privacy Policy. Your continued use of this site after any change in this Privacy Policy will constitute your acceptance of such change.</p>

									 <h2>Cancellation and Refund Terms and Condition</h2>			  
									 <p>Reservations that are cancelled  before the 7 - day period of partial payment will be given a full refund.</p><p> Cancellation of reservation within the 7 - day period of partial payment will only be given 50% refund of the partial payment of 75% of the full payment.</p><p> Cancellation within the 3 - day period of full payment and processing will recieve 50% refund. </p><p> Reservations that are cancelled in the day of the trip will not be given a refund</p>						  
									 <h2>Payment Policy</h2>			  
									 <p>Reservations must be placed 15 days before the day of tour in order to review and process the reservation thoroughly. Payments must be settled half the total price (50%) 7 days before the tour in order for us to consider processing the reservation and fully (100%) 3 days before the day of the trip, otherwise the tour will be for re-scheduling or cancellation.</p>	

									  <h2>Insurance</h2>			  
									 <p>Php 100,000.00 comprehensive insurance coverage with Medical Reimbursement for each of the students, teachers and staff joining the tour while on-board.</p>	
								</div>		
			
								
								<br>
								<div class="checkbox text-center ">
								  	<label>
								    <input name="agreecheck" id="agreecheck" type="checkbox" value="">
								    <span class="cr" style="top:4px;" ><i class="cr-icon glyphicon glyphicon-ok" ></i></span>
								    </label>
								    <h4 style="display:inline;">I Agree to the Terms and Conditions</h4>
								</div>
								<ul class="list-inline pull-right">
		                            <!--<li><button type="button" class="btn btn-default next-step">Skip</button></li>-->
		                            <li><button type="button" class="btn btn-default btn-lg prev-step">PREVIOUS</button></li>
		                            <li ><input name="btnFinish" id="btnFinish" type="submit" class="btn btn-info btn-lg" disabled="disabled" value="FINISH"></li>
		                        </ul>
		                    </div>
	                    	<div class="clearfix"></div>
	                	</div>
	                </form>
	       		</div>
	       		<?php
	       		include 'TVClientReservationAdd.php';
	       		?>
	    	</section>
	   </div>
	</div>
                
			</div>
		</div>
	</body>
	<script>
    	$( "#btnFirstPage" ).click(function() {
		  	if (!$("input[name=r1]:checked").val()) 
		  	{
		       alert('Please choose a client type!');
		    }
		    else
		    {
		    	var $active = $('.wizard .nav-tabs li.active');
		        $active.next().removeClass('disabled');
		        nextTab($active);
		        $('html, body').animate({scrollTop: '0px'}, 0);
		    }
		});
    </script>
    <script>
   	$( "#btnSecondPage" ).click(function() 
	{
		var fname = document.getElementById('txtbxUserFirstName');
		var lname = document.getElementById('txtbxUserLastName');
		var schoolname = document.getElementById('txtbxUserSchoolName');
		var email = document.getElementById('txtbxUserEmail');
		var contactno = document.getElementById('txtbxUserContactNum');
		var addressProvince = document.getElementById('txtbxAddressProvinceName');
		var addressCityMunicipality = document.getElementById('txtbxAddressCityMunicipalityName');
		var addressDetails = document.getElementById('txtbxAddressDetailsName');
		var heads = document.getElementById('txtbxUserHeads');

		if(!fname.checkValidity())
		{
			alert('Invalid First Name');
		}
		else if(!lname.checkValidity())
		{
			alert('Invalid Last Name');
		}
		else if(!schoolname.checkValidity())
		{
			alert('Invalid School Name');
		}
		else if(!email.checkValidity())
		{
			alert('Invalid Email');
		}
		else if(!contactno.checkValidity())
		{
			alert('Invalid Contact No');
		}
		else if(!addressProvince.checkValidity())
		{
			alert('Input Province');
		}
		else if(!addressCityMunicipality.checkValidity())
		{
			alert('Input City/Municipality');
		}
		else if(!addressDetails.checkValidity())
		{
			alert('Input Address Details');
		}
		else if(!heads.checkValidity())
		{
			alert('Invalid No of Heads');
		}

		else
		{
	  		var priceeach = document.getElementById("priceeach").value;
			var heads = document.getElementById("txtbxUserHeads").value;
			var totalPrice =priceeach*heads;
			document.getElementById("totalpriceh1").innerHTML = "<strong> Php " + totalPrice +".00 </strong>";
	    	var $active = $('.wizard .nav-tabs li.active');
	        $active.next().removeClass('disabled');
	        nextTab($active);
	        $('html, body').animate({scrollTop: '0px'}, 0);
	    }
	});
	</script>
    	<?php 
		            $TempDateAppliedYear = date('Y');
		            $TempDateAppliedDay = date('j');
		            $TempDateAppliedMonth = date('F');
		                    
		            $VarcharUserDateApplied =  date('Y j F');
		            $VarcharUserDateApplied2 =  date('Y/j/F');
					
		            $DateAppliedString = strtotime($VarcharUserDateApplied2);
		    	?>
    <script>
		$( "#btnThirdPage" ).click(function()
			{
				var month = document.getElementById('dateplanned_month').value;
				var day = document.getElementById('dateplanned_day').value;
				var year = document.getElementById('dateplanned_year').value;
				var monthcheck = document.getElementById('dateplanned_month');
				var daycheck = document.getElementById('dateplanned_day');
				var yearcheck = document.getElementById('dateplanned_year');
				var DatePlannedString = month+'/'+day+'/'+year;
				var DatePlannedString = new Date(DatePlannedString);
				var DateIntervalString = new Date (<?php echo $DateAppliedString; ?>);
				DateIntervalString.setDate(DateIntervalString.getDate()+15);

				if(!yearcheck.checkValidity())
				{
					alert('Invalid Year');
				}
				else if(!monthcheck.checkValidity())
				{
					alert('Invalid Month');
				}
				else if(!daycheck.checkValidity())
				{
					alert('Invalid Day');
				}
				else if(DatePlannedString <= DateIntervalString)
				{
					alert('Date Planned Must Be 15 Days or More, Higher Than Date Applied');
				}
				else
			    {
			    	var $active = $('.wizard .nav-tabs li.active');
			        $active.next().removeClass('disabled');
			        nextTab($active);
			        $('html, body').animate({scrollTop: '0px'}, 0);
			    }

			});
	</script>

    <script>
    	$( "#btnFourthPage" ).click(function() {
		  	if (!$("input[name=modeOfPayment]:checked").val()) 
		  	{
		       alert('Please select a payment menthod!');
		    }
		    else if(!$('#paymenttype').val())
		    {
		    	alert('Please select a payment type!');
		    }
		    else
		    {
		    	var $active = $('.wizard .nav-tabs li.active');
		        $active.next().removeClass('disabled');
		        nextTab($active);
		        $('html, body').animate({scrollTop: '0px'}, 0);
		    }
		    
		});
    </script>

    <script>
    	$( "#agreecheck" ).click(function() 
    	{
    		if($('#agreecheck').is(':checked')) { 
                document.getElementById("btnFinish").disabled = false;
            } else {
                document.getElementById("btnFinish").disabled = true;
            }
		});
    </script>
	<script>
    	var d = document.getElementById("div1");
			d.className += " otherclass";
    </script>
	<script src="js/TVReservationForm.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</html>
