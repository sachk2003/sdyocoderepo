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
        		<table class="borderless"><tbody><tr><td class="store">Store</td><td>Price</td><td>Start Date</td><td>End Date</td></tr>
        			<?php if(!empty($discounts[$n])) {
        				//var_dump($discounts);
        				
        			 foreach($discounts[$n] as $discount)
        			{   if(!empty($discount)){
        				     
                             $maxdiscount++;      				
        				$price=$discount[4].$discount[3];
						?>
        			
        			<tr><td class="store"><?php echo $discount[1];?></td><td><?php echo $price;?></td><td><?php echo $discount[5];?></td><td><?php echo $discount[6];?></td></tr>
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
   	<div class="row" id="productbottom">
		 <div class="col-md-12" style="margin-top:0px;">
		 	<h3 style="color:#FF0000;text-align: center;">Best Bet</h3>
		 	<br>
		 	<p style="text-align: left;margin-left:42%;font-weight:600;color:black;">Save Money, gas and time in a Snap!</p>
		 	<br>
		 	<p style="text-align: left;margin-left:32%;font-weight:600;color:black;">Find the closest store with the lowest price for YOUR shopping list</p>
		 </div>
		
		
	</div>
   	
   	
   	
   </div>
   
   
   <input name="maxcount" type="hidden" id="maxcount" value="<?php echo $max;?>">
<?php } $this->load->view('templates/discountbylistfooter');?>