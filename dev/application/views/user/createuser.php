<?php $this->load->view('templates/homeheader');?>
<?php $this->load->view('templates/usermenu');?>
<div class="col-md-9" style="margin-top:20px;">



<form method="post" action="user_create_login" id="signupform">
 <fieldset>
        <legend>User Sign-Up Page</legend>
        <h6 class="error" style="text-align: center"><?php if($message!='') echo $message;?></h6> 
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
        	<div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="user_password">Address*</label>
                    <input class="form-control" id="address" name="address" size="30" type="text" />
                </div>
            </div>
        	
        	
        </div> 
        <div class='row'>
            <!-- <div class='col-sm-4'>	
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
        	
        	</div>-->
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
            
            
        </div>
        
        <div class='row'>
            <div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="alertitem1">Alert ITEM 1</label>
                    <input class="form-control" id="alertitem1" name="alertitem1" size="30" type="text" />
                </div>
            </div>
            <div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="user_password">Alert ITEM  2</label>
                    <input class="form-control" id="alertitem2" name="alertitem2" size="30" type="text" />
                </div>
            </div>
            <div class="col-sm-4">
        	     <div class='form-group'>
                    <label for="user_password">Alert ITEM  3</label>
                    <input class="form-control" id="alertitem3" name="alertitem3" size="30" type="text" />
                </div>
        	
        	</div>
        </div>
        <div class='row'>
            <div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="user_password">Alert ITEM  4</label>
                    <input class="form-control" id="alertitem4" name="alertitem4" size="30" type="text" />
                </div>
            </div>
            <div class='col-sm-4'>	
            	<div class='form-group'>
                    <label for="user_password">Alert ITEM  5</label>
                    <input class="form-control" id="alertitem5" name="alertitem5" size="30" type="text" />
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


<?php $this->load->view('user/userfooter');?>