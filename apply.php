<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Apply job applications">
        <meta name="keywords" content="applications, job, apply, ecommerce">
        <meta name="author" content="Ciara Smith">
        <link href="styles/styles.css" rel="stylesheet">
        <title>Apply to Linkly</title>

    </head>

    <body>
        <?php include 'inc_files/header.inc'; ?>
        <?php include 'inc_files/nav.inc'; ?>
                <p class="description">Fill out the form below to apply for a job position. <br>
        For more information on the specific job positions, please ensure to read the <a href="jobs.html">Jobs</a> page. <br>
        Fields marked with * are required.</p>

        <form method="post" action="http://mercury.swin.edu.au/it000000/formtest.php">
            <fieldset>
                <legend><strong>Applicant Details</strong></legend>
                <label for="gname">Given Name*</label>
                <input type="text" name= "gname" id="gname" maxlength="15" size="10" pattern="^[a-zA-Z ]+$" required="required">
                <label for="pname">Preferred Name</label>
                <input type="text" name= "pname" id="pname" maxlength="15" size="10" pattern="^[a-zA-Z ]+$">
                <label for="fname">Family Name*</label>
                <input type="text" name= "fname" id="fname" maxlength="15" size="10" pattern="^[a-zA-Z ]+$" required="required">
                <p><label for="date">Date of Birth*</label> 
			    <input type="text" name= "date" id="date" placeholder="dd/mm/yyyy" maxlength="10" size="10" pattern="\d{1,2}\/\d{1,2}\/\d{4}" required="required">
		        </p>


                <p>Gender</p> 
                <div id="gender">
				<input type="radio" id="male" name="gender[]" value="male">
                <label for="male">Male</label> 
				<input type="radio" id="female" name="gender[]" value="female">
                <label for="female">Female</label> 
				<input type="radio" id="unspec" name="gender[]" value="unspec">
                <label for="unspec">Other/Unspecified</label> 
                </div>

                <p><label for="street">Street Address*</label>
                <input type="text" name= "street" id="street" maxlength="40" size="40" required="required"></p>
                <p><label for="suburb">Suburb/Town*</label>
                <input type="text" name= "suburb" id="suburb" maxlength="40" size="40" required="required"></p>
                <p><label for="state">State*</label>
                	<select name="state" id="state" required="required">
                <option value="">Please Select</option>
				<option value="vic">VIC</option>			
				<option value="nsw">NSW</option>
                <option value="qld">QLD</option>
                <option value="sa">SA</option>
                <option value="wa">WA</option>
                <option value="nt">NT</option>
                <option value="tas">TAS</option>
                <option value="act">ACT</option>
			        </select></p>
                <p><label for="postcode">Postcode*</label>
                <input type="text" name= "postcode" id="postcode" maxlength="4" size="5" pattern="[0-9]{4,4}" required="required"></p>
            </fieldset>

            <fieldset>
                <legend><strong>Job Position</strong></legend>
                <label for="job">Position Name</label>
                			<select name="job" id="job">
                <option value="">Please Select</option>
				<option value="job1">E-Commerce Customer Service Officer</option>			
				<option value="job2">E-Commerce Coordinator</option>
			        </select>
                <p><label for="ref">Job Reference Number*</label>
                <input type="text" name= "ref" id="ref" maxlength="5" size="7" pattern="[a-zA-Z][0-9]" required="required"></p>
            </fieldset>

            <fieldset>
                <legend><strong>Contact Details</strong></legend>
                <p><label for="mobile">Mobile Number*</label>
                <input type="tel" name= "mobile" id="mobile" maxlength="12" size="10" required="required" pattern="[0-9]{8,12}" ></p>
                <p><label for="home">Home Number</label>
                <input type="tel" name= "home" id="home" maxlength="12" size="10" pattern="[0-9]{10,10}" ></p>
                <p><label for="email">Email Address*</label>
                <input type="email" name= "email" id="email" maxlength="30" size="20" required="required"></p>
            </fieldset>

            <fieldset>
                <legend><strong>Skills</strong></legend>
				<input type="checkbox" id="adapt" name="skills[]" value="adapt">
                <label for="adapt">Adaptibility</label> 
                <br>
				<input type="checkbox" id="create" name="skills[]" value="create">
			    <label for="create">Creative</label> 
                <br>
				<input type="checkbox" id="comm" name="skills[]" value="comm">
			    <label for="comm">Communication</label> 
                <br>
				<input type="checkbox" id="prob" name="skills[]" value="prob">
                <label for="prob">Problem Solving</label> 
                <br>
				<input type="checkbox" id="lead" name="skills[]" value="lead">
                <label for="lead">Leadership</label> 
                <br>
				<input type="checkbox" id="timeman" name="skills[]" value="timeman">
                <label for="timeman">Time Management</label> 
                <br>
				<input type="checkbox" id="other" name="skills[]" value="other">
                <label for="other">Other (please specify below)</label> 

                <p><label for="otherskills">Other Skills</label></p>
			    <p><textarea id="otherskills" name="otherskills" rows="5" cols="50" placeholder="List other skills if necessary..."></textarea></p>
            </fieldset>

            <fieldset>
                <legend><strong>Previous Experience</strong></legend>
                <p><label for="exp">Previous Experience*</label></p>
			<p><textarea id="exp" name="exp" rows="5" cols="50" required="required" placeholder="Write a brief summary of previous experiences and/or qualifications/certificates..."></textarea>
                        </p>
            </fieldset>
            <input type= "submit" value="Apply">
	        <input type= "reset" value="Reset Application">
        </form>
        <?php include 'inc_files/footer.inc'; ?>
    </body>
</html>