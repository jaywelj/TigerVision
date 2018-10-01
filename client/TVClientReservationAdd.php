<?php
                if(isset($_POST['btnFinish'])) 
                {
                    //including the database connection file
                    include_once("TVConnectionString.php");

                    $query = "SELECT * FROM  tbl_tourpackage ";
                    //$query = "SELECT * FROM  tbl_destination ";

                    $radioType=$_POST['r1'];
                    if($radioType=='school')
                    {

                        //$VarcharPackageID = mysqli_real_escape_string($connect, $_POST['dropdownTourPackageID']);
                        $VarcharUserType =  "school";
                        $varcharUserSchoolName = $_POST['txtbxUserSchoolName'];
                    }
                    
                    else if($radioType=='group')
                    {
                        //$VarcharPackageID = mysqli_real_escape_string($connect, $_POST['dropdownCustomPackageID']);
                        
                        $VarcharUserType = "group";
                        $VarcharUserSchoolName = "NULL";
                    }
                    else
                    {
                        $message = "ERROR IN TYPE";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                    
                    $VarcharUserFirstName = mysqli_real_escape_string($connect, $_POST['txtbxUserFirstName']);
                    $VarcharUserLastName = mysqli_real_escape_string($connect, $_POST['txtbxUserLastName']);
                    $VarcharUserContactNum = mysqli_real_escape_string($connect, $_POST['txtbxUserContactNum']);
                    $VarcharUserEmail = mysqli_real_escape_string($connect, $_POST['txtbxUserEmail']);
                    $VarcharUserAddressDetails = mysqli_real_escape_string($connect, $_POST['txtbxAddressDetailsName']);
                    $VarcharUserAddressProvince = mysqli_real_escape_string($connect, $_POST['txtbxAddressProvinceName']);
                    $VarcharUserAddressCityMunicipality = mysqli_real_escape_string($connect, $_POST['txtbxAddressCityMunicipalityName']);
                    $VarcharUserAddressBarangay = mysqli_real_escape_string($connect, $_POST['txtbxAddressBarangayName']);
                    $TempDatePlannedYear = mysqli_real_escape_string($connect, $_POST['dateplanned_year']);
                    $TempDatePlannedDay = mysqli_real_escape_string($connect, $_POST['dateplanned_day']);
                    $TempDatePlannedMonth = mysqli_real_escape_string($connect, $_POST['dateplanned_month']);
                    $TempDateAppliedYear = mysqli_real_escape_string($connect, $_POST['dateapplied_year']);
                    $TempDateAppliedDay = mysqli_real_escape_string($connect, $_POST['dateapplied_day']);
                    $TempDateAppliedMonth = mysqli_real_escape_string($connect, $_POST['dateapplied_month']);

                    $VarcharUserDatePlanned =  $TempDatePlannedYear . ' ' . $TempDatePlannedDay . ' ' . $TempDatePlannedMonth;
                    
                    $VarcharUserDateApplied =  $TempDateAppliedYear . ' ' . $TempDateAppliedDay . ' ' . $TempDateAppliedMonth;

                    $VarcharUserAddress = $VarcharUserAddressDetails. ' ' .$VarcharUserAddressBarangay . ' ' . $VarcharUserAddressCityMunicipality . ' ' .$VarcharUserAddressProvince;

                    $VarcharPackageID = $package_ID;
                    $VarcharUserPricePerHead = $price;
                    $VarcharPackageType = $package_type;

                    $VarcharUserHeads = mysqli_real_escape_string($connect, $_POST['txtbxUserHeads']);

                    //$VarcharUserPricePerHead = mysqli_real_escape_string($connect, $_POST['txtbxPricePerHead']);

                    $TempHeads = $_POST['txtbxUserHeads'];
                    //$TempPricePerHead = $_POST['txtbxPricePerHead'];
                    $TempPricePerHead = $VarcharUserPricePerHead;
                    $VarcharUserTotal = $TempHeads * $TempPricePerHead;
                    $VarcharUserDebt = $TempHeads * $TempPricePerHead;
                    $VarcharUserPaid = 0;

                    $varcharPaymentMethod=$_POST['modeOfPayment'];
                    $varcharPaymentType=$_POST['optionPaymentType'];

                    // checking empty fields
                    if(empty($VarcharUserFirstName) || empty($VarcharUserDatePlanned)) 
                    {
                                
                        if(empty($VarcharUserFirstName)) 
                        {
                            $message = "Eneter a valid name!";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        if(empty($VarcharUserDatePlanned)) 
                        {
                            $message = "Eneter date of tour!";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        //link to the previous page
                        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
                    } 
                    else 
                    { 
                        // if all the fields are filled (not empty) 
                        //insert data to database   
                        //$queryAdd = "INSERT INTO  tbl_reservation  ( reservation_ID ,  reservation_firstName ,  reservation_lastName ,  reservation_contactNum ,  reservation_emailAdd ,  reservation_address ,  reservation_dateApplied ,  reservation_plannedDate ,  reservation_packageID ,  reservation_packageType ,  reservation_status , reservation_totalHead , reservation_pricePerHead , reservation_totalPrice , reservation_debt , reservation_paid , reserve_purgeFlag ) VALUES (NULL, '$VarcharUserFirstName', '$VarcharUserLastName', '$VarcharUserContactNum','$VarcharUserEmail', '$VarcharUserAddress', '$VarcharUserDateApplied', '$VarcharUserDatePlanned', '$VarcharPackageID', '$VarcharPackageType','$VarcharUserHeads','$VarcharUserPricePerHead', $VarcharUserTotal, '$VarcharUserDebt','$VarcharUserPaid' , 'Pending', '1')";
                        $queryAdd ="INSERT INTO  tbl_reservation  ( reservation_ID ,  reservation_firstName ,  reservation_lastName ,  reservation_contactNum ,  reservation_emailAdd ,  reservation_address ,  reservation_dateApplied ,  reservation_plannedDate ,  reservation_packageID ,  reservation_packageType ,  reservation_status ,  reservation_totalPrice ,  reservation_pricePerHead ,  reservation_totalHead ,  reservation_paid ,  reservation_debt ,  reservation_purgeFlag , reservation_type , reservation_schoolName) VALUES (NULL, '$VarcharUserFirstName', '$VarcharUserLastName', '$VarcharUserContactNum', '$VarcharUserEmail', '$VarcharUserAddress', '$VarcharUserDateApplied', '$VarcharUserDatePlanned', '$VarcharPackageID', '$VarcharPackageType', 'Pending', '$VarcharUserTotal', '$VarcharUserPricePerHead', '$VarcharUserHeads', '$VarcharUserPaid', '$VarcharUserDebt', '1', '$VarcharUserType',
                        '$varcharUserSchoolName')";
                        if(!mysqli_query($connect, $queryAdd))
                        {
                            echo("Error description: " . mysqli_error($connect));
                            $message = "Query Error";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                        }
                        else
                        {
                            $last_id = mysqli_insert_id($connect);
                            $message = "Reservation added successfully!";
                            echo "<script type='text/javascript'>alert('$message');</script>";
                            //redirectig to the display page. In our case, it is index.php
                            echo "<script type='text/javascript'>location.href = 'TVClientReservationDone.php?id=$last_id&type=$package_type&pm=$varcharPaymentMethod&pt=$varcharPaymentType';</script>";
                        }
                    }

                }
                ?>