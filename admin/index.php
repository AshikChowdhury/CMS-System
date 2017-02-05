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

	<?php echo $_SESSION['user']; include 'includes/aside.php';?>

	<div class="col-lg-10">
	<div style="width:50px; height:50px;"></div>

		<div class="col-md-3">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3"><i class="glyphicon glyphicon-signal" style="font-size:4.5em"></i></div>
						<div class="col-xs-9 text-right">
							<div style="font-size:2.5em">20</div>
							<div>Posts</div>	
						</div>
					</div>
				</div>
				<a href="">
					<div class="panel-footer">
						<div class="pull-left">View Posts</div>
						<div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3"><i class="glyphicon glyphicon-tasks" style="font-size:4.5em"></i></div>
						<div class="col-xs-9 text-right">
							<div style="font-size:2.5em">5</div>
							<div>Categories</div>	
						</div>
					</div>
				</div>
				<a href="">
					<div class="panel-footer">
						<div class="pull-left">View Categories</div>
						<div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3"><i class="glyphicon glyphicon-user" style="font-size:4.5em"></i></div>
						<div class="col-xs-9 text-right">
							<div style="font-size:2.5em">2</div>
							<div>Users</div>	
						</div>
					</div>
				</div>
				<a href="">
					<div class="panel-footer">
						<div class="pull-left">View Users</div>
						<div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3"><i class="glyphicon glyphicon-comment" style="font-size:4.5em"></i></div>
						<div class="col-xs-9 text-right">
							<div style="font-size:2.5em">6</div>
							<div>Comments</div>	
						</div>
					</div>
				</div>
				<a href="">
					<div class="panel-footer">
						<div class="pull-left">View Comments</div>
						<div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="clearfix"></div>

		<!-- Top Block Ends -->

		<!-- User Area -->
		<div class="col-lg-8">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Users List</h4>
				</div>
				<div class="panel-body">
					<table class="table ttable-striped">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Name</th>
								<th>Rules</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>nokib</td>
								<td>Author</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Fahim</td>
								<td>Subscriber</td>
							</tr>
							<tr>
								<td>3</td>
								<td>nokib</td>
								<td>Author</td>
							</tr>
							<tr>
								<td>4</td>
								<td>Fahim</td>
								<td>Subscriber</td>
							</tr><tr>
								<td>5</td>
								<td>nokib</td>
								<td>Author</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!--Profile Area -->

		<div class="col-lg-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
				<div class="col-md-7">
					<div class="page-header"><h4>Ashik Chowdhury</h4></div>
				</div>	
				<div class="col-md-">
					<img src="../img/23.jpg" width="30%" class="img-circle">
				</div>
				<div class="panel-body">
					<table class="table table-condensed">
						<tbody>
							<tr>
								<th>Job:</th>
								<td>Web Developer</td>
							</tr>
							<tr>
								<th>Role:</th>
								<td>Admin</td>
							</tr>
							<tr>
								<th>Email:</th>
								<td>Ashikbracu@gmail.com</td>
							</tr>
							<tr>
								<th>Contact:</th>
								<td>01521218513</td>
							</tr>
							<tr>
								<th>Country:</th>
								<td>Bangladesh</td>
							</tr>
						</tbody>
					</table>
				</div>
				</div>
				
			</div>
		</div>
		<div class="clearfix"></div>

		<!-- Post List Starts -->
		<div class="panel panel-primary">
			<div class="panel-heading"><h3>Latest Posts</h3></div>
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
						</tr>
						<tr>
							<td>2</td>
							<td>2016-10-16</td>
							<td><img src="../img/std.jpg" width="50px"></td>
							<td>the second post</td>
							<td>Lorem ipsum dolor sit amet, consectetur adipiscing...</td>
							<td>Nature</td>
							<td>Ashik Chowdhury</td>
						</tr>
						<tr>
							<td>3</td>
							<td>2015-01-01</td>
							<td><img src="../img/bike.jpg" width="50px"></td>
							<td>the first post</td>
							<td>Lorem ipsum dolor sit amet, consectetur adipiscing...</td>
							<td>Bike</td>
							<td>Ashik Chowdhury</td>
						</tr>
						<tr>
							<td>4</td>
							<td>2015-01-01</td>
							<td><img src="../img/bike.jpg" width="50px"></td>
							<td>the first post</td>
							<td>Lorem ipsum dolor sit amet, consectetur adipiscing...</td>
							<td>Bike</td>
							<td>Ashik Chowdhury</td>
						</tr>
						<tr>
							<td>5</td>
							<td>2015-01-01</td>
							<td><img src="../img/bike.jpg" width="50px"></td>
							<td>the first post</td>
							<td>Lorem ipsum dolor sit amet, consectetur adipiscing...</td>
							<td>Bike</td>
							<td>Ashik Chowdhury</td>
						</tr>
					</tbody>
				</table>
			</div>	
		</div>

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
						</tr>
						<tr>
							<td>2</td>
							<td>2015-01-01</td>
							<td>Nokib</td>
							<td>nokib@gmail.com</td>
							<td>2</td>
							<td>i like the post</td>
						</tr>
						<tr>
							<td>3</td>
							<td>2015-01-01</td>
							<td>Nokib</td>
							<td>nokib@gmail.com</td>
							<td>2</td>
							<td>i like the post</td>
						</tr>
						<tr>
							<td>4</td>
							<td>2015-01-01</td>
							<td>Nokib</td>
							<td>nokib@gmail.com</td>
							<td>2</td>
							<td>i like the post</td>
						</tr>
						<tr>
							<td>5</td>
							<td>2015-01-01</td>
							<td>Nokib</td>
							<td>nokib@gmail.com</td>
							<td>2</td>
							<td>i like the post</td>
						</tr>
					</tbody>
				</table>
			</div>	
		</div>

	</div>

	<footer></footer>
</body>
</html>