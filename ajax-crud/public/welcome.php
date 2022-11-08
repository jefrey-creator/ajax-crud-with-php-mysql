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
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12" style="margin-top: 250px;">
				<h2 class="text-center">
					WELCOME, <?php echo $_SESSION['username']; ?>
					<hr>
					<button type="button" class="btn btn-dark" onclick="logOut()" id="outBtn">
						LOGOUT
					</button>
					<br /><br />
					<div id="success"></div>
				</h2>
				
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