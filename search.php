<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Job positions and descriptions for linkly">
    <meta name="keywords" content="applications, job, apply, ecommerce">
    <meta name="author" content="Ciara Smith">
    <link href="styles/styles.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search results...</title>

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
            <button type="submit"
                style="border-radius: 10px; border: 3px inset black;padding: 0px 12px;font-size: 20px;transform: translateY(4px);">🔍︎</button>
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
            function sanitise_input($data) #CREATED BY: CIARA SMITH. Stops injections and cross-site scripting by sanitising user input
            {
                if (is_array($data)) {
                        return "";
                }
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            if (isset($_GET['q'])) {
                $q = sanitise_input($_GET['q']);
                $q = mysqli_real_escape_string($conn, $q); // protects your database from SQL injection      
                $sql = "SELECT * FROM jobs
                    WHERE name LIKE '%$q%' 
                    OR ref LIKE '%$q%'"; // 'LIKE%%' makes it so that the search query does not have to exactly match the SQL table
                // currently only have it working so it comes up with results relating to the name and reference code of a job

                $result = mysqli_query($conn, $sql); // sends search query to the db and returns the retrived values under $result
                
                    echo '<p>Results for ' . sanitise_input($_GET['q']) . ':</p>'; // shows what the user input in the search query         
                    if (mysqli_num_rows($result) > 0) { // check to determine if a db returned any record of the q results
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<section class='job'>";
                        echo "<h4 style='text-align: center; font-size: 110%;'>{$row['job_id']}. {$row['name']} ({$row['ref']})</h4>";
                        echo "<p>{$row['desc']}</p>";
                        echo "<p><strong>Starting salary:</strong> {$row['salary']} anually, can be increased with time and promotions.</p>";
                        echo "<p>{$row['hours']} hours peer week, 5 days a week. Overtime can be earned after hours and on weekends.</p>";
                        echo "<p><strong>Preferred qualities:</strong> {$row['pref']}</p>";
                        echo "<p><strong>Essential qualities:</strong> {$row['ess']}</p>";
                        echo "<p style='text-align: center;'><strong>Want to apply for this position? Head to our <a href='apply.php'>apply</a> page and fill in your details!</strong></p>";
                        echo "</section>";
                    }

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