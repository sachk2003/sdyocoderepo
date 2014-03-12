<?php 
include("../scripts/connect.php");
include 'header.php';
session_start();
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
                  <li><a href="vendor_change_pwd.php">Change Password</a></li>
                  <li><a href="../logout/logout.php">Logout</a></li>
              	</ul>
           </div>  
      		<div class="col-md-9" style="margin-top:20px;">
      			<?php
      	       if(!isset($_SESSION['fname'])){
                   echo"Please Create Login";
                   exit;
                  }
                  
              echo"<h5>Welcome, ",$_SESSION['fname'],".</h5>";
              echo "<br><br>";
              $email=$_SESSION['email'];
              ?>
              <form method="post" action="../scripts/vendor_change_password.php">	
	      		 <fieldset>
			        <legend>Vendor Change Password</legend>
			        <div class='row'>
			        	<div class='col-sm-4'></div>
			            <div class='col-sm-4'>	
			            	<div class='form-group'>
			                    <label for="user_password">Email</label>
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

            
      
<?php
include 'footer.php';
?>  