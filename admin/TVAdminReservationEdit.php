<?php
session_start();
$_accessLevel = $_SESSION['adminAccessLevel'];
if ($_accessLevel=='Admin'){
} else if ($_accessLevel=='Staff') {
    echo'<script> document.getElementById("userdiv").style.display ="none"; </script>';
} else {
    header("Location: TVAdminLogout.php");
}
    // including the database connection file=\]
    include_once("TVConnectionString.php");
    $reservationID = $_GET['id'];

    //selecting data associated with this particular id
    $result = mysqli_query($connect, "SELECT * FROM tbl_reservation WHERE reservation_ID = $reservationID");

    while($res = mysqli_fetch_array($result))
    {
        $reservation_firstName = $res['reservation_firstName'];
        $reservation_lastName = $res['reservation_lastName'];
        $reservation_type = $res['reservation_type'];
        $reservation_schoolName = $res['reservation_schoolName'];
        $reservation_contactNum = $res['reservation_contactNum'];
        $reservation_emailAdd = $res['reservation_emailAdd'];
        $reservation_address = $res['reservation_address'];
        $reservation_dateApplied = $res['reservation_dateApplied'];
        $reservation_plannedDate = $res['reservation_plannedDate'];
        $reservation_packageID = $res['reservation_packageID'];
        $reservation_packageType = $res['reservation_packageType'];
        $reservation_status = $res['reservation_status'];
        $reservation_totalHead = $res['reservation_totalHead'];
        $reservation_totalPrice = $res['reservation_totalPrice'];
        $reservation_pricePerHead = $res['reservation_pricePerHead'];
        $reservation_paid = $res['reservation_paid'];
        $reservation_debt = $res['reservation_debt'];
    }
    $query = "SELECT * FROM `tbl_createnewpackage` WHERE np_purgeFlag = 1";
    $query2 = "SELECT * FROM `tbl_tourpackage` WHERE package_purgeFlag = 1";

    // for method 1/

    $result1 = mysqli_query($connect, $query);
    $result2 = mysqli_query($connect, $query2);

    $getTourPackageNameQuery = "SELECT * FROM tbl_tourpackage WHERE package_ID = '$reservation_packageID'";
    $getTourPackageNameArray = mysqli_query($connect, $getTourPackageNameQuery);

    $getCustomPackageNameQuery = "SELECT * FROM tbl_createnewpackage WHERE np_ID = '$reservation_packageID'";
    $getCustomPackageNameArray = mysqli_query($connect, $getCustomPackageNameQuery);
    if(isset($_POST['btnUpdate']))
    {   
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
            $tempPackage = $_POST['dropdownTourPackageID'];
            $result_explode1 = explode('|', $tempPackage);
            $VarcharPackageID = $result_explode1[0];
            $VarcharUserPricePerHead = $result_explode1[1];
            $VarcharPackageType = "tour package";
        }
        
        else if($radioPackageType=='customPackage')
        {
            $tempPackage = $_POST['dropdownCustomPackageID'];
            $result_explode1 = explode('|', $tempPackage);
            $VarcharPackageID = $result_explode1[0];
            $VarcharUserPricePerHead = $result_explode1[1];
            $VarcharPackageType = "custom package";
        }
        else
        {
            $message = "ERROR";
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
        $VarcharUserAddress = mysqli_real_escape_string($connect, $_POST['txtbxUserAddress']);
        $VarcharUserStatus = mysqli_real_escape_string($connect, $_POST['txtbxUserStatus']);
        $DateAppliedString = strtotime($VarcharUserDateApplied);
        $DatePlannedString = strtotime($VarcharUserDatePlanned);
        
        

        $VarcharUserHeads = mysqli_real_escape_string($connect, $_POST['txtbxUserHeads']);
        //$VarcharUserPricePerHead = mysqli_real_escape_string($connect, $_POST['txtbxPricePerHead']);

        $TempHeads = $_POST['txtbxUserHeads'];
        $TempPricePerHead = $VarcharUserPricePerHead;
        $VarcharUserTotal = $TempHeads * $TempPricePerHead;
        //$VarcharUserPaid = mysqli_real_escape_string($connect, $_POST['txtbxTotalPaid']);
        $TempUserDebt = mysqli_real_escape_string($connect, $_POST['txtbxTotalDebt']);
        $VarcharUserDebt = $reservation_debt;
        $dateInterval = strtotime($VarcharUserDateApplied. '+ 15 days');


        // checking empty fields
        if(empty($VarcharUserFirstName) || empty($VarcharUserLastName)) 
        {   
            echo "<font color='red'>First Name field is empty.</font><br/>";
        }   
        //first name and lastname validation if input is a space 
        else if ($VarcharUserFirstName == " " || $VarcharUserLastName == " ")
        {
            $message = "No blank fields";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }         
        //Validation when you edit the dates
        
        else if ($DatePlannedString < $dateInterval)
        {
            $message = "Date Planned Must Be 15 Days or More, Higher Than Date Applied";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        //END OF Validation when you edit the dates   
        else 
        {   
            //$queryEdit="UPDATE `tbl_reservation` SET `reservation_firstName` = '$VarcharUserFirstName', `reservation_lastName` = '$VarcharUserLastName', `reservation_contactNum` = '$VarcharUserContactNum', `reservation_emailAdd` = '$VarcharUserEmail', `reservation_address` = '$VarcharUserAddress', `reservation_dateApplied` = '$VarcharUserDateApplied', `reservation_plannedDate` = '$VarcharUserDatePlanned', `reservation_status` = $VarcharUserStatus WHERE `tbl_reservation`.`reservation_ID` = $reservationID";
            //redirectig to the display page. In our case, it is index.php
            
            if($VarcharUserStatus = 'Cancelled')
                {
                echo "<script type='text/javascript'>location.href = 'TVAdminReservationCancelledFeedback.php?id=$reservationID';</script>";
                }
                else {
            $queryEdit = "UPDATE `tbl_reservation` SET `reservation_firstName` = '$VarcharUserFirstName', `reservation_lastName` = '$VarcharUserLastName', `reservation_contactNum` = '$VarcharUserContactNum', `reservation_emailAdd` = '$VarcharUserEmail', `reservation_address` = '$VarcharUserAddress', `reservation_dateApplied` = '$VarcharUserDateApplied', `reservation_plannedDate` = '$VarcharUserDatePlanned', `reservation_packageID` = '$VarcharPackageID', `reservation_packageType` = '$VarcharPackageType', `reservation_status` = '$VarcharUserStatus', `reservation_totalPrice` = '$VarcharUserTotal' , `reservation_totalHead` = '$VarcharUserHeads', `reservation_pricePerHead` = '$VarcharUserPricePerHead', `reservation_debt` = '$VarcharUserDebt', `reservation_type` = '$VarcharUserType', `reservation_schoolName` = '$VarcharUserSchoolName' WHERE `tbl_reservation`.`reservation_ID` = $reservationID";

            if(mysqli_query($connect,$queryEdit))
            {
                $message = "Reservation updated successfully!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                //redirectig to the display page. In our case, it is index.php
                echo "<script type='text/javascript'>location.href = 'TVAdminReservations.php';</script>";
            }
            else
            {
                $message = "Query Error!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
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
            <div id="content" class="modal-body" style="padding:70px;">
                <form name="form1" method="post">
                        <p style="font-size: 35px; color: #000;">
                            <strong>Edit Reservations</strong> 
                        </p>
                        <table border="0">
                        <div class="form-group">
                            <tr> 
                                <label>Firstname Name</label>
                                <input type="text" name="txtbxUserFirstName" value="<?php echo $reservation_firstName;?>" class="form-control" style = "text-transform: capitalize;" required>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr> 
                                <label>Last Name</label>
                                <input type="text" name="txtbxUserLastName" value="<?php echo $reservation_lastName;?>" class="form-control" style = "text-transform: capitalize;" required>
                            </tr>
                        </div>
                        <br>
                        <div class="form-group"> 
                            <label>Type</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input id="radioSchoolType" type="radio" name="radioType" value="School" class="custom-control-input" onclick="document.getElementById('groupdiv').style.display ='none'; document.getElementById('schooldiv').style.display ='block'; document.getElementById('showSchoolName').required = true;">
                            <label class="custom-control-label" for="customRadioInline1">School</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input id="radioGroupType" type="radio" name="radioType" value="Group" class="custom-control-input" onclick="document.getElementById('schooldiv').style.display ='none'; document.getElementById('groupdiv').style.display ='block'; document.getElementById('showSchoolName').required = false;">
                            <label class="custom-control-label" for="customRadioInline2">Group</label>
                        </div>
                        <br>
                        <div class="form-group" id="schooldiv"  style="display:none;"> 
                            <label>School Name</label>
                            <input id="showSchoolName" type="text" name="txtbxUserSchoolName" class="form-control" value="<?php echo"$reservation_schoolName";?>">
                        </div>
                        <div class="form-group" id="groupdiv" style="display:none;"> 
                            <input type="hidden" name="HiddenUserSchoolName" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <tr> 
                                <label>Contact Number</label>
                                <input type="tel" name="txtbxUserContactNum" value="<?php echo $reservation_contactNum;?>" class="form-control" required>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr> 
                                <label>Email Address</label>
                                <input type="email" name="txtbxUserEmail" value="<?php echo $reservation_emailAdd;?>" class="form-control" required>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr> 
                                <label>Address</label>
                                <textarea name = "txtbxUserAddress" class = "form-control" placeholder = "Unit Number, Building Name or Lot/Block Number, House Number, Street Name&#10;Village/Subdivision or Postal Code Name or Purok Name&#10;Baranggay Name, Postal Code&#10;City/Municipality Name&#10;Province, Philippines" rows=5 style="resize :none" required><?php echo $reservation_address;?></textarea>
                                <!-- <input type="text" name="txtbxUserAddress" value="<?php echo $reservation_address;?>" class="form-control" required> -->
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                            <label>Status</label>
                            <br>
                            <select class="form-control" name="txtbxUserStatus" style="width:33%; display:inline-block;">
                                <?php
                                
                                echo'<option>'.$reservation_status.'</option>';
                                ?>
                                <option>Pending</option>
                                <option>Accepted</option>
                                <option>Cancelled</option>
                            </select>
                        </tr>
                        </div>
                        <div class="form-group">
                            <?php
                            $year="";
                            for ($i=0; $i<4; $i++)
                            {
                                if($reservation_dateApplied[$i] != " ")
                                $year .= $reservation_dateApplied[$i];
                            }
                            
                            ?>
                            <br>
                            <label>Date Applied</label>
                            <br>
                            <select class="form-control" name="dateapplied_year" style="width:33%; display:inline-block;">
                                <?php
                                echo "<option>".$year."</option>";
                                for ($i = 2018; $i >= 1900 ; $i--) 
                                {
                                    echo'<option  value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>

                            <select class="form-control" name="dateapplied_month" style="width:33%; display:inline-block;">
                                <?php
                                $month="";
                                for ($i=7; $i<30; $i++)
                                {
                                    if($reservation_dateApplied[$i] != " ")
                                    $month .= $reservation_dateApplied[$i];
                                        
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

                            <select class="form-control" name="dateapplied_day" style="width:33%; display:inline-block;">
                                <?php
                                $day="";
                                for ($i=4; $i<7; $i++)
                                {
                                    if($reservation_dateApplied[$i] != " ")
                                    $day .= $reservation_dateApplied[$i];
                                }
                                echo'<option>'.$day.'</option>';
                                for ($i = 1; $i <= 31; $i++) 
                                {
                                    echo'<option class=  value="' . $i . '">' . $i . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Date Planned</label>
                            <?php
                            $year="";
                            for ($i=0; $i<4; $i++)
                            {
                                if($reservation_plannedDate[$i] != " ")
                                $year .= $reservation_plannedDate[$i];
                            }
                            ?>
                            <br>
                            <select class="form-control" name="dateplanned_year" style="width:33%; display:inline-block;">
                                <?php
                                echo '<option>'.$year.'</option>';
                                for ($i = 2018; $i >= 1900; $i--) {
                                echo'<option>' . $i . '</option>';
                                }
                                ?>
                            </select>

                            <select id="months" onchange="month()" class="form-control" name="dateplanned_month" style="width:33%; display:inline-block;">
                                <?php
                                $month="";
                                for ($i=7; $i<20; $i++)
                                {
                                    if($reservation_plannedDate[$i] != " ")
                                    $month .= $reservation_plannedDate[$i];
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

                            <select id="day" class="form-control" name="dateplanned_day" style="width:33%; display:inline-block;">
                                <?php
                                $day="";
                                for ($i=4; $i<7; $i++)
                                {
                                    if($reservation_plannedDate[$i] != " ")
                                    $day .= $reservation_plannedDate[$i];
                                }
                                echo '<option>'.$day. '</option>';
                                ?>
                            </select>
                        </div>
                       
                        <div class="form-group"> 
                            <label>Package</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input id="radioPackageTour" type="radio" name="radioPackage" value="tourPackage" class="custom-control-input" onclick="document.getElementById('custompackagediv').style.display ='none'; document.getElementById('tourpackagediv').style.display ='block';">
                            <label class="custom-control-label" for="customRadioInline1">Tour Package</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input id="radioPackageCustom" type="radio" name="radioPackage" value="customPackage" class="custom-control-input" onclick="document.getElementById('tourpackagediv').style.display ='none'; document.getElementById('custompackagediv').style.display ='block';">
                            <label class="custom-control-label" for="customRadioInline2">Custom Package</label>
                        </div>
                        <br>
                        <div class="form-group" id="tourpackagediv"  style="display:none;"> 
                            <label>Tour Package</label>
                            <select name="dropdownTourPackageID" class="form-control">
                                <option value="<?php echo $reservation_packageID;?>|<?php echo $reservation_pricePerHead;?>">
                                    <?php 
                                    while($getName = mysqli_fetch_array($getTourPackageNameArray)):;
                                    echo $getName[1];
                                    endwhile;?>
                                </option>
                                <?php while($row2 = mysqli_fetch_array($result2)):;?>    
                                <option value="<?php echo $row2[0];?>|<?php echo $row2[2];?>">
                                    <?php echo $row2[1];?>
                                </option>
                                    <?php endwhile;?>
                            </select>
                        </div>
                        <div class="form-group" id="custompackagediv" style="display:none;"> 
                            <label>Custom Package</label>
                            <select name="dropdownCustomPackageID" class="form-control">
                                <option value="<?php echo $reservation_packageID; ?>|<?php echo $reservation_pricePerHead;?>">
                                    <?php 
                                    while($getName = mysqli_fetch_array($getCustomPackageNameArray)):;
                                    echo $getName[1];
                                    endwhile;?>
                                </option>
                                <?php while($row1 = mysqli_fetch_array($result1)):;?>
                                <option value="<?php echo $row1[0];?>|<?php echo $row1[2];?>">
                                <?php echo $row1[1];?>  
                                </option>
                                <?php endwhile;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <tr> 
                                <label>Reserved People</label>
                                <input type="text" name="txtbxUserHeads" value="<?php echo $reservation_totalHead;?>" class="form-control" readonly>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr> 
                                <label>Price Per Head</label>
                                <input type="text" name="txtbxPricePerHead" value="<?php echo $reservation_pricePerHead;?>" class="form-control" readonly>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr> 
                                <label>Total Price</label>
                                <input type="text" name="txtbxTotalPrice" value="<?php echo $reservation_totalPrice;?>" class="form-control" readonly>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr> 
                                <label>Debt</label>
                                <input type="text" name="txtbxTotalDebt" value="<?php echo $reservation_debt;?>" class="form-control" readonly>
                            </tr>
                        </div>
                       <!-- <div class="form-group">
                            <tr> 
                                <label>Paid</label>
                                <input type="text" name="txtbxTotalPaid" value="<?php echo $reservation_paid;?>" class="form-control">
                            </tr>
                        </div> -->
                        <br>
                        <div class="form-group">
                            <tr> 
                                <input type="hidden" name="ReservationID" value=<?php echo $_GET['id'];?>>
                                <a href="TVAdminReservations.php" type="btn" name="btnCancel" class="form-control pull-right btn-danger" style="width:25%; margin:5px";><center>Cancel</center></a>
                                <input type="submit" name="btnUpdate" value="Update" class="form-control pull-right btn-success" style="width:25%; margin: 5px";>
                            </tr>
                        </div>
                        <?php 
                            if($reservation_packageType=='tour package')
                            {
                                echo'<script> document.getElementById("radioPackageTour").checked = true; document.getElementById("custompackagediv").style.display ="none"; document.getElementById("tourpackagediv").style.display ="block"; </script>';
                                
    
                            }
                            else if($reservation_packageType=='custom package')
                            {
                                echo'<script> document.getElementById("radioPackageCustom").checked = true; document.getElementById("tourpackagediv").style.display ="none"; document.getElementById("custompackagediv").style.display ="block";</script>';
                            }
                        ?>
                        <?php 
                            if($reservation_type=='school')
                            {
                                echo'<script> document.getElementById("radioSchoolType").checked = true; document.getElementById("groupdiv").style.display ="none"; document.getElementById("schooldiv").style.display ="block"; </script>';
                                
    
                            }
                            else if($reservation_type=='group')
                            {
                                echo'<script> document.getElementById("radioGroupType").checked = true; document.getElementById("schooldiv").style.display ="none"; document.getElementById("groupdiv").style.display ="block";</script>';
                            }
                        ?>
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
