<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
$data = GlobalCrud::getData ( 'todoSelect' );

// file name for download
$filename = "todo_" . date ( 'Ymd' ) . ".xls";

header ( "Content-Disposition: attachment; filename=\"$filename\"" );
header ( "Content-Type: application/vnd.ms-excel" );
echo 'Category' . "\t";
echo 'Status' . "\t";
echo 'Employee Name' . "\t";
echo 'Description' . "\n";

foreach ( $data as $row ) {
	

	    echo  $row['category'] . "\t";
		echo  $row['status'] . "\t";
		echo  $row['employee_name'] . "\t";
		echo  $row['description'] . "\n";
}
exit ();
?>