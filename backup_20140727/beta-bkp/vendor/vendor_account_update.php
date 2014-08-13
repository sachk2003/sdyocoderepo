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

$email=$_SESSION['email'];
//echo "$email";
//$id = $_GET['userid'];
//echo "The userid is $id";
$qProfile = "SELECT * FROM vendor WHERE email LIKE '$email%'";
$rsProfile = mysql_query($qProfile);
$row = mysql_fetch_array($rsProfile);
//extract($row);
$vendorid = $row["vendorid"];
$fname = $row["fname"];
$mname = $row["mname"];
$lname = $row["lname"];
$company = $row["company"];
$companyurl = $row["companyurl"];
$category = $row["category"];
$address = $row["address"];
$city = $row["city"];
$state = $row["state"];
$zip = $row["zip"];
$country = $row["country"];
$phone = $row["phone"];
$mobile = $row["mphone"];
$email = $row["email"];
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
            <h6 style="text-align: center">Update Vendor Profile</h6>
             <form id="FormName" action="vendor_account_updated.php" method="post" name="FormName" class="form-horizontal">
             	
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">First Name</label>
               <div class="col-sm-10">
               <input type="text" id="fname" name="fname" class="form-control"   placeholder="" value="<?php echo $fname;?>">
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Middle Name</label>
               <div class="col-sm-10">
               <input type="text" id="mname" name="mname" class="form-control"   placeholder="" value="<?php echo $mname;?>">
               </div>
             </div>	
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Last Name</label>
               <div class="col-sm-10">
               <input type="text" id="lname" name="lname" class="form-control"   placeholder="" value="<?php echo $lname;?>">
               </div>
             </div>		
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Company</label>
               <div class="col-sm-10">
               <input type="text" id="company" name="company" class="form-control"   placeholder="" value="<?php echo $company;?>">
               </div>
             </div>	
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Company URL</label>
               <div class="col-sm-10">
               <input type="text" id="companyurl" name="companyurl" class="form-control"   placeholder="" value="<?php echo $companyurl;?>">
               </div>
             </div>	
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Category</label>
               <div class="col-sm-10">
               <input type="text" id="category" name="category" class="form-control"   placeholder="" value="<?php echo $category;?>">
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Address</label>
               <div class="col-sm-10">
               <input type="text" id="address" name="address" class="form-control"   placeholder="" value="<?php echo $address;?>">
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">City</label>
               <div class="col-sm-10">
               <input type="text" id="city" name="city" class="form-control"   placeholder="" value="<?php echo $city;?>">
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">State</label>
               <div class="col-sm-10">
               <input type="text" id="state" name="state" class="form-control"   placeholder="" value="<?php echo $state;?>">
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Zip</label>
               <div class="col-sm-10">
               <input type="text" id="zip" name="zip" class="form-control"   placeholder="" value="<?php echo $zip;?>">
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Country</label>
               <div class="col-sm-10">
               <input type="text" id="country" name="country" class="form-control"   placeholder="" value="<?php echo $country;?>">
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Phone</label>
               <div class="col-sm-10">
               <input type="text" id="phone" name="phone" class="form-control"   placeholder="" value="<?php echo $phone;?>">
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Mobile</label>
               <div class="col-sm-10">
               <input type="text" id="mobile" name="mobile" class="form-control"   placeholder="" value="<?php echo $mobile;?>">
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Email</label>
               <div class="col-sm-10">
               <input type="text" id="email" name="email" class="form-control"   placeholder="" value="<?php echo $email;?>">
               </div>
             </div>	
             <div class="form-group">
             <input type="hidden" name="vendorid" value="<?php echo $vendorid ?>">
      	      </div> 
      	       
      	       <div class="form-group">
      	       <div class="col-md-4 col-md-offset-2">
   	              <button  class="control-small" style="margin-left:70%;"><span>Submit</span></button>
   	           </div>	
               </div> 
             
             
             	
             </form>	
             
             
     <!--        
<form id="FormName" action="vendor_account_updated.php" method="post" name="FormName" class="form-horizontal">
<table width="448" border="0" cellspacing="2" cellpadding="0">
<!---<tr><td width="150"><div align="right">
<label for="vendorid">vendorid</label></div>
</td>
<td>
<input id="vendorid" name="vendorid" type="text" size="25" value="<?php echo $vendorid ?>" maxlength="11"></td>
</tr>--> 
<!--
<tr><td width="150"><div align="right">
<label for="fname">fname</label></div>
</td>
<td>
<input id="fname" name="fname" type="text" size="25" value="<?php echo $fname ?>" maxlength="40"></td>
</tr>
<tr><td width="150"><div align="right">
<label for="mname">mname</label></div>
</td>
<td>
<input id="mname" name="mname" type="text" size="25" value="<?php echo $mname ?>" maxlength="40"></td>
</tr>
<tr><td width="150"><div align="right">
<label for="lname">lname</label></div>
</td>
<td>
<input id="lname" name="lname" type="text" size="25" value="<?php echo $lname ?>" maxlength="40"></td>
</tr>
<tr><td width="150"><div align="right">
<label for="company">company</label></div>
</td>
<td>
<input id="company" name="company" type="text" size="25" value="<?php echo $company ?>" maxlength="40"></td>
</tr>
<tr><td width="150"><div align="right">
<label for="companyurl">companyurl</label></div>
</td>
<td>
<input id="companyurl" name="companyurl" type="text" size="25" value="<?php echo $companyurl ?>" maxlength="40"></td>
</tr>
<tr><td width="150"><div align="right">
<label for="category">category</label></div>
</td>
<td>
<input id="category" name="category" type="text" size="25" value="<?php echo $category ?>" maxlength="40"></td>
</tr>
<tr><td width="150"><div align="right">
<label for="address">address</label></div>
</td>
<td>
<input id="address" name="address" type="text" size="25" value="<?php echo $address ?>" maxlength="40"></td>
</tr>
<tr><td width="150"><div align="right">
<label for="city">city</label></div>
</td>
<td>
<input id="city" name="city" type="text" size="25" value="<?php echo $city ?>" maxlength="20"></td>
</td>
<tr><td width="150"><div align="right">
<label for="state">state</label></div>
</td>
<td>
<input id="state" name="state" type="text" size="25" value="<?php echo $state ?>" maxlength="20"></td>
</tr>
<tr><td width="150"><div align="right">
<label for="zip">zip</label></div>
</td>
<td>
<input id="zip" name="zip" type="text" size="25" value="<?php echo $zip ?>" maxlength="8"></td>
</tr>
<tr><td width="150"><div align="right">
<label for="country">country</label></div>
</td>
<td>
<input id="country" name="country" type="text" size="25" value="<?php echo $country ?>" maxlength="20"></td>
</tr>
<tr><td width="150"><div align="right">
<label for="phone">phone</label></div>
</td>
<td>
<input id="phone" name="phone" type="text" size="25" value="<?php echo $phone ?>" maxlength="20"></td>
</tr>
<tr><td width="150"><div align="right">
<label for="mobile">mobile</label></div>
</td>
<td>
<input id="mobile" name="mobile" type="text" size="25" value="<?php echo $mobile ?>" maxlength="20"></td>
</tr>
<tr><td width="150"><div align="right">
<label for="email">email</label></div>
</td>
<td>
<input id="email" name="email" type="text" size="25" value="<?php echo $email ?>" maxlength="40"></td>
</tr>
<tr>
<td width="150"></td>
<td><input type="submit" name="submitButtonName" value="Update"><input type="hidden" name="vendorid" value="<?php echo $vendorid ?>"></td>
</tr>
</table>
</form>-->
</div>
</div>
</div>
<?php
include 'footer.php';
?>  
