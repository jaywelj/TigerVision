<?php
// including the database connection file
include_once("TVPackageDatabaseConnection.php");
session_start();
$adminname = $_SESSION['adminName'];
if(isset($_POST['update']))
{	

	$TempBirthdateYear = mysqli_real_escape_string($mysqli, $_POST['birthdate_year']);
	$TempBirthdateDay = mysqli_real_escape_string($mysqli, $_POST['birthdate_day']);
	$TempBirthdateMonth = mysqli_real_escape_string($mysqli, $_POST['birthdate_month']);

	$VarcharAccountBirthdate =  $TempBirthdateYear . ' ' . $TempBirthdateDay . ' ' . $TempBirthdateMonth;

	$varcharAccountName = mysqli_real_escape_string($mysqli,$_POST['hiddenadminname']);
    $varcharAccountFirstName = mysqli_real_escape_string($mysqli, $_POST['txtbxAccountFirstName']);
    $varcharAccountLastName = mysqli_real_escape_string($mysqli, $_POST['txtbxAccountLastName']);
    $varcharAccountPassword = mysqli_real_escape_string($mysqli, $_POST['txtbxAccountPassword']);
    $varcharAccountContacNum = mysqli_real_escape_string($mysqli, $_POST['txtbxAccountContactNum']);
    $varcharAccountImage = mysqli_real_escape_string($mysqli, $_POST['txtbxAccountContactNum']);
	
	// checking empty fields
	if(empty($varcharAccountImage)) {	
			
		if(empty($varcharAccountImage)) {
			echo "<font color='red'>Reselect Image / Select image field properly.</font><br/>";
		}
		
		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email',spouse='$spouse' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: TVAdminAccounts.php");
	}
}
?>
<?php
//getting id from url
$username = $_GET['username'];

$result = mysqli_query($mysqli,"SELECT * FROM tbl_adminlogin WHERE admin_adminName = '$username'");
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
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="TVAdminAccounts.php">View Account</a>
	<br/><br/>
	
	<form name="form1" method="post" action="TVAccountEdit.php">
		<table border="0">
			<tr> 
				<td>First Name</td> 
				<td><input type="text" name="txtbxAccountFirstName" value="<?php echo $AccountFirstName;?>"></td>
			</tr>
			<tr> 
				<td>Last Name</td>
				<td><input type="text" name="txtbxAccountLastName" value="<?php echo $AccountLastName;?>"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="txtbxAccountPassword" value="<?php echo $AccountPassword;?>"></td>
			</tr>
			<tr> 
				<td>Contact Number</td>
				<td><input type="text" name="txtbxAccountContactNum" value="<?php echo $AccountContacNum;?>"></td>
			</tr>
			<tr> 
				<td>Image</td>
				<td><input type="file" name="imgAccountImage" value="<?php echo $AccountImage;?>"></td>
			</tr>
			<tr> 
				<td>Birthdate/td>
				<td>
					<select class="form-control" name="birthdate_year">
            <?php
                  echo'<option value=" ">Year</option>';
                 for ($i = 2018; $i >= 1900; $i--) {
                echo'<option  class=  value="' . $i . '">' . $i . '</option>';
                }
                ?>
            </select>

                <select class="form-control" name="birthdate_day">

                <?php
                echo'<option value=" ">Day</option>';
                for ($i = 1; $i <= 31; $i++) {
                echo'<option class=  value="' . $i . '">' . $i . '</option>';
                }
                ?>
                </select>

                <select class="form-control" name="birthdate_month">
            <option value=" ">Month</option>;
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
            </select></td>
			</tr>
				<td><input type="hidden" name="hiddenadminname" value=<?php echo $AccountName;?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
