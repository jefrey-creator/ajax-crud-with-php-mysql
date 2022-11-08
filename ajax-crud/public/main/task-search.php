<?php 

	include '../../server/ini.php';

	$task = new Task();

	$txtSearch = $_GET['txtSearch'];
	$data = [
		"task" => "%".$txtSearch."%",
	];
	$tasker = $task->searchTask($data);
	$status = "";
	foreach($tasker as $list){
		
		if ($list->status == 'pending') {
			$status = " text-warning";
		}elseif($list->status == 'done'){
			$status = "text-success text-uppercase";
		}elseif($list->status == 'on-going'){
			$status = "bg-primary text-white text-uppercase";
		}

		echo '<div class="card-body '.$status.'">
				<button type="button" class="float-center btn btn-sm btn-info" id="btn_edit" data-id="'.$list->id.'">
					<i class="bi bi-vector-pen"></i>
				</button>
				<label data-target="task">
					<input type="checkbox" value="'.$list->id.'" id="selectedItem" name="selectedItem[]"> '.$list->task.'
				</label>
				<i class="badge bg-dark rounded-pill float-end" data-target="todo_date"> '.date('F j, Y', strtotime($list->todo_date)).'</i>
			</div>';
	}
	