    <?php  
    session_start();
    require_once("settings.php");
    
    if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32)); // Generate CSRF token
    }
    ?>
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
          <input type="password" name="password" placeholder="Enter Password" class="forminp" required><br>
          
          <label for="confirm">Confirm Password: </label>
          <input type="password" name="confirm" placeholder="Confirm Password" class="forminp" required><br>

          <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">
          <input type="submit" value="Submit">
        </form>

    <?php
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
      // Check token
      if (!isset($_POST['token']) || !hash_equals($_SESSION['token'], $_POST['token'])){
      die("Invalid request.");
      }
      // Regenerate token for next form
      $_SESSION['token'] = bin2hex(random_bytes(32)); 
      // Get form data
      $username = trim($_POST["username"]);
      $email = trim($_POST["email"]);
      $password = trim($_POST["password"]);
      $confirm = trim($_POST["confirm"]);

      // Check empty fields
      if (empty($username) || empty($email) || empty($password) || empty($confirm)) {
      echo "❌ All fields are required.";
      mysqli_close($conn);
      }
      elseif (strlen($password) < 8 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/', $password)) {
      echo "❌ Password must be at least 8 characters and   contain at least one uppercase letter, one lowercase letter, and one digit.";
      mysqli_close($conn); 
      }
      // Check if passwords match
      elseif ($password !== $confirm) {
      echo "❌ Passwords do not match.";
      mysqli_close($conn);
      }
      // Check email format
      elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "❌ Invalid email format.";
      mysqli_close($conn);
      }

      else {
        // Insert user into the database
        $query = $conn->prepare("SELECT * FROM users WHERE username=? OR email=?");
        $query->bind_param("ss", $username, $email);
        $query->execute();

        $in_db = $query->get_result();

        if (mysqli_num_rows($in_db) > 0) {
        echo "❌Username or email already exists. Please log in if you already have an account.";
        mysqli_close($conn);
        exit;
        } 
        else {
          $hashed = password_hash($password, PASSWORD_DEFAULT); 
          
          $insert_user = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
          $insert_user->bind_param("sss", $username, $email, $hashed);
          $result=$insert_user->execute();

          // Insert and query result check
          if ($result) {
          echo "✅ Signup successful. You can now <a href='login.php'>login</a>.";
          mysqli_close($conn);
          exit;
          } 

          else { 
          echo "❌ Signup failed. Please try again.";
          mysqli_close($conn);
          }
          $insert_user->close();
        }
      }
    }
    
    ?>

    <?php include 'inc_files/footer.inc'; ?>
  </body>
  </html>    

