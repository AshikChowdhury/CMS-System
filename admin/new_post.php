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

	$error = '';

	if (isset($_POST['submit_post'])) {
		$title = strip_tags($_POST['title']);
		$date = date('Y-m-d h:i:s');
		if ($_FILES['image']['name'] !='') {
			$image_name = $_FILES['image']['name'];
			$image_tmp = $_FILES['image']['tmp_name'];
			$image_size = $_FILES['image']['size'];
			$image_ext = pathinfo($image_name,PATHINFO_EXTENSION);
			$image_path = '../img/'.$image_name;
			$image_db_path = 'img/'.$image_name;

			if ($image_size < 10000000) {
				if ($image_ext == 'jpg' || $image_ext == 'png' || $image_ext == 'gif'){
					if (move_uploaded_file($image_tmp, $image_path)){
					 	$ins_sql = "INSERT INTO posts (title, description, image, category, date, author) 
					 	VALUES('$title', '$_POST[description]', '$image_db_path', '$_POST[category]', '$date', '$_SESSION[user]')";
					 	if (mysqli_query($conn,$ins_sql)) {
					 		header('post_list.php');
					 	}else{
					 		$error = '<div class="alert alert-danger">The Query Was not Working!</div>';
					 	}
					 }else{
						$error = '<div class="alert alert-danger">Unfortunately Image Has not Uploaded!</div>';
					 } 

				}else{
					$error = '<div class="alert alert-danger">Image Format is Not Correct!</div>';
				}
			}else{
				$error = '<div class="alert alert-danger">Image File Size Is More Than 1MB!</div>';
			}

		}else{
			$ins_sql = "INSERT INTO posts (title, description, category, date, author) 
			VALUES('$title', '$_POST[description]', '$_POST[category]', '$date', '$_SESSION[user]')";
			if (mysqli_query($conn,$ins_sql)) {
				header('post_list.php');
			}else{
				$error = '<div class="alert alert-danger">The Query Was not Working!</div>';
			}
		}
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

	<?php echo $error; include 'includes/aside.php';?>

	<div class="col-lg-10">

	<div class="page-header"><h2>New Post</h2></div>
		<div class="container-fluid">
			<form class="form-horizontal" action="new_post.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="image">Upload an Image</label>
					<input id="image" name="image" class="btn btn-primary" type="file">
				</div>
				<div class="form-group">
					<label for="title">Title</label>
					<input id="title" name="title" class="form-control" type="text" required>
				</div>
				<div class="form-group">
					<label for="category">Category</label>
					<select class="form-control" name="category" id="category" required>
						<option value="">Select Category</option>
						<?php 
						$sel_sql = "SELECT * FROM category";
						$run_sql = mysqli_query($conn,$sel_sql);
						while ($rows = mysqli_fetch_assoc($run_sql)) {
							if ($rows['category_name'] == 'home') {
								continue;
							}
							echo '<option value="'.$rows['category_name'].'">'.ucfirst($rows['category_name']).'</option>';
						}

						 ?>

					</select>
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea id="description" name="description"></textarea>
				</div>
				<div class="form-group">
					<label for="status">Status</label>
					<select class="form-control" name="status" id="status">
						<option value="draft">Draft</option>
						<option value="publish">Publish</option>
						
					</select>
				</div>
				<div class="form-group">
					<label for="description"></label>
					<input class="btn btn-danger btn-block" name="submit_post" type="submit">
				</div>
			</form>
		</div>
	</div>
	<footer></footer>
</body>
</html>