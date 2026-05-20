
<?php
require_once("settings.php");

$conn = mysqli_connect($host, $username, $password, $sql_db);

// Get form data
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Insert user into the database
$query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
$result = mysqli_query($conn, $query);

if ($result) {
  echo "✅ Signup successful. You can now <a href='login.html'>login</a>.";
} else {
  echo "❌ Signup failed. Please try again.";
}
?>