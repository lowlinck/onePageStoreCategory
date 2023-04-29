<?php

	class Database
	{
		private $host = 'localhost';
		private $user = 'root';
		private $password = '';
		private $dbname = 'teststore';

		private $pdo;

		public function __construct()
		{
			try {
				$dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4";
				$options = [
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
					PDO::ATTR_EMULATE_PREPARES => false,
				];
				$this->pdo = new PDO($dsn, $this->user, $this->password, $options);
			} catch (PDOException $e) {
				die("Failed to connect to database: " . $e->getMessage());
			}
		}

		public function getPdo()
		{
			return $this->pdo;
		}
	}
