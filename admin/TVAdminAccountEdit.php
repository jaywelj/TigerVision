<?php
session_start(); 

$username = $_SESSION['adminName'];
$_SESSION['adminName'] = $username;


$_accessLevel = $_SESSION['adminAccessLevel'];
if ($_accessLevel=='Admin'){
} else if ($_accessLevel=='Staff') {
    echo'<script> document.getElementById("userdiv").style.display ="none"; </script>';
} else {
    header("Location: TVAdminLogout.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Edit Account</title>
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
        <div class="wrapper" >
            <!-- Sidebar Holder -->
           <nav id="sidebar">
                <div class="sidebar-header">
                     <img src="images/headerLogo.png">  
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
                <!-- VIEW -->
<?php
// including the database connection file
include_once("TVConnectionString.php");
//session_start();
//$adminname = $_SESSION['adminName'];
if(isset($_POST['update']))
{	
	$TempBirthdateYear = mysqli_real_escape_string($connect, $_POST['birthdate_year']);
	$TempBirthdateDay = mysqli_real_escape_string($connect, $_POST['birthdate_day']);
	$TempBirthdateMonth = mysqli_real_escape_string($connect, $_POST['birthdate_month']);
	$varcharAccountBirthdate =  $TempBirthdateYear . ' ' . $TempBirthdateDay . ' ' . $TempBirthdateMonth;
	$varcharAccountName = mysqli_real_escape_string($connect,$_POST['HiddenAdminName']);
    $varcharAccountFirstName = mysqli_real_escape_string($connect, $_POST['txtbxAccountFirstName']);
    $varcharAccountLastName = mysqli_real_escape_string($connect, $_POST['txtbxAccountLastName']);
    $varcharAccountPassword = mysqli_real_escape_string($connect, $_POST['txtbxAccountPassword']);
    $varcharAccountContacNum = mysqli_real_escape_string($connect, $_POST['txtbxAccountContactNum']);
    $varcharAccountImage = addslashes(file_get_contents($_FILES["BlobAccountImage"]["tmp_name"]));
    // Check Image
    $check = getimagesize($_FILES["BlobAccountImage"]["tmp_name"]);
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
	if(empty($varcharAccountImage)) {	
			
		if(empty($varcharAccountImage)) {
			echo "<font color='red'>Reselect Image / Select image field properly.</font><br/>";
		}
	}
    else if(empty($varcharAccountImage)||$uploadOk == 0)
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
    else {	
		//updating the table
		//$result = mysqli_query($connect, "UPDATE tbl_adminlogin SET admin_firstName='$varcharAccountFirstName',admin_adminlastName ='$varcharAccountLastName',admin_password='$varcharAccountPassword',admin_contactNum='$varcharAccountContacNum', admin_image = '$varcharAccountImage', admin_birthDate = '$VarcharAccountBirthdate'  WHERE admin_adminName=$username");
		$result = mysqli_query($connect, "UPDATE `tbl_adminlogin` SET `admin_adminName` = '$varcharAccountName', `admin_firstName` = '$varcharAccountFirstName', `admin_lastName` = '$varcharAccountLastName', `admin_password` = '$varcharAccountPassword', `admin_contactNum` = '$varcharAccountContacNum', `admin_birthDate` = '$varcharAccountBirthdate', admin_image = '$varcharAccountImage' WHERE `tbl_adminlogin`.`admin_adminName` = '$username' ");
		$_SESSION['adminName'] = $username;
        //redirecting to the display page.
        echo("<script>location.href ='TVAdminAccounts.php';</script>");
	}
}?>
<?php
//getting id from url
//$username = $_GET['username'];

$result = mysqli_query($connect,"SELECT * FROM tbl_adminlogin WHERE admin_adminName = '$username'");
//$res = mysqli_fetch_assoc($result);
//$varcharAccountImage = $res['admin_image'];
while($res = mysqli_fetch_array($result))
{

    $AccountName = $res['admin_adminName'];
    $AccountFirstName = $res['admin_firstName'];
    $AccountLastName = $res['admin_lastName'];
    $AccountPassword = $res['admin_password'];
    $AccountContacNum = $res['admin_contactNum'];
    $AccountImage = $res['admin_image'];
    $AccountBirthdate = $res['admin_birthDate'];
    $AccountAccessLevel = $res['admin_accessLevel'];
}
?>
                <div class="container" style="width:100%; padding:70px;">
                    
                    <form name="form1" method="post" enctype="multipart/form-data" action="TVAdminAccountEdit.php">
                    <p style="font-size: 35px; color: #000;">
                        <strong>Update Account</strong> 
                    </p>
		          <table border="0">
                    <div class="form-group">
			         <tr> 
				        <label>First Name</label> 
				        <input pattern="^([a-zA-Z.]+\s)*[a-zA-Z.]+$"
                        required
                        type="text"
                        style="margin:10px 30px 5px 30px; text-transform:capitalize;"
                        name="txtbxAccountFirstName"
                        value="<?php echo $AccountFirstName;?>"
                        class="form-control">
			         </tr>
                    </div>
                <div class="form-group">
			     <tr> 
				    <label>Last Name</label>
				    <input pattern="^([a-zA-Z.]+\s)*[a-zA-Z.]+$"
                    required
                    style="margin:10px 30px 5px 30px; text-transform:capitalize;"
                    type="text"
                    name="txtbxAccountLastName"
                    value="<?php echo $AccountLastName;?>"
                    class="form-control">
			     </tr>
                </div>
                <div class="form-group">
			     <tr> 
				    <label>Password</label>
				    <input pattern="[^\s]+"
                    type="password"
                    minlength="8"
                    required
                    style="margin:10px 30px 5px 30px;"
                    name="txtbxAccountPassword"
                    value="<?php echo $AccountPassword;?>"
                    class="form-control">
			     </tr>
                </div>
                <div class="form-group">   
			     <tr> 
				    <label>Contact Number</label>
				    <input pattern="[0-9]{2}-[0-9]{7,9}"
                    placeholder="Telephone: 02-xxxxxxx/Mobile: 09-xxxxxxxxx"
                    type='tel'
                    required
                    style="margin:10px 30px 5px 30px;"
                    name="txtbxAccountContactNum"
                    value="<?php echo $AccountContacNum;?>"
                    class="form-control">
			     </tr>
                </div>
                <div class="form-group">
			     <tr> 
				    <label>Image</label>
				    <input accept="image/x-png,image/gif,image/jpeg"
                    required
                    type="file"
                    style="margin:10px 30px 5px 30px;"
                    name="BlobAccountImage"
                    id="BlobAccountImage"
                    class="form-control">
			     </tr>
                </div>
                <div class="form-group">
			     <tr> 
				<label>Birthdate</label>
                            
                            <?php
                            $year="";
                            for ($i=0; $i<4; $i++)
                            {
                                if($AccountBirthdate[$i] != " ")
                                $year .= $AccountBirthdate[$i];
                            }
                            
                            ?>
                            <select name="birthdate_year" class="form-control" style="margin:10px 30px 5px 30px;" required>
                                <?php
                                echo "<option>".$year."</option>";
                                for ($i = 1999; $i >= 1957; $i--)
                                {
                                    echo'<option  value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>
                            <select name="birthdate_month" class="form-control" style="margin:10px 30px 5px 30px;"  onchange="month()" id="months" required>
                                <?php
                                $month="";
                                for ($i=7; $i<20; $i++)
                                {
                                    if($AccountBirthdate[$i] != " ")
                                    $month .= $AccountBirthdate[$i];
                                        
                                }
                                echo'<option>'.$month.'</option>';
                                ?>
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
                            <select id="day" class="form-control" name="birthdate_day" style="margin:10px 30px 5px 30px;" required>
                                <?php
                                $day="";
                                for ($i=4; $i<7; $i++)
                                {
                                    if($AccountBirthdate[$i] != " ")
                                    $day .= $AccountBirthdate[$i];
                                }
                                echo'<option>'.$day.'</option>';
                                ?>
                            </select>
                    

			</tr>
            </div>
				<tr><input style="margin:10px 30px 5px 30px;" type="hidden" name="HiddenAdminName" value=<?php echo $AccountName;?>></tr>
                <tr>
                    <tr>
                        <br>
                    </tr>
                </tr>
                <tr></tr>
				<div class="form-group">
                            <tr>
                                <a href="TVAdminAccounts.php" type="btn" name="btnCancel" class="form-control pull-right btn-danger" style="width:25%; margin:5px";><center>Cancel</center></a>
                                <input type="submit" name="update" value="Update" class="form-control pull-right btn-success" style="width:18%;  margin:5px;">
                                
                            </tr>
                        </div>
		</table>
                    <div class="table-responsive" >       
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                  
                                </tr>
                            </thead>
                            <tbody>
                              
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END OF VIEW -->
                <!-- ADD -->
                <!-- Modal -->
            
                <!-- END OF ADD -->
                <!-- EDIT -->
                <!-- Modal -->
               
                <!-- END OF EDIT -->

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
