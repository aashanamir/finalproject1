# Chapter 2: Connect to Database and Start Sessions

In Chapter 2, "Connect to Database and Start Sessions," we will focus on setting up a connection to the MySQL database and initializing PHP sessions. These steps are crucial for managing user data and maintaining user state across different pages of the application.


## Configuring the Database Connection
To interact with the MySQL database, we need to establish a connection using PHP. We'll store the database connection details in a configuration file and create a reusable function to connect to the database.


### Create a Database Configuration File

Create a file named config.php in the /common directory to store the database connection details.

```php
<?php
// common/config.php

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'social_media_db');

// Connect to the database
function db_connect() {
    $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    return $connection;
}
?>
```

## Include the Database Configuration

In any PHP file where you need to interact with the database, include the config.php file and call the db_connect() function to establish a connection.



```php
// example_usage.php

require_once 'common/config.php';

$conn = db_connect();

// Use $conn to interact with the database
```


## Starting Sessions

Sessions are used to store user information across different pages. This is essential for managing user login states and other session-specific data.

### Create a Session Initialization File

Create a file named init.php in the /common directory to start the session and include it in every PHP file that requires session handling.

```php
<?php
// common/init.php

// Start the session
session_start();

// Include database configuration
require_once 'config.php';
?>
```

### Include the Session Initialization File

Include the init.php file at the beginning of any PHP file where you need to manage sessions or access the database.

```php
// index.php

require_once 'common/init.php';

// Now you can use session variables and database connection
```
## Example: User Registration with Database and Sessions
Let's put it all together with an example of user registration that involves connecting to the database and starting a session.

### Registration Form (HTML)
```php
<!-- public/registration_form.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="../action/register.php" method="post" enctype="multipart/form-data">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="file" name="profile_picture">
        <button type="submit">Register</button>
    </form>
</body>
</html>
```

### Registration Handler (PHP)

```php
// action/register.php

require_once '../common/init.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
    $profile_picture = $_FILES["profile_picture"]["name"];

    // Save profile picture
    $target_dir = "../public/images/";
    $target_file = $target_dir . basename($profile_picture);
    move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file);

    // Insert user data into the database
    $conn = db_connect();
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, profile_picture) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $password, $profile_picture);

    if ($stmt->execute()) {
        // Registration successful, start session
        $_SESSION["username"] = $username;
        header("Location: ../index.php");
    } else {
        // Registration failed
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../public/registration_form.php");
}
```

Connect to Database and Start Sessions," you have learned how to set up a MySQL database connection and initialize PHP sessions. This foundation is essential for building more complex features of your web application, such as user authentication and data management. In the next chapters, we will dive deeper into implementing user-specific features and enhancing the application's functionality.