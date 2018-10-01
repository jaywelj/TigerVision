<?php
	session_start();
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
		$varcharDestinationID = mysqli_real_escape_string($connect, $_POST['DestinationID']);
		$varcharDestinationName = mysqli_real_escape_string($connect, $_POST['txtbxDestinationName']);
		$varcharDestinationAddress = mysqli_real_escape_string($connect, $_POST['txtbxDestinationAddress']);
		$varcharDestinationContacts = mysqli_real_escape_string($connect, $_POST['txtbxDestinationContacts']);
		$varcharDestinationEmail = mysqli_real_escape_string($connect, $_POST['txtbxDestinationEmail']);
		$varcharDestinationLink = mysqli_real_escape_string($connect, $_POST['txtbxDestinationLink']);
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
		$varcharDestinationDescription = mysqli_real_escape_string($connect, $_POST['txtbxDestinationDescription']);
		$varcharDestinationPrice = mysqli_real_escape_string($connect, $_POST['txtbxDestinationPrice']);
		$patternprice = '/^(?:0|[1-9]\d*)(?:\.\d{2})?$/';	
		$varcharAdminName = $_SESSION['adminName'];	
		
		// checking empty fields
		if(empty($varcharDestinationName))
		{
			$message = "Name field is empty!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
		else if(empty($varcharDestinationImage)||$uploadOk == 0)
		{
			$message = "Please reupload image.";
            echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else if((preg_match($patternprice, $_POST['txtbxDestinationPrice'] == '0'))||$_POST['txtbxDestinationPrice'] < 1)
		{
			$message = "Invalid Price";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else 
		{	
			//updating the table
			$queryEdit = "UPDATE tbl_destination SET destination_name='$varcharDestinationName',destination_address='$varcharDestinationAddress', destination_email='$varcharDestinationEmail',destination_contacts='$varcharDestinationContacts',destination_link='$varcharDestinationLink',destination_description='$varcharDestinationDescription',destination_image='$varcharDestinationImage',destination_price='$varcharDestinationPrice' WHERE destination_ID=$varcharDestinationID";
			if(mysqli_query($connect, $queryEdit))
			{
				$message = "Reservation updated successfully!";
            	echo "<script type='text/javascript'>alert('$message');</script>";
            	//redirectig to the display page. In our case, it is index.php
				echo "<script type='text/javascript'>location.href = 'TVAdminDestinations.php';</script>";
			}
		}
	}
?>
<?php
//getting id from url
$DestinationID = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM tbl_destination WHERE destination_ID=$DestinationID");

while($res = mysqli_fetch_array($result))
{
	$txtbxDestinationName = $res['destination_name'];
	$txtbxDestinationAddress = $res['destination_address'];
	$txtbxDestinationEmail = $res['destination_email'];
	$txtbxDestinationContacts = $res['destination_contacts'];
	$txtbxDestinationLink = $res['destination_link'];
	$txtbxDestinationDescription = $res['destination_description'];
	$imgDestinationImage = $res['destination_image'];
	$txtbxDestinationPrice = $res['destination_price'];
}
?>
<!DOCTYPE html>
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
           <div id="content" class="modal-body" style="padding:70px;">
				<form name="form1" method="post" enctype="multipart/form-data">
						<p style="font-size: 35px; color: #000;">
                            <strong>Edit Users</strong> 
                        </p>
						<table border="0">
						<div class="form-group">
							<tr> 
								<label>Username</label>
								<input pattern="^[A-Za-z0-9_.]\S*$"
                                minlength="5"
                                maxlength="15" 
                                type="text" name="txtbxUserFirstName" value="<?php echo $UserName;?>" class="form-control" readonly>
							</tr>
						</div>
						<div class="form-group">
							<tr> 
								<label>First Name</label>
								<input pattern="^([a-zA-Z.]+\s)*[a-zA-Z.]+$"
                                style="text-transform:capitalize;"
                                type="text"
                                required
                                name="txtbxUserFirstName"
                                value="<?php echo $UserFirstName;?>"
                                class="form-control">
							</tr>
						</div>
						<div class="form-group">
							<tr> 
								<label>Last Name</label>
								<input required
                                pattern="^([a-zA-Z.]+\s)*[a-zA-Z.]+$"
                                style="text-transform:capitalize;"
                                type="text"
                                name="txtbxUserLastName"
                                value="<?php echo $UserLastName;?>"
                                class="form-control">
							</tr>
						</div>
						<div class="form-group">
							<tr> 
								<label>Password</label>
								<input pattern="[^\s]+" type="password" name="txtbxUserPassword" value="<?php echo $UserPassword;?>" class="form-control" minlength="8" required>
							</tr>
						</div>
						<div class="form-group">
							<tr> 
								<label>Contact Number</label>
								<input pattern="[0-9]{2}-[0-9]{7,9}"
                                placeholder="Telephone: 02-xxxxxxx/Mobile: 09-xxxxxxxxx"
                                type='tel'
                                required
                                name="txtbxUserContactNum"
                                value="<?php echo $UserContacNum;?>"
                                class="form-control">
							</tr>
						</div>
						<div class="form-group">
							<tr> 
								<label>Image</label>
								<input accept="image/x-png,image/gif,image/jpeg" required type="file" name="imgUserImage" value=" " class="form-control">
							</tr>
						</div>
						<div class="form-group">
							<?php
                            $year="";
                            for ($i=0; $i<4; $i++)
                            {
                                if($UserBirthdate[$i] != " ")
                                $year .= $UserBirthdate[$i];
                            }
                            
                            ?>
							<br>
							<label>Birthdate</label>
                            <br>
                            <select class="form-control" name="birthdate_year" style="width:33%; display:inline-block;"  required>
                                <?php
                                    echo "<option>".$year."</option>";
                                    for ($i = 1999; $i >= 1957; $i--) {
                                        echo'<option  class=  value="' . $i . '">' . $i . '</option>';
                                    }
                                ?>
                            </select>
                            <select class="form-control" name="birthdate_month" style="width:33%; display:inline-block;" onchange="month()" id="months" required>
                            	<?php
                                $month="";
                                for ($i=7; $i<20; $i++)
                                {
                                    if($UserBirthdate[$i] != " ")
                                    $month .= $UserBirthdate[$i];
                                        
                                }
                                echo'<option>'.$month.'</option>';
                                ?>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>                            </select>
                            <select class="form-control" name="birthdate_day" style="width:33%; display:inline-block;" id="day" required>
                                 <?php
                                $day="";
                                for ($i=4; $i<7; $i++)
                                {
                                    if($UserBirthdate[$i] != " ")
                                    $day .= $UserBirthdate[$i];
                                }
                                echo'<option>'.$day.'</option>';
                                ?>
                            </select>
						</div>
						<div class="form-group">
							<tr> 
								<label>Access Level</label>
								<br>
								<select class="form-control" name="txtbxUserAccessLevel" style="width:33%; display:inline-block;">
                            	<?php
                                
                                echo'<option>'.$UserAccessLevel.'</option>';
                                ?>
                                <option>Admin</option>
                                <option>Staff</option>
                            </select>
							</tr>
						</div>
						<input type="hidden" name="HiddenAdminName" value=<?php echo $UserName;?>>
                        <div class="form-group">
                            <tr>
                                
                                <input type="submit" name="btnUpdateRecord" value="Edit" class="form-control pull-right btn-success" style="width:18%;  margin:5px;">
                                <a href="TVAdminUsers.php" type="btn" name="btnCancel" class="form-control pull-right btn-danger" style="width:25%; margin:5px";><center>Cancel</center></a>
                            </tr>
                        </div>
						</table>
				</form>
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
