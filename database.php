<?php

$host = '0.0.0.0';
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
