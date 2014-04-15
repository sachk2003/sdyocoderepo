<?php $this->load->view('templates/homeheader');?>
<?php $this->load->view('vendor/vendormenu');?>
<div class="col-md-9" style="margin-top:20px;">
<div align="center">
	
<h5>Add Discounts and Offerings</h5>
</div>	
<div style="margin-top:50px;">
<form class="form-horizontal" action="check_upc" method="post" id="upccheck">
      	       	<h6 class="error" style="text-align: center"><?php echo $message;?></h6>
      	       	
      	       <div class="form-group">
  	
                <label for="Item 1" class="col-md-3 control-label" style="text-align: center">Upc: </label>
    
				    <div class="col-md-6">
				      <input type="text"   class="form-control" name="upc" id="upc" placeholder="UPC Code">
				    </div>
               </div>	
      	       <div class="form-group">
      	       <?php if (isset($_SESSION['upc_errors'])){ ?> 
              <div class="form-errors"> <?php foreach($_SESSION['upc_errors'] as $error): ?> 
                <p class="error"><?php echo $error ?></p>
                <?php endforeach; unset($_SESSION['upc_errors']);?> </div>
              <?php } ?>
      	       	
      	       	
      	       	
      	       </div>
      	       <input type="hidden" name="vendorid" value="<?php echo $vendorid ?>">
      	       
      	       
      	       
      	       <div class="col-md-4 col-md-offset-2">
   	              <button  class="control-small" style="margin-left:70%;"><span>Submit</span></button>
   	           </div>	
      	       	
      	       	
      	       	
      	       	
      	       </form>

</div>





</div>
            
</div>
</div>
<?php $this->load->view('vendor/vendorfooter');?>
