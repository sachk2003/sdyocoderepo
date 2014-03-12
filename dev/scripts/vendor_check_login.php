<?php
session_start();
include("connect.php");
// Store  variables from the login form
$email = mysql_escape_string($_POST['email']);
$password = mysql_escape_string($_POST['password']);
$email = trim($email);
//echo $email;
$password = trim($password);
// Check if user is in database
$result = mysql_query("SELECT * FROM vendor WHERE email LIKE '$email%'");

     if($row = mysql_fetch_array($result)){

        $result = mysql_query("SELECT * FROM vendor WHERE email LIKE '$email%' AND password LIKE '$password%'");
        if($row = mysql_fetch_array($result)){
            print $row["fname"];

              session_start ();
              $_SESSION['fname']=$row["fname"];
              $_SESSION['email']=$row["email"];
              echo"Welcome ",$_SESSION['fname'];
              mysql_close();
              Header("Location:../vendor/vendor_home.php");
            }
            else {
             $_SESSION['login_errors'] = array(" Wrong Password. Please try again.");
                header("Location:../vendor/index.php");
                 mysql_close();
                 }
            }
            else { 
                $_SESSION['login_errors'] = array("Your login not found, please create one and then try."); 
                  header("Location:../vendor/index.php");
                 mysql_close();
                 }
?>
