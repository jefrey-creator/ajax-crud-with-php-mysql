<?php 

	class Register {

		private $con;

		public function __construct(){

			$db = new Database();

			$this->con = $db->getDb();

		}

		public function userReg($data){

			try {
				
				$sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
				$res = $this->con->prepare($sql);
				$res->execute($data);
				return true;

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

		}

		public function userExist($data){

			try {
				
				$sql = "SELECT * FROM users WHERE username=:username";
				$res = $this->con->prepare($sql);
				$res->execute($data);

				$count = $res->rowCount();

				return $count;

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

		}

	}