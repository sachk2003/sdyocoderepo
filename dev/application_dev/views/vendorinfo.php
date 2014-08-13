<?php $this->load->view('templates/homeheader');?>

<div class="container" style="text-align: center;color:black;">
	<div class="row" >
		<div class="col-md-12">
		<h3>Vendor Details</h3>
		</div>
	</div>
	<div class="row" >
		<div class="col-md-3"></div>
		<div class="col-md-6" style="text-align: left;">
			<table class="table table-bordered">
			    <tr>
			    	<td>Company</td>
			    	<td><?php echo $details[0]['company'];?></td>
			    </tr>
			    <tr>
			    	<td>Company Website</td>
			    	<td><a style="color:blue" href="<?php echo $details[0]['companyurl'];?>"><?php echo $details[0]['companyurl'];?></a></td>
			    </tr>	
				<tr>
			    	<td>Category</td>
			    	<td><?php echo $details[0]['category'];?></td>
			    </tr>
				<tr>
			    	<td>Address</td>
			    	<td><?php echo $details[0]['address'];?></td>
			    </tr>
			    <tr>
			    	<td>City</td>
			    	<td><?php echo $details[0]['city'];?></td>
			    </tr>
			    <tr>
			    	<td>State</td>
			    	<td><?php echo $details[0]['state'];?></td>
			    </tr>
			    <tr>
			    	<td>Zip</td>
			    	<td><?php echo $details[0]['zip'];?></td>
			    </tr>
			    <tr>
			    	<td>Country</td>
			    	<td><?php echo $details[0]['country'];?></td>
			    </tr>
			    <tr>
			    	<td>Phone</td>
			    	<td><?php echo $details[0]['phone'];?></td>
			    </tr>
			    <tr>
			    	<td>Mobile</td>
			    	<td><?php echo $details[0]['mphone'];?></td>
			    </tr>
			</table>
			
		</div>
		<div class="col-md-3"></div>
	</div>
	
	
</div>


<?php $this->load->view('templates/homefooter');?>
