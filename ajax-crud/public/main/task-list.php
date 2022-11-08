<?php 

	include '../../server/ini.php';

	$task = new Task();
	$pagination = new Pagination();

	$lists = $task->getTask();
	$page = '';
	$limit = 5;
	$output = "";

	if (isset($_POST['page'])) {
		$page = $_POST['page'];	
	}else{
	 	$page = 1;
	}

	$numbers = $pagination->paginate($lists, $limit);
	$result = $pagination->getResult();

	$status = "";
	foreach($result as $list){

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
?>
		<ul class="pagination mt-5 justify-content-center">
		    <li class="page-item <?php if($_POST['page'] <= 1){ echo 'disabled'; } ?>">
		    	<a class="page-link prev_page" style="cursor:pointer;" id="<?php echo $_POST['page']-1; ?>">&laquo;</a>
		    </li>
		    <?php  
		    	$total_pages = 0;
				$current_page = 0;

				
		    	for ($i=0; $i < count($numbers); $i++) {

		    		$active = "";

		    		if (!isset($_POST['page'])) {
		    			$current_page = 1;
		    		}else{
		    			$current_page = $_POST['page'];
		    		}

		    		if ($current_page == ($i+1)) {
		    			$active = " active";
		    		}

		    		echo '<li class="page-item">';
		    			echo '<a class="page-link pager'.$active.'" style="cursor:pointer" id="'.($i+1).'">'.$numbers[$i].'</a>';
		    		echo '</li>';
		    			
		    		$total_pages = $i+1;
		    	}
		    ?>
		    <li class="page-item <?php if($current_page >= $total_pages ){ echo 'disabled'; } ?>">
		    	<a class="page-link next_page" style="cursor:pointer;" id="<?php echo $current_page+1; ?>">&raquo;</a>
		    </li>
	  	</ul>
	  	<div class="text-center">
	  		<?php echo "PAGE ". $current_page . " of " . $total_pages; ?>
	  	</div>

	  	
		

		