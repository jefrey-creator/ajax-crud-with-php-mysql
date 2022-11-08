<?php 

	class Login {

		private $con;

		public function __construct(){

			$db = new Database();

			$this->con = $db->getDb();

		}

		public function userLogin($data, $password){

			try {
				
				$sql = "SELECT * FROM users WHERE username=:username";
				$res = $this->con->prepare($sql);
				$res->execute($data);

				$isExist = $res->rowCount();

				if ($isExist >= '1') {
					
					$row = $res->fetch(PDO::FETCH_OBJ);

					if (password_verify($password, $row->password)) {

						$_SESSION['username'] = $row->username;
						$_SESSION['userid'] = $row->userid;

						return true;

					}else{
						return false;
					}

				}else{
					return false;
				}

			} catch (PDOException $e) {
				echo $e->getMessage();
			}

		}

	}