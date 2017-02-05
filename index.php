<?php 
	session_start(); 
	include 'includes/db.php';
	$login_err = ''; 
	if (isset($_GET['login_error'])) {
		if ($_GET['login_error'] == 'empty') {
			$login_err = '<div class="alert alert-danger">Username Or Password is Empty!</div>';
		}elseif ($_GET['login_error'] == 'wrong') {
			$login_err = '<div class="alert alert-danger">Username Or Password is Wrong!</div>';
		}elseif ($_GET['login_error'] == 'query_error') {
			$login_err = '<div class="alert alert-danger">There is some kind of database issue!</div>';
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CMS Website</title>
		<script src="../js/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	</head>
	<body>
		<?php include 'includes/header.php' ?>
		<div class="container">
			<?php echo $login_err; ?>
			<article class="row">
				<section class="col-lg-8">
					<?php
						$sel_sql = "SELECT *FROM posts";
						$run_sql = mysqli_query($conn,$sel_sql);
						while ($rows = mysqli_fetch_assoc($run_sql)) {
							echo '<div class="panel panel-success">
									<div class="panel-heading">
										<h3><a href="post.php?post_id='.$rows['id'].'">'.$rows['title'].'</a></h3>
									</div>
									<div class="panel-body">
										<div class="col-lg-4">
											<img src="'.$rows['image'].'" width="100%">
										</div>
										<div class="col-lg-8">
												<p>'.substr($rows['description'],0,300).'......</p>
										</div>
										<a href="post.php?post_id='.$rows['id'].'" class="btn btn-primary">Read More</a>		
									</div>
								</div>';
						}

					?>
					
				</section>
				<?php include 'includes/aside.php' ?>
			</article>
		</div>
		<div style="width:50px; height:100px;"></div>
		<?php include 'includes/footer.php' ?>
	</body>
</html>