<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
$data = GlobalCrud::getData ( 'clientSelect' );

// file name for download
$filename = "client_" . date ( 'Ymd' ) . ".xls";

header ( "Content-Disposition: attachment; filename=\"$filename\"" );
header ( "Content-Type: application/vnd.ms-excel" );

echo ' Name' . "\t";
echo 'Address' . "\t";
echo 'Description' . "\n";

foreach ( $data as $row ) {
	
	echo $row ['name'] . "\t";
	echo $row ['address'] . "\t";
	echo $row ['description'] . "\n";
}
exit ();
?>