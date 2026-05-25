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
          <input type="text" name="username" required placeholder="Enter Username"><br>

          <label for="password">Password: </label>
          <input type="password" name="password" required placeholder="Enter Password">
          
          <input type="hidden" name="token" value="abc123">
          <input type="submit" value="submit">

      </form>
  <?php
  session_start();
  require_once("settings.php");

  $conn = mysqli_connect($host, $username, $password, $sql_db);

  // Get form data
  $username = trim($_POST["username"]);
  $password = trim($_POST["password"]);

  // Insert user into the database
  $query = "SELECT * FROM users WHERE username='$username'";
  $insert_user = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
  $result = mysqli_query($conn, $insert_user);



  if ($result) {
    echo "✅ Signup successful. You can now <a href='login.php'>login</a>.";
  } 
  elseif ($username === $query) {
      $_SESSION['user'] = $username;
      echo "❌Username already exists. Please choose a different username.";
      } 
  else {
  }
  ?>
    <?php include 'inc_files/footer.inc'; ?>
  </body>
  </html>    

