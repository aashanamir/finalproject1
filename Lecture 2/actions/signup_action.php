<?php
require_once("../includes/config.php");
ob_start();
session_start();

$Error = [];

if(isset($_POST))
{

  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirm-password"];

  if($password != $confirmPassword){
    $Error[] = "Password should be same";
    print_r($Error);
  }

  if(!empty($Error))
  {
    $_SESSION['errors'] = $Error;

    header('location:'.BASEURL.'/signup.php');

    exit();
  }

}