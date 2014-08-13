<?php
/// information in this file:
/// Copyright 2010 www.go2myworld.com
/// All rights reserved.
include 'header.php';

include("../scripts/connect.php");

session_start();
if(!isset($_SESSION['fname'])){
echo"Please Create Login";
exit;
}

$vendorid = mysql_real_escape_string($_POST['vendorid']);
$fname =  mysql_real_escape_string($_POST['fname']);
$mname =  mysql_real_escape_string($_POST['mname']);
$lname =  mysql_real_escape_string($_POST['lname']);
$company =  mysql_real_escape_string($_POST['company']);
$companyurl =  mysql_real_escape_string($_POST['companyurl']);
$category =  mysql_real_escape_string($_POST['category']);
$country =  mysql_real_escape_string($_POST['country']);
$zip =  mysql_real_escape_string($_POST['zip']);
$address =  mysql_real_escape_string($_POST['address']);
$city =  mysql_real_escape_string($_POST['city']);
$state =  mysql_real_escape_string($_POST['state']);
$phone =  mysql_real_escape_string($_POST['phone']);
$mphone =  mysql_real_escape_string($_POST['mobile']);
$email =  mysql_real_escape_string($_POST['email']);
//echo "$subid";
$update = "UPDATE vendor  SET  fname = '$fname', mname = '$mname', fname = '$fname', company ='$company',companyurl ='$companyurl', category ='$category', country = '$country', zip = '$zip', address = '$address', city = '$city', state = '$state', phone = '$phone',mphone = '$mphone', email = '$email' WHERE vendorid='$vendorid' ";
$rsUpdate = mysql_query($update);
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
if ($rsUpdate)
{
echo "<h6 style='text-align:center;'>Update successful.</h6>";
} mysql_close();
//Header ("Location:vendor_home.php");
?>
 </div>
 </div>
 </div>
<?php
include 'footer.php';
?>  
 
