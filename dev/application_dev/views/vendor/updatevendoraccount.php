<?php $this->load->view('templates/homeheader');?>
<?php $this->load->view('vendor/vendormenu');?>
<div class="col-md-9" style="margin-top:20px;">
<?php 
$row=$vendordetails[0];
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
$mphone = $row["mphone"];
$email = $row["email"];


?>

<h6 style="text-align: center">Update Vendor Profile</h6>
             <form id="FormName" action="update_vendor_account" method="post" name="FormName" class="form-horizontal">
             	<h6 class="error" style="text-align: center"><?php if($message!='') echo $message;?></h6>
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
               <input type="text" id="mobile" name="mobile" class="form-control"   placeholder="" value="<?php echo $mphone;?>">
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
    	







</div>
            
</div>
</div>
<?php $this->load->view('vendor/vendorfooter');?>