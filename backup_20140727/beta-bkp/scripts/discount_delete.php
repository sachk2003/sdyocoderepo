<?php
/// In order to use this script freely
/// you must leave the following copyright
/// information in this file:
/// Copyright 2006 www.turningturnip.co.uk
/// All rights reserved.
include '../vendor/header.php';
session_start();
if(!isset($_SESSION['email'])){
echo"Please Create login";
exit;
}
$email=$_SESSION['email'];
//echo "Test";
//echo "$email";
$values=array();
$upcarray='';
if(array_key_exists('check_list', $_POST) && !empty($_POST['check_list']))
{
	
	foreach($_POST['check_list'] as $check) {
             $values[]=substr($check,1);
		
		
		
    }
}

//var_dump($values);
?>
<div class="container">
	<div class="row">
  			<div class="col-md-3" id="leftCol">
              
              	<ul class="nav nav-stacked" id="sidebar">
                  <li><a href="../vendor/vendor_home.php">Vendor Home</a></li>
                  <li><a href="../vendor/discount_code_add.php">Add Discounts and Offerings</a></li>
                  <li><a href="../vendor/discount_update.php">Update Discounts and Offerings</a></li>
                  <li><a href="../vendor/discount_delete.php">Delete Discounts and Offerings</a></li>
                  <li><a href="../vendor/view_vendor_account.php">Vendor Account Management</a></li>
                  <li><a href="../logout/logout.php">Logout</a></li>
              	</ul>
           </div>  
      		<div class="col-md-9" style="margin-top:20px;">


<div align="center">
<h2>Are you sure to delete below UPC Products?</h2>
<table class="table table-bordered">
<tr><td>Sr.No</td><td>UPC Code</td></tr>	
<?php for($i=0;$i<sizeof($values);$i++)
{     if($i==0)  $upcarray.=$values[$i];    
      else $upcarray.=','.$values[$i];
?>
<tr><td><?php echo $i+1;?></td><td><?php echo $values[$i]?></td></tr>	
<?php }?>	
</table>

<h2><a href="discount_deleted.php?src=delete_confirm&email=<?php echo $email?>&values=<?php echo "$upcarray" ?>">Yes</a> - <a href="../vendor/vendor_home.php">No</a></h2>
</div>

</div>
</div>
<?php
include '../vendor/footer.php';
?>
