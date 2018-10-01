<?php
session_start();
$_SESSION['adminAccessLevel']="Denied";
header('Location: TVAdminLogin.php');
exit;
?>