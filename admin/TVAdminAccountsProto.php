<html>
<head>
    </head>
    <body>
<link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Our Custom CSS -->
<link rel="stylesheet" href="admincss/TVAdminSideBar.css">
        <!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<?php 
include ("TVPackageDatabaseConnection.php");
session_start(); 
$username = $_SESSION['adminName'];
$_SESSION['username'] = $username;



$result = mysqli_query($mysqli,"SELECT * FROM tbl_adminlogin WHERE admin_adminName = '$username'");
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
    echo "Welcome! ".$res['admin_adminName']." ";
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
    echo "<a href=\"AccountEdit.php?username=$res[admin_adminName]\">Edit</a>";
    echo "<br>";   
}
?>  
</div>
</div>
</div>
</body>
</html>
