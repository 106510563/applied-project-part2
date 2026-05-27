<!DOCTYPE html>
<html lang="en">
        <?php
        session_start();
        require_once("settings.php");

        $conn = mysqli_connect($host, $username, $password, $database);

        // Get user input
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Simple query to check credentials
        $query = "SELECT * FROM manage WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
                $_SESSION['username'] = $user['username'];
                header("Location: welcome.php");
                exit();
        } else {
                echo "❌ Incorrect username or password.";
        }
        ?>
        <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="Management page for Linkly">
                <meta name="keywords" content="management, admin, dashboard">
                <title>Management</title>
                <link href="styles/styles.css" rel="stylesheet">
        </head>
        <body>
                <?php 
                        include "inc_files/header.inc"; 
                        include "inc_files/nav.inc";
                ?>




                <?php
                        include "inc_files/footer.inc";
                ?>

        
        </body>
</html>
