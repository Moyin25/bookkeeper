<?php
session_start();
include('checklogin.php');
include('assets/libary/constant.php');

$id = $_SESSION['user_id'];


if (array_key_exists('addphoto', $_POST)) {


	$profilephoto = $_FILES['profile_photo'];
	

	

		if (empty($profilephoto['name'])) {
			$count = 1;
			$report = 'Pls select an image file';
		} else {
			$profilephoto_extension = explode('.', $profilephoto['name'])[1];
			$img_array = ['jpeg', 'jpg', 'gif', 'png'];
			$check_photo_extension = in_array($profilephoto_extension, $img_array);
			$name = rand(111111,99999999).time().'.' . $profilephoto_extension;

		


			if ($check_photo_extension == true || $check_photo_extension == true) {
				move_uploaded_file($profilephoto['tmp_name'], 'assets/img/' . $name);

				// $sql = $db->query("INSERT INTO users(photo) VALUES('$profilephoto')  ") or die(mysqli_error($db));

				$sql = $db->query("UPDATE users SET photo = '$name' WHERE id ='$id'")or die(mysqli_error($db));
				$report = 'photo added sucessfully';
				$count = 0;
			} else {
				$report = 'The image or document is not valid';
				$count = 1;
			}
		}
	}




?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bookep | Dashboard</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/dashboard.css">
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>

	<style>
		.mm-c {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-around;
			flex-direction: row;
			color: white;
		}

		.m-c {
			border-radius: 10px;
			box-shadow: 0px 5px 5px 0px;
			padding: 10px 0px;
			width: 130pt;
			text-align: center;
		}


		.m-c>h5 {
			opacity: 0.8;
		}

		.m-c>span {
			font-weight: 600;

		}

		#modal_container{
			position: absolute;
			height: 100%;
			width: 100%;
			margin: 0;
			top: 0;
			left: 0;
			background: #9e9c9c;
		}
		#mb_encoding_aliase{
			position: absolute;
			height: 200px;
			width: 500px;
			background: #fff;
			border-radius: 10px;
			margin: auto;
			vertical-align: middle;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
		}
		.close{
			position: absolute;
			top: 10px;
			right: 10px;
			cursor: pointer;
		}
		

		img { 
			cursor: pointer;
		}
	



	</style>

</head>

<body>
	<?php include('nav.php'); ?>


	<?php if(isset($report)){ echo alert($report, $count); } ?>

	<div class="container-flud mt-4" style="align-content: center;">
		<div class="col-12 col md-12">
			<div class="card mb-3" style="max-width: 100%;">
				<div class="row g-0">
					<div class="col-md-4">
						<img src="assets/img/<?= user('photo'); ?>" class="img-fluid rounded-circle" alt="..." style="width: 100%; max-width: 300px">
						<h4><?= user('name'); ?></h4>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="card-body">
								<h5 class="card-title">Profile</h5>

								<hr>
							</div>

							<div class="mm-c">
								<div class="bg-secondary m-c">
									<h5>Total Books</h5>
									<span>1,500</span>
								</div>
								<div class="bg-success m-c">
									<h5>Active Books</h5>
									<span>1,000</span>
								</div>

								<div class="bg-warning m-c">
									<h5>Inactive Books</h5>
									<span>500</span>
								</div>

							</div>


							<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include('footer.php')  ?>




		<div class=" modal fade" id="uploadImg" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="" class="row" method="post" enctype="multipart/form-data">
							<div class="col-md-12 form-group ">
								<input type="file" class="form-control" name="profile_photo">
							</div>

						<input type="hidden" name="id">
							<div class="col-12  form-group">
								<button type="submit" class="btn mt-3 btn-primary" style="float: right;" name="addphoto">Save Picture</button>
							</div>
						</form>

						
					</div>
				</div>
			</div>
		</div>



	

		<script src="assets/bootstrap/js/jquery.js"></script>

		<script>
			$(function() {
				$('img').on('click', function () {
					$('#uploadImg').modal('show');
				})
			})
		</script>


</body>

</html>