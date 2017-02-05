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

		<!-- Latest Comments -->

		<div class="panel panel-primary">
			<div class="panel-heading"><h3>Latest Posts</h3></div>
			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Date</th>
							<th>Author</th>
							<th>Email</th>
							<th>Post</th>
							<th>Comments</th>
							<th>Status</th>
							<th>Delete</th>		
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>2015-01-01</td>
							<td>Nokib</td>
							<td>nokib@gmail.com</td>
							<td>2</td>
							<td>i like the post</td>
							<td>Approved</td>
							<td><a href="#" class="btn btn-danger btn-xs navbar-btn">Delete</a></td>
						</tr>
						<tr>
							<td>2</td>
							<td>2015-01-01</td>
							<td>Nokib</td>
							<td>nokib@gmail.com</td>
							<td>2</td>
							<td>i like the post</td>
							<td>Approved</td>
							<td><a href="#" class="btn btn-danger btn-xs navbar-btn">Delete</a></td>
						</tr>
						<tr>
							<td>3</td>
							<td>2015-01-01</td>
							<td>Nokib</td>
							<td>nokib@gmail.com</td>
							<td>2</td>
							<td>i like the post</td>
							<td><a href="#" class="btn btn-success btn-xs navbar-btn">Approve</a></td>
							<td><a href="#" class="btn btn-danger btn-xs navbar-btn">Delete</a></td>
						</tr>
						<tr>
							<td>4</td>
							<td>2015-01-01</td>
							<td>Nokib</td>
							<td>nokib@gmail.com</td>
							<td>2</td>
							<td>i like the post</td>
							<td>Approved</td>
							<td><a href="#" class="btn btn-danger btn-xs navbar-btn">Delete</a></td>
						</tr>
						<tr>
							<td>5</td>
							<td>2015-01-01</td>
							<td>Nokib</td>
							<td>nokib@gmail.com</td>
							<td>2</td>
							<td>i like the post</td>
							<td><a href="#" class="btn btn-success btn-xs navbar-btn">Approve</a></td>
							<td><a href="#" class="btn btn-danger btn-xs navbar-btn">Delete</a></td>
						</tr>
					</tbody>
				</table>
			</div>	
		</div>

	</div>

	<footer></footer>
</body>
</html>