<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Job positions and descriptions for linkly">
        <meta name="keywords" content="applications, job, apply, ecommerce">
        <meta name="author" content="Ciara Smith">
        <link href="styles/styles.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Avaliable Job Positions</title>

    </head>

    <body>
        <?php include 'inc_files/header.inc'; ?>
        <?php include 'inc_files/nav.inc'; ?>
        <article>
            <?php
             require_once "settings.php";
            ?>
        <form action="search.php" method="GET">
            <label for="search" style="font-size:0px;">Search:</label>
            <input type="search" id="search" name="q" placeholder="Search Job Positions..." required>
            <style>
                #search {
                    padding: 5px 10px;
                    width: 90%;
                    margin-top: 13px;
                    border-radius: 10px;
                }
            </style>
            <button type="submit" style="border-radius: 10px; border: 3px inset black;padding: 0px 12px;font-size: 20px;transform: translateY(4px);">🔍︎</button>
        </form>

            <img class="image1" src="images/logo.png" alt="Linkly Logo">

            <style>
                .image1 {
                    width: 86px;
                    display: flex;
                    margin: 10px auto;
                }
            </style>

            <?php
            require_once 'settings.php';
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db); // connects to the database and stores it to $conn

            if (isset($_GET['q'])) {
                $q = mysqli_real_escape_string($conn, $_GET['q']); // protects your database from SQL injection      
                $sql = "SELECT * FROM jobs
                    WHERE name LIKE '%$q%' 
                    OR ref LIKE '%$q%'"; // 'LIKE%%' makes it so that the search query does not have to exactly match the SQL table
                // currently only have it working so it comes up with results relating to the name and reference code of a job

                $result = mysqli_query($conn, $sql); // sends search query to the db and returns the retrived values under $result
                if (mysqli_num_rows($result) > 0) {
                    echo "<table border='1' cellpadding='5'>";
                    echo "<tr><th>ID</th><th>Name</th><th>Reference Code</th><th>Salary</th><th>Casual</th><th>Part-Time</th><th>Full-Time</th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) { // gets the search query to output a table that matches the results
                        echo "<tr>";
                        echo "<td>" . $row['job_id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['ref'] . "</td>";
                        echo "<td>" . $row['salary'] . "</td>";
                        echo "<td>" . $row['casual'] . "</td>";
                        echo "<td>" . $row['parttime'] . "</td>";
                        echo "<td>" . $row['fulltime'] . "</td>";
                        echo "</tr>";
                    }   
                        echo "</table>";
                } else {
                    echo "🚫 No matching jobs found.";
                }
            } else {
                echo "Please enter a job position or description to search.";
            }

            mysqli_close($conn);
        ?>
        </article>
        <?php include 'inc_files/footer.inc'; ?>
        
    </body>
</html>