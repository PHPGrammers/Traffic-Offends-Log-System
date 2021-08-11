<?php
include 'php/connection.php';


class User extends DBConnection
{

//declase variable	
private $db;

//function to save user email and password to DB
function save($staff_id, $firstname, $lastname, $middlename, $password, $department){

//assign variable to PDO database connection
$this->db = $this->ConnectDB();

// sQL statement
$sql = 'INSERT INTO users (staff_id, firstname, lastname, middlename, password, department) VALUES (:staff_id, :firstname, :lastname, :middlename, :password, :department)';
if (!$prpStmt = $this->db->prepare($sql)) {
	echo "sql failed to prepare";
} else {

$prpStmt->bindParam(':staff_id', $staff_id);
$prpStmt->bindParam(':password', $password);
$prpStmt->bindParam(':firstname', $firstname);
$prpStmt->bindParam(':lastname', $lastname);
$prpStmt->bindParam(':middlename', $middlename);
$prpStmt->bindParam(':department', $department);
if ($prpStmt->execute()) {
	echo json_encode(['response_id'=>1, 'response_msg'=>'Query executed successfull']);
	
}
	
}

} 

//login function
function login($staff_id, $password){

//assign variable to PDO database connection
$this->db = $this->ConnectDB();

// sQL statement
$sql = 'SELECT * FROM users WHERE staff_id =:staff_id AND password = :password';
if (!$prpStmt = $this->db->prepare($sql)) {
	echo json_encode(['response_id'=>2,'response_msg'=>'sql failed to prepare']);
} else {

$prpStmt->bindParam(':staff_id', $staff_id);
$prpStmt->bindParam(':password', $password);

if ($prpStmt->execute()) {
	
	//check if user exist or not
	if ($prpStmt->rowCount() > 0) {
		echo json_encode(['response_id'=>1,'response_msg'=>'user found. you will be redirected soon.']);
		$row = $prpStmt->fetchAll();
		//start session
		session_start();
		foreach ($row as $value) {
		$_SESSION['userID'] = $value['id'];
		}
	} else {
		echo json_encode(['response_id'=>2,'response_msg'=>'user not found']);
		
	}
	
	
}
	
}

}
// GET USER BASED ON USER ID
function getUser($id){

//assign variable to PDO database connection
$this->db = $this->ConnectDB();

// sQL statement
$sql = 'SELECT * FROM users WHERE id =:id LIMIT 1';
if (!$prpStmt = $this->db->prepare($sql)) {
	echo json_encode(['response_id'=>2,'response_msg'=>'sql failed to prepare']);
} else {

$prpStmt->bindParam(':id', $id);

if ($prpStmt->execute()) {
	
	//check if user exist or not
	if ($prpStmt->rowCount() > 0) {
		
		$row = $prpStmt->fetch();
		echo json_encode(['response_id'=>1,'data'=>$row]);
	} else {
		echo json_encode(['response_id'=>2,'response_msg'=>'user not found']);
		
	}
	
	
}
	
}

} 


	} // end of  user class

// create object and save to database
	$user = new User();

if ( (isset($_POST['staffid']) || isset($_POST['password']) ) && !isset($_POST['login_btn']) ) {


//declare variables
$staff_id = $_POST['staffid'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$middlename = isset($_POST['middlename']) ? $_POST['middlename'] : '' ;
$department = $_POST['department'];

//check if password match
if ($_POST['password'] != $_POST['confirmpassword']) {
	echo "Password mismatch";
	exit;
}
//hash password into MD5 algo
$password = md5($_POST['password']);

$user->save($staff_id, $firstname, $lastname, $middlename, $password, $department);

} 



//LOGIN CODE

header('Content-Type: application/json');
header('Access-Control-Allow-Method: POST');
header('Access-Control-Allow-Headers: Access-Control');
$data = json_decode(file_get_contents("php://input")); //convert request data from JSON to PHP 

if (isset($data->staffid)) {

$staff_id = $data->staffid;
//hash password into MD5 algo
$password = md5($data->password);

$user->login($staff_id, $password);

	
}

//INVOKE GET USER FUNCTION
if (isset($data->userID)) {
session_start();
if (isset($_SESSION['userID'])) {
	$id = $_SESSION['userID'];
	$user->getUser($id);
} else{
	//do something
}

}

