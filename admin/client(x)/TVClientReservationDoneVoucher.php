<?php  
ob_start();
 function fetch_data()  
 {  
      $output = '';
      $package_ID = $_GET['id'];   
      $connect = mysqli_connect("localhost", "root", "", "tigervision");  
      $sql = "SELECT * FROM tbl_reservation WHERE reservation_purgeFlag = 1 AND reservation_ID = $package_ID";  
      $result = mysqli_query($connect, $sql);
      $query = "SELECT * FROM `tbl_destination`";

        // for method 1/
      $result1 = mysqli_query($connect, $query);
      $result2 = mysqli_query($connect, $query);
      $result3 = mysqli_query($connect, $query);
      $result4 = mysqli_query($connect, $query);
      $result5 = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '  
                          <p>'.$row["reservation_ID"].'</p>  
                          <p style="font-size: 35px; color: #000;">
                                <strong>PACKAGE DETAILS</strong> 
                            </p>
                            <div class="modal-body" style="padding:70px;">';
                $package_type=$_GET['type'];       
                
                if(isset($package_ID))
                {
                  
                  include("TVConnectionString.php");  
                  $output = '';
                  if($package_type=="tour package")
                  {
                    $message = "Query Error!";
                
                    include('TVClientTourAdd.php');
                  }
                  if($package_type=="custom package")
                  {
                    include('TVClientCustomAdd.php');
                  }
                  

                    $output .='
                      </div>
                    ';
                  echo $output;
                }
                
                $output .= '<div class="form-group">
                                <label>Date Applied</label>
                                <br><br>
                                <select class="form-control" name="dateapplied_year" style="width:33%; display:inline-block;">
                                    <option value=" '.date('Y').'"> '.date('Y').'</option>
                
                                    "<option value=NULL>Year</option>"';
                                    for ($i = 2018; $i >= 1900; $i--) 
                                    {
                                        $output .= '<option  value="' . $i . '">' . $i . '</option>';
                                    }
                                    
                                $output .= '</select>

                                <select class="form-control" name="dateapplied_day" style="width:33%; display:inline-block;">
                                    <option value=" '.date('j').'">'.date('j').'</option>
                                    <?php
                                    for ($i = 1; $i <= 31; $i++) 
                                    {
                                        <option class=  value="' . $i . '">' . $i . '</option>
                                    }
                                    
                                </select>

                                <select class="form-control" name="dateapplied_month" style="width:33%; display:inline-block";>
                                    <option value=" '.date('F').'"> '.date('F').'</option>;
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
                            <div class="form-group">
                                <label>Date Planned</label>
                                <br>
                                <select class="form-control" name="dateplanned_year" style="width:33%; display:inline-block;">
                                    <option value="'.date('Y').'">'.date('Y').'</option>

                                    
                                    <option value=" ">Year</option>';
                                    for ($i = 2018; $i <= 2100; $i++) {
                                   $output .= '<option  class=  value="' . $i . '">' . $i . '</option>';
                                    }
                                    
                                $output .= '</select>



                                <select class="form-control" name="dateplanned_day" style="width:33%; display:inline-block;">
                                    <option value="'. date('j').'">'.date('j').'</option>
                                    
                                    <option value=" ">Day</option>';
                                    for ($i = 1; $i <= 31; $i++) {
                                    $output .= '<option class=  value="' . $i . '">' . $i . '</option>';
                                    } 
                                    
                                $output .= '</select>
                                <select class="form-control" name="dateplanned_month" style="width:33%; display:inline-block;">
                                <option value="'.date('F').'">'.date('F').'</option>;
                                <option>Month</option>;
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
                            </div>
                            <br>
                            <div class="form-group" id="tourpackagediv"  style="display:none;"> 
                                <label>Tour Package</label>
                                <select name="dropdownTourPackageID" class="form-control">
                                    <option disbled value="NULL">--- Select Package ---</option>';
                                   while($row2 = mysqli_fetch_array($result2)):;    
                                    $output .= '<option value="'.$row2[0].'| '.$row2[2].'">
                                         '.$row2[1].'
                                    </option>';
                                        endwhile;
                                $output .= '</select>
                            </div>
                            <div class="form-group" id="custompackagediv" style="display:none;"> 
                                <label>Custom Package</label>
                                <select name="dropdownCustomPackageID" class="form-control">
                                    <option value="NULL">--- Select Package ---</option>
                                    ';while($row1 = mysqli_fetch_array($result1)):;
                                    $output .= '<option value="'.$row1[0].'|'.$row1[2].'">
                                    '.$row1[1].' 
                                    </option>';
                                    endwhile;
                                $output .= '</select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="priceeach" id="priceeach" value=900 class="form-control"
                            </div>
                            <div class="col-lg-6">
                  <div class="panel panel-success">
                    <div class="panel-heading text-center"><h1><strong>Price per Head</strong></h1></div>
                    <h1 class=" text-center"><strong>Php90000/head</strong></h1>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="panel panel-success">
                    <div class="panel-heading text-center"><h1><strong>Total Price</strong></h1></div>

                    <h1 class=" text-center" id="totalpriceh1"></h1>
                  </div>
                </div>
              </div>
                     
                          ';  
      }  
      return $output;  
}



 
      require_once('dependencyphp/TCPDF/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Tigervision - Reservation Voucher");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '
      <img src="Images/LogoTigerVision.png" height="42" width="42"> 
      <b>Tigervision</b>
      <h4 align="center">Reservation List<br />
      <table border="0" cellspacing="0" cellpadding="3">  
            
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');   
 ?>  