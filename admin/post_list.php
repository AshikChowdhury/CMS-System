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

		<!-- Post List Starts -->
		<div class="panel panel-primary">
			<div class="panel-heading"><h3>Posts</h3></div>
			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>S.No</th>
							<th>Date</th>
							<th>Image</th>
							<th>Title</th>
							<th>Description</th>
							<th>Category</th>
							<th>Author</th>	
							<th>Status</th>	
							<th>Edit Post</th>
							<th>Delete Post</th>
							<th>View Post</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>2015-01-01</td>
							<td><img src="../img/bike.jpg" width="50px"></td>
							<td>the first post</td>
							<td>Lorem ipsum dolor sit amet, consectetur adipiscing...</td>
							<td>Bike</td>
							<td>Ashik Chowdhury</td>
							<td>Publish</td>
							<td><a href="#" class="btn btn-warning btn-xs navbar-btn">Edit</a></td>
							<td><a href="#" class="btn btn-danger btn-xs navbar-btn">Delete</a></td>
							<td><a href="#" class="btn btn-success btn-xs navbar-btn">View</a></td>
						</tr>
						<tr>
							<td>2</td>
							<td>2016-10-16</td>
							<td><img src="../img/std.jpg" width="50px"></td>
							<td>the second post</td>
							<td>Lorem ipsum dolor sit amet, consectetur adipiscing...</td>
							<td>Nature</td>
							<td>Ashik Chowdhury</td>
							<td>Publish</td>
							<td><a href="#" class="btn btn-warning btn-xs navbar-btn">Edit</a></td>
							<td><a href="#" class="btn btn-danger btn-xs navbar-btn">Delete</a></td>
							<td><a href="#" class="btn btn-success btn-xs navbar-btn">View</a></td>
						</tr>
						<tr>
							<td>3</td>
							<td>2015-01-01</td>
							<td><img src="../img/bike.jpg" width="50px"></td>
							<td>the first post</td>
							<td>Lorem ipsum dolor sit amet, consectetur adipiscing...</td>
							<td>Bike</td>
							<td>Ashik Chowdhury</td>
							<td>Publish</td>
							<td><a href="#" class="btn btn-warning btn-xs navbar-btn">Edit</a></td>
							<td><a href="#" class="btn btn-danger btn-xs navbar-btn">Delete</a></td>
							<td><a href="#" class="btn btn-success btn-xs navbar-btn">View</a></td>
						</tr>
						<tr>
							<td>4</td>
							<td>2015-01-01</td>
							<td><img src="../img/bike.jpg" width="50px"></td>
							<td>the first post</td>
							<td>Lorem ipsum dolor sit amet, consectetur adipiscing...</td>
							<td>Bike</td>
							<td>Ashik Chowdhury</td>
							<td>Draft</td>
							<td><a href="#" class="btn btn-warning btn-xs navbar-btn">Edit</a></td>
							<td><a href="#" class="btn btn-danger btn-xs navbar-btn">Delete</a></td>
							<td><a href="#" class="btn btn-success btn-xs navbar-btn">View</a></td>
						</tr>
						<tr>
							<td>5</td>
							<td>2015-01-01</td>
							<td><img src="../img/bike.jpg" width="50px"></td>
							<td>the first post</td>
							<td>Lorem ipsum dolor sit amet, consectetur adipiscing...</td>
							<td>Bike</td>
							<td>Ashik Chowdhury</td>
							<td>Draft</td>
							<td><a href="#" class="btn btn-warning btn-xs navbar-btn">Edit</a></td>
							<td><a href="#" class="btn btn-danger btn-xs navbar-btn">Delete</a></td>
							<td><a href="#" class="btn btn-success btn-xs navbar-btn">View</a></td>
						</tr>
					</tbody>
				</table>
			</div>	
		</div>
		<div class="text-center">
			<ul class="pagination">
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">6</a></li>
			<li><a href="#">7</a></li>
		</ul>
		</div>
	</div>

	<footer></footer>
</body>
</html>