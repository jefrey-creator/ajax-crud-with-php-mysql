<?php 

	include '../../server/ini.php';

	$task = new Task();

	$id = $_POST['selectedItem'];
	$status = "on-going";
	$tasker = "";

	for ($i=0; $i < count($id); $i++) { 
		$data = [
			[
				"id" => $id[$i],
				"status" => $status,
			]
		];
		$tasker = $task->startTask($data);
	}
	
	if ($tasker === TRUE) {
		echo "Success";
	}
	