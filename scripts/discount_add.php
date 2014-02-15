<?php
/// information in this file:
/// Copyright 2010 www.superdealyo.com
/// All rights reserved.
include("/var/www/html/scripts/connect.php");
$vendorid = mysql_escape_string($_POST['vendorid']);
$item = mysql_escape_string($_POST['item']);
$upc = mysql_escape_string($_POST['upc']);
$discount = mysql_escape_string($_POST['discount']);
$unit = mysql_escape_string($_POST['unit']);
$startdate = mysql_escape_string($_POST['startdate']);
$enddate = mysql_escape_string($_POST['enddate']);
$query = "INSERT INTO discount (discountid,vendorid,item,upc,discount,unit,startdate,enddate,timestamp)
VALUES('',$vendorid,'$item','$upc','$discount','$unit','$startdate','$enddate','$timestamp')";
$result = mysql_query($query);
if ($result){
echo "Update successful.";
}
else{
echo "Update unsuccessful.";
}
mysql_close();
?>
<div align="center">
<h2>Please click the link below to return to vendor home page</h2>
<h2><a href="/vendor/vendor_home.html">Return to Vendor Home page</a></h2>
</div>
 
