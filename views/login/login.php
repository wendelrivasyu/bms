<?php
	//set already a catch
	#include_once '../connection/connection.php';
	#
	#if (isset($_SESSION['user_id'])){
	#	echo "<script>window.location.href='../ors/?page=index';</script>";
	#}
?>

<!DOCTYPE html>
<html>

	<head>
		<title><?= $this->page ?> | BMS</title>
		<link rel="icon" type="image/x-icon" href="../views/login/image/LNUTaclobanLogo.png">
		
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="../views/login/style.css">
		<link rel="stylesheet" href="../views/login/assets/css1.css">
		<script src="../views/login/assets/js1.js"></script>
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	</head>

	<body>
		<div class="infinity-container">
			<!-- Company Logo -->
			<div class="logo forget-link" style="font-size: 30px;" align="center">
				<img src="../views/login/image/LNUTaclobanLogo.png" width="150px" height="150px"><br>
				B<small>UDGET</small>M<small>ONITORING</small>S<small>YSTEM</small>
				</div>

			<!-- FORM CONTAINER BEGIN -->
			<div class="infinity-form-block">
				<div class="infinity-click-box text-center">AUTHENTICATION</div>

				<div class="infinity-fold">
			
					<?php
						if (isset($msg)){
							echo '<div class="text-center" style="color:red;">'.$msg.'</div>';
						}
					?>
					
					<div class="infinity-form">
						<form class="form-box" action="../page/authenticate.php?function=validate&subpage=login" method="post">
							<!-- Input Box -->
							<div class="form-input">
								<span><i class="fa fa-user"></i></span>
								<input type="text" name="username" placeholder="Username" tabindex="10" required autofocus>
							</div>
							<div class="form-input">
								<span><i class="fa fa-lock"></i></span>
								<input type="password" name="password" placeholder="Password" required>
							</div>
							<div class="row mb-2">
								<!--Remember Checkbox -->
								<div class="col-6 d-flex align-items-center">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="cb1">
										<label class="custom-control-label text-sm" for="cb1">Remember me
										</label>
									</div>
								</div>
								<!-- Forget Password -->
								<div class="col-6 text-right text-sm">
									<a href="forget.html" class="forget-link">Forgot password?</a>
								</div>
							</div>
							<!-- Login Button -->
							<div class="col-12 px-0 text-right">
								<button type="submit" class="btn mb-3" name="login"><span class="fa fa-sign-in"></span> LOGIN</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- FORM CONTAINER END -->
		</div>
	</body>
</html>
