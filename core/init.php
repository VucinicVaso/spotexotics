<?php
ob_start();

/* DB Params */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'spotexotics');

/* connect to database */
require_once "database/connection.php";
$pdo = $db->getConnection();

/* Autoload classes */	
spl_autoload_register(function($className) {
	require_once 'classes/'.$className.'.php';
});

session_start();

/* init classes */
$crud     = new Crud($pdo);
$function = new Functions(); 
$user     = new Users($pdo);
$post     = new Posts($pdo);

define("BASE_URL", "http://localhost/spotexotics");
?>