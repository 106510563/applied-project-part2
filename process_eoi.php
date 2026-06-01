<?php
        require_once 'settings.php';
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

        if (!$conn) {
                die("Database connection failed: " . mysqli_connect_error());
        }

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

                        function sanitise_input($data){
                                if (is_array($data)) {
                                return "";
                        }
                        $data = trim($data);
                        $data = stripslashes($data); 
                        $data = htmlspecialchars($data); 
                        return $data;
                        }

                        // getting + sanitising the data from the form
                        $first_name = sanitise_input($_POST["gname"] ?? "");
                        $pref_name = sanitise_input($_POST["pname"]?? "");
                        $last_name  = sanitise_input($_POST["fname"] ?? "");
                        $dob = sanitise_input($_POST["date"] ?? "");
                        $gender = sanitise_input($_POST["gender"] ?? "");
                        $address = sanitise_input($_POST["street"] ?? "");
                        $suburb = sanitise_input($_POST["suburb"] ?? "");
                        $state = sanitise_input($_POST["state"] ?? "");
                        $postcode = sanitise_input($_POST["postcode"] ?? "");
                        $job_title = sanitise_input($_POST["job"] ?? "");
                        $job_ref = sanitise_input($_POST["ref"] ?? "");
                        $mobile_number = sanitise_input($_POST["mobile"] ?? "");
                        $home_number = sanitise_input($_POST["home"] ?? "");
                        $email_address = sanitise_input($_POST["email"] ?? "");
                        $otherskills = sanitise_input($_POST["otherskills"] ?? "");
                        $exp = sanitise_input($_POST["exp"] ?? "");

                        $skills = isset($_POST["skills"])? implode(", ", $_POST["skills"]): ""; // since skills is an array it needs a separate thing
                        $skills = sanitise_input($skills);

                        if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["gname"]))
    {
        $first_nameErr = "Name is required";
    }
    else
    {
        $first_name = $_POST["gname"];
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$first_name))
        {
            $first_nameErr = "Only letters and white space allowed";
        }
    }
}

                        // validating form inputs (server side validation)
                        $errors = [];
                        if (empty($data['email'])) {
                                $errors['email'] = "Email is required.";
                        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                                $errors['email'] = "Invalid email format.";
                        }
                        if (empty($last_name))
                                $errors[] = "Last name is required.";
                        if (empty($dob))
                                $errors[] = "Date of Birth is required.";
                        if (empty($gender))
                                $errors[] = "Gender is required.";
                        if (empty($address))
                                $errors[] = "Address is required.";
                        if (empty($suburb))
                                $errors[] = "Suburb is required.";
                        if (empty($state))
                                $errors[] = "State is required.";
                        if (empty($postcode))
                                $errors[] = "Postcode is required.";
                        if (empty($job_ref))
                                $errors[] = "Job reference is required.";
                        if (empty($mobile_number))
                                $errors[] = "Mobile number is required.";
                        if (empty($email_address))
                                $errors[] = "Email address is required.";
                        if (empty($exp))
                                $errors[] = "'Previous experience' category is required.";
                        if (!filter_var($email_address, FILTER_VALIDATE_EMAIL))
                                $errors[] = "Invalid email address.";
                        if (!preg_match("/^[0-9]{8,15}$/", $mobile_number))
                                $errors[] = "Invalid mobile number.";
                        if (!preg_match("/^[A-Za-z0-9]{5}$/", $job_ref))
                                $errors[] = "Invalid job reference.";

                        // create table if eoi table does not exist
                        $createTable = "CREATE TABLE IF NOT EXISTS eoi(
                        `eoi_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
                        `first_name` varchar(30) NOT NULL,
                        `pref_name` varchar(30) NOT NULL,
                        `last_name` varchar(30) NOT NULL,
                        `dob` date NOT NULL,
                        `gender` varchar(10) NOT NULL,
                        `address` varchar(50) NOT NULL,
                        `suburb` varchar(20) NOT NULL,
                        `state` varchar(20) NOT NULL,
                        `postcode` int(4) NOT NULL,
                        `job_title` varchar(50) NOT NULL,
                        `job_ref` varchar(5) NOT NULL,
                        `mobile_number` int(15) NOT NULL,
                        `home_number` int(15) NOT NULL,
                        `email` varchar(50) NOT NULL,
                        `skills` varchar(30) NOT NULL,
                        `otherskills` varchar(500) NOT NULL,
                        `exp` varchar(500) NOT NULL,
                        `status` enum('New','Current','Final') NOT NULL DEFAULT 'New')";

                        mysqli_query($conn, $createTable);

                        // insert data from form into table
                        $stmt = mysqli_prepare(
                                $conn,
                                "INSERT INTO eoi
                                (first_name, pref_name, last_name, dob, gender, address, suburb, state, postcode, job_title, job_ref, mobile_number, home_number, email, skills, otherskills, exp)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
                        );

                        mysqli_stmt_bind_param(
                                $stmt,
                                "sssssssssssssssss",
                                $first_name, $pref_name, $last_name, $dob, $gender, $address, $suburb, $state, $postcode, $job_title, $job_ref, $mobile_number, $home_number, $email_address, $skills, $otherskills, $exp
                        );

                        if (mysqli_stmt_execute($stmt)) {
                                $eoiNumber = mysqli_insert_id($conn);
                                echo "<p><strong>Thank you $first_name $last_name for your application to Linkly. We will contact you at your phone number ($mobile_number) momentarily.</strong></p>";                
                                echo "<p>Your EOI Number is: <strong>$eoiNumber</strong></p>";
                                echo "<p><strong>Here are your details:</strong></p>";
                                echo "<p>
                                <strong>First (Given) Name:</strong> $first_name
                                <br>
                                <strong>Preferred Name (if applicable):</strong> $pref_name
                                <br>
                                <strong>Last Name:</strong> $last_name
                                <br>
                                <strong>Date of Birth:</strong> $dob
                                <br>
                                <strong>Gender:</strong> $gender
                                <br>
                                <strong>Address:</strong> $address, $suburb ($postcode), $state
                                <br>
                                <strong>Job Position and Reference:</strong> $job_title ($job_ref)
                                <br>
                                <strong>Mobile Number: </strong>$mobile_number
                                <br>
                                <strong>Home Number (if applicable):</strong> $home_number
                                <br>
                                <strong>Email Address:</strong> $email_address
                                <br>
                                <strong>Your skills:</strong> $skills
                                <br>
                                <strong>Other skills (if applicable):</strong> $otherskills
                                <br>
                                <strong>Previous Experience:</strong> $exp
                                </p>";
                        } else {
                                echo "<p>Error submitting application. Please try submitting the <a href='apply.php'>form</a> again.</p>";
                        }


                
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