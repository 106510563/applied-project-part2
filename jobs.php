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

            <h3>Now is your chance to have a hand in the future of technology!</h3>
            <p>Join us here at Linkly today and see the progress we make here towards the future of humanity.</p>
            <p>No matter your expertise, here at Linkly you'll be a valuable member of the family, your skills will be cherised and you'll help us strive to make a bright future for humanity.</p>
        
        <section class="job">
            <h4>E-Commerce Customer Service Officer (ECCSO)</h4>
            <div>
                <p>As the E-Commerce Customer Service Officer, you will be the face of our company, the people who will assist our clients through any problem they may have. This job is meant for the charismatic and the proactive.</p>
                <p>This job is available for casual and partime workers, a minimum of 16 hours a week must be worked to maintain this postition.</p>
                <p>Salary: $50,000 anually for partime workers, casual worker salaries are determined after availability is confirmed.</p>
            </div>
            <div>
                <p>What we are looking for in this role (Preferred): </p>
                <ul>
                    <li>An approachable and helpful personality</li>
                    <li>A proactive and quick thinker</li>
                    <li>Someone with a "always ready to help" mindset</li>
                    <li>Customer service is highly preferrable</li>
                </ul>
            </div>
            <div>
            <p>What you will be doing (Essential): </p>
                <ol>
                    <li>Answering phone calls from clients</li>
                    <li>Referring clients to resources or other members of staff for assistance when necessary</li>
                    <li>Assisting clients in finding solutions to their problems, whether that be on call or in person</li>
                </ol>
            </div>
        </section>
        <section class="job">
            <h4>E-Commerce Coordinator (ECC01)</h4>
            <div>
                <p>You will head an integral part of operations here at Linkly, whether that be montioring and maintainance of the site, tracking product sales, or assisting in marketing our various products that will bring humanity to the future.</p>
                <p>This job is available for full time employment only and 36 hours of work is required by all employees, 40 hours of work per week is expected by everyone who applies for this role.</p>
                <p>Salary:$175,000 anually</p>
            </div>
            <div>
                <p>What we are looking for in this role (Preferred):</p>
                <ul>
                    <li>A mature, calm team player</li>
                    <li>A can-do attitude with a business-first mindset</li>
                    <li>A proactive and eager work-ethic who is ready to lead their team into the future</li>
                    <li>Managerial experience is highly preferrable</li>
                </ul>
            </div>
            <div>
                <p>What you will be doing (Essential):</p>
                <ol>
                    <li>Keeping track of all operations related to postition</li>
                    <li>Ensuring performance and quotas are met by the team</li>
                    <li>Setting an example for the team though leadership, work ethic, and teamwork</li>
                </ol>
            </div>
        </section>

        </article>
        <?php include 'inc_files/footer.inc'; ?>
    </body>
</html>