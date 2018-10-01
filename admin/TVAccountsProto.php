<!DOCTYPE html>
<html>
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
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Viewing Your Account</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="admincss/TVAdminSideBar.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    </head>
    <body style="overflow: hidden;">
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
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user">Account
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                      <li><a href="TVAdminAccounts.php">View Account</a></li>
                                      <li><a href="TVAdminLogout.php">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            <!-- Page Content Holder -->
            <div id="content" style="overflow: hidden;">
                <!-- VIEW -->
                <section class="about_wrapper">
                    <div class="container">

                        <div class="row">
                              <div class="about_img os-animation">

                                 <figure><img src="assets/img/rikoprofpic.jpg"  alt=""></figure>
                              </div>
                              <div class="vertical_space"></div>
                              <div class="col-md-3 col-sm-3 text-center os-animation">
                               
                                  <p class="section_heading">Riko Sonoda Sakurauchi</p>
                                  <h3>College</h3>
                          
                                  <div class="about_block">
                                      <a href="editaccount.html">     
                                      <img src="assets/img/iconedit.png"  alt="" height="20" width="20">
                                      <p> </p>
                                      <p>Change Basic Account</p>
                                      <p>Details</p>
                                  </div>
                               </div>
                              
                              <div class="col-md-9 col-sm-9 os-animation">
                                                      

                                <h3 class="section_heading">I. Personal Information</h3>
                                <h3>Course,Year and Section : BSIT 3-2</h3>
                                 <p>She is a second-year student who joined Chika's class after moving from Akihabara, Tokyo. She transferred from Otonokizaka High School. She is neighbors with her friend Chika.</p>
                                <div class="devider">
                                    <div class="icon-green">
                                        <div class="white-icon"></div>
                                    </div>
                                </div>

                                <div class="vertical_space"></div>
                                <p><span>Gender :  </span>  Female </p>
                                <p><span>Sexuality :  </span>  Bisexual </p>
                                <p><span>Height :  </span>  160cm </p>
                                <p><span>Weight :  </span>  64kg </p>
                                <p><span>Complexion :  </span>  Fair White </p>
                                <p><span>Age :  </span>  16 </p>
                                <p><span>Civil Status :  </span>  Single </p>
                                <p><span>Date Of Birth :</span> September 09 1999 </p>
                                <p><span>Mobile Phone : </span> 0915-1972299 </p>
                                <p><span>Telephone : </span> 750-2124 </p>
                                <p><span>Email : </span>  rikkako09@gmail.com </p>
                                <p><span>City Address :  </span>  Tochiman Hills, Quezon City </p>
                                <p><span>Provincial Address :  </span>  Tochiman Inn, Cavite </p>
                                <p><span>Place of birth : </span> Tokyo </p>
                                <p><span>Religion : </span> Christian </p>
                                <p><span>Highschool General Average : </span> 88% </p>
                              </div>


                                </div>
                                </div>
                            
                              
                        </div>
                    </div>
                 </section>
                <div style="padding:70px;">
                    <p style="font-size: 35px; color: #000;">
                        <strong>Viewing Your Account</strong> 
                        <button><a href=TVAdminAccountEdit.php>Edit</a>
</button>
                    </p>
                    <?php 
include ("TVConnectionString.php");



$result = mysqli_query($connect,"SELECT * FROM tbl_adminlogin WHERE admin_adminName = '$username'");
//$res = mysqli_fetch_assoc($result);
//$varcharAccountImage = $res['admin_image'];
while($res = mysqli_fetch_array($result))
{
    $varcharAccountName = $res['admin_adminName'];
    $varcharAccountFirstName = $res['admin_firstName'];
    $varcharAccountLastName = $res['admin_lastName'];
    $varcharAccountPassword = $res['admin_password'];
    $varcharAccountContacNum = $res['admin_contactNum'];
    $varcharAccountImage = $res['admin_image'];
    $varcharAccountBirthdate = $res['admin_birthDate'];
    $varcharAccountAccessLevel = $res['admin_accessLevel'];

$userpicture = $varcharAccountImage;
$_SESSION['userimage'] = $varcharAccountImage;

   

    echo '<img src="'.$res['admin_image'].'" width="200" height="200" />';
    echo "<br>";
    echo "<strong> Username : ".$res['admin_adminName']." </strong>";
    echo "<br>";
    echo "<br>";
    echo "First Name: ".$res['admin_firstName']." ";
    echo "<br>";
    echo "Last Name: ".$res['admin_lastName']." ";
    echo "<br>";
    echo "Contact Number: ".$res['admin_contactNum']." ";
    echo "<br>";
    echo "Birthdate: ".$res['admin_birthDate']." ";
    echo "<br>";
    echo "Access Level: ".$res['admin_accessLevel']." ";
    echo "<br>"; 
    //echo "<a href=\"TVAccountEdit.php?username=$res[admin_adminName]\">Edit</a>";
    echo "<br>";   
}
?>
                    <div class="table-responsive" >       
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    
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
                <div class="modal fade" id="modalAddDestination" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><strong>Add a Destination</strong></h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" name="form1" id="prevsub">
                                <table width="25%" border="0">

                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="txtbxName" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="txtbxAddress" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="txtbxEmail" class="form-control">
                                    </div>
                                    <div class="form-group"> 
                                        <label>Contact No</label>
                                        <input type="text" name="txtbxContactNo" class="form-control">
                                    </div>
                                    <div class="form-group"> 
                                        <label>Link</label>
                                        <input type="text" name="txtbxLink" class="form-control">
                                    </div>
                                    <div class="form-group"> 
                                        <label>Description</label>
                                        <textarea 
                                            id="text" 
                                            cols="40" 
                                            rows="4" 
                                            name="txtbxDescription" 
                                            placeholder="Description" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Image</label>
                                        <input type="file" name="imgDestinationImage">
                                    </div>
                                    <div class="form-group"> 
                                        <label>Price-Minimum</label>
                                        <input type="text" name="txtbxPriceMin" class="form-control">
                                    </div>
                                    <div class="form-group"> 
                                        <label>Price-Maximum</label>
                                        <input type="text" name="txtbxPriceMax" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <strong><input type="submit" name="btnAddRecord" value="Add" class="form-control">
                                    </div>
                                </table>
                            </form>
                            <?php
                                //including the database connection file
                                include_once("TVDODatabaseConnection.php");

                                if(isset($_POST['btnAddRecord'])) 
                                {
                                    include 'TVDOAdd.php';
                                }
                            ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><strong>Close</strong></button>
                            </div>
                        </div>
                    </div>
                </div>
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
