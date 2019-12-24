<?php
class Database {

	private static $_instance = null;
	private $connection;

	private $host     = DB_HOST;
	private $dbname   = DB_NAME;
	private $user     = DB_USER;
	private $password = DB_PASS;

	private function __construct()
	{
		$dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname;

		try{
			$this->connection = new PDO($dsn, $this->user, $this->password);
		}catch(PDOException $e) {
			echo 'Connection error! '.$e->getMessage();
		}
	}

	public static function getInstance()
	{
		if (self::$_instance == null){
			self::$_instance = new Database();
		}
		return self::$_instance;
	}

    private function __clone() { }

	public function getConnection()
  	{
   		return $this->connection;
  	}

}