<nav>
    <ul>
        <li><p><a href="index.php" class="menu">Home</a></p></li>
        <li><p><a href="jobs.php" class="menu">Jobs</a></p=></li>
        <li><p><a href="apply.php" class="menu">Apply</a></p=></li>
        <li><p><a href="about.php" class="menu">About</a></p=></li>
        <li>
            <search>
                <form action="search.php" method="GET">
                    <label for="searchBar">Search</label>
                    <input type="search" id="searchBar" name="q" onkeyup="requiresJavaScriptLol()" placeholder="Search jobs...">
                    <button type="submit"><a href="search.php">Search</a></button>
                </form>
            </search>
        </li>
        <li><p><a href="login.php" class="menu">Login</a></p></li>
        <li><p><a href="logout.php" class="menu">Logout</a></p></li>
        <li><p><a href="signup.php" class="menu">Signup</a></p></li>
    </ul>
</nav>