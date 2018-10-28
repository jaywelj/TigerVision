<!DOCTYPE html>
<html>
<head>
	<title>Tigervision Login</title>
    <link rel="shortcut icon" href = "images/tigerVisionIcon.ico">
	<link rel="stylesheet" type="text/css" href="admincss/TVAdminLogin.css">
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
</head>
<body style=" overflow-y: hidden; overflow-x: hidden;">
	<center><img style="width:100%" src="images/header_road.jpg">
	<div style="position:absolute; top:70px; width:1600px;">
		<div class="header" style="background:#ff9900; color:#fff">
			<p><img src="images/tigerVisionIcon.ico" style="width:20%"">
			<strong><h1>TigerVision</h1></strong></p>
		</div>
		<form method="post" style="height:300px">
			<div class="input-group">
				<label>Username</label>
				<input type="text" name="username" >
			</div>
			<div class="input-group" >
				<label>Password</label>
				<input type="password" name="password" id="loginpassword">
			</div>
			<div class="checkbox text-center ">
			  	<label>
			    <input name="showcheck" id="showcheck" type="checkbox" value="" onclick="showCheck()">
			    <h5 style="display:inline;">Show Password</h5>
			</div>
			<div class="input-group">
				<button type="submit" class="btn btn-primary btn-lg" name="login_user" style="margin-top: 	20px;">Login</button>
			</div>
		</form>
	</div>
	<?php 
	session_start();
	// variable declaration
	//$username = "username";
	$email="";
	$errors = array(); 
	$_SESSION['success'] = "";
	$_SESSION['adminName'] = "";
	// connect to database
	include("TVConnectionString.php");
	// REGISTER USER
	if (isset($_POST['reg_user'])) 
	{
		// receive all input values from the form
		$username = mysqli_real_escape_string($connect, $_POST['username']);
		$email = mysqli_real_escape_string($connect, $_POST['email']);
		$password_1 = mysqli_real_escape_string($connect, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($connect, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) 
		{
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) 
		{
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($connect, $query);

			$_SESSION['adminName'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: adduser.php');
		}
	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($connect, $_POST['username']);
		$password = mysqli_real_escape_string($connect, $_POST['password']);

		if (empty($username)) {
			$message = "Username Field Empty!";
                            echo "<script type='text/javascript'>alert('$message');</script>";
		}
		if (empty($password)) {
			$message = "Password Field Empty!";
                            echo "<script type='text/javascript'>alert('$message');</script>";
		}

		if (count($errors) == 0) {
			$usernameTest = $_POST['username'];
			$passwordTest = $_POST['password'];
			//echo $_POST['username'];
			//$password = md5($password);
			$query = "SELECT * FROM tbl_adminlogin WHERE admin_adminName='$usernameTest' AND admin_password='$passwordTest' AND admin_purgeFlag = 1";
			$query2 ="SELECT * FROM tbl_adminlogin WHERE admin_adminName='$usernameTest' AND admin_password='$passwordTest' AND admin_purgeFlag = 1";
			$result = mysqli_query($connect, $query);
			$result2 = mysqli_query($connect, $query2);

			while($res = mysqli_fetch_array($result2)) {
				$admin_accessLevel = $res['admin_accessLevel'];
			}
			if (mysqli_num_rows($result) == 1) {
				$_SESSION['adminName'] = $username;
				$_SESSION['adminAccessLevel'] = $admin_accessLevel;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				$message = "Invalid Entry";
                            echo "<script type='text/javascript'>alert('$message');</script>";
			}
		}
	}

?>
<script>
 	function showCheck() 
 	{
	    var x = document.getElementById("loginpassword");
	    if (x.type === "password") 
	    {
	        x.type = "text";
	    } else 
	    {
	        x.type = "password";
	    }
	}
</script>
</body>
</html>