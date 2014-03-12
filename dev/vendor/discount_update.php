<?php
include("../scripts/connect.php");
include 'header.php';
session_start();

if(!isset($_SESSION['fname'])){
echo"Please Create Login";
exit;
}
?>

<?php


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
        echo "The Discount database is empty";
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
                  <li><a href="vendor_home.php">Welcome</a></li>
                  <li><a href="discount_code_add.php">Add Discounts and Offerings</a></li>
                  <li><a href="discount_update.php">Update Discounts and Offerings</a></li>
                  <li><a href="discount_delete.php">Delete Discounts and Offerings</a></li>
                  <li><a href="view_vendor_account.php">Vendor Account Management</a></li>
                  <li><a href="../logout/logout.php">Logout</a></li>
              	</ul>
           </div>  
      		<div class="col-md-9" style="margin-top:20px;">
             <?php echo"<h6>Welcome, ",$_SESSION['fname'],".</h6><br />";?>
             <h6>Update Discounts and Offerings-You can only update discount amount and dates</h6>
              <form id="FormName" action="../scripts/discount_update.php" class="form-horizontal" method="post" name="FormName">
              	<?php 
              	for($i=0;$i<sizeof($array);$i++)
              	{$j=$i+1;
              		?>
              		
              	<h6>Details of Item<?php echo $j;?></h6>
              	<hr />	
              	<div class="form-group">
                  <label for="itemname" class="col-md-2 control-label">Item<?php echo $j;?></label>
                  <div class="col-sm-10">
                    <input type="text" id="item<?php echo $i;?>" name="item<?php echo $i;?>" class="form-control"   placeholder="" value="<?php echo $array[$i]['item']?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="itemname" class="col-md-2 control-label">UPC<?php echo $j;?></label>
                  <div class="col-sm-10">
                    <input type="text" id="upc<?php echo $i;?>" name="upc<?php echo $i;?>" class="form-control"   placeholder="" value="<?php echo $array[$i]['upc']?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label for="itemname" class="col-md-2 control-label">discount<?php echo $j;?></label>
                  <div class="col-sm-10">
                    <input type="text" id="discount<?php echo $i;?>" name="discount<?php echo $i;?>" class="form-control"   placeholder="" value="<?php echo $array[$i]['discount']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="itemname" class="col-md-2 control-label">unit<?php echo $j;?></label>
                  <div class="col-sm-10">
                    <input type="text" id="unit<?php echo $i;?>" name="unit<?php echo $i;?>" class="form-control"   placeholder="" value="<?php echo $array[$i]['unit']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="itemname" class="col-md-2 control-label">startdate<?php echo $j;?></label>
                  <div class="col-sm-10">
                    <input type="text" id="startdate<?php echo $i;?>" name="startdate<?php echo $i;?>" class="form-control"   placeholder="" value="<?php echo $array[$i]['startdate']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="itemname" class="col-md-2 control-label">enddate<?php echo $j;?></label>
                  <div class="col-sm-10">
                    <input type="text" id="enddate<?php echo $i;?>" name="enddate<?php echo $i;?>" class="form-control"   placeholder="" value="<?php echo $array[$i]['enddate']?>">
                  </div>
                </div>
              	<br />	
               <?php	}?>
              	<div class="form-group">
             <input type="hidden" name="vendorid" value="<?php echo $vendorid ?>">
             <input type="hidden" name="count1" value="<?php echo sizeof($array) ?>">
      	      </div> 
      	       
      	       <div class="form-group">
      	       <div class="col-md-4 col-md-offset-2">
   	              <button  class="control-small" style="margin-left:70%;"><span>Submit</span></button>
   	           </div>	
               </div> 
              	
              	</form>
        <!--<table width="448" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td width="150">
              <div align="right"> <label for="item1">item1</label></div>
            </td>
            <td> 
              <input id="item1" name="item1" type="text"size="50" value="<?php echo $array[0]['item']?>" maxlength="50" readonly>
            </td>
          </tr>
        <tr>
            <td width="150">
              <div align="right"> <label for="upc1">upc1</label></div>
            </td>
            <td>
              <input id="upc1" name="upc1" type="text" size="25" value="<?php echo $array[0]['upc']?>" maxlength="14" readonly>
            </td>
          </tr>
          <tr>
            <td width="150">
              <div align="right"> <label for="discount1">discount1</label></div>
            </td>
            <td> 
              <input id="discount1" name="discount1" type="text" size="25" value="<?php echo $array[0]['discount']?>" maxlength="5">
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
                <input id="item2" name="item2" type="text"size="50" value="<?php echo $array[1]['item']?>" maxlength="50" readonly>
            </td>
          </tr>
        <tr>
            <td width="150">
              <div align="right"> <label for="upc2">upc2</label></div>
            </td>
            <td>
                 <input id="upc2" name="upc2" type="text"size="25" value="<?php echo $array[1]['upc']?>" maxlength="14" readonly>
            </td>
          </tr>
          <tr>
            <td width="150">
              <div align="right"> <label for="discount2">discount2</label></div>
            </td>
            <td>
              <input id="discount2" name="discount2" type="text" size="25" value="<?php echo $array[1]['discount']?>" maxlength="5">
            </td>
          </tr>
          <tr>
            <td width="150">
              <div align="right"> <label for="unit2">unit2</label></div>
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
                 <input id="item3" name="item3" type="text"size="50" value="<?php echo $array[2]['item']?>" maxlength="50" readonly>
            </td>
          </tr>
       <tr>
            <td width="150">
              <div align="right"> <label for="upc3">upc3</label></div>
            </td>
            <td>
                <input id="upc3" name="upc3" type="text"size="25" value="<?php echo $array[2]['upc']?>" maxlength="14" readonly>
            </td>
          </tr>
          <tr>
            <td width="150">
              <div align="right"> <label for="discount3">discount3</label></div>
            </td>
            <td>
              <input id="discount3" name="discount3" type="text" size="25" value="<?php echo $array[2]['discount']?>" maxlength="5">
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
              <input type="submit" name="submitButtonName" value="Update">
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
             

