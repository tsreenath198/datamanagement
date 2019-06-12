<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
$data = GlobalCrud::getData ( 'batchSelect' );
date_default_timezone_set("Asia/Kolkata");
$dateValue1 = date('Y-M-d');
// file name for download
$filename = "batch_" . $dateValue1 . ".xls";

header ( "Content-Disposition: attachment; filename=\"$filename\"" );
header ( "Content-Type: application/vnd.ms-excel" );

echo 'Technology Name' . "\t";
echo 'Trainer Name' . "\t";
echo 'Start Date' . "\t";
echo 'End Date' . "\t";
echo 'Time' . "\t";
echo 'Duration' . "\t";
echo 'Status' . "\t";
echo 'Description' . "\n";

foreach ( $data as $row ) {
	echo $row ['technology_name'] . "\t";
	echo $row ['trainer_name'] . "\t";
	echo $row ['start_date'] . "\t";
	echo $row ['end_date'] . "\t";
	echo $row ['time'] . "\t";
	echo $row ['duration'] . "\t";
	echo $row ['status'] . "\t";
	echo $row ['description'] . "\n";
}
exit ();
?>