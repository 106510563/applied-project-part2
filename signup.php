  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Signup page for Linkly">
    <meta name="keywords" content="signup, register, create account"> 
    <meta name="author" content="Paul Harrington">
    <link href="styles/styles.css" rel="stylesheet">
    <title>Signup</title>
  </head>
  <body>
    <?php include 'inc_files/header.inc'; ?>
    <?php include 'inc_files/nav.inc'; ?>
        <form method="post" id="signup" action="">

          <label for="username">Username: </label>
          <input type="text" name="username" placeholder="Enter Username" class="forminp" required><br>

          <label for="email">Email: </label>
          <input type="email" name="email" placeholder="Enter Email" class="forminp" required><br>

          <label for="password">Password: </label>
          <input type="password" name="password" placeholder="Enter Password" class="forminp" required>
          
          <label for="confirm">Confirm Password: </label>
          <input type="password" name="confirm" placeholder="Confirm Password" class="forminp" required>

          <input type="hidden" name="token" value="abc123">
          <input type="submit" value="submit">

  <?php
  session_start();
  require_once("settings.php");

  $conn = mysqli_connect($host, $user, $pwd, $sql_db);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
  // Get form data
  $username = trim($_POST["username"]);
  $email = trim($_POST["email"]);
  $password = trim($_POST["password"]);
  $confirm = trim($_POST["confirm"]);
  // Insert user into the database
  $query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
  $insert_user = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
  
  // Insert and query
  $result = mysqli_query($conn, $insert_user);
  $in_db = mysqli_query($conn, $query);

  // Check if passwords match
  if ($password !== $confirm) {
    echo "❌ Passwords do not match.";
    mysqli_close($conn);
    die;
  }
  // Password hashing when passwords match
  elseif ($password === $confirm) {
    $password = password_hash($password, PASSWORD_DEFAULT); 
  }
  elseif (empty($username) || empty($email) || empty($password) || empty($confirm)) {
    echo "❌ All fields are required.";
    mysqli_close($conn);
    die;
  }
  else {
    echo "❌ Invalid input.";
    mysqli_close($conn);
    die;
  }


  //Checking if username or email already exists in database
  //if ($result) {
    //echo "✅ Signup successful. You can now <a href='login.php'>login</a>.";
  //} 
  if (mysqli_num_rows($in_db) > 0) {
    echo "❌Username or email already exists. Please log in if you already have an account.";
    mysqli_close($conn);
    exit;
      } 
  else {
    echo "❌ Error occurred while signing up. Please try again.";
    mysqli_close($conn);
    exit;
  }
}
  ?>
        </form>

    <?php include 'inc_files/footer.inc'; ?>
  </body>
  </html>    

