<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="About us">
    <meta name="keywords" content="applications, job, apply, ecommerce">
    <meta name="author" content="Ciara Smith">
    <link href="styles/styles.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Linkly</title>

</head>

<body>
    <?php include 'inc_files/header.inc'; ?>
    <?php include 'inc_files/nav.inc'; ?>
    <article>
        <h2>Acknowledgement of Country</h2>
        <p>We respectfully acknowledge the Wurundjeri People of the Kulin Nation, who are the Traditional Owners of the
            land on which we are located in Melbourne’s east and outer-east, and pay our respect to their Elders past,
            present and emerging. We are honoured to recognise our connection to Wurundjeri Country, history, culture
            and spirituality. We strive to operate in a manner that respects and honours the Elders and Ancestors of
            these lands. We also respectfully acknowledge Aboriginal and Torres Strait Islander staff, partners and
            visitors. We also acknowledge and respect the Traditional Owners of lands across Australia, their Elders,
            Ancestors, cultures and heritage, and recognise the continuing sovereignties of all Aboriginal and Torres
            Strait Islander Nations.</p>

        <h2>Our Vision</h2>
        <p>Here at Linkly we want a user-friendly enviroment that supports the recruitment process of applicants by
            listing of available positions with the ability to apply online. We provide structured overview of current
            employment opportunities that introduces the organisation and presents detailed descriptions of each role,
            including responsibilities, required skills, working conditions, and salary information. Which allows a
            proper understanding of which job is suitable for applicants. </p>

        <h3>Group Information</h3>
        <ul>
            <li>Group Name: Linkly Team</li>
            <li>Class Schedule
                <ul>

                    <li>Day: Monday</li>
                    <li>Time: 12:30 PM to 1:30 PM</li>
                    <li>Day: Wednesday</li>
                    <li>Time: 4:30 PM to 6:30 PM</li>
                </ul>
            </li>
        </ul>

        <section>

            <h3>Team Members</h3>
            <figure>
                <img id="group" src="images/Groupic.png" alt="Group Photo of Ciara, Paul and Kai">
                <figcaption> Group photo with Ciara Smith, Paul Harrington, Kai Dicker </figcaption>
            </figure>
            <?php
            require_once 'settings.php';
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db); // connects to the database and stores it to $conn
            $sql = "SELECT * FROM about";

            $data = mysqli_query($conn, $sql);
            if (mysqli_num_rows($data) > 0) {
                while ($row = mysqli_fetch_assoc($data)) { // member id, member name, student id and contributions
                    echo "<dl id='horizontal' style='display: contents;'>";
                    echo "<dt><strong>{$row['member_id']}. {$row['member_name']}</strong></dt>";
                    echo "<dt>{$row['student_id']}</dt>";
                    echo "<dt style='margin-bottom: 15px;'>{$row['contributions']}</dt>";
                    echo "</dl>";
                }
            }
            ?>


        </section>

        <h2>Fun Facts</h2>

        <table id="funfact">
            <tr>
                <th><em>Name</em></th>
                <th><em>Dream Job</em></th>
                <th><em>Favourite Quote</em></th>
                <th><em>Favorite Snack</em></th>
                <th><em>Hometown</em></th>
            </tr>
            <?php
            $data = mysqli_query($conn, $sql);
            if (mysqli_num_rows($data) > 0) {
                while ($row = mysqli_fetch_assoc($data)) { // data for member name, dream job, quote, snack, hometown
                    echo "<tr>";
                    echo "<td>{$row['member_name']}</td>";
                    echo "<td>{$row['dream_job']}</td>";
                    echo "<td>{$row['quote']}</td>";
                    echo "<td>{$row['snack']}</td>";
                    echo "<td>{$row['hometown']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<p>Unable to retrieve data.</p>";
            }
            ?>
        </table>
    </article>
    <?php include 'inc_files/footer.inc'; ?>
</body>

</html>