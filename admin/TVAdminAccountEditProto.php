<?php
// including the database connection file
include_once("TVConnectionString.php");
	$userID = $_GET['id'];
session_start();
$_accessLevel = $_SESSION['adminAccessLevel'];
if ($_accessLevel=='Admin'){
} else if ($_accessLevel=='Staff') {
header("Location: TVAdminDestinations.php");
} else {
    header("Location: TVAdminLogout.php");
}
	//$_SESSION['adminName'] = $username;

	//selecting data associated with this particular id
	$result = mysqli_query($connect,"SELECT * FROM tbl_adminlogin WHERE admin_adminName = '$userID'");
//$res = mysqli_fetch_assoc($result);
//$varcharUserImage = $res['admin_image'];
while($res = mysqli_fetch_array($result))
{

    $UserName = $res['admin_adminName'];
    $UserFirstName = $res['admin_firstName'];
    $UserLastName = $res['admin_lastName'];
    $UserPassword = $res['admin_password'];
    $UserContacNum = $res['admin_contactNum'];
    $UserImage = $res['admin_image'];
    $UserBirthdate = $res['admin_birthDate'];
    $UserAccessLevel = $res['admin_accessLevel'];
}

	if(isset($_POST['btnUpdateRecord']))
	{	
	$TempBirthdateYear = mysqli_real_escape_string($connect, $_POST['birthdate_year']);
	$TempBirthdateDay = mysqli_real_escape_string($connect, $_POST['birthdate_day']);
	$TempBirthdateMonth = mysqli_real_escape_string($connect, $_POST['birthdate_month']);

	$varcharUserBirthdate =  $TempBirthdateYear . ' ' . $TempBirthdateDay . ' ' . $TempBirthdateMonth;

	$varcharUserName = mysqli_real_escape_string($connect,$_POST['HiddenAdminName']);
    $varcharUserFirstName = mysqli_real_escape_string($connect, $_POST['txtbxUserFirstName']);
    $varcharUserLastName = mysqli_real_escape_string($connect, $_POST['txtbxUserLastName']);
    $varcharUserPassword = mysqli_real_escape_string($connect, $_POST['txtbxUserPassword']);
    $varcharUserContacNum = mysqli_real_escape_string($connect, $_POST['txtbxUserContactNum']);
    $varcharUserImage = addslashes(file_get_contents($_FILES["imgUserImage"]["tmp_name"]));
    $varcharUserAccessLevel = mysqli_real_escape_string($connect, $_POST['txtbxUserAccessLevel']);
        // Check Image
        $check = getimagesize($_FILES["imgUserImage"]["tmp_name"]);
        $uploadOk = 0;
        if($check !== false)
        {
            $uploadOk = 1;
        }
        else
        {
            $uploadOk = 0;
        }
		// checking empty fields
		if(empty($varcharUserImage)) {	
			
		if(empty($varcharUserImage)) {
			echo "<font color='red'>Reselect Image / Select image field properly.</font><br/>";
	   }
		
		
	       }
        else if(empty($varcharUserImage)||$uploadOk == 0)
        {
            $message = "Please upload an image! Choose blank image if not available";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else if(empty($TempBirthdateYear)||$TempBirthdateYear==" ")
        {
            $message = "Choose a Birth Year";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else if(empty($TempBirthdateMonth)||$TempBirthdateMonth==" ")
        {
            $message = "Choose a Birth Month";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else if(empty($TempBirthdateDay)||$TempBirthdateDay==" ")
        {
            $message = "Choose a Birth Day";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
		else 
		{	
			//$queryEdit="UPDATE `tbl_adminlogin` SET `admin_firstName` = '$varcharUserFirstName', `admin_lastName` = '$varcharUserLastName', `admin_password` = '$varcharUserPassword', `admin_contactNum` = '$varcharUserContacNum', `admin_image` = '$varcharUserImage', `admin_birthDate` = '$varcharUserBirthdate', `admin_accessLevel` = '$varcharUserAccessLevel' WHERE `tbl_adminlogin`.`admin_adminName` = '$userID";
			//redirectig to the display page. In our case, it is index.php
			$queryEdit="UPDATE `tbl_adminlogin` SET `admin_firstName` = '$varcharUserFirstName', `admin_lastName` = '$varcharUserLastName', `admin_password` = '$varcharUserPassword', `admin_contactNum` = '$varcharUserContacNum', `admin_image` = '$varcharUserImage', `admin_birthDate` = '$varcharUserBirthdate', `admin_accessLevel` = '$varcharUserAccessLevel' WHERE `tbl_adminlogin`.`admin_adminName` = '$varcharUserName'";
			
			if(mysqli_query($connect,$queryEdit))
			{
				$message = "User updated successfully!";
            	echo "<script type='text/javascript'>alert('$message');</script>";
            	//redirectig to the display page.
				echo "<script type='text/javascript'>location.href = 'TVAdminUsers.php';</script>";
			}
			else
			{
				$message = "Query Error!";
                echo "<script type='text/javascript'>alert('$message');</script>";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Edit User</title>
        <link rel="shortcut icon" href = "images/tigerVisionIcon.ico">
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="admincss/TVAdminSideBar.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <!-- Select Month -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript">
            function month()
            {
                var selected_month = document.getElementById("months").value;
                if(selected_month=="February")
                {
                    $("#day").html("<option value=''>Day</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option>");
                }
                else if(selected_month=="April"||selected_month=="June"||selected_month=="September"||selected_month=="November")
                {
                    $("#day").html("<option value=''>Day</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option>");
                }
                else if(selected_month=="January"||selected_month=="March"||selected_month=="May"||selected_month=="July"||selected_month=="August"||selected_month=="October"||selected_month=="December")
                {
                    $("#day").html("<option value=''>Day</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option>");
                }
                else
                {
                     $("#day").html("<option value=''>Day</option>");
                }
            }
        </script>
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
                            <li><a href="TVAdminDestinations.php">Destinations Offered</a></li>
                            <li><a href="TVAdminPackages.php">Packages</a></li>
                            <li class="active"><a href="TVAdminUsers.php">Users</a></li>
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
                            <strong>Update Account</strong>  
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
