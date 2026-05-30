<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Linkly Homepage">
        <meta name="keywords" content="applications, job, apply, ecommerce">
        <meta name="author" content="Ciara Smith">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="styles/styles.css" rel="stylesheet">
        <title>Linkly Homepage</title>

    </head>

    <body>
        <?php include 'inc_files/header.inc'; ?>
        <?php include 'inc_files/nav.inc'; ?>
        <article style="display: flex;">
        <aside id="right">
            <h2>The Future of Technology, Today</h2>
            <p>Here at Linkly, we strive to find the limit of technology. Progress is what humanity strives for, and we intend to take humanity to the pinnacle of its capabilities.</p>
            <p>Whether you are a potential client, a valued employee, or simply here for the ride, we are happy to bring you along for the journey on the carousel of progress.</p>
            <h2>What do we do?</h2>
            <p>We provide easy access to virtually buying and selling goods and services for the convenience of both the sellers, and the consumers. Whether your looking for Business to Consumer, Business to Business, Consumer to Consumer, or Consumer to Business trades, we are here to help and make the process and simple as can be.</p>
            <h2>Why choose Linkly</h2>
            <p>With our 30-day guaranteed return, free of charge service, we can assure you that out most important priority is customer satisfaction. Having a 24/7 call service at +XX-XXX-XXX for Australian inquiries, and +XX-XXX-XXX for any international inquiries, we have your back no matter the time of day.</p>
            <h2>Wish to join our team?</h2>
            <p>If you want to join over 1,000 others working at Linkly, please refer to our Jobs page for readily-avaliable positions, but hurry! Positions go fast!</p>
        </aside>
        <aside id="left">
            <img id="photo" style="width: 300px; padding: 10px;" src="https://images.pexels.com/photos/5882532/pexels-photo-5882532.jpeg" alt="Image on two people working at a laptop">
                    <table>
            <tr>
                <th><em>Authors</em></th>
                <th><em>Project</em></th>
                <th><em>Github</em></th>
            </tr>
            <tr>
                <th>Kai Dicker</th>
                <th rowspan="3"><a href="https://ciarasmith.atlassian.net/jira/software/projects/EDRP/summary">Jira Page</a></th>
                <th rowspan="3"><a href="https://github.com/106510563/106510563.github.io">ASM1</a></th>
            </tr>
            <tr>
                <th>Ciara Smith</th>
            </tr>
            <tr>
                <th>Paul Harrington</th>
            </tr>
        </table>
        <button aria-expanded="false" aria-controls="faq-content" style="margin: 0px 60px;padding: 4px;border-radius: 7px;">Toggle FAQ (for screenreaders)</button>
                <div id="faq-content" hidden>
                    Where can I contact for inquiries regarding a specific subject?
                    Our email is avaliable for any inquiries about anything you can think of (info@linkly.com)<br>Otherwise, you can call our Australian phone number at +61 XXX-XXX-XXX, or our international phone number at +XX XXX-XXX-XXX.<br>For inquiries regarding job positions, press 1. For inquiries regarding buying off our platform, press 2. For inquiries regarding selling off our platform, press 3.
                    How do I sell a product on Linkly?
                    To become an official Linkly seller, follow our guide over on our Facebook, or watch <em>this</em>Youtube video with a more in-depth, visual explanation.
                    Can I get a refund?
                    Unfortunately, Linkly can not 100% guarantee a refund without approval from the seller you are buying from, please contact our Customer Support number at +61 XXX-XXX-XXX option 2 for more information regarding your issue. However, we first recommend contacting the seller.
                </div>
            <details>
                <summary style="font-size: 25px; text-align: center;"><strong>FAQ</strong></summary>
                <ol>
                    <li><strong>Where can I contact for inquiries regarding a specific subject?</strong></li>
                    <ul>Our email is avaliable for any inquiries about anything you can think of (info@linkly.com)<br>Otherwise, you can call our Australian phone number at +61 XXX-XXX-XXX, or our international phone number at +XX XXX-XXX-XXX.<br>For inquiries regarding job positions, press 1. For inquiries regarding buying off our platform, press 2. For inquiries regarding selling off our platform, press 3.</ul>
                    <li><strong>How do I sell a product on Linkly?</strong></li>
                    <ul>To become an official Linkly seller, follow our guide over on our Facebook, or watch <em>this</em>Youtube video with a more in-depth, visual explanation.</ul>
                    <li><strong>Can I get a refund?</strong></li>
                    <ul>Unfortunately, Linkly can not 100% guarantee a refund without approval from the seller you are buying from, please contact our Customer Support number at +61 XXX-XXX-XXX option 2 for more information regarding your issue. However, we first recommend contacting the seller.</ul>
                </ol>
            </details>
            
        </aside>
        </article>
        <?php include 'inc_files/footer.inc'; ?>
    </body>
</html>