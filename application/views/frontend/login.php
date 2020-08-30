<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Askbootstrap">
	<meta name="author" content="Askbootstrap">
	<title>VIDOE - Video Streaming Website HTML Template</title>
	<!-- Favicon Icon -->
	<link rel="icon" type="image/png" href="<?php echo base_url() ; ?>assets/frontend/img/favicon.png">
	<!-- Bootstrap core CSS-->
	<link href="<?php echo base_url() ; ?>assets/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url() ; ?>assets/frontend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- Custom styles for this template-->
	<link href="<?php echo base_url() ; ?>assets/frontend/css/osahan.css" rel="stylesheet">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?php echo base_url() ; ?>assets/frontend/vendor/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url() ; ?>assets/frontend/vendor/owl-carousel/owl.theme.css">
</head>
<body class="login-main-body">
<section class="login-main-wrapper">
	<div class="container-fluid pl-0 pr-0">
		<div class="row no-gutters">
			<div class="col-md-12 p-5 bg-white full-height">
				<div class="login-main-left">
					<div class="text-center mb-5 login-main-left-header pt-4">
						<img src="<?php echo base_url() ; ?>assets/frontend/img/favicon.png" class="img-fluid" alt="LOGO">
						<h5 class="mt-3 mb-3">Welcome to Video Admin</h5>
					</div>
					<form action="<?php echo base_url() ; ?>user/loginForm" method="post">
						<div class="form-group">
							<label>Username</label>
							<input name="username" type="text" class="form-control" placeholder="Username" required>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input name="password" type="password" class="form-control" placeholder="Password" required>
						</div>
						<span class="align-center">
							<?php
							$msg = $this->session->flashdata('msg');
							if (isset($msg)) {
								echo $msg;
							}
							?>
						</span>

						<div class="mt-4">
							<div class="row">
								<div class="col-12">
									<button type="submit" class="btn btn-outline-primary btn-block btn-lg">Sign In</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ; ?>assets/frontend/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ; ?>assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ; ?>assets/frontend/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Owl Carousel -->
<script src="<?php echo base_url() ; ?>assets/frontend/vendor/owl-carousel/owl.carousel.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ; ?>assets/frontend/js/custom.js"></script>
</body>
</html>
