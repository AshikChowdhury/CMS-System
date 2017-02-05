<?php include 'includes/db.php' ?>

<?php

	if (isset($_POST['submit_contact'])) {
		$date = date('Y-m-d h:1:s');
		$ins_sql = "INSERT INTO comments (name, email, subject, comment, date)
		VALUES('$_POST[name]', '$_POST[email]', '$_POST[subject]', '$_POST[comment]', '$date')";
		$run_sql = mysqli_query($conn,$ins_sql);
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
						<h2>Contact Us Form</h2>
					</div>
					<form class="form-horizontal" action="contact.php" method="post" role="form">
					  <div class="form-group">
					    <label for="name" class="col-sm-2 control-label">Name</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="name" name="name" placeholder="Insert Your Name" required>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="email" class="col-sm-2 control-label">Email Address</label>
					    <div class="col-sm-8">
					      <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="subject" class="col-sm-2 control-label">Subject</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="col-sm-2 control-label">Comment</label>
					    <div class="col-sm-8">
					    	<textarea class="form-control" name="comment" rows="10" style="resize:none"></textarea>
					    </div>
					  </div>
					  <div class="form-group">
					  	<label class="col-sm-2 control-label"></label>
					    <div class="col-sm-8">
					    	<input type="submit" class="btn btn-block btn-danger" name="submit_contact" value="Submit Your Form">
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