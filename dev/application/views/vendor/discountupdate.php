<?php $this->load->view('templates/homeheader');?>
<?php $this->load->view('vendor/vendormenu');?>
<?php $array=$discounts;?>
<div class="col-md-9" style="margin-top:20px;">
	
<h6>Update Discounts and Offerings-You can only update discount amount and dates</h6>
              
              <?php if($array){?>
              
              <form id="discountupdate" action="discount_update_submit" class="form-horizontal" method="post" name="FormName">
              	<h6 class="error" style="text-align: center"><?php if($message !='') echo $message;?></h6>
              	<?php 
              	for($i=0;$i<sizeof($array);$i++)
              	{$j=$i+1;
              		?>
              		
              	<h6>Details of Item<?php echo $j;?></h6>
              	<hr />	
              	<div class="form-group">
                  <label for="itemname" class="col-md-2 control-label">Item<?php echo $j;?></label>
                  <div class="col-sm-10">
                    <input type="text" id="item<?php echo $i;?>" name="item<?php echo $i;?>" class="form-control"   placeholder="" value="<?php echo $array[$i]['item']?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="itemname" class="col-md-2 control-label">UPC<?php echo $j;?></label>
                  <div class="col-sm-10">
                    <input type="text" id="upc<?php echo $i;?>" name="upc<?php echo $i;?>" class="form-control"   placeholder="" value="<?php echo $array[$i]['upc']?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="itemname" class="col-md-2 control-label">discount<?php echo $j;?></label>
                  <div class="col-sm-10">
                    <input type="text" id="discount<?php echo $i;?>" name="discount<?php echo $i;?>" class="form-control"   placeholder="" value="<?php echo $array[$i]['discount']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="itemname" class="col-md-2 control-label">unit<?php echo $j;?></label>
                  <div class="col-sm-10">
                    <input type="text" id="unit<?php echo $i;?>" name="unit<?php echo $i;?>" class="form-control"   placeholder="" value="<?php echo $array[$i]['unit']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="itemname" class="col-md-2 control-label">startdate<?php echo $j;?></label>
                  <div class="col-sm-10">
                    <input type="text" id="startdate<?php echo $i;?>" name="startdate<?php echo $i;?>" class="form-control"   placeholder="" value="<?php echo $array[$i]['startdate']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="itemname" class="col-md-2 control-label">enddate<?php echo $j;?></label>
                  <div class="col-sm-10">
                    <input type="text" id="enddate<?php echo $i;?>" name="enddate<?php echo $i;?>" class="form-control"   placeholder="" value="<?php echo $array[$i]['enddate']?>">
                  </div>
                </div>
              	<br />	
               <?php	}?>
              	<div class="form-group">
             <input type="hidden" name="vendorid" value="<?php echo $vendorid ?>">
             <input type="hidden" name="count1" value="<?php echo sizeof($array) ?>">
      	      </div> 
      	       
      	       <div class="form-group">
      	       <div class="col-md-4 col-md-offset-2">
   	              <button  class="control-small" style="margin-left:70%;"><span>Submit</span></button>
   	           </div>	
               </div> 
              	
              	</form>


 <?php }
else
 {
 ?>
<h6 class="error" style="text-align: center"><?php if($message !='') echo $message;?></h6>
<?php }?>




</div>
            
</div>
</div>
<?php $this->load->view('vendor/vendorfooter');?>