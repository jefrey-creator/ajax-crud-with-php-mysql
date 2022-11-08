<?php 

	include '../../server/ini.php';

	$register = new Register();

	$username = $_POST['username'];

	$data = ["username" => $username];

	$isExist = false;

	$reg = $register->userExist($data);

	if ($reg >= '1') {
		$isExist = true;
		echo $isExist;
	}else{
		echo $isExist;
	}