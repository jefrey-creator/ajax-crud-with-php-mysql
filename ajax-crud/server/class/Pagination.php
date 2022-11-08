<?php  

	//pagination class

	class Pagination {

		public $data;

		public function paginate($values, $per_page){

			try {
				
				$total_values = count($values);

				if (isset($_POST['page'])) {
					$current_page = $_POST['page'];
				}else{
					$current_page = 1;
				}
				
				$counts = ceil($total_values / $per_page);
				$param1 = ($current_page - 1) * $per_page;
				$this->data = array_slice($values, $param1, $per_page);

				for($x = 1; $x <= $counts; $x++){
					$numbers[] = $x;
				}

				return $numbers;

				//echo $current_page;

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

		}

		public function getResult(){
			$resultValues = $this->data;
			return $resultValues;
		}
	}
			//pagination class