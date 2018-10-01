<?php
session_start();
$_accessLevel = $_SESSION['adminAccessLevel'];
if ($_accessLevel=='Admin'){
} else if ($_accessLevel=='Staff') {
    echo'<script> document.getElementById("userdiv").style.display ="none"; </script>';
} else {
    header("Location: TVAdminLogout.php");
}
//error_reporting(0);
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Reservations</title>
        <link rel="shortcut icon" href = "images/tigerVisionIcon.ico">
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="admincss/TVAdminSideBar.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

        <script type="text/javascript">
            function month()
            {
                var selected_month = document.getElementById("months").value;
                if(selected_month=="February")
                {
                    $("#day").html("<option value=''>1</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option>");
                }
                else if(selected_month=="April"||selected_month=="June"||selected_month=="September"||selected_month=="November")
                {
                    $("#day").html("<option value=''>1</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option>");
                }
                else if(selected_month=="January"||selected_month=="March"||selected_month=="May"||selected_month=="July"||selected_month=="August"||selected_month=="October"||selected_month=="December")
                {
                    $("#day").html("<option value=''>1</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option>");
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
                    <li class="active">
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
                <?php

                // php select option value from database
                include("TVConnectionString.php");

                $query = "SELECT * FROM `tbl_createnewpackage` WHERE np_purgeFlag = 1";
                $query2 = "SELECT * FROM `tbl_tourpackage` WHERE package_purgeFlag = 1";
                $result1 = mysqli_query($connect, $query);
                $result2 = mysqli_query($connect, $query2);
                
                ?>
                <div class="modal-body" style="padding:70px;">
                    <form method="post">
                        <p style="font-size: 35px; color: #000;">
                            <strong>Add a Reservation</strong> 
                        </p>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="txtbxUserFirstName" class="form-control" style="text-transform: capitalize;" required title = "Enter a valid value." pattern="[A-za-z\s]{2,}">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="txtbxUserLastName" class="form-control" style="text-transform: capitalize;" required title = "Enter a valid value." pattern="[A-za-z]{2,}">
                        </div>
                        
                        <div class="form-group"> 
                            <label>Type</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="radioType" value="School" class="custom-control-input" onclick="document.getElementById('groupdiv').style.display ='none'; document.getElementById('schooldiv').style.display ='block'; document.getElementById('showShoolName').required = true;">
                            <label class="custom-control-label" for="customRadioInline1">School</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="radioType" value="Group" class="custom-control-input" onclick="document.getElementById('schooldiv').style.display ='none'; document.getElementById('groupdiv').style.display ='block'; document.getElementById('showShoolName').required = false;">
                            <label class="custom-control-label" for="customRadioInline2">Group</label>
                        </div>
                        <br>
                        <div class="form-group" id="schooldiv"  style="display:none;"> 
                            <label>School Name</label>
                            <input id="showShoolName" type="text" name="txtbxUserSchoolName" class="form-control" style="text-transform: capitalize;">
                        </div>
                        <div class="form-group" id="groupdiv" style="display:none;"> 
                            <input  type="hidden" name="HiddenUserSchoolName" class="form-control" value=" ">
                        </div>

                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="tel" name="txtbxUserContactNum" class="form-control" input type='tel' pattern="[0-9]{2}-[0-9]{7,9}" placeholder="Telephone: 02-xxxxxxx | Mobile: 09-xxxxxxxxx" title = "Use these format - Telephone: 02-xxxxxxx | Mobile: 09-xxxxxxxxx" required>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="txtbxUserEmail" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Address*</label>
                            <h5>House Number, Building and Street Name*</h5>
                            <input type="text" name=txtbxAddressDetailsName id="txtbxAddressDetailsName" class="form-control" style="text-transform: capitalize;" required="required" placeholder = "Unit Number, Building Name or Lot/Block Number, House Number, Street Name">
                            <h5 style="padding-top: 5px;">Province*</h5>
                            <input type="text" name=txtbxAddressProvinceName id="txtbxAddressProvinceName" class="form-control" style="text-transform: capitalize;" required="required" placeholder = "Province Name">
                            <h5 style="padding-top: 5px;">City/Municipality*</h5>
                            <input type="text" name=txtbxAddressCityMunicipalityName id="txtbxAddressCityMunicipalityName" class="form-control" style="text-transform: capitalize;" required="required" placeholder = "City Name/Municipality Name">
                            <h5 style="padding-top: 5px;">Barangay</h5>
                            <input type="text" name=txtbxAddressBarangayName id="txtbxAddressBarangayName" class="form-control" style="text-transform: capitalize;" required="required" placeholder = "Barangay Name">
                        </div>
                        <div class="form-group">
                            <!-- <label>Date Applied</label> -->
                            <br>
                            <select class="form-control" name="dateapplied_year" style="width:33%; display:none;">
                                <option selected value="<?php echo date('Y'); ?>"> <?php echo date('Y'); ?> </option>
                                <?php
                                echo "<option value='NULL'>Year</option>";for ($i = 2018; $i >= 1900; $i--) 
                                {
                                    echo'<option  value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>

                            <select class="form-control" name="dateapplied_day" style="width:33%; display:none;">
                                <option value="<?php echo date('j'); ?>"><?php echo date('j'); ?></option>
                                <?php
                                for ($i = 1; $i <= 31; $i++) 
                                {
                                    echo'<option class=  value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>

                            <select class="form-control" name="dateapplied_month" style="width:33%; display:none";>
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
                        <!-- Date Planned -->
                        <div class="form-group">
                            <label>Date Planned</label>
                            <br>
                            <select class="form-control" name="dateplanned_year" style="width:33%; display:inline-block;">
                                <option value="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></option>

                                <?php
                                echo'<option value=" ">Year</option>';
                                for ($i = 2018; $i <= 2100; $i++) {
                                echo'<option  class=  value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>

                            <select onchange="month()" id="months" class="form-control" name="dateplanned_month" style="width:33%; display:inline-block;">
                            <option value="">Month</option>;
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

                             <select id="day" class="form-control" name="dateplanned_day" style="width:33%; display:inline-block;">
                                <option value="">Day</option>
                            </select>
                        </div>
                        <br>

                        <div class="form-group"> 
                            <label>Package</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="radioPackage" value="tourPackage" class="custom-control-input" onclick="document.getElementById('custompackagediv').style.display ='none'; document.getElementById('tourpackagediv').style.display ='block'; document.getElementById('showTourPackage').required = true;">
                            <label class="custom-control-label" for="customRadioInline1">Tour Package</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="radioPackage" value="customPackage" class="custom-control-input" onclick="document.getElementById('tourpackagediv').style.display ='none'; document.getElementById('custompackagediv').style.display ='block'; document.getElementById('showCustomPackage').required=true; ">
                            <label class="custom-control-label" for="customRadioInline2">Custom Package</label>
                        </div>
                        <br>
                        <div class="form-group" id="tourpackagediv"  style="display:none;"> 
                            <label>Tour Package</label>
                            <select id="showTourPackage" name="dropdownTourPackageID" class="form-control">
                                <option disbled value="">--- Select Package ---</option>
                                <?php while($row2 = mysqli_fetch_array($result2)):;?>    
                                <option value="<?php echo $row2[0];?>|<?php echo $row2[2];?>">
                                    <?php echo $row2[1];?>
                                </option>
                                 <?php endwhile;?>
                            </select>
                        </div>
                        <div class="form-group" id="custompackagediv" style="display:none;"> 
                            <label>Custom Package</label>
                            <select id="showCustomPackage" name="dropdownCustomPackageID" class="form-control">
                                <option value="">--- Select Package ---</option>
                                <?php while($row1 = mysqli_fetch_array($result1)):;?>
                                <option value="<?php echo $row1[0];?>|<?php echo $row1[2];?>">
                                <?php echo $row1[1];?>  
                                </option>
                                <?php endwhile;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>How Many?</label>
                            <input type="number" name="txtbxUserHeads" class="form-control" min="3" required>
                        </div>
                        <!--<div class="form-group">
                            <label>Price Per Head</label>
                            <input type="text" name="txtbxPricePerHead" class="form-control">
                        </div>-->
                        <br>
                        <br>
                        <tr>
                            <a href="TVAdminReservations.php" type="btn" name="btnCancel" class="form-control pull-right btn-danger" style="width:18%; text-align:center; margin:5px;">Cancel</a>
                            <input type="submit" name="btnAddRecord" value="Add" class="form-control pull-right btn-success" style="width:18%;  margin:5px;">
                        </tr>
                    </form>
                </div>            
                <?php
                if(isset($_POST['btnAddRecord'])) 
                {
                    //including the database connection file
                    include_once("TVConnectionString.php");

                    $query = "SELECT * FROM `tbl_tourpackage`";
                    //$query = "SELECT * FROM `tbl_destination`";
                    $radioType=$_POST['radioType'];
                    if($radioType=='School')
                    {

                        //$VarcharPackageID = mysqli_real_escape_string($connect, $_POST['dropdownTourPackageID']);
                        $VarcharUserType = "school";
                        $VarcharUserSchoolName = $_POST['txtbxUserSchoolName'];
                    }
                    
                    else if($radioType=='Group')
                    {
                        //$VarcharPackageID = mysqli_real_escape_string($connect, $_POST['dropdownCustomPackageID']);
                        
                        $VarcharUserType = "group";
                        $VarcharUserSchoolName = $_POST['HiddenUserSchoolName'];
                    }
                    else
                    {
                        $message = "ERROR IN TYPE";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                    $radioPackageType=$_POST['radioPackage'];
                    
                    if($radioPackageType=='tourPackage')
                    {

                        //$VarcharPackageID = mysqli_real_escape_string($connect, $_POST['dropdownTourPackageID']);
                        $tempPackage = $_POST['dropdownTourPackageID'];
                        $result_explode1 = explode('|', $tempPackage);
                        $VarcharPackageID = $result_explode1[0];
                        $VarcharUserPricePerHead = $result_explode1[1];
                        $VarcharPackageType = "tour package";
                    }
                    
                    else if($radioPackageType=='customPackage')
                    {
                        //$VarcharPackageID = mysqli_real_escape_string($connect, $_POST['dropdownCustomPackageID']);
                        $tempPackage = $_POST['dropdownCustomPackageID'];
                        $result_explode2 = explode('|', $tempPackage);
                        $VarcharPackageID = $result_explode2[0];
                        $VarcharUserPricePerHead = $result_explode2[1];
                        $VarcharPackageType = "custom package";
                    }
                    else
                    {
                        $message = "ERROR IN PACKAGE TYPE";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }

                    $TempDatePlannedYear = mysqli_real_escape_string($connect, $_POST['dateplanned_year']);
                    $TempDatePlannedDay = mysqli_real_escape_string($connect, $_POST['dateplanned_day']);
                    $TempDatePlannedMonth = mysqli_real_escape_string($connect, $_POST['dateplanned_month']);
                    $TempDateAppliedYear = mysqli_real_escape_string($connect, $_POST['dateapplied_year']);
                    $TempDateAppliedDay = mysqli_real_escape_string($connect, $_POST['dateapplied_day']);
                    $TempDateAppliedMonth = mysqli_real_escape_string($connect, $_POST['dateapplied_month']);

                    
                    $VarcharUserDatePlanned =  $TempDatePlannedYear . ' ' . $TempDatePlannedDay . ' ' . $TempDatePlannedMonth;
                    
                    $VarcharUserDateApplied =  $TempDateAppliedYear . ' ' . $TempDateAppliedDay . ' ' . $TempDateAppliedMonth;

                    $VarcharUserFirstName = mysqli_real_escape_string($connect, $_POST['txtbxUserFirstName']);
                    $VarcharUserLastName = mysqli_real_escape_string($connect, $_POST['txtbxUserLastName']);
                    $VarcharUserContactNum = mysqli_real_escape_string($connect, $_POST['txtbxUserContactNum']);
                    $VarcharUserEmail = mysqli_real_escape_string($connect, $_POST['txtbxUserEmail']);
                    $VarcharUserAddressDetails = mysqli_real_escape_string($connect, $_POST['txtbxAddressDetailsName']);
                    $VarcharUserAddressProvince = mysqli_real_escape_string($connect, $_POST['txtbxAddressProvinceName']);
                    $VarcharUserAddressCityMunicipality = mysqli_real_escape_string($connect, $_POST['txtbxAddressCityMunicipalityName']);
                    $VarcharUserAddressBarangay = mysqli_real_escape_string($connect, $_POST['txtbxAddressBarangayName']);
                    $VarcharUserHeads = mysqli_real_escape_string($connect, $_POST['txtbxUserHeads']);
                    $VarcharUserAddress = $VarcharUserAddressDetails. ' ' .$VarcharUserAddressBarangay . ' ' . $VarcharUserAddressCityMunicipality . ' ' .$VarcharUserAddressProvince;

                    $CurrentDate = date('Y-m-d H:i:s');
                    $DateCurrentString = strtotime($CurrentDate);
                    $DatePlannedString = strtotime($VarcharUserDatePlanned);
                    $DateAppliedString = strtotime($VarcharUserDateApplied);
                    $VarcharUserHeads = mysqli_real_escape_string($connect, $_POST['txtbxUserHeads']);
 
                    $dateInterval = strtotime($CurrentDate. '+ 15 days');

                    //first name validation if input is a space 
                    if ($VarcharUserFirstName == " " || $VarcharUserLastName == " ")
                    {
                       $message = "No blank fields";
                       echo "<script type='text/javascript'>alert('$message');</script>";
                    }

                    else if ($DatePlannedString <= $dateInterval)
                    {
                        $message = "Date Planned Must Be 15 Days or More, Higher Than Date Applied";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }

                    else{
                    if($_POST['txtbxUserHeads'] < 2)
                    {
                        $message = "You Can't Enter Less Than 3!";          
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        header("Location :TVAdminReservations.php");
                    }
                    //$VarcharUserPricePerHead = mysqli_real_escape_string($connect, $_POST['txtbxPricePerHead']);
                    else
                    {
                       $VarcharUserHeads = mysqli_real_escape_string($connect, $_POST['txtbxUserHeads']);
                    }
                    $TempHeads = $_POST['txtbxUserHeads'];
                    //$TempPricePerHead = $_POST['txtbxPricePerHead'];
                    $TempPricePerHead = $VarcharUserPricePerHead;
                    $VarcharUserTotal = $TempHeads * $TempPricePerHead;
                    $VarcharUserDebt = $TempHeads * $TempPricePerHead;
                    $VarcharUserPaid = 0;

                    // checking empty fields
                    if(empty($VarcharUserFirstName) || empty($VarcharUserDatePlanned)) 
                    {
                             
                        if(empty($VarcharUserFirstName) || empty($VarcharUserLastName))
                        {
                            $message = "Enter a valid input";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        if(empty($VarcharUserDatePlanned)) 
                        {
                            $message = "Enter date of tour!";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        //link to the previous page
                        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
                     } 
                    else 
                    { 
                        // if all the fields are filled (not empty) 
                        //insert data to database   
                        //$queryAdd = "INSERT INTO `tbl_reservation` (`reservation_ID`, `reservation_firstName`, `reservation_lastName`, `reservation_contactNum`, `reservation_emailAdd`, `reservation_address`, `reservation_dateApplied`, `reservation_plannedDate`, `reservation_packageID`, `reservation_packageType`, `reservation_status`,`reservation_totalHead`,`reservation_pricePerHead`,`reservation_totalPrice`,`reservation_debt`,`reservation_paid`, reserve_purgeFlag`) VALUES (NULL, '$VarcharUserFirstName', '$VarcharUserLastName', '$VarcharUserContactNum','$VarcharUserEmail', '$VarcharUserAddress', '$VarcharUserDateApplied', '$VarcharUserDatePlanned', '$VarcharPackageID', '$VarcharPackageType','$VarcharUserHeads','$VarcharUserPricePerHead', $VarcharUserTotal, '$VarcharUserDebt','$VarcharUserPaid' , 'Pending', '1')";
                        $queryAdd ="INSERT INTO `tbl_reservation` (`reservation_ID`, `reservation_firstName`, `reservation_lastName`, `reservation_contactNum`, `reservation_emailAdd`, `reservation_address`, `reservation_dateApplied`, `reservation_plannedDate`, `reservation_packageID`, `reservation_packageType`, `reservation_status`, `reservation_totalPrice`, `reservation_pricePerHead`, `reservation_totalHead`, `reservation_paid`, `reservation_debt`, `reservation_purgeFlag`,`reservation_type`, `reservation_schoolName`) VALUES (NULL, '$VarcharUserFirstName', '$VarcharUserLastName', '$VarcharUserContactNum', '$VarcharUserEmail', '$VarcharUserAddress', '$VarcharUserDateApplied', '$VarcharUserDatePlanned', '$VarcharPackageID', '$VarcharPackageType', 'Pending', '$VarcharUserTotal', '$VarcharUserPricePerHead', '$VarcharUserHeads', '$VarcharUserPaid', '$VarcharUserDebt', '1', '$VarcharUserType', '$VarcharUserSchoolName')";
                        if(mysqli_query($connect, $queryAdd))
                        {
                            $message = "Reservation added successfully!";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            //redirectig to the display page. In our case, it is index.php
                            echo "<script type='text/javascript'>location.href = 'TVAdminReservations.php';</script>";

                        }
                        else
                        {
                            $message = "Query Error";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            //redirectig to the display page. In our case, it is index.php
                            echo "<script type='text/javascript'>location.href = 'TVAdminReservations.php';</script>";
                        }
                    }
                }
            }

                ?>
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


        
