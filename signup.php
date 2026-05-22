<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
</head>
<body>
  
</body>
</html>    
    <form method="post" action="">

        <label for="username">Username: </label>
        <input type="text" name="username" required placeholder="Enter Username"><br>

        <label for="password">Password: </label>
        <input type="password" name="password" required placeholder="Enter Password">
        
        <input type="hidden" name="token" value="abc123">
        <input type="submit" value="signup">

    </form>
<?php
session_start();
require_once("settings.php");

$conn = mysqli_connect($host, $username, $password, $sql_db);

// Get form data
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Insert user into the database

$query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
$result = mysqli_query($conn, $query);
if (empty($username) || empty($password)) {
  echo "❌Please enter both username and password.";
} 

elseif ($result) {
  echo "✅ Signup successful. You can now <a href='login.html'>login</a>.";
} 
elseif ($username === 'admin' && $password === 'password123') {
    $_SESSION['user'] = $username;
    header('Location: welcome.php');
    } 
else {
  echo "❌ Signup failed. Please try again.";
}
?>
