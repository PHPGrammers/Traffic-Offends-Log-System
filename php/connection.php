<?php
/**
 * 
 */
class DBConnection
{

	
	// function __construct()
	// {
	// 	$db = $this-> ConnectDB();
	// 	return $db;
	// }

	public function ConnectDB(){
	//database connection
	try{
	$database = new PDO('mysql:host=localhost; port=3306; dbname=traffic', 'root', '');
	$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
	}

	catch (Exception $e){
	echo "database connection failed";
	echo $e;
	}
	return $database;
	}

}