<?php $this->load->view('admin/adminheader');?>
<?php $this->load->view('admin/adminmenu');?>
<div class="col-md-9">
<h5 align="center">Clean Up Offers</h5>	
<div class="col-md-offset-2">
<form  role="form" action="cleanupoffers" method="post" id="cleanup">
	<h6 class="error" style="text-align: center"><?php echo $message;?></h6>
            <fieldset>
            	    
			    		
			    		<div class="form-group">
			    			<table><tr><td><input class="control-small" type="submit" value="Trigger Cleanup"></td></tr></table>
			    			
			    			
			    			
			    		</div>	


            </fieldset>
</form>
</div>
	


</div>
</div>
</div>

<?php $this->load->view('admin/adminfooter');?>