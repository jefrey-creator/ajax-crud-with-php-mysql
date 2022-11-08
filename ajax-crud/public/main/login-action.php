<?php 
	session_start();
	include '../../server/ini.php';

	$login = new Login();

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	$data = ["username" => $username];

	if ($login->userLogin($data, $password) === TRUE) {
		echo "success";
	}else{
		echo "error";
	}