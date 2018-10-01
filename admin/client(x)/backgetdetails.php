<?php

if(isset($_POST['package_ID']))
{
	include("TVConnectionString.php");  
	$output = '';
	$packageDetailsQuery="SELECT * FROM tbl_tourpackage WHERE  package_ID='".$_POST['package_ID']."'";
	$packageDetailsResult = mysqli_query($connect,$packageDetailsQuery);

	while ($row = mysqli_fetch_array($packageDetailsResult))
	{
		$price=$row["package_pricePerHead"];
		$output .='
			<div class="col-lg-12">
				<div class="panel panel-success">
					<div class="panel-heading text-center"><h1><strong>'.$row["package_name"].'</strong></h1></div>
				</div>
			</div>
				';
		$output .= '
        <div class="row" style="margin:0">
        	<div class="col-lg-6">
	            <div class="panel panel-warning" style=" height:270px;">
	               	<div class="panel-heading text-center">
	               		<h4>DESTINATIONS</h4>
	               	</div>
	      			<div class="panel-body">';
	                	if(!empty($row['package_destination1']))
						{
		                	$destination1=$row['package_destination1'];
							$getDestinationNameQuery1 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination1";
							$getDestinationNameArray1 = mysqli_query($connect, $getDestinationNameQuery1);
							while($destination = mysqli_fetch_array($getDestinationNameArray1)):;

		                    $output .= '<h4 style="padding: 0px 50px 0px 50px;"><strong><span class="glyphicon glyphicon-map-marker" ></span>   '.$destination[1].'</strong></h4>';
		                    endwhile;
	                	}	
	                	if(!empty($row['package_destination2']))
						{
		                	$destination2=$row['package_destination2'];
							$getDestinationNameQuery2 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination2";
							$getDestinationNameArray2 = mysqli_query($connect, $getDestinationNameQuery2);
							while($destination = mysqli_fetch_array($getDestinationNameArray2)):;

		                    $output .= '<h4 style="padding: 0px 50px 0px 50px;"><strong><span class="glyphicon glyphicon-map-marker" ></span>   '.$destination[1].'</strong></h4>';
		                    endwhile;
		                }
		                if(!empty($row['package_destination3']))
						{
		                    $destination3=$row['package_destination3'];
							$getDestinationNameQuery3 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination3";
							$getDestinationNameArray3 = mysqli_query($connect, $getDestinationNameQuery3);
							while($destination = mysqli_fetch_array($getDestinationNameArray3)):;

		                    $output .= '<h4 style="padding: 0px 50px 0px 50px;"><strong><span class="glyphicon glyphicon-map-marker" ></span>   '.$destination[1].'</strong></h4>';
		                    endwhile;
		                }
		                if(!empty($row['package_destination4']))
						{
		                    $destination4=$row['package_destination4'];
							$getDestinationNameQuery4 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination4";
							$getDestinationNameArray4 = mysqli_query($connect, $getDestinationNameQuery4);
							while($destination = mysqli_fetch_array($getDestinationNameArray4)):;

		                    $output .= '<h4 style="padding: 0px 50px 0px 50px;"><strong><span class="glyphicon glyphicon-map-marker" ></span>   '.$destination[1].'</strong></h4>';
		                    endwhile;
		                }
		                if(!empty($row['package_destination5']))
						{
		                    $destination5=$row['package_destination5'];
							$getDestinationNameQuery5 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination5";
							$getDestinationNameArray5 = mysqli_query($connect, $getDestinationNameQuery5);
							while($destination = mysqli_fetch_array($getDestinationNameArray5)):;

		                    $output .= '<h4 style="padding: 0px 50px 0px 50px;"><strong><span class="glyphicon glyphicon-map-marker" ></span>   '.$destination[1].'</strong></h4>';
		                    endwhile;
		                }

$output .='	
					</div>
				</div>
			</div>
		';
	}
	
	$output .='
			<div class="col-lg-6">
				<div class="panel panel-warning" style=" height:270px">
					<div class="panel-heading text-center"><h4>PACKAGE INCLUSIONS</h4></div>
					<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-ok" ></span>   Entrance Fees / Parking Fees / Toll Fees </strong></h5>
					<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-ok" ></span>   Free Tarpaulin </strong></h5>
					<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-ok" ></span>   Games and Prizes</strong></h5>
					<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-ok" ></span>  TIGERVISION TRAVEL & TOURS CO. "Safety Guide and Risk Management Handout for Educational Field Trip"</strong></h5>
				</div>
			</div>
				';
	$output .='
			<div class="col-lg-12">
				<div class="panel panel-warning" style=" height:270px">
					<div class="panel-heading text-center"><h4>BENEFITS</h4></div>
					<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-ok" ></span>   Air-conditioned tourist bus equipped with TV, DVD, and sound system with maximum sitting capacity of 49 persons. 45 bus payees + 4 teachers.</strong></h5>
					<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-ok" ></span>  Php 100,000.00 comprehensive insurance coverage with Medical Reimbursement for each of the students, teachers and staff joining the tour while on-board.</strong></h5>
					<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-ok" ></span>   Programming and reservation on the chosen iteneraries.</strong></h5>
					<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-ok" ></span>  Redcross Emergency First-Aid and Basic Life Support Trained Tour Facilitator.</strong></h5>

				</div>
			</div>
				';	

	$output .='
			<div class="col-lg-12">
				<div class="panel panel-success">
					<div class="panel-heading text-center"><h1><strong>PHP '.$price.'.00/head</strong></h1></div>
				</div>
			</div>
				';

    $output .='
    	</div>
    ';
	echo $output;

}
?>