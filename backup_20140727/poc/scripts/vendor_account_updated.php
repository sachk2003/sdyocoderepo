<?php
/// information in this file:
/// Copyright 2010 www.go2myworld.com
/// All rights reserved.
include("/var/www/html/scripts/connect.php");
$vendorid = mysql_escape_string($_POST['vendorid']);
$fname =  mysql_escape_string($_POST['fname']);
$mname =  mysql_escape_string($_POST['mname']);
$lname =  mysql_escape_string($_POST['lname']);
$company =  mysql_escape_string($_POST['company']);
$companyurl =  mysql_escape_string($_POST['companyurl']);
$category =  mysql_escape_string($_POST['category']);
$country =  mysql_escape_string($_POST['country']);
$zip =  mysql_escape_string($_POST['zip']);
$address =  mysql_escape_string($_POST['address']);
$city =  mysql_escape_string($_POST['city']);
$state =  mysql_escape_string($_POST['state']);
$phone =  mysql_escape_string($_POST['phone']);
$mphone =  mysql_escape_string($_POST['mphone']);
$email =  mysql_escape_string($_POST['email']);
//echo "$subid";
$update = "UPDATE vendor  SET  fname = '$fname', mname = '$mname', fname = '$fname', company ='$company',companyurl ='$companyurl', category ='$category', country = '$country', zip = '$zip', address = '$address', city = '$city', state = '$state', phone = '$phone',mphone = '$mphone', email = '$email' WHERE vendorid='$vendorid' ";
$rsUpdate = mysql_query($update);
if ($rsUpdate)
{
echo "Update successful.";
} mysql_close();
Header ("Location:../vendor/vendor_home.html");
?>
 
