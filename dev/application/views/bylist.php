<?php $this->load->view('templates/homeheader');?>
<div class="container" >
            	<div class="row">
            		<div class="col-md-3"></div>
            		<div class="col-md-6" id="pad">
            			<h2 style="color:#FF0000;">Create YOUR shopping list</h2>
            		</div>
            		<div class="col-md-3"></div>
               	</div>
             <?php 
             
             $items=array("Peanut Butter","Quick Oats","Honey","Strawberry Preserves","Peanut Butter Creamy");
             
             
             ?>            
            
              <div class="row">
               <div class="col-md-3">
               	<p>
                 <h4 style="color:red">Currently site is in trial mode.</h4>
                 <h5>To test drive please enter only the items given as examples and use 08550 for zipcode</h5>
            		
            	</p>
               	
               </div>
               <div class="col-md-6" id="pad">
            			
  <form class="form-horizontal " role="form" method="post" action="getdiscounts" id="searchform">
  	<?php for($i=0;$i<5;$i++){?>
  <div class="form-group">
  	
    <label for="Item 1" class="col-md-6 control-label">Item <?php echo $i+1;?> <br />(example: <?php echo $items[$i];?>)</label>
    
    <div class="col-md-6">
      <input type="text" name="item<?php echo $i+1;?>" class="form-control fontsforweb_fontid_4368" id="tag<?php echo $i+1;?>" placeholder="Item <?php echo $i+1;?>">
    </div>
  </div>
  
    <?php }?>
    
   <div class="form-group">
   	<label for="zip" class="col-md-6 control-label">Enter zip code and select city from dropdown</label>
   	<div class="col-md-6">
   		<input type="text" name="zip" id="zip"   class="form-control fontsforweb_fontid_4368" placeholder="Zip Code">
   		
   	</div>
   	  	
   </div>
   
   
   	<div>
   	  <button  class="control"><span>SUBMIT</span></button>
   	</div>
   
     
</form>
                      			
            			
           </div>
              
            <div class="col-md-3">
            	
            	
            	
            </div>
            
            
              </div>  
              <div class="row">
   <div class="col-md-2"></div>
   <div class="col-md-8">
  <h5 align="center">Sign Up for email alerts for your shopping list <a href="../userlogin/"><button type="button" class="btn btn-primary btn-xs">User Login</button></a> </h5></div>
   <div class="col-md-2"></div>
</div>           	
            </div>
            



<?php $this->load->view('templates/bylistfooter');?>
