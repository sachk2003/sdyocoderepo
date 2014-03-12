<?php 
include 'header.php';
?>
<div class="container">
	<div class="row">
  			<div class="col-md-3" id="leftCol">
              
              	<ul class="nav nav-stacked" id="sidebar">
                  <li><a href="index.php">Login Page</a></li>
                  <li><a href="vendor_create_login.php">Sign Up</a></li>
                  <li><a href="vendor_forgot_pwd.php">Forgot Password</a></li>
                  
                  
              	</ul>
           </div>  
      		<div class="col-md-9" style="margin-top:20px;">



<form method="post" action="../scripts/vendor_create_login.php">
 <fieldset>
        <legend>Vendor Sign-Up Page</legend>
        <div class='row'>
            <div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="user_password">Contact First Name*</label>
                    <input class="form-control" id="fname" name="fname" size="30" type="text" />
                </div>
            </div>
            <div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="user_password">Contact Middle Name</label>
                    <input class="form-control" id="mname" name="mname" size="30" type="text" />
                </div>
            </div>
            <div class="col-sm-4">
        	     <div class='form-group'>
                    <label for="user_password">Contact Last Name*</label>
                    <input class="form-control" id="lname" name="lname" size="30" type="text" />
                </div>
        	
        	</div>
        </div>
        <div class="row">
        	<div class="col-sm-4">
        	     <div class='form-group'>
                    <label for="user_password">Vendor Name</label>
                    <input class="form-control" id="company" name="company" size="30" type="text" />
                </div>
        	
        	</div>
        	<div class="col-sm-4">
        	     <div class='form-group'>
                    <label for="user_password">Country*</label>
                    <select class="form-control" name="country">
                    	<option value="USA">USA</option>
			            <option value="Canada">Canada</option>
			            <option value="India">India</option>
			            <option value="China">China</option>
			            <option value="UK">UK</option>
			            <option value="France">France</option>
			            <option value="Russia">Russia</option>
			            <option value="Mexico">Mexico</option>
			            <option value="Brazil">Brazil</option>
			            <option value="Argentina">Argentina</option>
			            <option value="South Africa">South Africa</option>
			            <option value="Spain">Spain</option>
			            <option value="Portugal">Portugal</option>
			            <option value="Germany">Germany</option>
			            <option value="Australia">Australia</option>
			            <option value="New Zealand">New Zealand</option>
			            <option value="Singapore">Singapore</option>
			            <option value="Malaysia">Malaysia</option>
			            <option value="Thailand">Thailand</option>
			            <option value="Bangladesh">Bangladesh</option>
			            <option value="Pakistan">Pakistan</option>
			            <option value="Sri Lanka">Sri Lanka</option>
			            <option value="Norway">Norway</option>
			            <option value="Sweeden">Sweeden</option>
			            <option value="Finland">Finland</option>
			            <option value="Poland">Poland</option>
			            <option value="Turkey">Turkey</option>
			            <option value="Taiwan">Taiwan</option>
                    	
                    	
                    </select>	
                    
                </div>
        	
        	</div>
        	<div class="col-sm-4">
        	     <div class='form-group'>
                    <label for="user_password">zip*</label>
                    <input class="form-control" id="zip" name="zip" size="30" type="text" />
                </div>
        	
        	</div>
        	
        	
        	
        </div> 
        <div class='row'>
            <div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="user_password">Address*</label>
                    <input class="form-control" id="address" name="address" size="30" type="text" />
                </div>
            </div>
            <div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="user_password">City*</label>
                    <input class="form-control" id="city" name="city" size="30" type="text" />
                </div>
            </div>
            <div class="col-sm-4">
        	     <div class='form-group'>
                    <label for="user_password">State*</label>
                    <input class="form-control" id="state" name="state" size="30" type="text" />
                </div>
        	
        	</div>
        </div>
        <div class='row'>
            <div class='col-sm-6'>	
            	<div class='form-group'>
                    <label for="user_password">Contact Phone Number*</label>
                    <input class="form-control" id="phone" name="phone" size="30" type="text" />
                </div>
            </div>
            <div class='col-sm-6'>	
            	<div class='form-group'>
                    <label for="user_password">Contact Mobile Number</label>
                    <input class="form-control" id="mphone" name="mphone" size="30" type="text" />
                </div>
            </div>
            
        </div>
        <div class='row'>
            <div class='col-sm-6'>	
            	<div class='form-group'>
                    <label for="user_password">Contact Email*</label>
                    <input class="form-control" id="email2" name="email2" size="30" type="text" />
                </div>
            </div>
            <div class='col-sm-6'>	
            	<div class='form-group'>
                    <label for="user_password">Company Website</label>
                    <input class="form-control" id="companyurl" name="companyurl" size="30" type="text" />
                </div>
            </div>
            
        </div>
        <div class='row'>
            <div class='col-sm-6'>	
            	<div class='form-group'>
                    <label for="user_password">Vendor Category*</label>
                    <select name="category" size="1" class="form-control">
            <option selected>Grocery</option>
            <option>Pharmacy</option>
            <option>Apparel</option>
            <option>Electronics</option>
            <option>Appliances</option>
            <option>Hardware</option>
            <option>Services</option>
            <option>Construction</option>
            <option>Educational</option>
            <option>Entertainment</option>
            <option>Travel</option>
            <option>Automotive</option>
          </select>
                </div>
            </div>
            <div class='col-sm-6'>	
            	
            </div>
            
        </div>
        <div class='row'>
            <div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="user_password">Sub Category 1</label>
                    <input class="form-control" id="subcatname1" name="subcatname1" size="30" type="text" />
                </div>
            </div>
            <div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="user_password">Sub Category 2</label>
                    <input class="form-control" id="subcatname2" name="subcatname2" size="30" type="text" />
                </div>
            </div>
            <div class="col-sm-4">
        	     <div class='form-group'>
                    <label for="user_password">Sub Category 3</label>
                    <input class="form-control" id="subcatname3" name="subcatname3" size="30" type="text" />
                </div>
        	
        	</div>
        </div>
        <div class='row'>
            <div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="user_password">Sub Category 4</label>
                    <input class="form-control" id="subcatname4" name="subcatname4" size="30" type="text" />
                </div>
            </div>
            <div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="user_password">Sub Category 5</label>
                    <input class="form-control" id="subcatname5" name="subcatname5" size="30" type="text" />
                </div>
            </div>
            <div class="col-sm-4">
        	     <div class='form-group'>
                    <label for="user_password">Sub Category 6</label>
                    <input class="form-control" id="subcatname6" name="subcatname6" size="30" type="text" />
                </div>
        	
        	</div>
        </div>
        <div class='row'>
            <div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="user_password">Sub Category 7</label>
                    <input class="form-control" id="subcatname7" name="subcatname7" size="30" type="text" />
                </div>
            </div>
            <div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="user_password">Sub Category 8</label>
                    <input class="form-control" id="subcatname8" name="subcatname8" size="30" type="text" />
                </div>
            </div>
            <div class="col-sm-4">
        	     <div class='form-group'>
                    <label for="user_password">Sub Category 9</label>
                    <input class="form-control" id="subcatname9" name="subcatname9" size="30" type="text" />
                </div>
        	
        	</div>
        </div>
        <div class='row'>
            <div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="user_password">Sub Category 10</label>
                    <input class="form-control" id="subcatname10" name="subcatname10" size="30" type="text" />
                </div>
            </div>
        </div>  
        <div class="row">
        	  <div class="col-sm-2"></div>
        	  <div class='col-sm-4'>
              <div class="form-group">
      	         <button  class="control-small" name="Submit2"><span>Submit</span></button>
   	           	
               </div>
              </div>
              <div class='col-sm-4'>
              <div class="form-group">
              	<input type="reset" name="Reset2" value="Clear" class="control-small">
      	         <!--<button  class="control-small"><span>Submit</span></button>-->
   	           	
               </div>
              </div>
              <div class="col-sm-2"></div>
        </div>       
</fieldset>
</form>
</div>
</div>
</div>
<?php
include 'footer.php';
?>
