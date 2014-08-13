<?php $this->load->view('templates/homeheader');?>
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8" id="bestbet">
    <?php
       echo "<h2 style='text-align:center;color:red;'>Savings in a Snap!<h2>";
           //var_dump($this->session->all_userdata());
           
	   if($this->session->userdata(0))
	   {   echo "<h4 style='text-align:center;'>Your Best Bet for (".$beststartdate." – ".$bestenddate.")</h4>";
		   echo "<table class='table-bordered table-striped' style='font-size:16px;'><tr><td>Store</td><td>Total Bill</td><td>Items Matched</td><td>Location</td></tr>";
		   foreach($bestbet as $k=>$p)
		   {
		   	  echo "<tr><td style='width:20%;'><a href='../bylist/vendorinfo?vendorid=".$p['id']."' >".$k."</a></td>";	
		   	  echo "<td style='width:20%;'>$".$p['sum']."</td>";
			  echo "<td id='cnt' style='color:blue;' rel='popover' data-content='' title='Items' name='".$k."'>".$p['count']."</td>";
			  echo "<td><a target='_blank' href='https://www.google.com/maps/place/".$p['address']."'>Click Here</a></td></tr>";
		   }
		   echo "</table>";
		   //var_dump($bestbet);
		   //$this->session->sess_expiration = '100';
		   //echo "Best Start Date:".$beststartdate."<br />";
		   //echo "Best End Date:".$bestenddate."<br />";
		  //echo $sess_id;
		  $this->session->unset_userdata();
		  //$this->config->set_item('sess_expiration',60);
          // Force the Session class to recapture global settings by calling it's constructor
          //$this->CI_Session();
		  //$this->session->sess_update();
	   }
	   else{
	   	echo "<h5 style='text-align:center;'>Please go back and recreate the shopping list</h5>";
		
	   }  
   ?>





  </div>
   <div class="col-md-2"></div>

   </div>
</div>
<?php $this->load->view('templates/bestbetfooter');?>  
