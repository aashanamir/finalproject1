<?php
include_once("includes/config.php");
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMS</title>
    <link rel="stylesheet" href="public/style/style.css">
</head>
<body>

<div class="container">
<nav class="navbar">
    <a href=<?php echo BASEURL ?> class="logo">EMS</a>
    <div class="menu-toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    <ul class="nav-list" id="nav-list">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="<?php echo BASEURL . 'signin.php' ?>">Sign In</a></li>
    </ul>
</nav>
</div>
