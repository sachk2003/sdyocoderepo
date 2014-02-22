<?php 
 
 include('scripts/header.php');
 //include('scripts/connect.php');
$item1 = mysql_real_escape_string($_POST['item1']);
$item1 = trim($item1);
//echo $item1;
//++$m;
//}
$item2 = mysql_real_escape_string($_POST['item2']);
$item2 = trim($item2);
$item3 = mysql_real_escape_string($_POST['item3']);
$item3 = trim($item3);
$item4 = mysql_real_escape_string($_POST['item4']);
$item4 = trim($item4);
$item5 = mysql_real_escape_string($_POST['item5']);
$item5 = trim($item5);
 
$zip=mysql_real_escape_string($_POST['zip']);
$zip=trim($zip);

echo $item1;
echo $item2;
echo $item3;
echo $item4;
echo $item5;
echo $zip;




 
 ?>



 
 
 
<?php
 include('scripts/footer.php');
?>
