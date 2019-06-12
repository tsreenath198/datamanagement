<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/database.php";
include_once ($path);

$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/SqlConstants.php";
include_once ($path);

$operation = $_POST['operation'];
$sql= $_POST['sql'];
$sqlValues= $_POST['sqlValues'];

if ($operation == "delete"){
	GlobalCrud::delete($sql,$sqlValues);
}

if ($operation == "duplicate"){
	GlobalCrud::duplicate($sql);
}


if ($operation == "duplicateUser"){
	GlobalCrud::duplicateUser($sql);
}
if ($operation == "email"){
	GlobalCrud::getEmail($sql);
}
if ($operation == "supportTracking") {
	// console.log("sda");
	GlobalCrud::setData ( $sql, $sqlValues );
}

if ($operation == "tracker") {
	GlobalCrud::OpportunityTracker( $sql );
}

if ($operation == "oppurtunityTrackerInsert"){
	GlobalCrud::setData($sql,$sqlValues);
}



class GlobalCrud {
	public static function getData($value) {
		$pdo = Database::connect ();
		$sql = SqlConstants::$allSelect [$value];
		$data = $pdo->query ( $sql );
		return $data;
		Database::disconnect ();
	}
	
	
	
	public static function duplicate($sql) {
	
		$pdo = Database::connect ();
		$sql = $sql;
		$data = $pdo->query ( $sql );
		foreach ($data as $row) {
			echo $row['name'];
			echo ',';
		}
		return $data;
		Database::disconnect ();
	}
	
	
	public static function duplicateUser($sql) {
	
		$pdo = Database::connect ();
		$sql = $sql;
		$data = $pdo->query ( $sql );
		foreach ($data as $row) {
			echo $row['username'];
			echo ',';
		}
		return $data;
		Database::disconnect ();
	}
	
	public static function delete($value, $id) {
		$pdo = Database::connect ();
		$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$sql = SqlConstants::$allSelect [$value];
		$q = $pdo->prepare ( $sql );
		$q->execute ( array ($id) );
		Database::disconnect ();
	}
public static function setData($value, $sqlValues) {
		$pdo = Database::connect ();
		$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$sql = SqlConstants::$allSelect [$value];
		$q = $pdo->prepare ( $sql );
		$q->execute ( $sqlValues );
		$id = $pdo->lastInsertId();
		return $id;
		Database::disconnect ();
	}
	public static function update($value, $sqlValues) {
		$pdo = Database::connect ();
		$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$sql = SqlConstants::$allSelect [$value];
		$q = $pdo->prepare ( $sql );
		$q->execute ( $sqlValues );
		Database::disconnect ();
	}
	public static function selectById($value, $sqlValues) {
		$pdo = Database::connect ();
		$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$sql = SqlConstants::$allSelect [$value];
		$q = $pdo->prepare ( $sql );
		$q->execute ( $sqlValues );
		$data = $q->fetch ( PDO::FETCH_ASSOC );
		return $data;
		Database::disconnect ();
	}
	public static function getConstants($value) {
		$constants = SqlConstants::$totalConstants [$value];
		return $constants;
	}
	public static function getAllRecordsBasedOnId($value, $sqlValues) {
		$pdo = Database::connect ();
		$pdo->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		$sql = SqlConstants::$allSelect [$value];
		$q = $pdo->prepare ( $sql );
		$q->execute ( $sqlValues );
		$data = $q->fetchAll ( PDO::FETCH_ASSOC );
		return $data;
		Database::disconnect ();
	}
	public static function getEmail($sql) {
	
		$pdo = Database::connect ();
		$sql = $sql;
		$data = $pdo->query ( $sql );
		foreach ($data as $row) {
			echo $row ['email'];
			echo ',';
			echo $row ['name'];
			echo ',';
		}
		return $data;
		Database::disconnect ();
	}
	public static function sendEmail($toEmail,$subject,$body){
		$headers = 'From: tsreenath1985@gmail.com' . "\r\n" .
				//'Reply-To: kiran.uskcorp@gmail.com' . "\r\n" .
				'CC: prasad.uskcorp@gmail.com'.  "\r\n" .
				'X-Mailer: PHP/' . phpversion();
	
		
		if(mail($toEmail , $subject, $body, $headers))
			return true;
			else
			return false;
	}
	
	
public static function OpportunityTracker($sql) {
	
		$pdo = Database::connect ();
		$sql = $sql;
		$data = $pdo->query ( $sql );
		foreach ($data as $row) {
			echo $row['id'];
			echo ',';
			echo $row['name'];
			echo ',';
		}
		return $data;
		Database::disconnect ();
	}
	

	

}
?>