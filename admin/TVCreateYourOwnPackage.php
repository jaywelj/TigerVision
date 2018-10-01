<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Collapsible sidebar using Bootstrap 3</title>

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
                        <a href="#homeSubmenu" >
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
                    <li class="active">
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-wrench"></i>
                        Maintenance<span class="caret" ></span></a>

                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li ><a href="TVAdminDestinations.php">Destinations</a></li>
                            <li class="active"><a href="TVAdminPackages.php">Packages</a></li>
                            <li><a href="#">Users</a></li>

                        </ul>
                    </li>
                </ul>

                <!--<ul class="list-unstyled CTAs">
                    <li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>
                    <li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>
                </ul>-->
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
            <div id="content" style="overflow: hidden;">
                <!-- VIEW -->
                <?php
                //including the database connection file
                include_once("TVDODatabaseConnection.php");
                //fetching data in descending order (lastest entry first)
                //$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
                $result = mysqli_query($mysqli, "SELECT * FROM tbl_tourpackage ORDER BY package_ID DESC");// using mysqli_query instead
                ?>
                <div class="container" style="width:100%">
                    <p style="font-size: 35px; color: #000;">
                        <strong>Packages</strong> 
                        <button type="button" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#modalAddPackages">Add  +</button>
                    </p>
                    <div class="table-responsive" >       
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th>Package ID</th>
                                    <th>Package Name</th>
                                    <th>Package Description</th>
                                    <th>Price Per Head</th>
                                    <th>Destination 1</th>
                                    <th>Destination 2</th>
                                    <th>Destination 3</th>
                                    <th>Destination 4</th>
                                    <th>Destination 5</th>
                                    <th>Image</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
                                    while($res = mysqli_fetch_array($result)) 
                                    { 

                                        echo "<tr>";   
                                        echo "<td><span data-placement=top data-toggle=tooltip style='color:green;'>
                                                  <a href=#?thisid=$res[package_ID] data-toggle=modal data-target=#modalEditReservation><strong>edit</a></span></td>" ;  
                                        echo "<td style='color:red;'>
                                                  <a href=#d data-toggle=modal data-target=#modalEditReservation><strong>delete</a></td>";   
                                        echo "<td>".$res['package_ID']."</td>";
        echo "<td>".$res['package_name']."</td>";
        echo "<td>".$res['package_description']."</td>";
        echo "<td>".$res['package_pricePerHead']."</td>";
        echo "<td>".$res['package_destination1']."</td>";
        echo "<td>".$res['package_destination2']."</td>";
        echo "<td>".$res['package_destination3']."</td>";
        echo "<td>".$res['package_destination4']."</td>";
        echo "<td>".$res['package_destination5']."</td>";
        echo "<td>".$res['package_image']."</td>";                                     
                                    }
                                  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END OF VIEW -->
                <!-- ADD -->
                <!-- Modal -->
                <?php

                // php select option value from database
                include("TVPackageDatabaseConnection.php");

                // mysql select query
                $query = "SELECT * FROM `tbl_destination`";

                // for method 1/

                $result1 = mysqli_query($mysqli, $query);
                $result2 = mysqli_query($mysqli, $query);
                $result3 = mysqli_query($mysqli, $query);
                $result4 = mysqli_query($mysqli, $query);
                $result5 = mysqli_query($mysqli, $query);

                ?>
                <div class="modal fade" id="modalAddPackages" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><strong>Add a Package</strong></h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" name="form1" id="prevsub">
                                <table width="25%" border="0">

                                    <div class="form-group">
                                        <label>Package Name</label>
                                        <input type="text" name="txtbxPackageName" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Package Description</label>
                                        <textarea 
                    id="text" 
                    cols="40" 
                    rows="4" 
                    name="txtbxPackageDescription" 
                    placeholder="Package Description"
                    class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Price Per Head</label>
                        <input type="text" name="txtbxPackagePrice" class="form-control">
                                    </div>
                                    <div class="form-group"> 
                                        <label>Destination 1</label>
                                        <select name="Select1" class="form-control">
<option value="">Destination 1</option>
                <?php while($row1 = mysqli_fetch_array($result1)):;?>

                <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

                <?php endwhile;?>

                </select>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Destination 2</label>
                                        <select name="Select2" class="form-control">
<option value="">Destination 2</option>
                <?php while($row1 = mysqli_fetch_array($result2)):;?>

                <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

                <?php endwhile;?>

                </select>
                                    </div>
<div class="form-group"> 
                                        <label>Destination 3</label>
                                        <select name="Select3" class="form-control">
                                            <option value="">Destination 3</option>
                <?php while($row1 = mysqli_fetch_array($result3)):;?>

                <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

                <?php endwhile;?>

                </select>
                                    </div>
<div class="form-group"> 
                                        <label>Destination 4</label>
                                        <select name="Select4" class="form-control">
                                            <option value="">Destination 4</option>
                <?php while($row1 = mysqli_fetch_array($result4)):;?>
                    
                <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

                <?php endwhile;?>

                </select>
                                    </div>

                                    <div class="form-group"> 
                                        <label>Destination 5</label>
                                        <select name="Select5" class="form-control">
                <option value="">Destination 5</option>
                <?php while($row1 = mysqli_fetch_array($result5)):;?>

                <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>

                <?php endwhile;?>

                </select>
                                    </div>
                                    <div class="form-group"> 
                                        <label>Image</label>
                                        <input type="file" name="imgPackageImage">
                                    </div>
                                    <div class="form-group">
                                        <label>Type Of Package</label>
                                        <select class="form-control" name="selected_package">
                    <option value=" ">Select type of package</option>';
                    <option value="newpackage">New Package</option>
                    <option value="tourpackage">Tour Package</option>
                     </select>
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
                                    include 'TVPackageAdd.php';
                                    $TempSelected = $_POST['selected_package'];
    if ($TempSelected == 'newpackage')
    {
        header("Location: TVCreateYourOwnPackage.php");
    }
    elseif ($TempSelected !== 'tourpackage'){
        echo'Didn`t Select Any Type Of Package';
    }   
    else {
        
    }
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
                <!-- EDIT -->\
                <!-- Modal -->
                <?php
                    include_once("TVDODatabaseConnection.php");

                    //selecting data associated with this particular id
                    $result = mysqli_query($mysqli, "SELECT * FROM tbl_destination ");
                   // echo $editthis;
                    while($res = mysqli_fetch_array($result))
                    {
                        $varcharID = $res['destination_ID'];
                        $varcharName = $res['destination_name'];
                        $varcharAddress = $res['destination_address'];
                        $varcharEmail = $res['destination_email'];
                        $varcharContacts = $res['destination_contacts'];
                        $varcharLink = $res['destination_link'];
                        $varcharDescription = $res['destination_description'];
                        $varcharImage = $res['destination_image'];
                        $doublePriceMin = $res['destination_pricemin'];
                        $doublePriceMax = $res['destination_pricemax'];
                    }
                ?>
                <div class="modal fade" id="modalEditReservation" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Update Record</h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" name="form1" id="prevsub">
                                    <table width="25%" border="0">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="txtbxName" class="form-control" value="<?php echo $varcharName;?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="txtbxAddress" class="form-control" value="<?php echo $varcharAddress;?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="txtbxEmail" class="form-control" value="<?php echo $varcharEmail;?>">
                                        </div>
                                        <div class="form-group"> 
                                            <label>Contact No</label>
                                            <input type="text" name="txtbxContactNo" class="form-control" value="<?php echo $varcharContacts;?>">
                                        </div>
                                        <div class="form-group"> 
                                            <label>Link</label>
                                            <input type="text" name="txtbxLink" class="form-control" value="<?php echo $varcharLink;?>">
                                        </div>
                                        <div class="form-group"> 
                                            <label>Description</label>
                                            <textarea 
                                                id="text" 
                                                cols="40" 
                                                rows="4" 
                                                name="txtbxDescription" 
                                                class="form-control"
                                                placeholder=""><?php echo $varcharDescription;?></textarea>
                                        </div>
                                        <div class="form-group"> 
                                            <label>Image</label>
                                            <input type="file" name="imgDestinationImage" class="form-control" value="<?php echo $varcharImage;?>">
                                        </div>
                                        <div class="form-group"> 
                                            <label>Price-Minimum</label>
                                            <input type="text" name="txtbxPriceMin" class="form-control" value="<?php echo $doublePriceMin;?>">
                                        </div>
                                        <div class="form-group"> 
                                            <label>Price-Maximum</label>
                                            <input type="text" name="txtbxPriceMax" class="form-control" value="<?php echo $doublePriceMax;?>">
                                        </div>
                                        <div class="form-group">
                                            <strong><input type="submit" name="btnUpdate" value="Update" class="form-control">
                                        </div>
                                    </table>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default strong" data-dismiss="modal"><strong>Close</button>
                            </div>
                        </div>
                    </div>
                </div>
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
