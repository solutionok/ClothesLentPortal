<?php



	define('HOST', 'localhost');

	define('DB', 'fiverr_rattings');

	define('USERNAME', 'root');

	define('PASSWORD', '');



	try{

		$db = new PDO('mysql:host='.HOST.';dbname='.DB, USERNAME, PASSWORD);

	} catch(Exception $e){

		echo "Could not connect to database";

		exit();

	}


?>