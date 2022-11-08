<?php  
	include '../server/ini.php';

	$task = new Task();
	$pagination = new Pagination();

	$lists = $task->getTask();
	if (isset($_GET['rows'])) {
		$numbers = $pagination->paginate($lists, $_GET['rows']);
	}else{
		$numbers = $pagination->paginate($lists, 10);
	}

	$result = $pagination->getResult();
	
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
	<?php include 'nav.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1 class="text-center mt-3">TODO LIST</h1>

				<button class="btn btn-dark mt-3" data-bs-toggle="modal" data-bs-target="#AddTaskModal">Add Task <i class="bi bi-list-task"></i></button>

				<div class="float-end my-2" id="action_btn">
					<form method="POST" id="taskForm">
						<button type="button" class="btn btn-primary" id="startBtn" onclick="startTask()">Start Task <i class="bi bi-skip-start-circle"></i></button>

						<button type="button" class="btn btn-success" id="finishedBtn" onclick="finishedTask()">Finished Task <i class="bi bi-check2-circle"></i></button>

						<button type="button" class="btn btn-danger" id="deleteBtn" onclick="deleteTask()">Delete Task <i class="bi bi-trash"></i></button>
					</form>
				</div>
			</div>
			<!-- add modal -->
			<div class="modal fade" id="AddTaskModal">
			  	<div class="modal-dialog" role="document">
			  		<form id="addTaskForm" method="POST">
				  		<div class="modal-content">
					    	<div class="modal-header">
						        <h5 class="modal-title">Add Task</h5>
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true"></span>
						        </button>
					      	</div>
					      	<div class="modal-body">
						        <div class="form-group">
								  	<div class="form-floating mb-3">
								    	<input type="text" class="form-control" id="task" placeholder="Enter Task" name="task">
								    	<label for="floatingInput">Task</label>
								    	<div id="taskErr" class="text-danger"></div>
								  	</div>
								  	<div class="form-floating">
								    	<input type="date" class="form-control" id="task_date" name="task_date">
								    	<label for="floatingPassword">Date</label>
								    	<div id="dateErr" class="text-danger"></div>
								  	</div>
								</div>
					      	</div>
					      	<div class="modal-footer">
					        	<button type="button" class="btn btn-primary" onclick="addTask()" id="addBtn" name="addBtn">Save Task</button>
					        	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					      	</div>
					    </div>
					</form>
			  	</div>
			</div>

			<!-- update modal -->
			<div class="modal fade" id="updateModal">
			  	<div class="modal-dialog" role="document">
			  		<form id="editTaskForm" method="POST">
				  		<div class="modal-content">
					    	<div class="modal-header">
						        <h5 class="modal-title">Update Task</h5>
						        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true"></span>
						        </button>
					      	</div>
					      	<div class="modal-body">
						        <div class="form-group">
						        	<input type="hidden" class="form-control" id="task_id" name="task_id">
								  	<div class="form-floating mb-3">
								    	<input type="text" class="form-control" id="task_update" placeholder="Enter Task" name="task_update">
								    	<label for="floatingInput">Task</label>
								    	<div id="up_taskErr" class="text-danger"></div>
								  	</div>
								  	<div class="form-floating mb-3">
								    	<input type="date" class="form-control" id="task_date_update" name="task_date_update">
								    	<label for="floatingPassword">Date</label>
								    	<div id="up_dateErr" class="text-danger"></div>
								  	</div>
								</div>
					      	</div>
					      	<div class="modal-footer">

					        	<button type="button" class="btn btn-primary" onclick="editTask()" id="editBtn" name="editBtn">Save Changes</button>

					        	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					      	</div>
					    </div>
					</form>
			  	</div>
			</div>
		</div>
		<div class="row my-3">
			<div class="col-sm-12">
				<div class="h6">
					Legend:
					<i class="text-warning">PENDING</i> |
					<i class="text-primary">ON-GOING</i> |
					<i class="text-success">DONE</i>
				</div>
				<br>
				<div id="message">
					<div id="error"></div>
					<div id="success"></div>
				</div>
				<form method="GET" class="form-group" id="searchForm">
					<input type="text" name="txtSearch" class="form-control form-control-lg" placeholder="Search..." onkeyup="Search()" id="txtSearch">
				</form>
				<br />
				<div class="card">
					<div id="list_task">
						<div class="d-flex justify-content-center">
							<div class="spinner-border text-primary" role="status" id="loading" style="display: none; height: 100px; width: 100px; text-align: center;">
							  <span class="visually-hidden">Loading...</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

	<!-- ajax -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/task.js"></script>
	
</body>
</html>