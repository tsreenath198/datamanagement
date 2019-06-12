<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
$data = GlobalCrud::getData ( 'courseSelect' );

// file name for download
$filename = "course_" . date ( 'Ymd' ) . ".xls";

header ( "Content-Disposition: attachment; filename=\"$filename\"" );
header ( "Content-Type: application/vnd.ms-excel" );
echo ' Technology Name' . "\t";
echo 'Name' . "\t";
echo 'Estimated Hours' . "\t";
echo 'Description' . "\n";

foreach ( $data as $row ) {
	
	echo $row ['technology_name'] . "\t";
	echo $row ['name'] . "\t";
	echo $row ['est_hrs'] . "\t";
	echo $row ['description'] . "\n";
}
exit ();
?>