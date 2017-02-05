<?php include 'includes/db.php';
	
	$match = ' ';

	if (isset($_POST['submit_user'])) {

		if ($_POST['password'] == $_POST['con_password']) {
			$date = date('Y-m-d h:1:s');
			$address =  mysql_real_escape_string($_POST['address']);
			$about = mysql_real_escape_string($_POST['about']);
			
			$ins_sql = "INSERT INTO users (role, user_f_name, user_l_name, user_email, user_password, user_gender, user_marital_status,
			user_phone, user_designation, user_website, user_address, user_about, user_date)
			VALUES('subscriber', '$_POST[f_name]', '$_POST[l_name]', '$_POST[email]', '$_POST[password]','$_POST[gender]', '$_POST[marital]', 
			'$_POST[phone]', '$_POST[job]', '$_POST[web]', '$address', '$about', '$date')";
		
			$run_sql = mysqli_query($conn,$ins_sql);
		}else{
			$match = '<div class="alert alert-danger">Password Doesn&apos;t match</div>';
		}

		
	// 	if ( mysqli_query($conn,$ins_sql)) {
 //    		echo "New record created successfully";
	// 	}else {
 //    		echo "Error: " . $ins_sql . "<br>" . mysqli_error($conn);
		
	// }
}

 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>CMS System</title>
		<script src="../js/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	</head>
	<body>
		<?php include 'includes/header.php' ?>
		<div class="container">
			<article class="row">
				<section class="col-lg-8">
					<div class="page-header">
						<h2>Registration Form</h2>
						<?php echo $match; ?>
					</div>
					<form class="form-horizontal" action="reg.php" method="post" role="form">
					  <div class="form-group">
					    <label for="f_name" class="col-sm-3 control-label">First Name *</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Insert Your Name" required>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="l_name" class="col-sm-3 control-label">last Name *</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Insert Your Name" required>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="email" class="col-sm-3 control-label">Email Address *</label>
					    <div class="col-sm-8">
					      <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="password" class="col-sm-3 control-label">Password *</label>
					    <div class="col-sm-8">
					      <input type="password" class="form-control" id="password" name="password" placeholder="Insert Password" required>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="con_password" class="col-sm-3 control-label">Confirm Password *</label>
					    <div class="col-sm-8">
					      <input type="password" class="form-control" id="con_password" name="con_password" placeholder="Again Insert Password" required>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="gender" class="col-sm-3 control-label">Gender *</label>
					    <div class="col-sm-3">
					      <select class="form-control" name="gender" id="gender" required>
					      	<option value="">Select Gender</option>
					      	<option value="male">Male</option>
					      	<option value="female">Female</option>
					      </select>
					    </div>

					    <label for="marital" class="col-sm-2 control-label">Marital Status </label>
					    <div class="col-sm-3">
					      <select class="form-control" name="marital" id="marital">
					      	<option value="">Select Status</option>
					      	<option value="single">Single</option>
					      	<option value="married">Married</option>
					      	<option value="divorced">Divorced</option>
					      	<option value="other">Other</option>

					      </select>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="phone" class="col-sm-3 control-label">Phone Number *</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="phone" name="phone" placeholder="Insert Phone Number" required>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="job" class="col-sm-3 control-label">Designation </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="job" name="job" placeholder="Designation" >
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="web" class="col-sm-3 control-label">Official Website </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="web" name="web" placeholder="Official Website" >
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="address" class="col-sm-3 control-label">Address </label>
					    <div class="col-sm-8">
					    	<textarea class="form-control" rows="3" id="address" name="address"></textarea>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="about" class="col-sm-3 control-label">About Me </label>
					    <div class="col-sm-8">
					    	<textarea class="form-control" rows="5" id="about" name="about"></textarea>
					    </div>
					  </div>
					  <div class="form-group">
					  	<label class="col-sm-3 control-label"></label>
					    <div class="col-sm-8">
					    	<input type="submit" class="btn btn-block btn-danger" name="submit_user" value="Register Yourself">
					    </div>
					  </div>
					</form>
					
				</section>
					<?php include 'includes/aside.php' ?>
			</article>
		</div>
		<div style="width:50px; height:100px;"></div>
		<?php include 'includes/footer.php' ?>
	</body>
</html>