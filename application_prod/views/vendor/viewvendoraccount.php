<?php $this->load->view('templates/homeheader');?>
<?php $this->load->view('vendor/vendormenu');?>
<div class="col-md-9" style="margin-top:20px;">
<?php 
$row=$vendordetails[0];
$vendorid = $row["vendorid"];
$fname = $row["fname"];
$mname = $row["mname"];
$lname = $row["lname"];
$company = $row["company"];
$companyurl = $row["companyurl"];
$category = $row["category"];
$address = $row["address"];
$city = $row["city"];
$state = $row["state"];
$zip = $row["zip"];
$country = $row["country"];
$phone = $row["phone"];
$mphone = $row["mphone"];
$email = $row["email"];


?>

<h5 style="text-align: center">Your Details</h5>
<div class="col-md-6 col-md-offset-3">
<table class="table table-bordered">
	<tr>
		<td>Vendor ID</td><td><?php echo $vendorid ?></td>
	</tr>
	<tr>
		<td>First Name</td><td><?php echo $fname ?></td>
	</tr>
	<tr>
		<td>Middle Name</td><td><?php echo $mname ?></td>
	</tr>
	<tr>
		<td>Last Name</td><td><?php echo $lname ?></td>
	</tr>
	<tr>
		<td>Company</td><td><?php echo $company ?></td>
	</tr>
	<tr>
		<td>Company URL</td><td><?php echo $companyurl ?></td>
	</tr>
	<tr>
		<td>Category</td><td><?php echo $category ?></td>
	</tr>
	<tr>
		<td>Address</td><td><?php echo $address ?></td>
	</tr>
	<tr>
		<td>City</td><td><?php echo $city ?></td>
	</tr>
	<tr>
		<td>State</td><td><?php echo $state ?></td>
	</tr>
	<tr>
		<td>Zip</td><td><?php echo $zip ?></td>
	</tr>
	<tr>
		<td>Country</td><td><?php echo $country ?></td>
	</tr>
	<tr>
		<td>Phone</td><td><?php echo $phone ?></td>
	</tr>
	<tr>
		<td>Mobile</td><td><?php echo $mphone ?></td>
	</tr>
	<tr>
		<td>Email</td><td><?php echo $email ?></td>
	</tr>
</table>
<table>
					<tr>
						<td><a href="vendor_account_update" class='control-small'>Update</a></td>
						 <td><a href="vendor_account_delete" class='control-small'>Delete</a></td>
					</tr>
					
</table>
</div>







</div>
            
      </div>
</div>
<?php $this->load->view('vendor/vendorfooter');?>