<?php

function connect_db() {
    $host = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = 'employee';

    // Establishing the connection
    $conn = mysqli_connect($host, $dbUser, $dbPass, $dbName);

    // Check connection
    if (!$conn) {
        die("Database Connection error: " . mysqli_connect_error());
    }
    else{
      echo "Database Connection" ;
    }

    return $conn;
}

function close_db($conn) {
    if ($conn) {
        mysqli_close($conn);
    }
}
?>
