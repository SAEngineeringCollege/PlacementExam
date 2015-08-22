<?php
session_start();
?>
<!---
Site : http:www.smarttutorials.net
Author :muni
--->

<?php
//require 'config.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>S.A Engineering College Placement Test</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="assets/css/style.css" rel="stylesheet" media="screen">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="assets/js1/html5shiv.js"></script>
		<script src="assets/js1/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
	<div class="header">
			<h3>S.A Engineering College</h3>
			<h1 >Online Placement Exam</h1>
			<h4 id="date">Test Date : </h4>

</div>
		<div class="container">
			<div class="row">

				<div class="col-md-4 col-md-offset-4">

					<div class="intro">

						    <form class="form-signin" method="post" id='signin' name="signin" action="questions.php">

								<div class="form-group">
									<label>Name</label>
									<input type="text" id='name' name='name' class="form-control" placeholder="Eg. Varun Raj" required/>
									<span class="help-block"></span>
								</div>
								<div class="form-group">

								<label>Register Number</label>
								<input type="text" id='register_number' name='register_number' class="form-control" placeholder="Eg. 111912104166" minlength="12" maxlength="12" required />
								<span class="help-block"></span>
								</div>
								<div class="form-group">

								<label>Department</label>
								<select name="department" class="form-control" >
								<option value="CSE">Computer Science and Engineering</option>
								<option value="IT">Information Technology</option>
								<option value="ECE">Electronics and Communication Engineering</option>
								<option value="EEE">Electrical and Electronics Engineering</option>
								<option value="CIVIL">Civil Engineering</option>
								<option value="MECH">Mechanical Engineering</option>
							</select>
							</div>

								<div class="form-group">

								<label>Year of study</label>
								<select name="year" class="form-control" >
									<option value="2">2nd Year</option>
									<option value="3">3rd Year</option>
								<option value="4">4th Year</option>

							</select>
							</div>
							<div class="form-group">

							<label>Test</label>
							<select name="test_number" class="form-control" >
								<option value="1">Monthly I</option>
								<option value="2">Monthly II</option>
							<option value="3">Monthly III</option>

						</select>
						</div>
								<div class="form-group">
							<button class="btn btn-success btn-block" type="submit">Enter</button>
						</div>
						</form>

					</div>
				</div>
			</div>
		</div>

		  <script src="assets/js/jquery-1.10.2.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		<script>
		var today = new Date();
		$('#date').append( today.toDateString() );
		</script>
	</body>
</html>
