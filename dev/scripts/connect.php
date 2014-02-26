<?php
/// For the following details,
/// please contact your server vendor
$hostname='localhost:3307'; //// specify host, i.e. 'localhost'
//$hostname='172.31.3.237:3306';
$user='root'; //// specify username
$pass=''; //// specify password
$dbase='superdealyo'; //// specify database name
$port='3307';
//echo "$port";
$connection = mysql_connect($hostname,$user,$pass,$dbase)
or die ("Can't connect to MySQL".mysql_error());
//echo $connection;
//echo "connected";
$dbselect=mysql_select_db($dbase) or die(mysql_error());

//echo $dbselect;



//$result = mysql_query("SELECT * FROM vendor ");
//echo $result;


//while ($row = mysql_fetch_assoc($result)) {
//    echo $row['company'];
//}

?>
