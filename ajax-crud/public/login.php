<?php  
	session_start();
	include '../server/ini.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<title><?php echo APP_NAME; ?></title>
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-5 mt-3 mx-auto">
				<form method="POST" id="loginForm">
					<div class="card">
						<div class="card-header">
							<div class="d-flex justify-content-end">
								<div class="spinner-border text-primary" role="status" id="loading" style="display: none; height: 30px; width: 30px;"></div>
							</div>
							<h3 class="card-title">
								SIGN IN
							</h3>
						</div>
						<div class="card-body">
							<div class="form-floating mb-3">
						    	<input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" autocomplete="off">
						    	<label for="floatingInput">Username</label>
						  	</div>
						  	<div class="form-floating mb-3">
						    	<input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
						    	<label for="floatingInput">Password</label>
						  	</div>
						  	<button class="btn btn-secondary" type="button" id="loginBtn" onclick="Login()">
						  		LOGIN
						  	</button>
						  	<br /><br />
						  	<div id="success"></div>
						  	<div id="error"></div>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

	<!-- ajax -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/login.js"></script>
	
</body>
</html>