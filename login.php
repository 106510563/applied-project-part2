<<<<<<< HEAD
<?php
session_start();
require_once("settings.php");
=======
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
>>>>>>> 0d53a26dbebe5b4b067bc962fe99ab7b5014148d

<<<<<<< HEAD
$conn = mysqli_connect($host, $username, $password, $sql_db);
=======
    </head>
>>>>>>> 0d53a26dbebe5b4b067bc962fe99ab7b5014148d

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
                require_once("settings.php");

                $message = "";
                $toastClass = "";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $stmt = $conn->prepare("SELECT password FROM linkly_db WHERE email")
                    $stmt->execute();
                    $stmt->store_result();
                }
            ?>
        </article>
        <?php include 'inc_files/footer.inc'; ?>
        
    </body>
</html>
