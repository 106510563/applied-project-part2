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
