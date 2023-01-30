<?php
/**
 * 
 * Вынести подключение к бд в функцию или class для того что бы при подключение файла в разных местах не создавать дополнительное подключение к бд
 * 
 * пример singleton в ооп
 * 
 */

$host = 'testbh-db';
$db = 'test_db';
$user = 'postgres';
$password = 'test_password'; 


try {
	$dsn = "pgsql:host=$host;port=5432;dbname=$db;";
    
	// make a database connection
	$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

	if ($pdo) {
		echo "Connected to the $db database successfully!";
	}
} catch (PDOException $e) {
	die($e->getMessage());
// } finally {
// 	if ($pdo) {
// 		$pdo = null;
// 	}
}
