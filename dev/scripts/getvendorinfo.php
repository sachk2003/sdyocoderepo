<?php
include('connect.php');

$upcid=$_GET['upcid'];
$array = array();
$result = mysql_query("SELECT vendorid,discount,unit,startdate,enddate FROM discount WHERE upc=$upcid",$connection);
if (!$result) { // add this check.
    die('Invalid query: ' . mysql_error());
}
while($row = mysql_fetch_array($result)){
	
$vendorid=$row['vendorid'];	
$discount=$row['discount'];
$unit=$row['unit'];
$startdate=$row['startdate'];
$enddate=$row['enddate'];

//echo $vendorid;echo $discount;echo $unit;echo $startdate;echo $enddate;

$price=$unit.$discount;

$result1=mysql_query("SELECT company FROM vendor where vendorid = $vendorid",$connection);
while($row1 = mysql_fetch_array($result1))
{
  $company= $row1['company'];
  //echo $company;	
}

$json[]=array(
                    'name'=> $company,
                    'price'=>$price,
                    'startdate'=>$row['startdate'],
                    'enddate'=>$row['enddate']
                        );

}

 echo json_encode($json);
?>