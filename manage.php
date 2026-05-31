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
                        $allowed_sort = array('eoi_id', 'first_name', 'pref_name', 'last_name', 'dob', 'gender', 'address', 'suburb', 'state', 'postcode', 'job_title', 'job_ref', 'mobile_number', 'home_number', 'email', 'skills', 'otherskills', 'exp', 'status');
                        $allowed_order = array('ASC', 'DESC');
                        $allowed_status = array('New', 'Current', 'Final');
                ?>

                <?php
                //Deleting EOIs for a job reference
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete_by_jobref') {
                        $job_ref = mysqli_real_escape_string($conn, trim($_POST['job_ref'] ?? ''));
                        if (job_ref !== '') {
                                $sql = "DELETE FROM eoi WHERE job_ref = '$job_ref'";
                                if (mysqli_query($conn, $sql)) {
                                        $affected = mysqli_affected_rows($conn);
                                        echo "<p>Deleted: " . $affected . " EOI(s) with job reference (strong)" . htmlspecialcharacters($job_ref) . "</strong>.</p>";
                                } else {
                                        echo "<p>Please provide a job reference to be deleted.</p>";
                                }
                        }
                }
                ?>

                <?php
                //Changing a single EOI status
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'] && $_POST['action'] === 'change_status')) {
                     $eoi_id = (int)($_POST['eoi_id'] ?? 0);
                     $new_status = trim($_POST['new_status'] ?? '');
                     if ($eoi_id > 0 && in_array($new_status, $allowed_status)) {
                        $sql = "UPDATE eoi SET status = '$new_status' WHERE eoi_id = $eoi_id";
                        if (mysqli_query($conn, $sql)) {
                                echo "<p>EOI #" . $eoi_id . " status updated to <strong>" . htmlspecialcharacters($new_status) . "</strong>.</p>";
                        } else {
                                echo "<p>Update failed: " . mysqli_error($conn) . "</p>";
                        }
                     } else {
                        echo "<p>Invalid status change request.</p>";
                     }
                }
                ?>

                <?php
                //read filter
                $filter_jobref = trim($_GET['filter_jobref'] ?? '');
                $filter_fname = trim($_GET['filter_fname'] ?? '');
                $filter_lname = trim($_GET['filter_lname'] ?? '');
                $sort_field = $_GET['sort_field'] ?? 'eoi_id';
                $sort_order = strtoupper($_GET['sort_order'] ?? 'ASC');

                if(!in_array($sort_field, $allowed_sort)) sort_field = 'eoi_id';
                if(!in_array($sort_field, $allowed_sort)) sort_order = 'ASC';

                $where = array();
                if (filter_jobref !== '') {
                        $safe_jobref = mysqli_real_escape_string($conn, $filter_jobref);
                        $where[] = "job_ref = 'safe_jobref'";
                }
                if (filter_fname !== '') {
                        $safe_fname = mysqli_real_escape_string($conn, $filter_fname);
                        $where[] = "first_name LIKE '%$safe_fname%'";
                }
                if (filter_lname !== '') {
                        $safe_lname = mysqli_real_escape_string($conn, $filter_lname);
                        $where[] = "last_name LIKE '%$safe_lname%'";
                }

                $where_sql = count($where) ? 'WHERE ' . implode(' AND ', $where) : '';
                $sql = "SELECT * FROM eoi $where_sql ORDER BY $sort_field $sort_order";
                $result = mysqli_query($conn, $sql);
                ?>

                <!-- EOI management -->
		<form method="GET" action="">
			<label for="filter_jobref">Job Reference:</label>
			<input type="text" id="filter_jobref" name="filter_jobref" value="<?php echo htmlspecialchars($filter_jobref); ?>" placeholder="e.g. DEV001">

			<label for="filter_fname">First Name:</label>
			<input type="text" id="filter_fname" name="filter_fname" value="<?php echo htmlspecialchars($filter_fname); ?>" placeholder="First name">

			<label for="filter_lname">Last Name:</label>
			<input type="text" id="filter_lname" name="filter_lname" value="<?php echo htmlspecialchars($filter_lname); ?>" placeholder="Last name">

			<label for="sort_field">Sort By:</label>
			<select id="sort_field" name="sort_field">
				<?php foreach ($allowed_sort as $f): ?>
					<option value="<?php echo $f; ?>" <?php if ($sort_field === $f) echo "selected"; ?>>
						<?php echo ucfirst(str_replace('_', ' ', $f)); ?>
					</option>
				<?php endforeach; ?>
			</select>

			<label for="sort_order">Order:</label>
			<select id="sort_order" name="sort_order">
				<option value="ASC"  <?php if ($sort_order === 'ASC')  echo "selected"; ?>>Ascending</option>
				<option value="DESC" <?php if ($sort_order === 'DESC') echo "selected"; ?>>Descending</option>
			</select>

			<button type="submit">Filter / Sort</button>
			<a href="?">Reset</a>
		</form>

                <!-- Delete by Job Reference -->
                 <form method="POST" action="" onsubmit="return confirm('Delete ALL EOIs for this job reference? This cannot be undone.')">
                        <input type="hidden" name="action" value="delete_by_jobref">
                        <label for="del_jobref">Delete all EOIs by Job Reference:</label>
                        <input type="text" id="del_jobref" placeholder="e.g. LOL001" required>
                        <button type="submit">Delete</button>
                </form>

                <?php
                //the results table
                        if (isset($_GET['eoi'])) {
                                $eoi = mysqli_real_escape_string($conn, $_GET['eoi']);
                                $sql = "SELECT * FROM eoi";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0){
                                        echo "<table border='1' cellpadding='5'>";
                                        echo "<tr><th>EOI ID</th><th>First Name</th><th>Preferred Name</th><th>Last Name</th><th>DOB</th><th>Gender</th><th>Street Address</th><th>Suburb</th><th>State</th><th>Postcode</th><th>Job Title</th><th>Job Reference</th><th>Mobile Number</th><th>Home Number</th><th>Email</th><th>Main Skills</th><th>Other Skills</th><th>Experience</th><th>Status</th>";
                                        while ($row = mysqli_num_rows($result) > 0) {
                                                echo "<tr>";
                                                echo "<th>" . $row['eoi_id'] . "</th>";
                                                echo "<th>" . $row['first_name'] . "</th>";
                                                echo "<th>" . $row['pref_name'] . "</th>";
                                                echo "<th>" . $row['last_name'] . "</th>";
                                                echo "<th>" . $row['dob'] . "</th>";
                                                echo "<th>" . $row['gender'] . "</th>";
                                                echo "<th>" . $row['address'] . "</th>";
                                                echo "<th>" . $row['suburb'] . "</th>";
                                                echo "<th>" . $row['state'] . "</th>";
                                                echo "<th>" . $row['postcode'] . "</th>";
                                                echo "<th>" . $row['job_title'] . "</th>";
                                                echo "<th>" . $row['job_ref'] . "</th>";
                                                echo "<th>" . $row['mobile_number'] . "</th>";
                                                echo "<th>" . $row['home_number'] . "</th>";
                                                echo "<th>" . $row['email'] . "</th>";
                                                echo "<th>" . $row['skills'] . "</th>";
                                                echo "<th>" . $row['otherskills'] . "</th>";
                                                echo "<th>" . $row['exp'] . "</th>";
                                                echo "<th>" . $row['status'] . "</th>"
                                                echo "</tr>"; 
                                        }
                                        echo "</table>";
                                }
                        }
                ?>

                <?php
                        include "inc_files/footer.inc";
                ?>

        
        </body>
</html>
