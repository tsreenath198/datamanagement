<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
$data = GlobalCrud::getData ( 'contactSelect' );

// file name for download
$filename = "contact_" . date ( 'Ymd' ) . ".xls";

header ( "Content-Disposition: attachment; filename=\"$filename\"" );
header ( "Content-Type: application/vnd.ms-excel" );

echo ' Client Name' . "\t";
echo 'poc' . "\t";
echo 'Email' . "\t";
echo 'phone' . "\t";
echo 'Description' . "\n";

foreach ( $data as $row ) {
	
	echo $row ['client_id'] . "\t";
	echo $row ['poc'] . "\t";
	echo $row ['email'] . "\t";
	echo $row ['phone'] . "\t";
	echo $row ['description'] . "\n";
}
exit ();
?>