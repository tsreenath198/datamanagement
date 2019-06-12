<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
$data = GlobalCrud::getData ( 'traineeSelect' );
date_default_timezone_set("Asia/Kolkata");
// file name for download
$filename = "trainee_" . date ( 'Ymd' ) . ".xls";

header ( "Content-Disposition: attachment; filename=\"$filename\"" );
header ( "Content-Type: application/vnd.ms-excel" );
echo 'Name' . "\t";
echo 'Email' . "\t";
echo 'phone' . "\t";
echo 'Alternate Phone' . "\t";
echo 'Technology Name' . "\t";
echo 'Batch ' . "\t";
echo 'client Name' . "\t";
echo 'Skype ' . "\t";
echo 'Timezone' . "\t";
echo 'Description' . "\n";

foreach ( $data as $row ) {
	

	   	echo  $row['name'] . "\t";
	   	echo  $row['email'] . "\t";
	  	echo  $row['phone'] ."\t";
	  	echo  $row['alternate_phone'] . "\t";
		echo  $row['technology_name'] . "\t";
	    echo  $row['batch_id'] . "\t";
	    echo  $row['client_name'] . "\t";
		echo  $row['skype_id'] . "\t";
	    echo  $row['timezone'] . "\t";
		echo  $row['description'] . "\t";
}
exit ();
?>