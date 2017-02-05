<?php include 'includes/db.php' ?>
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
				<?php 
					$sel_sql = "SELECT *FROM posts WHERE id = '$_GET[post_id]'";
						$run_sql = mysqli_query($conn,$sel_sql);
						while ($rows = mysqli_fetch_assoc($run_sql)) {
							echo '<div class="panel panel-default">
									<div class="panel-body">
										<div class="panel-header">
											<h2>'.$rows['title'].'</h2>
										</div>
											<img src="'.$rows['image'].'" width="100%">
											<p>'.$rows['description'].'</p>
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