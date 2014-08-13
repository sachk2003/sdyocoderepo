<?php
session_start();
if(!isset($_SESSION['fname'])){
echo"Please login";
exit;
}
include 'header.php';


echo"<h6 style='text-align:center;margin-top:10%'>Thank you, ",$_SESSION['fname'],", ","You are now logged off. For security reasons, please close your browser. Thank you.</h6><br />";
echo "<h6 style='text-align:center;'><a href='../index.html'>Return to Home</a></h6>";
//session_unset();
$_SESSION=array();
session_destroy();

include 'footer.php';
#Header("Location:http://superdealyo.simutel.com");
exit;
?>
