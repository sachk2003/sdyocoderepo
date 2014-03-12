<?php
/// Copyright 2010 www.go2myworld.com
/// All rights reserved.
include("connect.php");
include '../vendor/header.php';

?>
<div class="container">
	<div class="row">
  			<div class="col-md-3" id="leftCol">
              
              	<ul class="nav nav-stacked" id="sidebar">
                  <li><a href="../vendor/vendor_home.php">Login Page</a></li>
                  <li><a href="../vendor/vendor_create_login.php">Sign Up</a></li>
                  <li><a href="../vendor/vendor_forgot_pwd.php">Forgot Password</a></li>
                  <li><a href="#">Change Password</a></li>
                  
              	</ul>
           </div>  
      		<div class="col-md-9" style="margin-top:20px;">

<?php
$fname = mysql_real_escape_string($_POST['fname']);
$mname = mysql_real_escape_string($_POST['mname']);
$lname = mysql_real_escape_string($_POST['lname']);
$company = mysql_real_escape_string($_POST['company']);
$address = mysql_real_escape_string($_POST['address']);
$city = mysql_real_escape_string($_POST['city']);
$state = mysql_real_escape_string($_POST['state']);
$zip = mysql_real_escape_string($_POST['zip']);
$country = mysql_real_escape_string($_POST['country']);
$phone = mysql_real_escape_string($_POST['phone']);
$mphone = mysql_real_escape_string($_POST['mphone']);
$email = mysql_real_escape_string($_POST['email2']);
$query = "SELECT * FROM vendor WHERE email LIKE '$email%' AND lname LIKE '$lname%'";

$results = mysql_query($query);

if ($results)
{
$password = "temp123";
$update = "UPDATE vendor SET password = '$password' WHERE email='$email'";
$rsUpdate = mysql_query($update);
}
if ($rsUpdate)
{
echo "<h6>Your password has been set to temp123 please login and change it.</h6><br />";
}
mysql_close();
?>
<a href="../vendor/index.php">Back to Vendor Login Page</a><br>
<br>
</div>
</div>
</div>
<?php
include 'footer.php';
?>