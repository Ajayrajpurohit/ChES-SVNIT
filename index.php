<body onload="myFunction()">
<?php 
$p_title = "Home | ChES";
include("includes/header.html");
if (isset($_SESSION['id'])){
	header ('Location:dash.php');
}
?>
<style>
	
	#para{
	
		text-align: center;
		top: 2px;
	}
	/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
}
	
/* Float four columns side by side */
.column {
  float: left;
  width: 100%;
  padding: 10 10px;
}

/* Remove extra left and right margins, due to padding in columns */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}

/* Responsive columns - one column layout (vertical) on small screens */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: inline;
    margin-bottom: 20px;
  }
}
</style>

	<div id="loader"></div>
<div class="conatiner animate-bottom" style="display:none;" id="myDiv" >
	
	<div class="row">
				<div class="col-md-1">
					
				</div>
				<div class="col-md-6">
					<div class="row">
					  <div class="column">
						 <div class="card">
							<h3>Eureka!! Launching</h3>
							<p>01/10/2018</p>
							<p>Eureka is a recent initiative inclined towards research and innovation in Chemical sector.</p>
						 </div>
					  </div>

					  <div class="column">
						 <div class="card">
							<h3>DWSIM - Workshop 2.0</h3>
							<p>06/10/2018</p>
							<p>DWSIM is an open-source simulation application. This is the second part of workshop series focused on distillation simulation. </p>
						 </div>
					  </div>

					  <div class="column">
						 <div class="card">
							<h3>ChES Website Launch</h3>
							<p>10/10/2018</p>
							<p>Website is serve as window to any product or service. We believe in touching lives on every platform of communication.</p>
						 </div>
					  </div>

<!--
					  <div class="column">
						 <div class="card">
							<h3>Card 4</h3>
							<p>Some text</p>
							<p>Some text</p>
						 </div>
					  </div>
-->
					</div>
				</div>
				<div class="col-md-4">
					<ul class="nav nav-tabs">
					<li class="active"><a href="#login" data-toggle="tab" style="color: black;">Login</a></li>
					<li><a href="#signup" data-toggle="tab" style="color: black;">Sign Up</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="login">
		<form class="form-horizontal" id="loginform" action="login.php" method="post">
			<div class="form-group">
			<div class="col-sm-12">
				<label for="uname" class="control-label">Email</label>
				<input type="text" name="email" id="email" class="form-control" placeholder="Email">
			</div>
			</div>
			<div class="form-group">
			<div class="col-sm-12">	
				<label for="pass" class="control-label">Password</label>
				<input type="password" name="pass" id="pass" class="form-control" placeholder="Password">
			</div>
			</div>
			<a href="forgot_password.php">Forgot password.</a>
			<div class="form-group">
			<div class="col-sm-12">
				<button class="btn btn-success" type="submit"> Login </button>
			</div>
			</div>
		</form>
					</div>
					<div class="tab-pane fade" id="signup">
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
		</form>
					</div></div>
				<div class="col-md-1">
					
				</div></div>
	<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
					  <div class="panel-body">
						  <h3 style="text-align: center; font-family: 'K2D', sans-serif;">Vision</h3>
						  <p style="text-align: center; font-family: 'Pacifico', cursive;">To give Chemical Engineers a unique identity in the World.</p>
							</div>
					</div><div class="panel panel-default">
					  <div class="panel-body">
						  <h3 style="text-align: center; font-family: 'K2D', sans-serif;">Mission</h3>
						  <div class="col-md-4"></div>
						  <div class="col-md-4">
						  <ol style="text-align: left; font-family: 'Pacifico', cursive;">
							  <li>Promote excellence in chemical engineering education and practice.</li>
							  <li>Advance the development and exchange of relevant knowledge and ideas.</li>
							  <li>Facilitate public understanding of technical issues.</li>
							  <li>Integrate the upliftment of society by providing awareness about different technical situations.</li>
							  <li>Anticipate, recognize, and evaluate hazardous conditions and practices affecting people, property and the environment, develop and evaluate appropriate strategies for the same.</li>
							  </ol></div>
							</div>
						</div>
					<div class="panel panel-default">
					  <div class="panel-body">
						  <div class="col-md-4"><img src="includes/ches.jpg" height="300px" width="100%"></div>
						  <div class="col-md-8"><p>ChES, Chemical Engineering Society is the student chapter of chemical engineering department of SVNIT that was instituted on 16th January 2014. The society comprises of 5 core committee members and other members are from 2nd and 3rd year. Students need to clear interview round in order to be a part of the society.
Dr. Meghal Desai is currently the faculty advisor of the student chapter. Affiliated to the American Institute of Chemical Engineering (AIChE), ChES aims of spreading knowledge and experience to the future chemical engineers about chemical engineering education and application.
</p></div>
						</div>
					</div>
						<div class="panel panel-default">
					  <div class="panel-body">
						  <div class="col-md-8"><p>The American Institute of Chemical Engineers (AIChE) is a non-profit professional organization for chemical engineers. AIChE was established in 1908 to distinguish chemical engineers as a profession independent of chemists and mechanical engineers.</p>

<p>AIChE is the world's leading organization for chemical engineering professionals, with more than 60,000 members from more than 110 countries. AIChE has the breadth of resources and expertise you need whether you are in core process industries or emerging areas, such as translational medicine.</p>

<p>As a member, you can access information on recognized and promising chemical engineering processes and methods , connect with a global network of intelligent, resourceful colleagues and their shared wisdom and find learning opportunities from recognized authorities.
</p></div>
						  <div class="col-md-4"><img src="includes/AIChE_logo.gif" width="100%"></div>
							</div>
					</div>
					</div>
				</div>
	</div>
<script type="text/javascript">
	var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 1000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
	</script>
<?php include("includes/footer.html");
	?></div></body>