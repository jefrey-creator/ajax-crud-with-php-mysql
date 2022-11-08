<?php 

	class Task{


		private $con;

		public function __construct(){

			$db = new Database();

			$this->con = $db->getDb();

		}

		public function getTask(){

			try {
				
				$sql = "SELECT * FROM todo_list ORDER BY id ASC";
				$res = $this->con->prepare($sql);
				$res->execute();

				$row = $res->fetchAll(PDO::FETCH_OBJ);

				return $row;

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

		}

		public function insertTask($data){

			try {
				
				$sql = "INSERT INTO todo_list (task, todo_date) VALUES(:task, :todo_date)";
				$res = $this->con->prepare($sql);
				$res->execute($data);

				return true;

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

		}

		public function doneTask($data){

			try {
				
				$sql = "UPDATE todo_list SET status='done' WHERE id=:id";
				$res = $this->con->prepare($sql);
				$this->con->beginTransaction();

				foreach($data as $row){
					$res->execute($row);
				}

				$this->con->commit();
				
				return true;

			} catch (PDOException $e) {

				$this->db->rollback();

				echo $e->getMessage();
			}

		}

		public function deleteTask($data){

			try {
				
				$sql = "DELETE FROM todo_list WHERE id=:id";
				$res = $this->con->prepare($sql);
				$this->con->beginTransaction();

				foreach($data as $row){
					$res->execute($row);
				}

				$this->con->commit();
				
				return true;

			} catch (PDOException $e) {

				$this->db->rollback();

				echo $e->getMessage();
			}

		}

		public function selectTask($data){
			try {
				
				$sql = "SELECT * FROM todo_list WHERE id=:id";
				$res = $this->con->prepare($sql);
				$res->execute($data);

				$row = $res->fetch(PDO::FETCH_OBJ);

				return $row;

			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function updateTask($data){

			try {
				
				$sql = "UPDATE todo_list SET task=:task, todo_date=:todo_date WHERE id=:id";
				$res = $this->con->prepare($sql);
				$res->execute($data);

				return true;

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

		}

		public function startTask($data){

			try {
				
				$sql = "UPDATE todo_list SET status=:status WHERE id=:id";
				$res = $this->con->prepare($sql);
				$this->con->beginTransaction();
				foreach($data as $row){
					$res->execute($row);
				}
				$this->con->commit();
				return true;

			} catch (PDOException $e) {

				$this->db->rollback();
				echo $e->getMessage();

			}

		}

		public function searchTask($data){

			try {
				
				$sql = "SELECT * FROM todo_list WHERE task LIKE :task OR todo_date LIKE :task OR status LIKE :task";
				$res = $this->con->prepare($sql);
				$res->execute($data);

				$row = $res->fetchAll(PDO::FETCH_OBJ);
				return $row;

			} catch (PDOException $e) {

				$this->db->rollback();
				echo $e->getMessage();
				
			}

		}
	}