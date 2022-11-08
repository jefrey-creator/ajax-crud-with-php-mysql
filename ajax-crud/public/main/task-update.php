<?php 

	include '../../server/ini.php';

	$task = new Task();

	$task_id = trim($_POST['task_id']);
	$task_update = trim($_POST['task_update']);
	$task_date_update = trim($_POST['task_date_update']);
	$data = [
		"id" => $task_id,
		"task" => $task_update,
		"todo_date" => $task_date_update
	];

	$tasker = $task->updateTask($data);
	
	if ($tasker === TRUE) {
		echo "Success";
	}
	