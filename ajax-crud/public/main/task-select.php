<?php 

	include '../../server/ini.php';

	$task = new Task();

	$id = trim($_POST['id']);


	$data = ["id"=>$id];

	$lists = $task->selectTask($data);

	$task_list = array();
	$task_list[0] = $lists->id;
	$task_list[1] = $lists->task;
	$task_list[2] = $lists->todo_date;

	echo json_encode($task_list);
	

	