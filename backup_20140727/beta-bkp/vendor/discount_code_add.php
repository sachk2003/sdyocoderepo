
<?php
include("../scripts/connect.php");
include 'header.php';
session_start();

if(!isset($_SESSION['fname'])){
echo"Please Create Login";
exit;
}


$email=$_SESSION['email'];
//echo "$email";
$query="SELECT * FROM vendor WHERE email LIKE '$email%'";
$result = mysql_query($query);
if($row = mysql_fetch_array($result)){
$vendorid = $row["vendorid"];
//echo "$vendorid";
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
      	       <form class="form-horizontal" action="../scripts/check_upc.php" method="post">
      	       	
      	       	
      	       <div class="form-group">
  	
                <label for="Item 1" class="col-md-3 control-label" style="text-align: center">Upc: </label>
    
				    <div class="col-md-6">
				      <input type="text"   class="form-control" name="upc" id="upc" placeholder="UPC Code">
				    </div>
               </div>	
      	       <div class="form-group">
      	       <?php if (isset($_SESSION['upc_errors'])){ ?> 
              <div class="form-errors"> <?php foreach($_SESSION['upc_errors'] as $error): ?> 
                <p class="error"><?php echo $error ?></p>
                <?php endforeach; unset($_SESSION['upc_errors']);?> </div>
              <?php } ?>
      	       	
      	       	
      	       	
      	       </div>
      	       <input type="hidden" name="vendorid" value="<?php echo $vendorid ?>">
      	       
      	       
      	       
      	       <div class="col-md-4 col-md-offset-2">
   	              <button  class="control-small" style="margin-left:70%;"><span>Submit</span></button>
   	           </div>	
      	       	
      	       	
      	       	
      	       	
      	       </form>
      	       
      	             
      	           
      	  <!--         
      	 <form id="FormName" action="../scripts/check_upc.php" method="post" name="FormName">
        <table width="448" border="0" cellspacing="2" cellpadding="0">
          <tr> 
            <td width="150"> 
              <div align="right"> <label for="upc">upc</label></div>
            </td>
            <td> 
              <input id="upc" name="upc" type="text" size="25" maxlength="14" onBlur="MM_validateForm('upc','','R');return document.MM_returnValue">
              <?php if (isset($_SESSION['upc_errors'])){ ?> 
              <div class="form-errors"> <?php foreach($_SESSION['upc_errors'] as $error): ?> 
                <p><?php echo $error ?></p>
                <?php endforeach; unset($_SESSION['upc_errors']);?> </div>
              <?php } ?> </td>
          </tr>
          <tr> 
            <td width="150"></td>
            <td> 
              <input type="submit" name="submitButtonName" value="Add" onClick="MM_validateForm('upc','','R');return document.MM_returnValue">
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



