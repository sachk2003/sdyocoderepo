<?php $this->load->view('templates/homeheader');?>
<?php $this->load->view('templates/loggedinusermenu');?>

<div class="col-md-9" style="margin-top:20px;">
<form method="post" action="change_password_submit" id="userchangepwd">	
	      		 <fieldset>
			        <h6  style="text-align: center">Change Password</h6>
			         <h6 class="error" style="text-align: center"><?php if($message!='') echo $message;?></h6>  
			        <div class='row'>
			        	<div class='col-sm-4'></div>
			            <div class='col-sm-4'>	
			            	<div class='form-group'>
			                    <label for="user_password">Email/Username</label>
			                    <input class="form-control" id="email2" name="email2" size="30" type="text" />
			                </div>
			            </div>
                    </div>
                    <div class='row'>
                    	<div class='col-sm-4'></div>
			            <div class='col-sm-4'>	
			            	<div class='form-group'>
			                    <label for="user_password">Password</label>
			                    <input class="form-control" id="password2" name="password2" size="30" type="password" />
			                </div>
			            </div>
                    </div>
                    <div class='row'>
                    	<div class='col-sm-4'></div>
			            <div class='col-sm-4'>	
			            	<div class='form-group'>
			                    <label for="user_password">New Password</label>
			                    <input class="form-control" id="newpassword" name="newpassword" size="30" type="password" />
			                </div>
			            </div>
                    </div>
                    <div class="row">
        	  <div class="col-sm-3"></div>
        	  <div class='col-sm-3'>
              <div class="form-group">
      	         <button  class="control-small" name="Submit2"><span>Submit</span></button>
   	           	
               </div>
              </div>
              <div class='col-sm-3'>
              <div class="form-group">
              	<input type="reset" name="Reset2" value="Clear" class="control-small">
      	         <!--<button  class="control-small"><span>Submit</span></button>-->
   	           	
               </div>
              </div>
              <div class="col-sm-3"></div>
        </div> 
                    
                 </fieldset>
                 
              </form>

	
</div>
            
</div>
</div>
<?php $this->load->view('vendor/vendorfooter');?>
