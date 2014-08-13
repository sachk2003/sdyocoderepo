<?php $this->load->view('templates/homeheader');?>
<?php $this->load->view('templates/usermenu');?>
<div class="col-md-9" style="margin-top:20px;">

<form method="post" action="user_forgot_pwd" id="vendorforgotpwd">	
      		 <fieldset>
		        <legend>User Forgot Password Page</legend>
		        <h6 class="error" style="text-align: center"><?php if($message!='') echo $message;?></h6>
		        <div class='row'>
            <!--<div class='col-sm-4'>	
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
            </div>-->
            <div class="col-sm-4">
        	     <div class='form-group'>
                    <label for="user_password">Contact Last Name*</label>
                    <input class="form-control" id="lname" name="lname" size="30" type="text" />
                </div>
        	
        	</div>
        </div>
		 <div class="row">
        	<!--<div class="col-sm-4">
        	     <div class='form-group'>
                    <label for="user_password">Vendor Name</label>
                    <input class="form-control" id="company" name="company" size="30" type="text" />
                </div>
        	
        	</div>
        	<div class="col-sm-4">
        	     <div class='form-group'>
                    <label for="user_password">Country*</label>
                    <input class="form-control" id="country" name="country" size="30" type="text" />
                    	
                    
                </div>
        	
        	</div>-->
        	<div class="col-sm-4">
        	     <div class='form-group'>
                    <label for="user_password">zip*</label>
                    <input class="form-control" id="zip" name="zip" size="30" type="text" />
                </div>
        	
        	</div>
        	
        	
        	
        </div>           
 	        <!--<div class='row'>
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
        </div>-->
          <div class='row'>
            <!--<div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="user_password">Contact Phone Number*</label>
                    <input class="form-control" id="phone" name="phone" size="30" type="text" />
                </div>
            </div>
            <div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="user_password">Contact Mobile Number</label>
                    <input class="form-control" id="mphone" name="mphone" size="30" type="text" />
                </div>
            </div>-->
            <div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="user_password">Contact Email*</label>
                    <input class="form-control" id="email2" name="email2" size="30" type="text" />
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




          </fieldset></form>	








</div>
</div>
</div>


<?php $this->load->view('vendor/vendorfooter');?>