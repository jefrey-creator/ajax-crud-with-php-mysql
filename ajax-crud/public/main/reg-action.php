<?php 
	
	include '../../server/ini.php';

	$register = new Register();

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$rep_password = trim($_POST['rep_password']);

	$hash = password_hash($password, PASSWORD_DEFAULT);
	$user = ["username" => $username];

	$isExist = $register->userExist($user);

	$data = [
		"username" => $username,
		"password" => $hash
	];

	if (empty($username)) {
		echo "username_error";
	}elseif(empty($password) OR empty($rep_password)){
		echo "pass_err";
	}elseif(strlen($password) < 8 OR strlen($rep_password) < 8){
		echo "short";
	}elseif($password != $rep_password){
		echo "not matched";
	}elseif($isExist >= 1){
		echo "exist";
	}else{

		if ($register->userReg($data) === TRUE) {
			echo "success";
		}
	}
