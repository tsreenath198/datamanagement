<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
$data = GlobalCrud::getData ( 'technologySelect' );
date_default_timezone_set("Asia/Kolkata");
// file name for download
$filename = "technology_" . date ( 'Ymd' ) . ".xls";

header ( "Content-Disposition: attachment; filename=\"$filename\"" );
header ( "Content-Type: application/vnd.ms-excel" );

echo 'Name' . "\t";
echo 'Description' . "\n";

foreach ( $data as $row ) {
	
	 	echo  $row['name'] ."\t";
		echo  $row['description'] . "\n";
}
exit ();
?>