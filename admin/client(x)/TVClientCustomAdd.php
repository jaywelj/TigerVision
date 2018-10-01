									<?php 
									include('TVConnectionString.php');
									$packageDetailsQuery="SELECT * FROM tbl_createnewpackage WHERE  np_ID=$package_ID";
									$packageDetailsResult = mysqli_query($connect,$packageDetailsQuery);
									while ($row = mysqli_fetch_array($packageDetailsResult))
									{
										$price=$row["np_pricePerHead"];
										
										$output .= '
								        <div class="row" style="margin:0">
								        	<div class="col-lg-12">
									            <div class="panel panel-warning text-center	" >
									            	<div class="col-lg-12">
														<div class="panel panel-default">
															<div class="panel-heading text-center"><p style="font-family: Strawberry Blossom; font-size:100px; text-align: center; border-style:solid; border-color: #ff9900; border-right:none; border-left: none; ">'.$row["package_name"].'</p></div>
														</div>
													</div>
									               	<div class="panel-heading text-center">
									               		<h4>DESTINATIONS</h4>
									               	</div>
									      			<div class="panel-body tet-center">';
									                	if(!empty($row['np_destination1']))
														{
															
										                	$destination1=$row['np_destination1'];
															$getDestinationNameQuery1 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination1";
															$getDestinationNameArray1 = mysqli_query($connect, $getDestinationNameQuery1);
															while($destination = mysqli_fetch_array($getDestinationNameArray1)):;

										                    $output .= '<h4 style="padding: 0px 50px 0px 50px;"><strong><span class="glyphicon glyphicon-map-marker" ></span>   '.$destination[1].'</strong></h4>';
										                    endwhile;
									                	}	
									                	if(!empty($row['np_destination2']))
														{
															
										                	$destination2=$row['np_destination2'];
															$getDestinationNameQuery2 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination2";
															$getDestinationNameArray2 = mysqli_query($connect, $getDestinationNameQuery2);
															while($destination = mysqli_fetch_array($getDestinationNameArray2)):;

										                    $output .= '<h4 style="padding: 0px 50px 0px 50px;"><strong><span class="glyphicon glyphicon-map-marker" ></span>   '.$destination[1].'</strong></h4>';
										                    endwhile;
										                }
										                if(!empty($row['np_destination3']))
														{
															
										                    $destination3=$row['np_destination3'];
															$getDestinationNameQuery3 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination3";
															$getDestinationNameArray3 = mysqli_query($connect, $getDestinationNameQuery3);
															while($destination = mysqli_fetch_array($getDestinationNameArray3)):;

										                    $output .= '<h4 style="padding: 0px 50px 0px 50px;"><strong><span class="glyphicon glyphicon-map-marker" ></span>   '.$destination[1].'</strong></h4>';
										                    endwhile;
										                }
										                if(!empty($row['np_destination4']))
														{
															
										                    $destination4=$row['np_destination4'];
															$getDestinationNameQuery4 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination4";
															$getDestinationNameArray4 = mysqli_query($connect, $getDestinationNameQuery4);
															while($destination = mysqli_fetch_array($getDestinationNameArray4)):;

										                    $output .= '<h4 style="padding: 0px 50px 0px 50px;"><strong><span class="glyphicon glyphicon-map-marker" ></span>   '.$destination[1].'</strong></h4>';
										                    endwhile;
										                }
										                if(!empty($row['np_destination5']))
														{
															
										                    $destination5=$row['np_destination5'];
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
									                	if(!empty($row['np_destination1']))
														{
															
										                	$destination1=$row['np_destination1'];
															$getDestinationNameQuery1 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination1";
															$getDestinationNameArray1 = mysqli_query($connect, $getDestinationNameQuery1);
															while($destination = mysqli_fetch_array($getDestinationNameArray1)):;

										                    $output .= '<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-plus" ></span>   '.$destination[7].'</h5>';
										                    endwhile;
									                	}	
									                	if(!empty($row['np_destination2']))
														{
															
										                	$destination2=$row['np_destination2'];
															$getDestinationNameQuery2 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination2";
															$getDestinationNameArray2 = mysqli_query($connect, $getDestinationNameQuery2);
															while($destination = mysqli_fetch_array($getDestinationNameArray2)):;

										                    $output .= '<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-plus" ></span>   '.$destination[7].'</h5>';
										                    endwhile;
										                }
										                if(!empty($row['np_destination3']))
														{
															
										                    $destination3=$row['np_destination3'];
															$getDestinationNameQuery3 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination3";
															$getDestinationNameArray3 = mysqli_query($connect, $getDestinationNameQuery3);
															while($destination = mysqli_fetch_array($getDestinationNameArray3)):;

										                    $output .= '<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-plus" ></span>   '.$destination[7].'</h5>';
										                    endwhile;
										                }
										                if(!empty($row['np_destination4']))
														{
															
										                    $destination4=$row['np_destination4'];
															$getDestinationNameQuery4 ="SELECT * FROM tbl_destination WHERE destination_ID = $destination4";
															$getDestinationNameArray4 = mysqli_query($connect, $getDestinationNameQuery4);
															while($destination = mysqli_fetch_array($getDestinationNameArray4)):;

										                    $output .= '<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-plus" ></span>   '.$destination[7].'</h5>';
										                    endwhile;
										                }
										                if(!empty($row['np_destination5']))
														{
															
										                    $destination5=$row['np_destination5'];
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
										$output .='
												<div class="col-lg-12">
													<div class="panel panel-warning">
														<div class="panel-heading text-center"><h4>PACKAGE INCLUSIONS</h4></div>
														<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-ok" ></span>   Entrance Fees / Parking Fees / Toll Fees </strong></h5>
														<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-ok" ></span>   Free Tarpaulin </strong></h5>
														<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-ok" ></span>   Games and Prizes</strong></h5>
														<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-ok" ></span>  TIGERVISION TRAVEL & TOURS CO. "Safety Guide and Risk Management Handout for Educational Field Trip"</strong></h5>
														<div id="schooladon" class="text-success"><h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-ok" ></span>  <strong>4 Teachers for every bus with 45 students will be FREE OF CHARGE (45+4 teachers)</strong></h5>
														<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-ok" ></span>  <strong> Meal allowance of Php 200.00 per teacher, maximum of 4 teachers</strong></h5></div>
													</div>
												</div>
													';
										$output .='
												<div class="col-lg-12">
													<div class="panel panel-warning" >
														<div class="panel-heading text-center"><h4>BENEFITS</h4></div>
														<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-ok" ></span>   Air-conditioned tourist bus equipped with TV, DVD, and sound system with maximum sitting capacity of 49 persons.</strong></h5>
														<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-ok" ></span>  Php 100,000.00 comprehensive insurance coverage with Medical Reimbursement for each of the passengers joining the tour while on-board.</strong></h5>
														<h5 style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-ok" ></span>   Programming and reservation on the chosen iteneraries.</strong></h5>
														<h5 id="schooladon" style="padding: 0px 50px 0px 50px;"><span class="glyphicon glyphicon-ok" ></span>  Redcross Emergency First-Aid and Basic Life Support Trained Tour Facilitator.</strong></h5>
													</div>
												</div>
													';	
									}
									?>