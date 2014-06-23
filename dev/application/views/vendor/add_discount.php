<?php $this->load->view('templates/homeheader');?>
<?php $this->load->view('vendor/vendormenu');?>
<?php
$discount=0.0;
$unit='$';
$startdate="";
$enddate="";
?>
<div class="col-md-9" style="margin-top:20px;">
	
<div align="center">
	
<h5>Add Discount</h5>
</div>

<form id="discountadd" class="form-horizontal" action="discount_add_submit" method="post" name="FormName">
                <h6 class="error" style="text-align: center"><?php echo $message;?></h6>       
             
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Item Name</label>
               <div class="col-sm-10">
               <input type="text" id="item" name="item" class="form-control"   placeholder="" value="<?php echo $itemname;?>" readonly>
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">UPC</label>
               <div class="col-sm-10">
               <input type="text" id="upc" name="upc" class="form-control"  placeholder="" value="<?php echo $upc;?>" readonly>
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Sale Amount</label>
               <div class="col-sm-10">
               <input type="text" id="discount" name="discount" class="form-control"   placeholder="discount" value="<?php echo $discount;?>">
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Unit of Amount</label>
               <div class="col-sm-10">
               <input type="text" id="unit" name="unit" class="form-control"   placeholder="discount" value="<?php echo $unit;?>">
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Start Date</label>
               <div class="col-sm-10">
               <input type="text" id="startdate" name="startdate" class="form-control"   placeholder="Start Date" value="<?php echo $startdate;?>">
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">End Date</label>
               <div class="col-sm-10">
               <input type="text" id="enddate" name="enddate" class="form-control"   placeholder="End Date" value="<?php echo $enddate;?>">
               </div>
             </div>
             <div class="form-group">
             <input type="hidden" name="vendorid" value="<?php echo $vendorid ?>">
      	      </div> 
      	       
      	       <div class="form-group">
      	       <div class="col-md-4 col-md-offset-2">
   	              <button  class="control-small" style="margin-left:70%;"><span>Submit</span></button>
   	           </div>	
               </div> 
             </div>
                        
             
             </form>
             
             
 </div>
            
</div>
</div>
<?php $this->load->view('vendor/vendorfooter');?>            
