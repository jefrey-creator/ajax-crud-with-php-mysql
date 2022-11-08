<?php 

	include '../../server/ini.php';

	$task = new Task();


	// extract($_POST);

	// if (!isset($_POST['task'])) {
	// 	echo "Task is required";
	// }elseif(!isset($_POST['task_date'])){
	// 	echo "Date is required";
	// }else{

		

	// }

	$task_input = $_POST['task'];
	$task_date = $_POST['task_date'];

	$data = [
		"task" => $task_input, "todo_date" => $task_date
	];

	if ($task->insertTask($data) === TRUE) {
		echo "Success";
	}