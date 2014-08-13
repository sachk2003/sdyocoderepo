
<?php
include("connect.php");
include '../vendor/header.php';
session_start();

if(!isset($_SESSION['fname'])){
echo"Please Create Login";
exit;
}
?>
<!--
<div align="center">
<h2>Please click the link below to return to vendor home page</h2>
<h2><a href="/vendor/vendor_home.php">Return to Vendor Home page</a></h2>
</div>-->
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
      			<?php
			
			$vendorid = mysql_real_escape_string($_POST['vendorid']);
			$item = mysql_real_escape_string($_POST['item']);
			
			$timestamp=
			
			$upc = mysql_real_escape_string($_POST['upc']);
			$discount = mysql_real_escape_string($_POST['discount']);
			$unit = mysql_real_escape_string($_POST['unit']);
			$startdate = mysql_real_escape_string($_POST['startdate']);
			$enddate = mysql_real_escape_string($_POST['enddate']);
			
			$query = "INSERT INTO discount (discountid,vendorid,item,upc,discount,unit,startdate,enddate,timestamp)
			VALUES('',$vendorid,'$item','$upc','$discount','$unit','$startdate','$enddate',UNIX_TIMESTAMP())";
			$result = mysql_query($query);
			if ($result){
			echo "Update successful.";
			}
			else{
			echo "Update unsuccessful.";
			}
			mysql_close();
			?>

      			
      		</div>
      		
    </div>
  </div>    			 
 
 
<?php
include 'footer.php';
?>
 
 
