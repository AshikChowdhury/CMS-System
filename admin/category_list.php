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
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.css">
</head>
<body>
	<?php include 'includes/header.php';?>
	<div style="width:50px; height:50px;"></div>
	<?php include 'includes/aside.php';?>
	<div class="col-lg-10">
	<div style="width:50px; height:50px;"></div>
		<!-- User Area -->
		<div class="col-lg-8">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Category List</h4>
				</div>
				<div class="panel-body">
					<table class="table ttable-striped">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Category Name</th>
								<th>Delete</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Bike</td>
								<td><a href="#" class="btn btn-warning btn-xs">Edit</a></td>
								<td><a href="#" class="btn btn-danger btn-xs">Delete</a></td>
							</tr>
							<tr>
								<td>2</td>
								<td>Technology</td>
								<td><a href="#" class="btn btn-warning btn-xs">Edit</a></td>
								<td><a href="#" class="btn btn-danger btn-xs">Delete</a></td>
							</tr>
							<tr>
								<td>3</td>
								<td>Nature</td>
								<td><a href="#" class="btn btn-warning btn-xs">Edit</a></td>
								<td><a href="#" class="btn btn-danger btn-xs">Delete</a></td>
							</tr>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<footer></footer>
</body>
</html>