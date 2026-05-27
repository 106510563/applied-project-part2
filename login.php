<?php
session_start();
require_once("settings.php");
$conn = mysqli_connect($host, $username, $password, $sql_db);
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

<<<<<<< HEAD
//user input
$username = trim($_POST['username']);
$password = trim($_POST['password']);
=======
    <body>
        <?php include 'inc_files/header.inc'; ?>
        <?php include 'inc_files/nav.inc'; ?>
        <article>
            <h2>Login to Linkly!</h2>
            <?php
            // Get user input
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            // Simple query to check credentials
            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($conn, $query);
            $user = mysqli_fetch_assoc($result);

            if ($user) {
                $_SESSION['username'] = $user['username'];
                header("Location: index.php");
                exit();
            } elseif ($_SESSION['username'] === 'admin' && $_SESSION['password'] === 'admin') {
                header("Location: manage.php")
                exit();
            }
            else {
                echo "❌ Incorrect username or password.";
            }
            ?>
        </article>
        <?php include 'inc_files/footer.inc'; ?>
        
    </body>
</html>
