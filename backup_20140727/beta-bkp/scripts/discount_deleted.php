<?php 
/// In order to use this script freely
/// you must leave the following copyright
/// information in this file:
/// Copyright 2006 www.turningturnip.co.uk
/// All rights reserved.

include("connect.php");
include '../vendor/header.php';
session_start();
if(!isset($_SESSION['email'])){
echo"Please Create login";
exit;
}

$upcvalues = $_GET['values'];
$upcval=explode(',',$upcvalues);
//echo $upcvalues;
//var_dump($upcval);
//echo sizeof($upcval);
$email=$_GET['email'];

$query="SELECT * FROM vendor WHERE email LIKE '$email%'";
$result=mysql_query($query);
$row = mysql_fetch_array($result);
$vendorid = $row["vendorid"];
//Now Delete the Discount data
for($i=0;$i<sizeof($upcval);$i++)
{
$delete = "DELETE FROM  discount WHERE vendorid='$vendorid' and upc='$upcval[$i]'";
mysql_query($delete);
}

mysql_close();
?>
<div class="container">
	<div class="row">
  			<div class="col-md-3" id="leftCol">
              
              	<ul class="nav nav-stacked" id="sidebar">
                  <li><a href="../vendor/vendor_home.php">Vendor Home</a></li>
                  <li><a href="../vendor/discount_code_add.php">Add Discounts and Offerings</a></li>
                  <li><a href="../vendor/discount_update.php">Update Discounts and Offerings</a></li>
                  <li><a href="../vendor/discount_delete.php">Delete Discounts and Offerings</a></li>
                  <li><a href="../vendor/view_vendor_account.php">Vendor Account Management</a></li>
                  <li><a href="../logout/logout.php">Logout</a></li>
              	</ul>
           </div>  
      		<div class="col-md-9" style="margin-top:20px;">



<?php
echo "<h6>Entries deleted</h6>";
//Header("Location: http://superdealyo.com/vendor/vendor_home.html");
?>
</div></div>
<?php
include '../vendor/footer.php';
?>