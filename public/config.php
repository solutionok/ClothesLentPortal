<?php



	define('HOST', '127.0.0.1');

	define('DB', 'db_rentasuit_php');

	define('USERNAME', 'root');

	define('PASSWORD', '');



	try{

		$db = new PDO('mysql:host='.HOST.';dbname='.DB, USERNAME, PASSWORD);

	} catch(Exception $e){

		echo "Could not connect to database";

		exit();

	}


?>