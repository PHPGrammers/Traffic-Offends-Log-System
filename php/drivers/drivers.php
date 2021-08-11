<?php
include './connection.php';

class Drivers extends DBConnection
{
	
	//declase variable	
	private $db;
	$db = $this->ConnectDB();

	//single driver
	public function DriverDetails($data)
	{
	// sQL statement
	$sql = 'SELECT * FROM drivers WHERE id= :id OR lincense_no = :id';
	if (!$prpStmt = $this->db->prepare($sql)) {
	echo json_decode(['response_id'=>2]);
} else {

	$prpStmt->bindParam(':id', $data);
	$prpStmt->bindParam(':id', $data);
	if ($prpStmt->execute()) {
		$row = $prpStmt->fetchAll();
		echo json_encode(['response_id'=>1, 'data'=>$row 'response_msg'=>'Query executed successfull']);
	
}
	
}

	} // end of DriverDetails function

} //end of class