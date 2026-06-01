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
    <article>
        <form method="post" id="user_form" action="">
          <h2>Sign Up to Linkly</h2>

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = "";
    $success = false;

    if (!isset($_POST['token']) || !hash_equals($_SESSION['token'], $_POST['token'])) {
        $error = "❌ Invalid form submission.";
    } else {
        $_SESSION['token'] = bin2hex(random_bytes(32));

        $username = trim($_POST["username"]);
        $email    = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $confirm  = trim($_POST["confirm"]);

        if (empty($username) || empty($email) || empty($password) || empty($confirm)) {
            $error = "❌ All fields are required.";
        } elseif (strlen($password) < 8 || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/', $password)) {
            $error = "❌ Password must be at least 8 characters and contain at least one uppercase letter, one lowercase letter, and one digit.";
        } elseif ($password !== $confirm) {
            $error = "❌ Passwords do not match.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "❌ Invalid email format.";
        } else {
            $query = $conn->prepare("SELECT * FROM users WHERE username=? OR email=?");
            $query->bind_param("ss", $username, $email);
            $query->execute();
            $in_db = $query->get_result();

            if (mysqli_num_rows($in_db) > 0) {
                $error = "❌ Username or email already exists.";
            } else {
                $hashed = password_hash($password, PASSWORD_DEFAULT);
                $insert_user = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                $insert_user->bind_param("sss", $username, $email, $hashed);
                $result = $insert_user->execute();
                $insert_user->close();

                if ($result) {
                    $success = true;
                } else {
                    $error = "❌ Signup failed. Please try again.";
                }
            }
            $query->close();
        }
    }

    mysqli_close($conn);

    if ($success) {
        echo "<p class='message'>✅ Signup successful. You can now <a href='login.php'>login</a>.</p>";
    } else {
        echo "<p class='message'>{$error}</p>";
    }
}?>
    </article>
    <?php include 'inc_files/footer.inc'; ?>
  </body>
  </html>    

