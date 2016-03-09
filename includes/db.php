<?php
	$host = 'localhost';
	$dbname = 'XXXXXX_todo';
	$user = 'XXXXXX_todo';
	$pass = 'XXXXXX';


	try {
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}
?>