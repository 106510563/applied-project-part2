<?php
session_start();
require_once("settings.php");
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Apply job applications">
        <meta name="keywords" content="applications, job, apply, ecommerce">
        <meta name="author" content="Kai Dicker">
        <link href="styles/styles.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Linkly Log-In</title>
    </head>

    <body>
        <?php include 'inc_files/header.inc'; ?>
        <?php include 'inc_files/nav.inc'; ?>
        <article>
            <h1 id="formhead">Login to Linkly!</h2>
                    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {   // ← Only runs on form submit
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_assoc($result);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['username'];
                if ($user['username'] === 'admin') {
                    header("Location: manage.php");
                } else {
                    header("Location: index.php");
                }
                exit();
            } else {
                echo "❌ Incorrect username or password.";
            }
        }
        ?>

        <form method="POST" id="user_form" action="login.php">
            <label for="username">Username:</label>
            <input type="text" class="forminp" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" class="forminp" name="password" required><br>

            <button type="submit">Login</button>
        </form>
        </article>
        <?php include 'inc_files/footer.inc'; ?>
        
    </body>
</html>
