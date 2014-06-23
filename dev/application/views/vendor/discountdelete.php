<?php $this->load->view('templates/homeheader');?>
<?php $this->load->view('vendor/vendormenu');?>
<?php $array=$discounts;
?>
<div class="col-md-9" style="margin-top:20px;">
	
<?php if ($num > 0){?> 
      			<h6>Delete Offerings </h6> 
               
      <form id="discountdelete" class="form-horizontal" action="discount_delete_confirm" method="post" name="discountdelete">
      	<h6 class="error" style="text-align: center"><?php if($message !='') echo $message;?></h6>
      <table class="table table-bordered"><tr><td></td><td>Item</td><td>UPC</td><td>Discount</td><td>Unit</td><td>Start Date</td><td>End Date</td></tr>
      <?php 
              	for($i=0;$i<sizeof($array);$i++)
              	{$j=$i+1;
              		?>
              	<tr>
              		<td><input type="checkbox" name="check_list[]" value="<?php echo $i;echo $array[$i]['upc'];?>" /></td>
              		<td><?php echo $array[$i]['item']?></td>
              		<td><?php echo $array[$i]['upc']?></td>
              		<td><?php echo $array[$i]['discount']?></td>
              		<td><?php echo $array[$i]['unit']?></td>
              		<td><?php echo $array[$i]['startdate']?></td>
              		<td><?php echo $array[$i]['enddate']?></td>
              		
              	</tr>		
      	      
      	
      	
      	
      	
      	<?php }
      	?>
      </table>
      <div class="form-group">
             <input type="hidden" name="vendorid" value="<?php echo $vendorid ?>">
             <input type="hidden" name="count1" value="<?php echo sizeof($array) ?>">
      	      </div> 
      	       
      	       <div class="form-group">
      	       <div class="col-md-4 col-md-offset-2">
   	              <button  class="control-small" style="margin-left:70%;"  ><span>Delete</span></button>
   	           </div>	
               </div> 
      
      </form>
      <?php }else {
      			
      		echo "<h6>The Discount database is empty</h6>";
      	}
      	?>
	





</div>
            
</div>
</div>
<?php $this->load->view('vendor/vendorfooter');?>