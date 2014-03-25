<?php 
 
include('scripts/header.php');
include('scripts/connect.php');
$item1 = mysql_real_escape_string($_POST['item1']);
$item1 = trim($item1);


$item2 = mysql_real_escape_string($_POST['item2']);
$item2 = trim($item2);
$item3 = mysql_real_escape_string($_POST['item3']);
$item3 = trim($item3);
$item4 = mysql_real_escape_string($_POST['item4']);
$item4 = trim($item4);
$item5 = mysql_real_escape_string($_POST['item5']);
$item5 = trim($item5);
 
//$zip=mysql_real_escape_string($_POST['zip']);
$item1=$_POST['item1'];
$zip=$_POST['zip'];
$zip=trim($zip);

/*
echo $item1;
echo $item2;
echo $item3;
echo $item4;
echo $item5;*/
//echo $zip;

$zipcode=explode('-',$zip);
//echo $zipcode[0];
$city=explode(',', $zipcode[1]);
//echo $city[0];


$array = array();
$result = mysql_query("SELECT * FROM vendor WHERE zip LIKE '$zipcode[0]' AND city LIKE '$city[0]'");

$num = mysql_num_rows($result);

$item=array();
if($item1!='') array_push($item,$item1);
if($item2!='') array_push($item,$item2);
if($item3!='') array_push($item,$item3);
if($item4!='') array_push($item,$item4);
if($item5!='') array_push($item,$item5);

//$item = array($item1,$item2,$item3,$item4,$item5);
//var_dump($item);

if ($num > 0){
while($row = mysql_fetch_assoc($result)){
$array[] = $row;
}
}else {
             echo"No vendors for this zip code:$zip in our database yet.<br>";
                 mysql_close();
                 exit;
       }


//var_dump($array);       
$k=0;

$upcids=array();

while($k<count($item)){        

for($j=0;$j<$num;$j++){
	
$vendorid = $array[$j]['vendorid'];

$company =  $array[$j]['company'];
//echo $vendorid;echo $company;


if($item[$k]!='')
{
$query="SELECT * FROM discount WHERE vendorid LIKE '$vendorid%' AND item LIKE '$item[$k]%'";
$result1 = mysql_query($query);


static $upccount=0;
if($row = mysql_fetch_array($result1))
{
	//var_dump($row);   
	++$upccount;
	
$discountid = $row["discountid"];

$items = $row["item"];
$upcid = $row["upc"];
array_push($upcids,$upcid);
$discount = $row["discount"];
$unit = $row["unit"];
$startdate = $row["startdate"];
$enddate = $row["enddate"];

$filename=$upcid;
$filepath='/scripts/json/'.$filename;

//echo $filepath;
if(!file_exists($filepath))
{  //echo "File Exists";
	
	//echo $upcid;
	  
	$url="http://www.product-open-data.com/product/$upcid";
  //  echo $url;
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$headers=array('Content-type: application/json');
    curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch, CURLOPT_URL,$url);


    $result=curl_exec($ch);

   touch('scripts/json/'.$filename);
   //echo $filename;
   chmod('scripts/json/'.$filename,0777);	
  $file=fopen('scripts/json/'.$filename,"w+") or exit("Unable to open file!");
  file_put_contents('scripts/json/'.$filename, $result);
  fclose($file);
 }
?>

<input name="upc code" type="hidden" id="upc<?php echo $upccount?>" value="<?php echo $upcid;?>">

<?php







}
else {
//             echo " No offers by this Vendors for this Item:$item[$k].<br>";
      }

}
}/* End of For Loop*/
$k=$k+1;
}

mysql_close();



?>
<input name="upc code" type="hidden" id="upccount" value="<?php echo $upccount;?>">
<input name="upc code" type="hidden" id="upc" value="<?php echo $upcid;?>">
<?php

if($upccount!=0)
{
	$rows=ceil($upccount/5);
	//var_dump($upcids);
	?>
	<div class="container-products">
	  <div class="row">
            		
            		<div class="col-md-12">
            			<h2 style="color:#FF0000;text-align: center">Your Deals</h2>
            		</div>
            		
       </div>
       <div class="row">
       	<div class="col-md-12"></div>
       	
       </div>
	<?php	
	
	for($m=0;$m<$rows;$m++)
	{  
	  ?>
	  
	  <div class="row">
	  	<div class="col-md-1"></div>
	  	<?php
		for($n=0;$n<$upccount;$n++)
		{
	 ?>
	 
  <div class="col-sm-6 col-md-2" id="<?php echo $upcids[$n];?>">
    <div class="thumbnail">
      <img data-src="holder.js/300x200"  target="_blank" name="<?php echo $upcids[$n];?>" rel="popover" data-content="" title="Product Details" id="productimage" alt="Product Image">
      <p id="url" style="text-align: center"></p>
      <div class="caption">
        <h5 style="text-align: center">Deals on this Product</h5>
        <p>
        	<div class="vendor">
        		
        		
        	</div>
        
        </p>
        <p></p>
      </div>
    </div>
  </div>
   
	  	
		<?php
		}?><div class="col-md-1"></div></div><?php
	}?>
	<div class="row" id="productbottom">
		 <div class="col-md-12" style="margin-top:0px;">
		 	<h3 style="color:#FF0000;text-align: center;">Best Bet</h3>
		 	<br />
		 	<p style="text-align: left;margin-left:42%;font-weight:600;color:black;">Save Money, gas and time in a Snap!</p>
		 	<br />
		 	<p style="text-align: left;margin-left:37%;font-weight:600;color:black;">Find the closest store with the lowest price for YOUR shopping list</p>
		 </div>
		
		
	</div>
	
	
       
       
	
</div>	
<?php	
}
?>



<?php
include('scripts/footerdiscountbylist.php');	
	?>






