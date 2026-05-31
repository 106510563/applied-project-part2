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
            <button aria-label="Search button" type="submit" style="border-radius: 10px; border: 3px inset black;padding: 0px 12px;font-size: 20px;transform: translateY(4px);">🔍︎</button>
        </form>

            <img class="image1" src="images/logo.png" alt="Linkly Logo">

            <style>
                .image1 {
                    width: 86px;
                    display: flex;
                    margin: 10px auto;
                }
            </style>

            <h3>Now is your chance to have a hand in the future of technology!</h3>
            <p>Join us here at Linkly today and see the progress we make here towards the future of humanity.</p>
            <p>No matter your expertise, here at Linkly you'll be a valuable member of the family, your skills will be cherised and you'll help us strive to make a bright future for humanity.</p>
            <p><strong>List of all avaliable job positions:</strong></p>
            <?php
                require_once 'settings.php';
                $conn = @mysqli_connect($host, $user, $pwd, $sql_db); // connects to the database and stores it to $conn
                $sql = "SELECT * FROM jobs";
                $result = mysqli_query($conn, $sql);
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

            ?>
        </article>
        <?php include 'inc_files/footer.inc'; ?>
    </body>
</html>