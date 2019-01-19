<?php # Script 18.6 - register.php
// This is the registration page for the site.
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
require ('includes/config.inc.php');
$p_title = 'Register';
include ('includes/header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

	// Assume invalid values:
	$fn = $ln = $e = $p = $b = $s = $ph = FALSE;
	// Check for a first name:
	if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $trimmed['first_name'])) {
		$fn = mysqli_real_escape_string ($dbc, $trimmed['first_name']);
	} else {
		echo '<p class="error">Please enter your first name! It should only contain  letters, apostrophe, space, dash and length between 2-20.</p>';
	}

	// Check for a last name:
	if (preg_match ('/^[A-Z \'.-]{2,40}$/i', $trimmed['last_name'])) {
		$ln = mysqli_real_escape_string ($dbc, $trimmed['last_name']);
	} else {
		echo '<p class="error">Please enter your last name! It should only contain  letters, apostrophe, space, dash and length between 2-20.</p>';
	}
	
	// Check for an email address:
	if (filter_var($trimmed['email'], FILTER_VALIDATE_EMAIL)) {
		$e = mysqli_real_escape_string ($dbc, $trimmed['email']);
	} else {
		echo '<p class="error">Please enter a valid email address!</p>';
	}
	
	if (isset($_POST['phone'])){
		$b = $_POST['phone'];
	}else {echo '<p>Enter your phone number Please.</p>'}
	
	//Check for DOB
	if (isset($_POST['dob'])){
		$b = $_POST['dob'];
	}
	
	//Check for Sex
	if (isset($_POST['gender'])){
		$s = $_POST['gender'];
	}
	
	
	// Check for a password and match against the confirmed password:
	if (preg_match ('/^\w{4,20}$/', $trimmed['password1']) ) {
		if ($trimmed['password1'] == $trimmed['password2']) {
			$p = mysqli_real_escape_string ($dbc, $trimmed['password1']);
		} else {
			echo '<p class="error">Your password did not match the confirmed password!</p>';
		}
	} else {
		echo '<p class="error">Please enter a valid password! It should only contain  letters, numbers, underscore and length between 4-20.</p>';
	}
	
	if ($fn && $ln && $e && $p && $b && $s && $ph) { // If everything's OK...

		// Make sure the email address is available:
		$q = "SELECT id FROM users WHERE email='$e'";
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
		if (mysqli_num_rows($r) == 0) { // Available.

			// Create the activation code:
			$a = md5(uniqid(rand(), true));

			// Add the user to the database:
			$q = "INSERT INTO users (email, phone, pass, first_name, last_name, active, reg_date, DoB, sex) VALUES ('$e', '$ph', SHA1('$p'), '$fn', '$ln', '$a', NOW(), '$b', '$s')";
			
			$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

			if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
				$qr = "INSERT INTO other (score) VALUES ('0')";
				mysqli_query($dbc, $qr);
				// Send the email:
				$body = "Thank you for registering at ChES. To activate your account, please click on this link:\n\n";
				$body .= BASE_URL . 'activate.php?x=' . urlencode($e) . "&y=$a";
				mail($trimmed['email'], 'Registration Confirmation', $body, 'From: ajayrajpurohit1@hotmail.com');
				if(mail($trimmed['email'], 'Registration Confirmation', $body)==TRUE){
                   
				echo '<h3>Thank you for registering! A confirmation email has been sent to your address. Please click on the link in that email in order to activate your account. If you don\'t see mail check in your SPAM box.</h3>';
				include ('includes/footer.html'); // Include the HTML footer.
				exit(); // Stop the page.
				
			} else { // If it did not run OK.
				echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
			}
			
		} else { // The email address is not available.
			echo '<p class="error">That email address has already been registered. If you have forgotten your password, <a href="http://indona.esy.es/forgot_password.php">Click here.</a></p>';
		}
		
		}else { // If one of the data tests failed.
		echo '<p class="error">Please try again.</p>';
	}

	mysqli_close($dbc);
	}
}// End of the main Submit conditional.
?>
<div class="container">	
<h1>Register</h1>
<div class="row"><div class="col-md-6">
<form class="form-horizontal" id="signupform" action="register.php" method='post'>
			<div class="form-group">
				<div class="col-sm-6">
					<label for="fname" class="control-label">First Name</label>
					<input class="form-control input-sm" name="first_name" id="fname" placeholder="First Name" value="<?php if (isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>" required>
				</div>
				<div class="col-sm-6">
					<label for="lname" class="control-label">Last Name</label>
					<input class="form-control input-sm" name="last_name" id="lname" placeholder="Last Name" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" required>
				</div>
			</div>
			<div class="form-group">
			<div class="col-sm-6">
				<label class="control-label" for="dob">Date of Birth </label>
				<input type="date" name="dob" id="dob" class="form-control input-sm" editable='false' required />
			</div>
			<div class="col-sm-6">
				<label for="gender" class="control-label">Gender</label>
				<div class="radio">
					<label><input type="radio" name="gender" id="gender" value="M" checked="checked" /> Male </label>
					<label><input type="radio" name="gender" id="gender" value="F"/> Female</label>
				</div>
			</div>
			</div>
			
			<div class="form-group">
			<div class="col-sm-12">
				<label for="email" class="control-label">Email ID</label>
				<input type="email" name="email" id="email" value="<?php if (isset($trimmed['email'])) echo $trimmed['email']; ?>" class="form-control input-sm" placeholder="Email" required>
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-12">
				<label for="phone" class="control-label">Email ID</label>
				<input type="number" name="phone" id="phone" value="<?php if (isset($trimmed['phone'])) echo $trimmed['phone']; ?>" class="form-control input-sm" placeholder="Phone" required>
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-12">
				<label for="pass" class="control-label">Password</label>
				<input type="password" name="password1" id="password1" class="form-control input-sm" placeholder="Password" value="<?php if (isset($trimmed['password1'])) echo $trimmed['password1']; ?>" required>
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-12">	
				<label for="passconf" class="control-label">Password Confirm</label>
				<input type="password" name="password2" id="password2" class="form-control input-sm" placeholder="Password Confirm" value="<?php if (isset($trimmed['password2'])) echo $trimmed['password2']; ?>" required>
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-12">
				<div class="checkbox">
					<label for="agree"><input type="checkbox" name="agree" id="agree" required> Do you agree with our <a href="#">Terms and Condition</a> and <a href="#">Privacy Policy.</a></label>
				</div>
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-12">	
				<button class="btn btn-success btn-sm" type="submit">Submit</button>
			</div>
			</div>
	</form></div></div></div>
<?php include ('includes/footer.html');?>