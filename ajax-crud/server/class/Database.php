<?php 
	error_reporting(E_ALL);
	date_default_timezone_set('Asia/Manila');

	class Database {

		private $db;
		public $host;
		public $dbUser;
		public $dbPassword;
		public $dbName;

		public function __construct(){

			$this->host = DB_HOST;
			$this->dbUser = DB_USER;
			$this->dbName = DB_NAME;
			$this->dbPassword = DB_PASS;

			try {

				$ds = 

				$this->db = new PDO("mysql:host=".$this->host.";dbname=".$this->dbName, $this->dbUser, $this->dbPassword);
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
				// echo "Connected to database: ".$this->dbName;
				
			} catch (Exception $e) {
				
				die("Error" . $e->getMessage());

			}

		}

		public function getDb(){
			return $this->db;
		}
	}

	