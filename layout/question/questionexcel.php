<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
$data = GlobalCrud::getData ( 'questionSelect' );

// file name for download
$filename = "question_" . date ( 'Ymd' ) . ".xls";

header ( "Content-Disposition: attachment; filename=\"$filename\"" );
header ( "Content-Type: application/vnd.ms-excel" );

echo 'Interview Name' . "\t";
echo 'Question' . "\t";
echo 'Answers' . "\t";
echo 'Description' . "\n";

foreach ( $data as $row ) {
	echo  $row['interview_name'] . "\t";
	echo  $row['question'] . "\t";
    echo  $row['answers'] . "\t";
	echo  $row['description'] . "\n";
}
exit ();
?>