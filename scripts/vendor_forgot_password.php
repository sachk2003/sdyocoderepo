<?php
/// information in this file:
/// Copyright 2010 www.go2myworld.com
/// All rights reserved.
include("connect.php");
$fname = mysql_escape_string($_POST['fname']);
$mname = mysql_escape_string($_POST['mname']);
$lname = mysql_escape_string($_POST['lname']);
$company = mysql_escape_string($_POST['company']);
$address = mysql_escape_string($_POST['address']);
$city = mysql_escape_string($_POST['city']);
$state = mysql_escape_string($_POST['state']);
$zip = mysql_escape_string($_POST['zip']);
$country = mysql_escape_string($_POST['country']);
$phone = mysql_escape_string($_POST['phone']);
$mphone = mysql_escape_string($_POST['mphone']);
$email = mysql_escape_string($_POST['email2']);
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
echo "Your password has been set to temp123 please login and change it.";
}
mysql_close();
?>
<a href="/vendor/vendor.html">Back to Vendor Login Page</a><br>
<br>
