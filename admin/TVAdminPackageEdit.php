
<?php
    session_start();
    $PackageID = $_GET['id'];
$_accessLevel = $_SESSION['adminAccessLevel'];
if ($_accessLevel=='Admin'){
} else if ($_accessLevel=='Staff') {
    echo'<script> document.getElementById("userdiv").style.display ="none"; </script>';
} else {
    header("Location: TVAdminLogout.php");
}
    // incwluding the database connection file
    include_once("TVConnectionString.php");

    if(isset($_POST['btnUpdate']))
    {   
        $varcharPackageName = mysqli_real_escape_string($connect, $_POST['txtbxPackageName']);
        $varcharPackageDescription = mysqli_real_escape_string($connect, $_POST['txtbxPackageDescription']);
        $varcharPackagePrice = mysqli_real_escape_string($connect, $_POST['txtbxPackagePrice']);
        $varcharDestination1 = mysqli_real_escape_string($connect, $_POST['Select1']);
        $varcharDestination2 = mysqli_real_escape_string($connect, $_POST['Select2']);
        $varcharDestination3 = mysqli_real_escape_string($connect, $_POST['Select3']);
        $varcharDestination4 = mysqli_real_escape_string($connect, $_POST['Select4']);
        $varcharDestination5 = mysqli_real_escape_string($connect, $_POST['Select5']);
    
        // checking empty fields
        // checking empty fields
        if(empty($varcharPackageName))
        {
            $message = "Name field is empty!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else 
        {   
            //updating the tablepackage_destination1=$varcharDestination1, package_destination1=$varcharDestination1, package_destination1=$varcharDestination1, 
            $queryEdit = "UPDATE tbl_tourpackage SET package_name='$varcharPackageName',package_description='$varcharPackageDescription',package_pricePerhead='$varcharPackagePrice',package_destination1=$varcharDestination1, package_destination2=$varcharDestination2, package_destination3=$varcharDestination3, package_destination4=$varcharDestination4, package_destination5=$varcharDestination5 WHERE package_ID=$PackageID";
            if(mysqli_query($connect, $queryEdit))
            {
                $message = "Package updated successfully!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                //redirectig to the display page. In our case, it is index.php
                echo "<script type='text/javascript'>location.href = 'TVAdminPackages.php';</script>";
            }
        }
    }
?>
<?php
	// incwluding the database connection file
	include_once("TVConnectionString.php");
?>
<?php
//getting id from url
$PackageID = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM tbl_tourpackage WHERE package_ID=$PackageID");

while($res = mysqli_fetch_array($result))
{
	$varcharPackageName = $res['package_name'];
	$varcharPackageDescription = $res['package_description'];
	$varcharPackagePricePerHead = $res['package_pricePerHead'];
	$varcharPackageDestination1 = $res['package_destination1'];		
	$varcharPackageDestination2 = $res['package_destination2'];
	$varcharPackageDestination3 = $res['package_destination3'];
	$varcharPackageDestination4 = $res['package_destination4'];
	$varcharPackageDestination5 = $res['package_destination5'];
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Packages</title>
    <link rel="shortcut icon" href = "images/tigerVisionIcon.ico">
	<!-- Bootstrap CSS CDN -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Our Custom CSS -->
	<link rel="stylesheet" href="admincss/TVAdminSideBar.css">
	<!-- Scrollbar Custom CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
</head>
<body>
	<div class="wrapper">
		<!-- Sidebar Holder -->
		<nav id="sidebar">
			<div class="sidebar-header">
				<img src="images/headerLogo.png">
				</img>
			</div>

			<ul class="list-unstyled components">
                    <p></p>
                    <li >
                        <a href="TVAdminDashboard.php">
                            <i class="glyphicon glyphicon-home"></i>
                            Dashboard
                        </a>
                        <!--<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Dashboard</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Home 1</a></li>
                            <li><a href="#">Home 2</a></li>
                            <li><a href="#">Home 3</a></li>
                        </ul>-->
                    </li>
                    <li>
                        <a href="TVAdminReservations.php">
                        <i class="glyphicon glyphicon-calendar"></i>
                        Reservations</a>              
                    </li>
                    <li>
                      <a href="TVAdminPayments.php">
                      <i class="glyphicon glyphicon-usd"></i>
                      Payments</a>              
                    </li>
                    <li>
                        <a href="#Maintenance" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-wrench"></i>
                        Maintenance<span class="caret" ></span></a>

                        <ul class="collapse list-unstyled" id="Maintenance">
                            <li><a href="TVAdminDestinations.php">Destinations Offered</a></li>
                            <li class="active"><a href="TVAdminPackages.php">Packages</a></li>
                            <li><a href="TVAdminUsers.php">Users</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a style="height: 80px;   font-size:18px; font-family: Arial;" class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user" style="top:8px;"> ACCOUNT</span>
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                      <li style="font-size: 20px"><a  href="TVAdminAccounts.php"> <span class="glyphicon glyphicon-user" style="margin-right: 10px; top:3px;"></span>View Account</a></li>
                                      <li style="font-size: 20px"><a href="TVAdminLogout.php"><span class="glyphicon glyphicon-off" style="margin-right: 10px; top:3px;"></span>Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

        <!-- Page Content Holder -->
    	<?php

        // php select option value from database
    	include("TVConnectionString.php");

        // mysql select query
    	$query = "SELECT * FROM `tbl_destination` WHERE destination_purgeFlag = 1 AND destination_ID != 1";

        // for method 1/
    	$result1 = mysqli_query($connect, $query);
    	$result2 = mysqli_query($connect, $query);
    	$result3 = mysqli_query($connect, $query);
    	$result4 = mysqli_query($connect, $query);
    	$result5 = mysqli_query($connect, $query);

        $getDestinationNameQuery1 ="SELECT * FROM tbl_destination WHERE destination_ID = $varcharPackageDestination1 AND destination_purgeFlag = 1";
        $getDestinationNameQuery2 ="SELECT * FROM tbl_destination WHERE destination_ID = $varcharPackageDestination2 AND destination_purgeFlag = 1";
        $getDestinationNameQuery3 ="SELECT * FROM tbl_destination WHERE destination_ID = $varcharPackageDestination3 AND destination_purgeFlag = 1";
        $getDestinationNameQuery4 ="SELECT * FROM tbl_destination WHERE destination_ID = $varcharPackageDestination4 AND destination_purgeFlag = 1";
        $getDestinationNameQuery5 ="SELECT * FROM tbl_destination WHERE destination_ID = $varcharPackageDestination5 AND destination_purgeFlag = 1";

        $getDestinationNameArray1 = mysqli_query($connect, $getDestinationNameQuery1);
        $getDestinationNameArray2 = mysqli_query($connect, $getDestinationNameQuery2);
        $getDestinationNameArray3 = mysqli_query($connect, $getDestinationNameQuery3);
        $getDestinationNameArray4 = mysqli_query($connect, $getDestinationNameQuery4);
        $getDestinationNameArray5 = mysqli_query($connect, $getDestinationNameQuery5);

    	?>
    	<div id="content">
    		<div class="modal-body" style="padding:70px;">
    			<form method="post">
    				<p style="font-size: 35px; color: #000;">
    					<strong>Edit Package</strong> 
    				</p>
    				<div class="form-group">
    					<label>Package Name</label>
    					<input type="text" name="txtbxPackageName" class="form-control" value="<?php echo $varcharPackageName;?>" style="text-transform: capitalize;" required pattern="^([a-zA-Z0-9.]+\s)*[a-zA-Z0-9.]+$">
    				</div>
    				<div class="form-group"> 
    					<label>Package Description</label>
    					<textarea 
    					id="text" 
    					cols="40" 
    					rows="4" 
    					name="txtbxPackageDescription" 
    					class="form-control"
    					placeholder="Package Description"><?php echo $varcharPackageDescription;?></textarea>
    				</div>
        			<div class="form-group">
        				<label>Price per head</label>
        				<input type="number" name="txtbxPackagePrice" class="form-control" value="<?php echo $varcharPackagePricePerHead;?>">
        			</div>
        			 <div class="form-group">
                        <label>Destination </label>
                    </div>
                    <div class="form-group">
                        <select name="Select1" class="form-control">
                            <?php 
                            if(!empty($getDestinationNameArray1))
                            {
                                while($destination = mysqli_fetch_array($getDestinationNameArray1)):;
                                echo '<option value="'.$destination[0].'" selected>';
                                echo $destination[1];
                                endwhile;
                                echo '</option>';
                            }
                            else
                            {
                                echo '<option value="NULL" selected>';
                                echo "--- select ---";
                                echo '</option>';
                            }
                            ?>
                            <option value="NULL">--- not selected --- </option> 
                            <?php while($row = mysqli_fetch_array($result1)):;?>
                                <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                            <?php endwhile;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="Select2" class="form-control">
                            <?php 
                            if(!empty($getDestinationNameArray2))
                            {                                
                                while($destination = mysqli_fetch_array($getDestinationNameArray2)):;
                                echo '<option value='.$destination[0].' selected>';
                                echo $destination[1];
                                endwhile;
                                echo '</option>';
                            }
                            else
                            {
                                echo '<option value="NULL" selected>';
                                echo "--- select ---";
                                echo '</option>';
                            }
                            ?>  
                            <option value="NULL">--- not selected --- </option> 
                            <?php while($row = mysqli_fetch_array($result2)):;?>
                                <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                            <?php endwhile;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="Select3" class="form-control">
                            <?php 
                            if(!empty($getDestinationNameArray3))
                            {
                                
                                while($destination = mysqli_fetch_array($getDestinationNameArray3)):;
                                echo '<option value='.$destination[0].' selected>';
                                echo $destination[1];
                                endwhile;
                                echo '</option>';
                            }
                            else
                            {
                                echo '<option value="NULL" selected>';
                                echo "--- select ---";
                                echo '</option>';
                            }
                            ?>  
                            <option value="NULL">--- not selected --- </option> 
                            <?php while($row = mysqli_fetch_array($result3)):;?>
                                <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                            <?php endwhile;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="Select4" class="form-control">
                            <?php 
                            if(!empty($getDestinationNameArray4))
                            {
                                while($destination = mysqli_fetch_array($getDestinationNameArray4)):;
                                echo '<option value='.$destination[0].' selected>';
                                echo $destination[1];
                                endwhile;
                                echo '</option>';
                            }
                            else
                            {
                                echo '<option value="NULL" selected>';
                                echo "--- select ---";
                                echo '</option>';
                            }
                            ?>  
                            <option value="NULL">--- not selected --- </option> 
                            <?php while($row = mysqli_fetch_array($result4)):;?>
                                <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                            <?php endwhile;?>
                        </select>
                    </div>
                    <div vaclass="form-group">
                        <select name="Select5" class="form-control">
                            <?php 
                            if(!empty($getDestinationNameArray5))
                            {
                                while($destination = mysqli_fetch_array($getDestinationNameArray5)):;
                                echo '<option value='.$destination[0].' selected>';
                                echo $destination[1];
                                endwhile;
                                echo '</option>';
                            }
                            else
                            {
                                echo '<option value="NULL" selected>';
                                echo "--- select ---";
                                echo '</option>';
                            }
                            ?>  
                            <option value="NULL">--- not selected --- </option> 
                            <?php while($row = mysqli_fetch_array($result5)):;?>
                                <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                            <?php endwhile;?>
                        </select>
                    </div>
        			<p></p>
        			<!--<div class="form-group"> 
        				<label>Image</label>
        				<input type="file" name="imgPackageImage" class="form-control">
        			</div>-->
        			<div class="form-group">
        				<tr>
        					<a href="TVAdminPackages.php" type="btn" name="btnCancel" class="form-control pull-right btn-danger" style="width:18%; text-align:center; margin:5px;">Cancel</a>
        					<input type="submit" name="btnUpdate" value="Update" class="form-control pull-right btn-success" style="width:18%;  margin:5px;">
        				</tr>
        			</div>			  
    			</form>
    		</div>
        </div>
    </div>
    <!-- jQuery CDN -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="js/bootstrap.min.js"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
</body>
</html>



