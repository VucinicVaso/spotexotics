<?php
class Database {

	private $connection;

	private $host     = DB_HOST;
	private $dbname   = DB_NAME; 
	private $user     = DB_USER;
	private $password = DB_PASS;

	public function __construct()
	{
		$dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;

		try{
			$this->connection = new PDO($dsn, $this->user, $this->password);
		}catch(PDOException $e) {
			echo 'Connection error! '.$e->getMessage();
		}
	}

	public function getConnection()
	{
		return $this->connection;
	}

}

$db = new Database();
?>