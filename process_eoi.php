<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: apply.php");
    exit(); // redirects user back to apply.php if form isn't filled out
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Apply job applications">
        <meta name="keywords" content="applications, job, apply, ecommerce">
        <meta name="author" content="Ciara Smith">
        <link href="styles/styles.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thank you for Applying!</title>

    </head>

    <body>
        <?php include 'inc_files/header.inc'; ?>
        <?php include 'inc_files/nav.inc'; ?>
        <article>
                <h2>Thank you for applying to Linkly!</h2>
                <?php
                        if (isset ($_POST["gname"])) // checks if a variable was included in application, and assigns it a variable if so, if not, refers user back to the form to resubmit
                                $first_name = $_POST["gname"]; 
                        else
                                echo "<p>Error: Please enter data in the <a href=\"apply.php\">form</a><p>";
                        if (isset ($_POST["fname"]))
                                $last_name = $_POST["fname"];
                        else
                                echo "<p>Error: Please enter data in the <a href=\"apply.php\">form</a><p>";
                        if (isset ($_POST["mobile"]))
                                $mobile_number = $_POST["mobile"];
                        else
                                if (isset ($_POST["email"]))
                                $email_address = $_POST["email"];
                        else
                                echo "<p>Error: Please enter data in the <a href=\"apply.php\">form</a><p>";
        
                        echo "<p><strong>Thank you $first_name $last_name for your application to Linkly. We will contact you at your phone number ($mobile_number) momentarily.</strong></p>";                
                ?> 
                <p>
                        Please be patient while we process your application. We take pride in our fast response to potential applicants, so expect an affirmative answer within a week, and immediate confirmation of your application to both your <strong>email</strong> and <strong>mobile number</strong>.
                        </br>
                        Thank you for your patience and understanding.
                </p>
                
        </article>              
        <?php include 'inc_files/footer.inc'; ?>
    </body>
</html>