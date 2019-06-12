<?php
error_reporting(0);
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
		// remove all session variables
session_unset(); 

// destroy the session 
session_destroy();
		
header ( "Location:./login.php" );

?>
