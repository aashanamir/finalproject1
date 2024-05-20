<?php
require_once("../includes/config.php");
require_once("../includes/db.php");
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

    header('location:'.BASEURL.'signup.php');

    exit();
  }


  $passwordHash = password_hash($password , PASSWORD_DEFAULT);

  
  $conn = db_connect();
  $sql = "INSERT INTO `users` (`user_name`, `email`, `password`) VALUES ( '$username', '$email', '$passwordHash')";

  $success = mysqli_query($conn , $sql);

  if(isset($success)){
    $_SESSION["success"] = "You Are Registered Successfully";
    header('location:'.BASEURL.'signup.php');
    exit();
  }

}