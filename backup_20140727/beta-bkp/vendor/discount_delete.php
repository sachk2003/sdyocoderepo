
<?php
include 'header.php';

include("../scripts/connect.php");

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
$query="SELECT * FROM discount WHERE vendorid LIKE '$vendorid%'";
$result = mysql_query($query);
$array = array();
$num = mysql_num_rows($result);
if ($num > 0){
while($row = mysql_fetch_assoc($result)){
$array[] = $row;
}
}else {
        //echo "The Discount database is empty";
      }
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
      			<?php if ($num > 0){?> 
      			<h6>Delete Discounts and Offerings </h6> 
               
      <form id="discountdelete" class="form-horizontal" action="../scripts/discount_delete.php" method="post" name="discountdelete">
      <table class="table table-bordered"><tr><td></td><td>Item</td><td>UPC</td><td>Discount</td><td>Unit</td><td>Start Date</td><td>End Date</td></tr>
      <?php 
              	for($i=0;$i<sizeof($array);$i++)
              	{$j=$i+1;
              		?>
              	<tr>
              		<td><input type="checkbox" name="check_list[]" value="<?php echo $i;echo $array[$i]['upc'];?>" /></td>
              		<td><?php echo $array[$i]['item']?></td>
              		<td><?php echo $array[$i]['upc']?></td>
              		<td><?php echo $array[$i]['discount']?></td>
              		<td><?php echo $array[$i]['unit']?></td>
              		<td><?php echo $array[$i]['startdate']?></td>
              		<td><?php echo $array[$i]['enddate']?></td>
              		
              	</tr>		
      	     
      	         
      	
      	
      	
      	
      	<?php }
      	?>
      </table>
      <div class="form-group">
             <input type="hidden" name="vendorid" value="<?php echo $vendorid ?>">
             <input type="hidden" name="count1" value="<?php echo sizeof($array) ?>">
      	      </div> 
      	       
      	       <div class="form-group">
      	       <div class="col-md-4 col-md-offset-2">
   	              <button  class="control-small" style="margin-left:70%;"  ><span>Delete</span></button>
   	           </div>	
               </div> 
      
      </form>
      <?php }else {
      			
      		echo "<h6>The Discount database is empty</h6>";
      	}
      	?>
     
      	
      <!--<form id="FormName" action="../scripts/discount_delete.php" method="post" name="FormName">
        <table width="448" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td width="150">
              <div align="right"> <label for="item1">item1</label></div>
            </td>
            <td> 
              <input id="item1" name="item1" type="text" size="25" value="<?php echo $array[0]['item']?>" maxlength="10">
            </td>
          </tr>
        <tr>
            <td width="150">
              <div align="right"> <label for="upc1">upc1</label></div>
            </td>
            <td>
              <input id="upc1" name="upc1" type="text" size="25" value="<?php echo $array[0]['upc']?>" maxlength="10">
            </td>
          </tr>
          <tr>
            <td width="150">
              <div align="right"> <label for="discount1">discount1</label></div>
            </td>
            <td> 
              <input id="discount1" name="discount1" type="text" size="25" value="<?php echo $array[0]['discount']?>" maxlength="3">
            </td>
          </tr>
          <tr>
            <td width="150">
              <div align="right"> <label for="unit1">unit1</label></div>
            </td>
            <td> 
              <input id="unit1" name="unit1" type="text" size="25" value="<?php echo $array[0]['unit']?>" maxlength="5">
            </td>
          </tr>
          <tr>
            <td width="150">
              <div align="right"> <label for="startdate1">startdate1</label></div>
            </td>
            <td> 
              <input id="startdate1" name="startdate1" type="text" size="25" value="<?php echo $array[0]['startdate']?>" maxlength="8">
            </td>
          </tr>
          <tr>
            <td width="150">
              <div align="right"> <label for="enddate1">enddate1</label></div>
            </td>
            <td> 
              <input id="enddate1" name="enddate1" type="text" size="25" value="<?php echo $array[0]['enddate']?>" maxlength="8">
            </td>
          </tr>
          <tr> 
            <td width="150"></td>
            <td>
            </td>
          </tr>
       <tr>
            <td width="150">
              <div align="right"> <label for="item2">item2</label></div>
            </td>
            <td>
              <input id="item2" name="item2" type="text" size="25" value="<?php echo $array[1]['item']?>" maxlength="10">
            </td>
          </tr>
        <tr>
            <td width="150">
              <div align="right"> <label for="upc2">upc2</label></div>
            </td>
            <td>
              <input id="upc2" name="upc2" type="text" size="25" value="<?php echo $array[1]['upc']?>" maxlength="10">
            </td>
          </tr>
          <tr>
            <td width="150">
              <div align="right"> <label for="discount2">discount2</label></div>
            </td>
            <td>
              <input id="discount2" name="discount2" type="text" size="25" value="<?php echo $array[1]['discount']?>" maxlength="3">
            </td>
          </tr>
          <tr>
            <td width="150">
              <div align="right"> <label for="unitxi2">unit2</label></div>
            </td>
            <td>
              <input id="unit1" name="unit2" type="text" size="25" value="<?php echo $array[1]['unit']?>" maxlength="5">
            </td>
          </tr>
          <tr>
            <td width="150">
              <div align="right"> <label for="startdate2">startdate2</label></div>
            </td>
            <td>
              <input id="startdate2" name="startdate2" type="text" size="25" value="<?php echo $array[1]['startdate']?>" maxlength="8">
            </td>
          </tr>
          <tr>
            <td width="150">
              <div align="right"> <label for="enddate2">enddate2</label></div>
            </td>
            <td>
              <input id="enddate2" name="enddate2" type="text" size="25" value="<?php echo $array[1]['enddate']?>" maxlength="8">
            </td>
          </tr>
          <tr>
            <td width="150"></td>
            <td>
            </td>
          </tr>
        <tr>
            <td width="150">
              <div align="right"> <label for="item3">item3</label></div>
            </td>
            <td>
              <input id="item3" name="item3" type="text" size="25" value="<?php echo $array[2]['item']?>" maxlength="10">
            </td>
          </tr>
       <tr>
            <td width="150">
              <div align="right"> <label for="upc3">upc3</label></div>
            </td>
            <td>
              <input id="upc3" name="upc3" type="text" size="25" value="<?php echo $array[2]['upc']?>" maxlength="10">
            </td>
          </tr>
          <tr>
            <td width="150">
              <div align="right"> <label for="discount3">discount3</label></div>
            </td>
            <td>
              <input id="discount3" name="discount3" type="text" size="25" value="<?php echo $array[2]['discount']?>" maxlength="3">
            </td>
          </tr>
          <tr>
            <td width="150">
              <div align="right"> <label for="unit3">unit3</label></div>
            </td>
            <td>
              <input id="unit3" name="unit3" type="text" size="25" value="<?php echo $array[2]['unit']?>" maxlength="5">
            </td>
          </tr>
          <tr>
            <td width="150">
              <div align="right"> <label for="startdate3">startdate3</label></div>
            </td>
            <td>
              <input id="startdate3" name="startdate3" type="text" size="25" value="<?php echo $array[2]['startdate']?>" maxlength="8">
            </td>
          </tr>
          <tr>
            <td width="150">
              <div align="right"> <label for="enddate3">enddate3</label></div>
            </td>
            <td>
              <input id="enddate3" name="enddate3" type="text" size="25" value="<?php echo $array[2]['enddate']?>" maxlength="8">
            </td>
          </tr>
          <tr>
            <td width="150"></td>
            <td>
              <input type="submit" name="submitButtonName" value="Delete">
              <input type="hidden" name="vendorid" value="<?php echo $vendorid ?>">
            </td>
          </tr>
        </table>
      </form>-->
      
      
  </div></div></div>    
   <?php
include 'footer.php';
?>   
