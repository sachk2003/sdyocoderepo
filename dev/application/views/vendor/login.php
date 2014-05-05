<?php $this->load->view('templates/homeheader');
$this->load->helper("form");
?>

<div class="container" style="margin-top:7%;">
    <div class="row">
		<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
    			
                <div class="panel-heading">
			    	<h3 class="panel-title">Please sign in</h3>
			 	</div>
			  	<div class="panel-body">
			    	<h4><?php echo validation_errors(); ?></h4>
			    	<h6 class="error"><?php if($message!='') echo $message; ?></h6>
			    	<form  role="form" action="logincheck" method="post" id="loginform">
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
			    	    <a href='create_login'>Create Login</a>
			    	    <br />
			    	    <a href='forgot_pwd'>Forgot Password</a>
			    	    <br />
			    	    
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>




<?php $this->load->view('vendor/vendorfooter');?>




