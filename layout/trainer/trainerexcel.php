<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
$data = GlobalCrud::getData ( 'trainerSelect' );

// file name for download
$filename = "trainer_" . date ( 'Ymd' ) . ".xls";

header ( "Content-Disposition: attachment; filename=\"$filename\"" );
header ( "Content-Type: application/vnd.ms-excel" );

echo 'Name' . "\t";
echo 'Technology Name' . "\t";
echo 'Phone' . "\t";
echo 'Email' . "\t";
echo 'Description' . "\n";


foreach ( $data as $row ) {
		
	    echo  $row['name'] . "\t";
	    echo  $row['technology_name'] . "\t";
	  	echo  $row['phone'] ."\t";
	  	echo  $row['email'] . "\t";
	    echo  $row['description'] . "\t";
}
exit ();
?>