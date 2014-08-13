<?php $this->load->view('templates/homeheader');?>
<?php $this->load->view('templates/loggedinusermenu');?>
<div class="col-md-9" style="margin-top:20px;">
	<br /><br /><br /><br />
<div class="row">
	<div class="col-md-12">
      <h6 style="text-align: center"><?php if($message!='') echo $message;?></h6>
      

   </div>
</div>
<div class="row">
	<div class="col-md-12">
      <h4 style="text-align: center">Are you sure you want to delete your profile ?</h4>
      

   </div>
</div>		
<div class="row">
        	  <div class="col-sm-2"></div>
        	  <div class='col-sm-4'>
              <div class="form-group">
      	         <a href="delete_profile"><button  class="control-small" name="Submit2"><span>Yes</span></button></a>
   	           	
               </div>
              </div>
              <div class='col-sm-4'>
              <div class="form-group">
              	<a href="index"><input type="reset" name="Reset2" value="No" class="control-small"></a>
      	         <!--<button  class="control-small"><span>Submit</span></button>-->
   	           	
               </div>
              </div>
              <div class="col-sm-2"></div>
</div>      




</div>
</div>
</div>
<?php $this->load->view('user/userfooter');?>