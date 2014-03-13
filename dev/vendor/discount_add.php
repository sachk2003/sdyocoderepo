
<?php
session_start();
include("../scripts/connect.php");
include 'header.php';

//session_start();
if(!isset($_SESSION['fname'])){
echo"Please Create Login";
exit;
}

$upc=$_SESSION['upc'];
$itemname=$_SESSION['itemname'];
$discount=0.0;
$unit='$';
$startdate="";
$enddate="";



$email=$_SESSION['email'];
$query="SELECT * FROM vendor WHERE email LIKE '$email%'";
$result = mysql_query($query);
if($row = mysql_fetch_array($result)){
$vendorid = $row["vendorid"];
}else {
         echo "The database is empty";
         mysql_close();
      }
echo "<br><br>";
mysql_close();
?> 

        <div class="container">
	<div class="row">
  			<div class="col-md-3" id="leftCol">
              
              	<ul class="nav nav-stacked" id="sidebar">
                  <li><a href="vendor_home.php">Vendor Home</a></li>
                  <li><a href="discount_code_add.php">Add Discounts and Offerings</a></li>
                  <li><a href="discount_update.php">Update Discounts and Offerings</a></li>
                  <li><a href="discount_delete.php">Delete Discounts and Offerings</a></li>
                  <li><a href="view_vendor_account.php">Vendor Account Management</a></li>
                  <li><a href="../logout/logout.php">Logout</a></li>
              	</ul>
           </div>  
      		<div class="col-md-9" style="margin-top:20px;">
             <?php echo"<h6>Welcome, ",$_SESSION['fname'],".</h6><br />";?>
             <h6 style="text-align: center">ADD Discounts and Offerings</h6>
             <div class="col-md-12 col-md-offset-1">
             
             <form id="discountadd" class="form-horizontal" action="../scripts/discount_add.php" method="post" name="FormName">
                       
             
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Item Name</label>
               <div class="col-sm-10">
               <input type="text" id="item" name="item" class="form-control"   placeholder="" value="<?php echo $itemname;?>" readonly>
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">UPC</label>
               <div class="col-sm-10">
               <input type="text" id="upc" name="upc" class="form-control"  placeholder="" value="<?php echo $upc;?>" readonly>
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Discount Amount</label>
               <div class="col-sm-10">
               <input type="text" id="discount" name="discount" class="form-control"   placeholder="discount" value="<?php echo $discount;?>">
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Unit of Discount</label>
               <div class="col-sm-10">
               <input type="text" id="unit" name="unit" class="form-control"   placeholder="discount" value="<?php echo $unit;?>">
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">Start Date</label>
               <div class="col-sm-10">
               <input type="text" id="startdate" name="startdate" class="form-control"   placeholder="Start Date" value="<?php echo $startdate;?>">
               </div>
             </div>
             <div class="form-group">
               <label for="itemname" class="col-md-2 control-label">End Date</label>
               <div class="col-sm-10">
               <input type="text" id="enddate" name="enddate" class="form-control"   placeholder="End Date" value="<?php echo $enddate;?>">
               </div>
             </div>
             <div class="form-group">
             <input type="hidden" name="vendorid" value="<?php echo $vendorid ?>">
      	      </div> 
      	       
      	       <div class="form-group">
      	       <div class="col-md-4 col-md-offset-2">
   	              <button  class="control-small" style="margin-left:70%;"><span>Submit</span></button>
   	           </div>	
               </div> 
             </div>
                        
             
             </form>
          <!--   
         <form id="FormName" class="form-horizontal" action="../scripts/discount_add.php" method="post" name="FormName">
         	
         	
        <table width="448" border="0" cellspacing="2" cellpadding="0">
          <tr> 
            <td width="150"> 
              <div align="right"> <label for="item">item name</label></div>
            </td>
            <td> 
              <input id="item" name="item" type="text" size="50" value="<?php echo $itemname;?>" maxlength="50" readonly>
            </td>
          </tr>
          <tr> 
            <td width="150"> 
              <div align="right"> <label for="upc">upc</label></div>
            </td>
            <td> 
              <input id="upc" name="upc" type="text" size="25" value="<?php echo $upc;?>" maxlength="14" readonly>
            </td>
          </tr>
          <tr> 
            <td width="150"> 
              <div align="right"> <label for="discount">discount amount</label></div>
            </td>
            <td> 
              <input id="discount" name="discount" type="text" size="25" value="<?php echo $discount;?>" maxlength="5">
            </td>
          </tr>
          <tr> 
            <td width="150"> 
              <div align="right"> <label for="unit">unit of discount</label></div>
            </td>
            <td> 
              <input id="unit" name="unit" type="text" size="25" value="<?php echo $unit;?>" maxlength="5">
            </td>
          </tr>
          <tr> 
            <td width="150"> 
              <div align="right"> <label for="startdate">startdate</label></div>
            </td>
            <td> 
              <input id="startdate" name="startdate" type="text" size="25" value="<?php echo $startdate;?>" maxlength="8">
            </td>
          </tr>
          <tr> 
            <td width="150"> 
              <div align="right"> <label for="enddate">enddate</label></div>
            </td>
            <td> 
              <input id="enddate" name="enddate" type="text" size="25" value="<?php echo $enddate;?>" maxlength="8">
            </td>
          </tr>
          <tr> 
            <td width="150"></td>
            <td> </td>
          </tr>
          <tr> 
            <td width="150"></td>
            <td> 
              <input type="submit" name="submitButtonName" value="Add">
              <input type="hidden" name="vendorid" value="<?php echo $vendorid ?>">
            </td>
          </tr>
        </table>
      </form>-->
       


           </div>
           
           
       </div>
     </div>      
      
<?php
include 'footer.php';
?>

