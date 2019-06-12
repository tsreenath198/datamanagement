<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
$data = GlobalCrud::getData ( 'interviewSelect' );

// file name for download
$filename = "interview_" . date ( 'Ymd' ) . ".xls";

header ( "Content-Disposition: attachment; filename=\"$filename\"" );
header ( "Content-Type: application/vnd.ms-excel" );

echo 'Employee Name' . "\t";
echo 'Trainee Name' . "\t";
echo 'Client Name' . "\t";
echo 'Interviewer' . "\t";
echo 'Date' . "\t";
echo 'Time' . "\t";
echo 'Status' . "\t";
echo 'Description' . "\n";

foreach ( $data as $row ) {
	echo  $row['employee_name'] . "\t";
	echo  $row['trainee_name'] . "\t";
	echo  $row['client_name'] . "\t";
	echo  $row['interviewer'] . "\t";
	echo  $row['date'] . "\t";
	echo  $row['time'] . "\t";
	echo  $row['status'] . "\t";
	echo  $row['description'] . "\n";
}
exit ();
?>