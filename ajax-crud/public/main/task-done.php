<?php 

	include '../../server/ini.php';

	$task = new Task();

	$id = $_POST['selectedItem'];
	$tasker = "";
	for ($i=0; $i < count($id); $i++) { 
		$data = [
			[
				"id" => $id[$i]
			]
		];
		$tasker = $task->doneTask($data);
	}
	
	if ($tasker === TRUE) {
		echo "Success";
	}
	