<?php 
/// In order to use this script freely
/// you must leave the following copyright
/// information in this file:
/// Copyright 2006 www.turningturnip.co.uk
/// All rights reserved.

include 'header.php';

include("../scripts/connect.php");

session_start();
if(!isset($_SESSION['fname'])){
echo"Please Create Login";
exit;
}



$email = $_GET['email'];
$query="SELECT * FROM vendor WHERE email LIKE '$email%'";
$result=mysql_query($query);
$row = mysql_fetch_array($result);
$vendorid = $row["vendorid"];
//Now Delete the Subcat data
$delete = "DELETE FROM  subcat WHERE vendorid='$vendorid' ";
mysql_query($delete);
//Now Delete the Discount data
$delete = "DELETE FROM  discount WHERE vendorid='$vendorid' ";
mysql_query($delete);
//Now Delete the Vendor
$delete = "DELETE FROM  vendor WHERE vendorid='$vendorid' ";
mysql_query($delete);
mysql_close();
?>
<div class="container">
	<div class="row">
  			<div class="col-md-3" id="leftCol">
              
              	<ul class="nav nav-stacked" id="sidebar">
                  <li><a href="vendor_home.php">Welcome</a></li>
                  <li><a href="discount_code_add.php">Add Discounts and Offerings</a></li>
                  <li><a href="discount_update.php">Update Discounts and Offerings</a></li>
                  <li><a href="discount_delete.php">Delete Discounts and Offerings</a></li>
                  <li><a href="view_vendor_account.php">Vendor Account Management</a></li>
                  <li><a href="../logout/logout.php">Logout</a></li>
              	</ul>
           </div>  
      		<div class="col-md-9" style="margin-top:20px;">


<?php
echo "<h6 style='text-align:center'>Entry deleted</h6>";
//Header("Location: http://superdealyo.com/index.html");
?>
</div>
</div>
</div>
<?php
include 'footer.php';
?>