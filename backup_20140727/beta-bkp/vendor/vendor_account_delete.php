<?php
/// In order to use this script freely
/// you must leave the following copyright
/// information in this file:
/// Copyright 2006 www.turningturnip.co.uk
/// All rights reserved.
include 'header.php';
session_start();
if(!isset($_SESSION['email'])){
echo"Please Create login";
exit;
}
$email=$_SESSION['email'];
//echo "Test";
//echo "$email";
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

<div align="center">
<h2>Are you sure?</h2>
<h2><a href="vendor_account_deleted.php?email=<?php echo "$email" ?>">Yes</a> - <a href="/vendor/vendor_home.html">No</a></h2>
</div>
</div>
</div>
</div>
<?php
include 'footer.php';
?>  