<?php $this->load->view('templates/homeheader');?>

<?php //var_dump($details);
$upccount=$details[0];
$upcids=$details[1];
$discounts=$details[2];
$images=$details[3];
//var_dump($discounts);



if($upccount!=0)
{   for($m=0;$m<$upccount;$m++)
    {
    $upcid=$upcids[$m];
	?>	
	<input name="upc code" type="hidden" id="upc<?php echo $m+1?>" value="<?php echo $upcid;?>">
	<?php }
	?>
	<input name="upc code" type="hidden" id="upccount" value="<?php echo $upccount;?>">
       
	
	<?php
	$rows=ceil($upccount/5);
	//var_dump($upcids);
	?>
	<div class="container-products">
	  <div class="row">
            		
            		<div class="col-md-12">
            			<h2 style="color:#FF0000;text-align: center">Your Deals</h2>
            		</div>
            		
       </div>
       <div class="row">
       	<div class="col-md-12"></div>
       	
       </div>
       <?php	
    $maxdiscount=0;
	
	$max=0;
	for($m=0;$m<$rows;$m++)
	{  
	  ?>
	  
	  <div class="row">
	  	<div class="col-md-1"></div>
	  	<?php
		for($n=0;$n<$upccount;$n++)
		{  //echo "in Loop".$n."max:".$max.'<br/>';
			  if($maxdiscount>$max) $max=$maxdiscount;
		   $maxdiscount=0;$norec=0;
		
	 ?>
	 
  <div class="col-sm-6 col-md-2" id="<?php echo $upcids[$n];?>">
    <div class="thumbnail">
      <img  src="<?php echo $images[$n];?>"  name="<?php echo $upcids[$n];?>" rel="popover" data-content="" title="Product Details" id="productimage" alt="Product Image">
      <p id="url" style="text-align: center"></p>
      <div class="caption">
        <h5 style="text-align: center">Deals on this Product</h5>
        <p>
        	<div class="vendor">
        		<table class="borderless"><tbody>
        		<tr><td colspan="4"><?php if($discounts[$n][0][8]!=''){ ?><a target="_blank" href="<?php echo $discounts[$n][0][8]?>" style="color:blue;"><?php echo $discounts[$n][0][8];?></a><?php }else{ echo 'Link not found'; }?></td></tr>
        		<tr><td class="store">Store</td><td>Price</td><td>Start Date</td><td>End Date</td></tr>
        			<?php if(!empty($discounts[$n])) {
        				//var_dump($discounts);
        				
        			 foreach($discounts[$n] as $discount)
        			{   if(!empty($discount)){
        				     
                             $maxdiscount++;      				
        				$price=$discount[4].$discount[3];
						?>
        			
        			<tr><td class="store"><a target="_blank" style="color:blue" href="vendorinfo?vendorid=<?php if($discount[9]!='') echo $discount[9];?>"><?php echo $discount[1];?></a></td><td><?php echo $price;?></td><td><?php echo $discount[5];?></td><td><?php echo $discount[6];?></td></tr>
        		<?php }
                    else $norec=1;
					  
					
					
					
					 }
					 
					
        		}
					
        		else{
        			?>
					<tr><td colspan="4" style="color:red;">No Discounts Found</td></tr>
        		<?php }
        		?>
        		</tbody></table>
        		
        	</div>
        
        </p>
        <p></p>
      </div>
    </div>
  </div>
   
	  	
		<?php
		}
		?>
		<div class="col-md-1"></div>
	</div>
		
	<?php
	    }
	    ?>
       
       
   </div>
   <div class="container">
   	<div class="row">
            		<div class="col-md-12">
            			<h2 style="color:#FF0000;text-align: center">Best Bet</h2>
            		</div>
            		
    </div>
    <div class="row">
    	            <div class="col-md-4"></div>
            		<div class="col-md-4">
            			<p style="color:#000000;text-align: center">Save Money, gas and time in a Snap!</p>
            		</div>
            		<div class="col-md-4"></div>
    </div>
    <div class="row">
    	            <div class="col-md-3"></div>
            		<div class="col-md-6">
            			<p style="color:#000000;text-align: center">Find the closest store with the lowest price for YOUR shopping list</p>
            		</div>
            		<div class="col-md-3"></div>
    </div>
   	
   	
   	
   	
   </div>
   
   
   <input name="maxcount" type="hidden" id="maxcount" value="<?php if($max==0) echo $maxdiscount;else echo $max+1;?>">
<?php }

else{
?>
  	<div class="container-products">
	  <div class="row">
            		
            		<div class="col-md-12">
            			<h2 style="color:#FF0000;text-align: center">No Discounts Found </h2>
            		</div>
        </div>
     </div>       		
	<?php
}
$this->load->view('templates/discountbylistfooter');?>
