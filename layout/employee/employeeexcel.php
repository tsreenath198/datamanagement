<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
$data = GlobalCrud::getData ( 'employeeSelect' );

// file name for download
$filename = "employee_" . date ( 'Ymd' ) . ".xls";

header ( "Content-Disposition: attachment; filename=\"$filename\"" );
header ( "Content-Type: application/vnd.ms-excel" );

echo 'Name' . "\t";
echo 'Phone' . "\t";
echo 'Email' . "\t";
echo 'Role' . "\t";
echo 'Base Salary' . "\t";
echo 'Description' . "\n";

foreach ( $data as $row ) {
	
	echo $row ['name'] . "\t";
	echo $row ['phone'] . "\t";
	echo $row ['email'] . "\t";
	echo $row ['role'] . "\t";
	echo $row ['base_salary'] . "\t";
	echo $row ['description'] . "\n";
}
exit ();
?>