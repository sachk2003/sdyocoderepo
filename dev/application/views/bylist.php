<?php $this->load->view('templates/homeheader');?>
<div class="container-form" id="pad" >
            	<div class="row">
            		<div class="col-md-2"></div>
            		<div class="col-md-8">
            			<h2 style="color:#FF0000;">Create YOUR shopping list</h2>
            		</div>
            		<div class="col-md-2"></div>
               	</div>
             <?php 
             
             $items=array("Peanut Butter","Quick Oats","Honey","Strawberry Preserves","Peanut Butter Creamy");
             
             
             ?>            
            
              <div class="row" style="margin-top:10px">
               <div class="col-md-1"></div>
               <div class="col-md-10">
            			
  <form class="form-horizontal " role="form" method="post" action="getdiscounts" id="searchform">
  	<?php for($i=0;$i<5;$i++){?>
  <div class="form-group">
  	
    <label for="Item 1" class="col-md-6 control-label">Item <?php echo $i+1;?> (example: <?php echo $items[$i];?>)</label>
    
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
   
   
   	<div class="col-md-4 col-md-offset-2">
   	  <button  class="control"><span>SUBMIT</span></button>
   	</div>
   
     
</form>
                        			
            			
           </div>
              
            
            
            
              </div>            	
            </div>
            



<?php $this->load->view('templates/bylistfooter');?>