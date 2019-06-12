<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
$data = GlobalCrud::getData ( 'supportSelect' );

// file name for download
$filename = "support_" . date ( 'Ymd' ) . ".xls";

header ( "Content-Disposition: attachment; filename=\"$filename\"" );
header ( "Content-Type: application/vnd.ms-excel" );

echo 'Trainee Name' . "\t";
echo 'Employee Name' . "\t";
echo 'Start Date' . "\t";
echo 'End Date' . "\t";
echo 'Allotted Time' . "\t";
echo 'End Client' . "\t";
echo 'Technology Used' . "\t";
echo 'Status' . "\t";
echo 'Description' . "\n";

foreach ( $data as $row ) {

	    echo  $row['trainee_name'] ."\t";
		echo  $row['employee_name'] . "\t";
		echo  $row['start_date'] . "\t";
	    echo  $row['end_date'] . "\t";
		echo  $row['allotted_time'] . "\t";
		echo  $row['end_client'] . "\t";
		echo  $row['technology_used'] ."\t";
		echo  $row['status'] . "\t";
		echo  $row['description'] . "\n";
}
exit ();
?>