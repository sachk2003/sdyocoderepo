<?php
/// information in this file:
/// Copyright 2010 www.go2yworld.com
/// All rights reserved.

include("connect.php");
include '../vendor/header.php';
session_start();

if(!isset($_SESSION['fname'])){
echo"Please Create Login";
exit;
}
?>
<!--
<div align="center">
<h2>Please click the link below to return to vendor home page</h2>
<h2><a href="/vendor/vendor_home.php">Return to Vendor Home page</a></h2>
</div>-->
<div class="container">
	<div class="row">
  			<div class="col-md-3" id="leftCol">
              
              	<ul class="nav nav-stacked" id="sidebar">
                  <li><a href="../vendor/vendor_home.php">Welcome</a></li>
                  <li><a href="../vendor/discount_code_add.php">Add Discounts and Offerings</a></li>
                  <li><a href="../vendor/discount_update.php">Update Discounts and Offerings</a></li>
                  <li><a href="../vendor/discount_delete.php">Delete Discounts and Offerings</a></li>
                  <li><a href="../vendor/view_vendor_account.php">Vendor Account Management</a></li>
                  <li><a href="../vendor/vendor_change_pwd.php">Change Password</a></li>
                  <li><a href="../logout/logout.php">Logout</a></li>
              	</ul>
           </div>  
      		<div class="col-md-9" style="margin-top:20px;">
          <?php

$email = mysql_real_escape_string($_POST['email2']);
$password = mysql_real_escape_string($_POST['password2']);
$newpassword= mysql_real_escape_string($_POST['newpassword']);
$query = "SELECT * FROM vendor WHERE email LIKE '$email%' AND password LIKE '$password%'";
$results = mysql_query($query);

if ($results)
{
$update = "UPDATE vendor SET password = '$newpassword' WHERE email='$email'";
$rsUpdate = mysql_query($update);
}
if ($rsUpdate)
{
echo "<h6>Your password has been changed.</h6>";
}
mysql_close();
?>
<!--<a href="/vendor/index.php">Back to Vendor Login Page</a><br>--></br>
<br>
