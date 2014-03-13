<?php 
//var_dump($_SESSION);

include 'header.php';
?>
<div class="container" style="margin-top:7%;">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Please sign in</h3>
			 	</div>
			  	<div class="panel-body">
			    	<form  role="form" action="../scripts/vendor_check_login.php" method="post" id="loginform">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="E-mail" name="email" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="">
			    		</div>
			    		<div class="form-group">
			    	    <input class="btn btn-lg control-small btn-block" type="submit" value="Login">
			    	   </div>
			    	    <br />
			    	    <a href='vendor_create_login.php'>Create Login</a>
			    	    <br />
			    	    <a href='vendor_forgot_pwd.php'>Forgot Password</a>
			    	    <br />
			    	    
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>


<!--
<div class="container-form" id="vendorlogin" >
            	<div class="row">
            		<div class="col-md-2"></div>
            		<div class="col-md-8">
            			<h2 style="color:#FF0000;text-align: center">Vendor Login</h2>
            		</div>
            		<div class="col-md-2"></div>
               	</div>
                   
            
              <div class="row" style="margin-top:10px">
               <div class="col-md-3"></div>
               <div class="col-md-7">
            			
  <form class="form-horizontal" role="form" method="post" action="../scripts/vendor_check_login.php" id="loginform">
  	
  <div class="form-group">
  	
    <label for="Item 1" class="col-md-6 control-label">User Name</label>
    
    <div class="col-md-6">
      <input type="text" name="email" class="form-control fontsforweb_fontid_4368" id="email" placeholder="Email Address">
    </div>
  </div>
  
    
    
   <div class="form-group">
   	<label for="password" class="col-md-6 control-label">Password</label>
   	<div class="col-md-6">
   		<input type="password" name="password" id="password"   class="form-control fontsforweb_fontid_4368" placeholder="Password">
   		
   	</div>
   	  	
   </div>
   
   
   	<div class="col-md-4 col-md-offset-2">
   	  <button  class="control-small"><span>Login</span></button>
   	</div>
   
     
</form>
                        			
            			
           </div>
              
            
            
            
              </div>   
              <div class="col-md-2"></div>         	
            </div>
  
-->









<?php
include 'footer.php';
?>
