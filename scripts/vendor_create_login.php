<?php
/// Copyright 2010 www.go2myworld.com
/// All rights reserved.
include("/var/www/html/scripts/connect.php");
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
$category = mysql_escape_string($_POST['category']);
$companyurl = mysql_escape_string($_POST['companyurl']);
$subcatname1 = mysql_escape_string($_POST['subcatname1']);
$subcatname2 = mysql_escape_string($_POST['subcatname2']);
$subcatname3 = mysql_escape_string($_POST['subcatname3']);
$subcatname4 = mysql_escape_string($_POST['subcatname4']);
$subcatname5 = mysql_escape_string($_POST['subcatname5']);
$subcatname6 = mysql_escape_string($_POST['subcatname6']);
$subcatname7 = mysql_escape_string($_POST['subcatname7']);
$subcatname8 = mysql_escape_string($_POST['subcatname8']);
$subcatname9 = mysql_escape_string($_POST['subcatname9']);
$subcatname10 = mysql_escape_string($_POST['subcatname10']);
$password = "temp".$fname;
///$password = "temp".rand(5,10);
$timestamp = time();
// Check if  Email is already in database
$result = mysql_query("SELECT * FROM vendor WHERE email LIKE '$email%'");
     if($row = mysql_fetch_array($result)){
                mysql_close();
               echo "Account with this email address already exists. Please use a different email address to sign up";
               echo"<a href=/vendor/vendor_create_login.html>Back to Vendor Sign up Page</a>";
                 }else {
$query = "INSERT INTO vendor (vendorid, fname, mname, lname, company, companyurl, category,country, zip, address, city, state, phone, mphone, email, password, timestamp)
VALUES ('', '$fname', '$mname', '$lname', '$company', '$companyurl', '$category','$country', '$zip', '$address', '$city', '$state', '$phone', '$mphone', '$email','$password', '$timestamp')";
$results = mysql_query($query);

if ($results)
{
echo "Details added.";
}
$result = mysql_query("SELECT * FROM vendor WHERE email LIKE '$email%'");
$row = mysql_fetch_array($result);
$vendorid = $row["vendorid"];
print $row["vendorid"];
$query = "INSERT INTO subcat (subcatid,vendorid,subcatname1,subcatname2,subcatname3,subcatname4,subcatname5,subcatname6,subcatname7,subcatname8,subcatname9,subcatname10,timestamp)
VALUES('','$vendorid','$subcatname1','$subcatname2','$subcatname3','$subcatname4','$subcatname5','$subcatname6','$subcatname7','$subcatname8','$subcatname9','$subcatname10','$timestamp')";
$results = mysql_query($query);
$query = "INSERT INTO discount (discountid,vendorid,item,upc,discount,unit,startdate,enddate,timestamp)
VALUES('','$vendorid','','','','','','','$timestamp')";
$results = mysql_query($query);
///email to vendor with temporary password


$headers = "From: info@superdealyo.com". "\r\n" .
"Reply-To: info@superdealyo.com ". "\r\n" .
"X-Mailer: PHP/" . phpversion();

mail($email,"Registration Confirmation",
"Hello $fname\nThank you for taking time to create login with SuperDealyo.com\n
Below is your login information.\n
Temporary Password:$password\n
You can access login page at http://superdealyo.com/vendor/vendor.html\n
After logging in please change the temporary password.\n
Thank you for your interest in SuperDealyo.com.\n
\n
Sincerely;\n
\n
SuperDealyo Team\n
Bringing your world to your fingertips®.",$headers); 
/// email to me infoming new subscriber has registered
mail("sach@linuxbox.simutel","New Registration",
"new vendor:$email has registered.");
session_start ();
$_SESSION['fname']=$fname;
mysql_close();
Header("Location: http://superdealyo.com/vendor/thankyou.html");
}
exit;
?>
