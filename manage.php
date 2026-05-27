<!DOCTYPE html>
<html lang="en">
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
                        require_once "settings.php";
                ?>

                <?php
                        if (isset($_GET['eoi'])) {
                                $eoi = mysqli_read_escape_string($conn, $_GET['eoi']);
                                $sql = "SELECT * FROM eoi";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0){
                                        echo "<table border='1' cellpadding='5'>";
                                        echo "<tr><th>EOI ID</th><th>First Name</th><th>Preferred Name</th><th>Last Name</th><th>DOB</th><th>Gender</th><th>Street Address</th><th>Suburb</th><th>State</th><th>Postcode</th><th>Job Title</th><th>Job Reference</th><th>Mobile Number</th><th>Home Number</th><th>Email</th><th>Main Skills</th><th>Other Skills</th><th>Experience</th><th>Status</th>";
                                        while ($row = mysqli_num_rows($result) > 0) {
                                                echo "<tr>";
                                                echo "<th>" . $row['eoi_id'] . "</td>";
                                        }
                                }
                        }
                ?>

                <?php
                        include "inc_files/footer.inc";
                ?>

        
        </body>
</html>
