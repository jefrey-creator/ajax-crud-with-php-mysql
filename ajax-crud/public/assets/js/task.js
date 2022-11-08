

function addTask(){
	
	var data = $("#addTaskForm").serialize();
	
	const task = $('#task').val();
	const task_date = $('#task_date').val();
	const Message = document.querySelector('#message')

	if (task.trim() == "") {
		$('#taskErr').text('Task is required');
	}else if(task_date == ""){
		$('#dateErr').text('Date is required');
	}else{

		$.ajax({
			url: './main/task-insert.php',
			type: 'post',
			data:{
				task: task,
				task_date: task_date,
			},
			cache: false,
			success:function(response){
				// var response = JSON.parse(response);
				if(response == 'Success'){
					$('#AddTaskModal').modal('hide');
					listTask();
					Message.innerHTML='<p class="alert alert-success mt-3" id="success">Successfully added a task!</p>';
					$('#task').val('');
					$('#task_date').val('');
					setTimeout(function(){
						document.querySelector('#success').remove();
					}, 3000);
				}
			},

			error:function(err){
				console.log(err);
			}
		});

	}

	return false;
	
}

function listTask(page){

	$.ajax({
		url: './main/task-list.php',
		type: "POST",
		data:{ page: page },
		cache: false,
		beforeSend:function(){
			$('#loading').css('display', 'inline-block');
		},
		success: function(data){
			$('#list_task').html(data);
		},
		error: function(error){
			console.error(error);
		}
	});
}

$(document).on('click', '.pager', function(){
	var page = $(this).attr("id");
	listTask(page);
	// console.log(page);
});


$(document).on('click', '.prev_page', function(){
	var page = $(this).attr("id");
	listTask(page);
	// console.log(page);
});

$(document).on('click', '.next_page', function(){
	var page = $(this).attr("id");
	listTask(page);
	// console.log(page);
});

listTask();


function finishedTask(){
	
	let selected = [];
	
	var selectedItem = document.querySelectorAll('input[type="checkbox"]:checked')
	const Message = document.querySelector('#message');

	const checked = document.querySelectorAll('input[type="checkbox"]:checked')
	selected = Array.from(selectedItem).map(x => x.value);

	if (selected == "") {

		Message.innerHTML = '<p class="alert alert-warning mt-3" id="warning">Please select an item first!</p>';
	
		setTimeout(function(){
			document.querySelector("#warning").remove();
			
		}, 3000);
		
	}else{

		$.ajax({
			url: "./main/task-done.php",
			type: "POST",
			data:{
				selectedItem: selected,
			},
			cache: false,
			beforeSend:function(){
				$('#loading').css('display', 'inline-block');
			},
			success: function(res){
				if (res == 'Success') {
					listTask();
					Message.innerHTML = '<p class="alert alert-success mt-3" id="success">Task finished!</p>';
					setTimeout(function(){
						document.querySelector("#success").remove();
					}, 2000);
					listTask();
				}
			}
		});
	}
}

function deleteTask(){
	
	let selected = [];
	
	var selectedItem = document.querySelectorAll('input[type="checkbox"]:checked')
	const Message = document.querySelector('#message')

	//console.log(Action)

	const checked = document.querySelectorAll('input[type="checkbox"]:checked')
	selected = Array.from(selectedItem).map(x => x.value);

	if (selected == "") {

		Message.innerHTML = '<p class="alert alert-warning mt-3" id="warning">Please select an item to delete!</p>';
		
		setTimeout(function(){
			document.querySelector('#warning').remove();
			
		}, 3000);
	}else{

		$.ajax({
			url: "./main/task-delete.php",
			type: "POST",
			data:{
				selectedItem: selected,
			},
			cache: false,
			beforeSend:function(){
				$('#loading').css('display', 'inline-block');
			},
			success: function(res){
				if (res == 'Success') {

					Message.innerHTML = '<p class="alert alert-danger mt-3" id="danger">Task deleted!</p>';

					setTimeout(function(){
						document.querySelector('#danger').remove();
					}, 3000);
					listTask();
				}
			}
		});
	}
}

$(document).on('click', '#btn_edit', function(){
	const id = $(this).attr('data-id');

	$.ajax({
		url: './main/task-select.php',
		method: 'POST',
		data:{ id: id},
		dataType: 'JSON',
		cache: false,
		success: function(data){
			$('#updateModal').modal('toggle');
			$('#task_id').val(data[0]);
			$('#task_update').val(data[1]);
			$('#task_date_update').val(data[2]);
		}
	});
});

function editTask(){
	
	var data = $("#editTaskForm").serialize();

	// console.log(data)
	
	const task_id = $('#task_id').val();
	const task_update = $('#task_update').val();
	const task_date_update = $('#task_date_update').val();
	const Message = document.querySelector('#message')

	if (task_id == "") {
		$('#up_taskErr').text('Error updating record.');
	}
	else if (task_update.trim() == "") {
		$('#up_taskErr').text('Task is required.');
	}else if(task_date_update == ""){
		$('#up_dateErr').text('Date is required');
	}else{

		$.ajax({
			url: './main/task-update.php',
			type: 'post',
			data:{
				task_id: task_id,
				task_update: task_update,
				task_date_update: task_date_update,
			},
			cache: false,
			success:function(response){
				// var response = JSON.parse(response);
				if(response == 'Success'){
					$('#updateModal').modal('hide');
					listTask();
					Message.innerHTML = '<p class="alert alert-success mt-3" id="success">Task successfully updated!</p>';
					$('#task_update').val('');
					$('#task_date_update').val('');
					setTimeout(function(){
						document.querySelector('#success').remove();
					}, 3000);
				}
			},
			error:function(err){
				console.log(err);
			}
		});
	}
}

function startTask(){

	//var data = $('#taskForm').serialize();

	let selected = [];
	
	var selectedItem = document.querySelectorAll('input[type="checkbox"]:checked')
	const Message = document.querySelector('#message')

	const checked = document.querySelectorAll('input[type="checkbox"]:checked')
	selected = Array.from(selectedItem).map(x => x.value);

	// console.log(selected)

	if (selected == "") {

		Message.innerHTML = '<p class="alert alert-warning mt-3" id="warning">Please select an item to start!</p>';
		setTimeout(function(){
			document.querySelector('#warning').remove();
		}, 3000);
		
	}else{

		$.ajax({
			url: "./main/task-start.php",
			type: "POST",
			data:{
				selectedItem: selected,
			},
			cache: false,
			beforeSend:function(){
				$('#startBtn').attr('disabled', 'disabled');
				$('#loading').css('display', 'inline-block');
			},
			success: function(res){
				if (res == 'Success') {
					listTask(1, 10);
					Message.innerHTML = '<p class="alert alert-success mt-3" id="success">Task started!</p>';
					$('#startBtn').removeAttr('disabled');
					setTimeout(function(){
						document.querySelector('#success').remove();
					}, 3000);
				}
			}
		});
	}
}


function Search(){

	const data = $('#searchForm').serialize();
	const txtSearch = $('#txtSearch').val();

	// console.log(txtSearch.length)

	if (txtSearch.trim() !== "" && txtSearch.length >= 3) {

		//start searching
		// console.log()
		$.ajax({
			url: './main/task-search.php?txtSearch='+txtSearch,
			method: 'get',
			cache: false,
			data: {
				txtSearch: txtSearch
			},
			beforeSend:function(){
				$('#loading').css('display', 'inline-block');
			},
			success: function(data){
				$('#list_task').html(data);
			}
		});
	}else{
		listTask();
	}

}
