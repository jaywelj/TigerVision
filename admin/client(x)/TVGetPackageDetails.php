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
				<div class="panel panel-default">
					<div class="panel-heading text-center"><p style="font-family: Strawberry Blossom; font-size:100px; text-align: center; border-style:solid; border-color: #ff9900; border-right:none; border-left: none; ">'.$row["package_name"].'</p></div>
				</div>
			</div>
				';
		$output .= '
        <div class="row" style="margin:0">
        	<div class="col-lg-12">
	            <div class="panel panel-warning text-center" >
	               	<div class="panel-heading text-center">
	               		<h4>DESTINATIONS</h4>
	               	</div>
	      			<div class="panel-body tet-center">';
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
		$output .= '
        <div class="row" style="margin:0">
        	<div class="col-lg-12">
	            <div class="panel panel-warning">
	               	<div class="panel-heading text-center">
	               		<h4>PACKAGE DESCRIPTION</h4>
	               	</div>
	      			<div class="panel-body tet-center">';
	                	if(!empty($row['package_destination1']))
						{
		                	$destination1=$row['package_destination1'];
							$getDestinationNameQuery1 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination1";
							$getDestinationNameArray1 = mysqli_query($connect, $getDestinationNameQuery1);
							while($destination = mysqli_fetch_array($getDestinationNameArray1)):;

		                    $output .= '<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-plus" ></span>   '.$destination[7].'</h5>';
		                    endwhile;
	                	}	
	                	if(!empty($row['package_destination2']))
						{
		                	$destination2=$row['package_destination2'];
							$getDestinationNameQuery2 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination2";
							$getDestinationNameArray2 = mysqli_query($connect, $getDestinationNameQuery2);
							while($destination = mysqli_fetch_array($getDestinationNameArray2)):;

		                    $output .= '<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-plus" ></span>   '.$destination[7].'</h5>';
		                    endwhile;
		                }
		                if(!empty($row['package_destination3']))
						{
		                    $destination3=$row['package_destination3'];
							$getDestinationNameQuery3 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination3";
							$getDestinationNameArray3 = mysqli_query($connect, $getDestinationNameQuery3);
							while($destination = mysqli_fetch_array($getDestinationNameArray3)):;

		                    $output .= '<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-plus" ></span>   '.$destination[7].'</h5>';
		                    endwhile;
		                }
		                if(!empty($row['package_destination4']))
						{
		                    $destination4=$row['package_destination4'];
							$getDestinationNameQuery4 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination4";
							$getDestinationNameArray4 = mysqli_query($connect, $getDestinationNameQuery4);
							while($destination = mysqli_fetch_array($getDestinationNameArray4)):;

		                    $output .= '<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-plus" ></span>   '.$destination[7].'</h5>';
		                    endwhile;
		                }
		                if(!empty($row['package_destination5']))
						{
		                    $destination5=$row['package_destination5'];
							$getDestinationNameQuery5 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination5";
							$getDestinationNameArray5 = mysqli_query($connect, $getDestinationNameQuery5);
							while($destination = mysqli_fetch_array($getDestinationNameArray5)):;

		                    $output .= '<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-plus" ></span>   '.$destination[7].'</h5>';
		                    endwhile;
		                }

$output .='	
					</div>
				</div>
			</div>
		';
	}
	

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