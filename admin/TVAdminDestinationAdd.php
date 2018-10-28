<?php
session_start();
$_accessLevel = $_SESSION['adminAccessLevel'];
if ($_accessLevel=='Admin'){
} else if ($_accessLevel=='Staff') {
    echo'<script> document.getElementById("userdiv").style.display ="none"; </script>';
} else {
    header("Location: TVAdminLogout.php");
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Destinations</title>
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
                     <img src="images/headerLogo.png"></img>
                </div>

                <ul class="list-unstyled components">
                    <p></p>
                    <li >
                        <a href="index.php">
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
                            <li class="active"><a href="TVAdminDestinations.php">Destinations Offered</a></li>
                            <li><a href="TVAdminPackages.php">Packages</a></li>
                            <li><a href="TVAdminUsers.php">Users</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown" >
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
            <div id="content">
				<div class="modal-body" style="padding:70px;">
		          	<form method="post" enctype="multipart/form-data">
		          		<p style="font-size: 35px; color: #000;">
                            <strong>Add a Destination</strong> 
                        </p>
			                <div class="form-group">
			                	<label>Name</label>
			                	<input required
                                pattern="^([a-zA-Z0-9.]+\s)*[a-zA-Z0-9.]+$"
                                style="text-transform:capitalize;"
                                type="text"
                                name="txtbxName"
                                class="form-control">
			                </div>
			                <div class="form-group">
			                    <label>Address</label>
			                    <textarea name="txtbxAddress"
			                    class="form-control"
			                    placeholder="Unit Number, Building Name or Lot/Block Number, House Number, Street Name&#10;Village/Subdivision or Postal Code Name or Purok Name&#10;Baranggay Name, Postal Code&#10;City/Municipality Name&#10;Province, Philippines"
			                    required
			                    rows=5
			                    style="resize:none;text-transform:capitalize;"></textarea>
			                </div>
			                <div class="form-group">
			                    <label>Email</label>
			                     <input pattern="^\S*$" type="email" name="txtbxEmail" class="form-control">
			                </div>
			                <div class="form-group"> 
			                    <label>Contact Number</label>
			                    <input type='tel'
			                    required
			                    pattern="[0-9]{2}-[0-9]{7,9}"
			                    name="txtbxContactNo"
			                    class="form-control"
			                    placeholder="Telephone: 02-xxxxxxx/Mobile: 09-xxxxxxxxx">
			                </div>
			                <div class="form-group"> 
			                    <label>Link</label>
			                    <input required pattern="^\S*$" type="url" name="txtbxLink" class="form-control">
			                </div>
			                <div class="form-group"> 
			                    <label>Description</label>
			                    <textarea required
			                    rows=5
			                    style="resize:none"
			                    id="text" 
			                    name="txtbxDescription" 
			                    class="form-control"></textarea>
			                </div>
			                <div class="form-group"> 
			                    <label>Image</label>
			                    <input type="file" name="imgDestinationImage" accept="image/x-png,image/gif,image/jpeg" required>
			                </div>
			                <div class="form-group"> 
			                    <label>Price(Php)</label>
			                    <input type="number" placeholder="0.00" required step="0.01" pattern="^\d+(?:\.\d{1,2})?$" name="txtbxPrice" class="form-control">
			                </div>
			                <div class="form-group">
							<tr>
								<a href="TVAdminDestinations.php" type="btn" name="btnCancel" class="form-control pull-right btn-danger" style="width:18%; text-align:center; margin:5px;">Cancel</a>
								<input type="submit" name="btnAddRecord" value="Add" class="form-control pull-right btn-success" style="width:18%;  margin:5px;">
							</tr>
						</div>			  
			      	</form>
			        <?php
						//including the database connection file
						include_once("TVConnectionString.php");

						if(isset($_POST['btnAddRecord'])) 
						{
							$varcharDestinationName = mysqli_real_escape_string($connect, $_POST['txtbxName']);
							$varcharDestinationAddress = mysqli_real_escape_string($connect, $_POST['txtbxAddress']);
							$varcharDestinationEmail = mysqli_real_escape_string($connect, $_POST['txtbxEmail']);
							$varcharDestinationContacts = mysqli_real_escape_string($connect, $_POST['txtbxContactNo']);
							$varcharDestinationLink = mysqli_real_escape_string($connect, $_POST['txtbxLink']);
							$varcharDestinationDescription = mysqli_real_escape_string($connect, $_POST['txtbxDescription']);
							$varcharDestinationImage = addslashes(file_get_contents($_FILES["imgDestinationImage"]["tmp_name"]));
							$check = getimagesize($_FILES["imgDestinationImage"]["tmp_name"]);
							$uploadOk = 0;
						    if($check !== false)
						    {
        						$uploadOk = 1;
   						 	}
						    else
						    {
        						$uploadOk = 0;
						    }							
							$doubleDestinationPrice = mysqli_real_escape_string($connect, $_POST['txtbxPrice']);
							$patternprice = '/^(?:0|[1-9]\d*)(?:\.\d{2})?$/';
							// checking empty fields
								
							if(empty($varcharDestinationName))
							{
								$message = "Name field is empty!";
					            echo "<script type='text/javascript'>alert('$message');</script>";
					        }
					        else if(empty($varcharDestinationImage)||$uploadOk == 0)
							{
								$message = "Please upload an image. Choose blank image if not available";
					            echo "<script type='text/javascript'>alert('$message');</script>";
							}
							else if((preg_match($patternprice, $_POST['txtbxPrice'] == '0'))||$_POST['txtbxPrice'] < 1)
							{
								$message = "Invalid Price";
					            echo "<script type='text/javascript'>alert('$message');</script>";
							}
						 
							else 
							{
								// if all the fields are filled (not empty) 
	
								//insert data to database	
								$queryAdd="INSERT INTO tbl_destination(destination_name,destination_address,destination_email,destination_link,destination_contacts,destination_description,destination_image,destination_price,destination_adminName) VALUES('$varcharDestinationName','$varcharDestinationAddress','$varcharDestinationEmail','$varcharDestinationLink','$varcharDestinationContacts','$varcharDestinationDescription','$varcharDestinationImage','$doubleDestinationPrice','admin')";
								if(mysqli_query($connect, $queryAdd))
								{
									$message = "Destination added successfully!";
					            	echo "<script type='text/javascript'>alert('$message');</script>";
					            	//redirectig to the display page. In our case, it is index.php
									echo "<script type='text/javascript'>location.href = 'TVAdminDestinations.php';</script>";
								}
							}
						}
					?>
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


		
