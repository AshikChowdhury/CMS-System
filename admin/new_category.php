<?php 
	session_start();
	include 'includes/db.php';
	if (isset($_SESSION['user']) && isset($_SESSION['password']) == true){
		$sel_sql = "SELECT * FROM users WHERE user_email = '$_SESSION[user]' AND user_password = '$_SESSION[password]'";
		if ($run_sql = mysqli_query($conn, $sel_sql)) {
			while($rows = mysqli_fetch_assoc($run_sql)){
				if (mysqli_num_rows($run_sql) == 1) {
					if ($rows['role'] == 'admin') {
						
					}else{
						header('Location:../index.php');
					}
				}else{
					header('Location:../index.php');
				}
			}
			
		}
	}else{
			header('Location:../index.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<script src="../../js/jquery.js"></script>
	<script src="../../bootstrap/js/bootstrap.js"></script>
	<!-- Tinycme.com -->
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css">
</head>
<body>
	<?php include 'includes/header.php';?>
	<div style="width:50px; height:50px;"></div>
	<?php include 'includes/aside.php';?>
	<div class="col-lg-10">

	<div class="page-header"><h2>New Category</h2></div>
		<div class="container-fluid">
			<form class="form-horizontal col-lg-5" action="new_category.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="category">Category</label>
					<input id="category" name="category" class="form-control" type="text">
				</div>	
				<div class="form-group">
					<label for="description"></label>
					<input class="btn btn-danger btn-block" name="submit_category" type="submit">
				</div>
			</form>
		</div>
	</div>
	<footer></footer>
</body>
</html>