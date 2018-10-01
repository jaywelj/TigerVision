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
				<p style="font-family: Strawberry Blossom; font-size:100px; text-align: center; border-style:solid; border-color: #ff9900; border-right:none; border-left: none; margin-bottom:50px">Tour Packages</p>
				
				<?php
                include("TVConnectionString.php");  
                $packageQuery = "SELECT * FROM tbl_tourpackage WHERE package_purgeFlag = 1 ORDER BY package_ID  DESC";  
                $packageArray = mysqli_query($connect, $packageQuery);  
                ?>

                <?php
                

	            $tablenumber=1;
                while($row = mysqli_fetch_array($packageArray))  
                {  
	                $column=0;
	             	echo '<table class="tables" >
						<caption style="font-family: Strawberry Blossom; font-size: 50px; border: 2px solid #ff9900;">'.$row['package_name'].'<caption>
						<tr id="_trPackages" style="height:300px;">';
						if(!empty($row['package_destination1']))
						{
							echo '
							<td width="20%" >';
								$destination1=$row['package_destination1'];
								$getDestinationNameQuery1 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination1 AND destination_ID != 1";
								$getDestinationNameArray1 = mysqli_query($connect, $getDestinationNameQuery1);
								while($destination = mysqli_fetch_array($getDestinationNameArray1)):;
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($destination[6]).'"width="250px" />';                                endwhile;	
							echo '</td">';
						}
						if(!empty($row['package_destination2']))
						{
							echo '
							<td width="20%">';
								$destination2=$row['package_destination2'];
								$getDestinationNameQuery2 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination2 AND destination_ID != 1";
								$getDestinationNameArray2 = mysqli_query($connect, $getDestinationNameQuery2);
								while($destination = mysqli_fetch_array($getDestinationNameArray2)):;
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($destination[6]).'"width="250px" />';                                endwhile;	
							echo '</td">';
						}
						if(!empty($row['package_destination3']))
						{
							echo '
							<td width="20%">';
								$destination3=$row['package_destination3'];
								$getDestinationNameQuery3 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination3 AND destination_ID != 1";
								$getDestinationNameArray3 = mysqli_query($connect, $getDestinationNameQuery3);
								while($destination = mysqli_fetch_array($getDestinationNameArray3)):;
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($destination[6]).'"width="250px" />';                                endwhile;	
							echo '</td">';
						}
						if(!empty($row['package_destination4']))
						{
							echo '
							<td width="20%">';
								$destination4=$row['package_destination4'];
								$getDestinationNameQuery4 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination4 AND destination_ID != 1";
								$getDestinationNameArray4 = mysqli_query($connect, $getDestinationNameQuery4);
								while($destination = mysqli_fetch_array($getDestinationNameArray4)):;
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($destination[6]).'"width="250px" />';                                endwhile;	
							echo '</td">';
						}
						if(!empty($row['package_destination5']))
						{
							echo '
							<td width="20%">';
								$destination5=$row['package_destination5'];
								$getDestinationNameQuery5 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination5 AND destination_ID != 1";
								$getDestinationNameArray5 = mysqli_query($connect, $getDestinationNameQuery5);
								while($destination = mysqli_fetch_array($getDestinationNameArray5)):;
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($destination[6]).'"width="250px" />';                                endwhile;	
							echo '</td">';
						}
						echo'</tr>
						<tfoot>';	
						$tablenumber++;
						if(!empty($row['package_destination1']))
						{
							echo '
							<td style="border: 2px solid #ff9900;">';
								$destination1=$row['package_destination1'];
								$getDestinationNameQuery1 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination1 AND destination_ID != 1";
								$getDestinationNameArray1 = mysqli_query($connect, $getDestinationNameQuery1);
								while($destination = mysqli_fetch_array($getDestinationNameArray1)):;

                                echo '<strong>'.$destination[1].'</strong>';
                                echo '<br>';
                                echo $destination[2];
                                endwhile;
							echo'</td">';
						}
						if(!empty($row['package_destination2']))
						{
							echo '
							<td style="border: 2px solid #ff9900;">';
								$destination2=$row['package_destination2'];
								$getDestinationNameQuery2 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination2 AND destination_ID != 1";
								$getDestinationNameArray2 = mysqli_query($connect, $getDestinationNameQuery2);
								while($destination = mysqli_fetch_array($getDestinationNameArray2)):;

                                echo '<strong>'.$destination[1].'</strong>';
                                echo '<br>';
                                echo $destination[2];
                                endwhile;
							echo'</td">';
						}
						if(!empty($row['package_destination3']))
						{
							echo '
							<td style="border: 2px solid #ff9900;">';
								$destination3=$row['package_destination3'];
								$getDestinationNameQuery3 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination3 AND destination_ID != 1";
								$getDestinationNameArray3 = mysqli_query($connect, $getDestinationNameQuery3);
								while($destination = mysqli_fetch_array($getDestinationNameArray3)):;

                                echo '<strong>'.$destination[1].'</strong>';
                                echo '<br>';
                                echo $destination[2];
                                endwhile;
							echo'</td">';
						}
						if(!empty($row['package_destination4']))
						{
							echo '
							<td style="border: 2px solid #ff9900;">';
								$destination4=$row['package_destination1'];
								$getDestinationNameQuery4 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination4 AND destination_ID != 1";
								$getDestinationNameArray4 = mysqli_query($connect, $getDestinationNameQuery4);
								while($destination = mysqli_fetch_array($getDestinationNameArray4)):;

                               echo '<strong>'.$destination[1].'</strong>';
                                echo '<br>';
                                echo $destination[2];
                                endwhile;
							echo'</td">';
						}
						if(!empty($row['package_destination5']))
						{
							echo '
							<td style="border: 2px solid #ff9900;">';
								$destination5=$row['package_destination1'];
								$getDestinationNameQuery5 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination5 AND destination_ID != 1";
								$getDestinationNameArray5 = mysqli_query($connect, $getDestinationNameQuery5);
								while($destination = mysqli_fetch_array($getDestinationNameArray5)):;

                                echo '<strong>'.$destination[1].'</strong>';
                                echo '<br>';
                                echo $destination[2];
                                endwhile;
							echo'</td">';
						}
						//echo "<script type='text/javascript'>alert('tablenumber$tablenumber');</script>";

						echo '
						</tfoot>
					</table>
					<center>
						<input type="button" value="BOOK PACKAGE" id="'.$row['package_ID'].'" style="font-family:Arial;font-size:30px; width:30%; font-weight:bold;" class="btn btn-info btn-lg btnBook" >
					</center>
					
					<br> <br> <br> <br> <br> <br>';
				}
                ?>
						<label class="text-center" style="font-family: Strawberry Blossom; font-size: 50px; border: 2px solid #ff9900; width:100%;">Don't like any of our package?</label>
                		<center>
						<input type="button" value="CREATE YOUR OWN PACKAGE" id="btnCreateYouOwn" style="font-family:Arial; font-weight:bold; width:100%; height:300px; font-size:50px;" class="btn btn-info btn-lg btnCreate" >
					</center>
					<br> <br> <br> <br> <br> <br>
			</div>
		</div>
	</body>






	<!--Modal Show Package Details-->
        <div id="reserve_package_modal" class="modal fade">
          <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius:35px;">
              <div class="modal-header" style="background-color: #f6c25f; border-radius:35px 35px 0px 0px; color:white">
                <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal" style="margin:7px 7px 0px 0px;"></button>
                <h4 class="modal-title text-center" style="margin-left: 25px;" Book Package><strong> PACKAGE DETAILS</strong> </h4>
              </div>
              <div class="modal-body" id="modalBody">
                <form method="post" id="insert_form">                
                </form>
              </div>
              <a title="Edit" id="confirmPackage" href="" class="btn btn-warning modal-footer " style="width:100%; border-radius: 0px 0px 35px 35px">
		        <h4  class="text-center"><strong>CONFIRM TOUR PACKAGE</strong></h4>
		      </a>
            </div>
          </div>
        </div>
    <!--/Modal Show Package Details-->
    <?php

        // php select option value from database
    	include("TVConnectionString.php");

        // mysql select query
    	$query = "SELECT * FROM `tbl_destination`";

        // for method 1/
    	$result1 = mysqli_query($connect, $query);
    	$result2 = mysqli_query($connect, $query);
    	$result3 = mysqli_query($connect, $query);
    	$result4 = mysqli_query($connect, $query);
    	$result5 = mysqli_query($connect, $query);

    	?>
    <!--Modal Create Your Own-->
        <div id="create_package_modal" class="modal fade">
          <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius:35px;">
              <div class="modal-header" style="background-color: #f6c25f; border-radius:35px 35px 0px 0px; color:white">
                <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal" style="margin:7px 7px 0px 0px;"></button>
                <h4 class="modal-title text-center" style="margin-left: 25px;" Book Package><strong> CREATE YOUR OWN PACKAGE</strong> </h4>
              </div>
              <form method="post" id="insert_form">
              <div class="modal-body" id="modalBody">
              	<div class="content" style="margin:10px 50px 10px 50px; ">
	                
	    				<div class="form-group">
	    					<label>Package Name</label>
	    					<input type="text" name="txtbxPackageName" class="form-control">
	    				</div>
	    				<div class="form-group"> 
	    					<label>Package Description</label>
	    					<textarea 
	    					id="text" 
	    					cols="40" 
	    					rows="4" 
	    					name="txtbxPackageDescription" 
	    					class="form-control"
	    					placeholder="Package Description"></textarea>
	    				</div>
	        			<!--<div class="form-group">
	        				<label>Price per head</label>
	        				<input type="text" name="txtbxPackagePrice" class="form-control">
	        			</div>-->
	        			<div class="form-group">
	        				<label>Destination </label>
	        			</div>
	        			<div class="form-group">
	        				<select name="Select1" class="form-control">
	        					<option value="NULL" selected>select a destination</option>
	        					<?php while($row = mysqli_fetch_array($result1)):;?>
	        						<option value="<?php echo $row[0];?>|<?php echo $row[8];?>"><?php echo $row[1];?></option>
	        					<?php endwhile;?>
	        				</select>
	        			</div>
	        			<div class="form-group">
	        				<select name="Select2" class="form-control">
	        					<option value="NULL" selected>select a destination</option>
	        					<?php while($row = mysqli_fetch_array($result2)):;?>
	        						<option value="<?php echo $row[0];?>|<?php echo $row[8];?>"><?php echo $row[1];?></option>
	        					<?php endwhile;?>
	        				</select>
	        			</div>
	        			<div class="form-group">
	        				<select name="Select3" class="form-control">
	        					<option value="NULL" selected>select a destination</option>
	        					<?php while($row = mysqli_fetch_array($result3)):;?>
	        						<option value="<?php echo $row[0];?>|<?php echo $row[8];?>"><?php echo $row[1];?></option>
	        					<?php endwhile;?>
	        				</select>
	        			</div>
	        			<div class="form-group">
	        				<select name="Select4" class="form-control">
	        					<option value="NULL" selected>select a destination</option>
	        					<?php while($row = mysqli_fetch_array($result4)):;?>
	        						<option value="<?php echo $row[0];?>|<?php echo $row[8];?>"><?php echo $row[1];?></option>
	        					<?php endwhile;?>
	        				</select>
	        			</div>
	        			<div vaclass="form-group">
	        				<select name="Select5" class="form-control">
	        					<option value="NULL" selected>select a destination </option>
	        					<?php while($row = mysqli_fetch_array($result5)):;?>
	        						<option value="<?php echo $row[0];?>|<?php echo $row[8];?>"><?php echo $row[1];?></option>
	        					<?php endwhile;?>
	        				</select>
	        			</div>
	        			<p></p>
	                
           	 	</div>
              </div >
              
              <input type="submit" title="Confirm" id="btnConfirmPackage" name="btnConfirmPackage" class="btn btn-warning modal-footer  " style="width:100%; border-radius: 0px 0px 35px 35px; outline:none; font-weight: bold; font-size: 20px; text-align: center;" value="CONFIRM TOUR PACKAGE">
              </form>
            </div>
          </div>
        </div>
        <?php
			//including the database connection file
			include_once("TVConnectionString.php");

			if(isset($_POST['btnConfirmPackage'])) 
			{
				$varcharPackageName = mysqli_real_escape_string($connect, $_POST['txtbxPackageName']);
				$varcharPackageDescription = mysqli_real_escape_string($connect, $_POST['txtbxPackageDescription']);
				//$varcharPackagePrice = mysqli_real_escape_string($connect, $_POST['txtbxPackagePrice']);
                $varcharPackageType = "custom package";
				$tempDestination1 = $_POST['Select1'];
                $result_explode1 = explode('|', $tempDestination1);
                $varcharDestination1 = $result_explode1[0];
                $varcharDestination1Price = $result_explode1[1];

                $tempDestination2 = $_POST['Select2'];
                $result_explode2 = explode('|', $tempDestination2);
                $varcharDestination2 = $result_explode2[0];
                $varcharDestination2Price = $result_explode2[1];

                $tempDestination3 = $_POST['Select3'];
                $result_explode3 = explode('|', $tempDestination3);
                $varcharDestination3 = $result_explode3[0];
                $varcharDestination3Price = $result_explode3[1];

                $tempDestination4 = $_POST['Select4'];
                $result_explode4 = explode('|', $tempDestination4);
                $varcharDestination4 = $result_explode4[0];
                $varcharDestination4Price = $result_explode4[1];

                $tempDestination5 = $_POST['Select5'];
                $result_explode5 = explode('|', $tempDestination5);
                $varcharDestination5 = $result_explode5[0];
                $varcharDestination5Price = $result_explode5[1];
                $varcharAdditionalPrice = 490;
                $varcharPackagePrice = $varcharDestination1Price + $varcharDestination2Price +$varcharDestination3Price + $varcharDestination4Price + $varcharDestination5Price + $varcharAdditionalPrice;

				// checking empty fields
				if(empty($varcharPackageName)) 
				{
					if(empty($varcharPackageName)) 
					{
						echo "<font color='red'>Name field is empty.</font><br/>";
					}
				} 
				else 
				{
                    $queryAdd = "INSERT INTO tbl_createnewpackage(np_name,np_description,np_pricePerHead,np_destination1,np_destination2,np_destination3,np_destination4,np_destination5) VALUES('$varcharPackageName','$varcharPackageDescription','$varcharPackagePrice',$varcharDestination1,$varcharDestination2,$varcharDestination3,$varcharDestination4,$varcharDestination5)";
                    if(mysqli_query($connect, $queryAdd))
                    {
                    	$last_id = mysqli_insert_id($connect);
                        $message = "Package added successfully!";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        //redirectig to the display page. In our case, it is index.php
                        echo "<script type='text/javascript'>location.href = 'TVReservationForm.php?id=".$last_id."&type=custom package';</script>";

                    }
				}
			}
			?>
    <!--/Create Your Owns-->
	<footer>
		<div class="contacts" align="center" style="font-family: Eras ITC; font-size: 15px; border-style:solid; border-color: #ff9900; 		border-right:none; border-left: none; margin-bottom: 0px; margin-top: 20px; background-color: #ff9900;">
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
