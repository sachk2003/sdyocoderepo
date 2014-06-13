<?php $this->load->view('admin/adminheader');?>
<?php $this->load->view('admin/adminmenu');?>
<div class="col-md-9">
<h5 align="center">Upload CSV File</h5>	
<div class="col-md-offset-2">
<form  role="form" action="uploadfile" method="post" id="uploadform" enctype="multipart/form-data">
	<h6 class="error" style="text-align: center"><?php echo $message;?></h6>
            <fieldset>
            	    <!--<div class="row"><div class="col-md-4">        
			    	  	<div class="form-group">
			    	  		<label for="name">Select Vendor</label>
			    	  		
			    		    <select class="form-control" name="vendor" id="vendor">
							  <?php if($vendors)
							    {
							    	foreach($vendors as $vendor)
									{
								       echo "<option value='".$vendor['vendorid']."'>".$vendor['company']."</option>";		
										
									}
									
							    }
							  
							  ?>
							</select>
							
			    		</div></div></div>-->
			    		<div class="form-group">
			    			<label for="file">Select file</label>
			    			<input type="file" id="uploadedfile" name="uploadedfile">
			    		</div>
			    		<div class="form-group">
			    			<table><tr><td><input class="control-small" type="submit" value="Upload"></td><td><input class="control-small" type="reset" value="Reset"></td></tr></table>
			    			
			    			
			    			
			    		</div>	


            </fieldset>
</form>
</div>
	


</div>
</div>
</div>

<?php $this->load->view('admin/adminfooter');?>