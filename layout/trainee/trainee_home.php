<!DOCTYPE html>
<html lang="en">
<head>


</head>
<body>
	<div class="container-fluid">

		<div class="row">
			<p>
				<b class="labelData">Trainee</b> <a href="?content=38"
					class="btn btn-default"><i class="fa fa-plus-square"></i> Add</a> <a
					href="./Excels/traineeexcel.php" class="btn btn-default btn-lg "
					role="button"><i class="fa fa-file-excel-o"></i> export</a>
			</p>

			Search:<input id="filter" type="text" /> <?php if($role == 'PowerUser') {?>Include <input
				type="checkbox" name="include" id="checkboxID"
				onchange="changeTheClass()" /> <?php }?><label id="DeletedRecord"
				style="display: none"> Record Deleted Successfully </label>
			<table data-filter="#filter" class="footable" id="myTable">
				<thead>
					<tr>
						<!-- <th>Employee Name</th> -->
						<th>Name</th>
						<th>Phone</th>
						<th>Email</th>

						<th>Technology</th>
						<th>Batch</th>
						<th>Fee Status</th>
						<th>Client</th>
						<th>Skype Id</th>
						<th>Tz</th>
						<!-- <th>Description</th> -->
						<th data-sort-ignore="true">Action</th>

					</tr>
				</thead>
				<tbody>
		              <?php
																header ( "Cache-Control:no-cache" );
																$path = $_SERVER ['DOCUMENT_ROOT'];
																$path .= "/layout/connection/GlobalCrud.php";
																include_once ($path);
																$delete = "traineeDelete";
																
																$data = null;
																if (isset ( $_GET ['BatchId'] )) {
																	$data = GlobalCrud::getAllRecordsBasedOnId ( 'traineeSelectByBatchId', array (
																			$_GET ['BatchId'] 
																	) );
																} else {
																	
																	$data = GlobalCrud::getData ( 'traineeSelect' );
																}
																
																$count = 0;
																foreach ( $data as $row ) {
																	
																	$emailTd = '<td></td>';
																	if (! empty ( $row ['email'] )) {
																		$emailTd = '<td> <i class="fa fa-envelope"></i> <a href="mailto:tsreenath1985@gmail.com">' . $row ['email'] . '</a></td>';
																	}
																	$batchTd = '<td></td>';
																	if (! empty ( $row ['batch_id'] )) {
																		$batchTd = '<td> ' . $row ['batch_id'] . '</td>';
																	}
																	$phoneTd = '<td></td>';
																	if (! empty ( $row ['phone'] )) {
																		if (! empty ( $row ['alternate_phone'] )) {
																			$phoneTd = '<td> <i class="fa fa-phone"></i> ' . $row ['phone'] . '/' . $row ['alternate_phone'] . '</td>';
																		} else {
																			$phoneTd = '<td> <i class="fa fa-phone"></i> ' . $row ['phone'] . '</td>';
																		}
																	}
																	
																	if (trim ( $row ['trainee_fee_status'], "" ) == '7 - Closed') {
																		echo '<tr class="RowToClick">';
																	} else {
																		echo '<tr>';
																	}
																	/* echo '<tr>'; */
																	/* echo '<td>'. $row['employee_name'] . '</td>'; */
																	echo '<td>' . $row ['name'] . '</td>';
																	echo $phoneTd;
																	echo $emailTd;
																	
																	echo '<td>' . $row ['technology_name'] . '</td>';
																	echo $batchTd;
																	echo '<td>' . $row ['trainee_fee_status'] . '</td>';
																	echo '<td>' . $row ['client_name'] . '</td>';
																	echo '<td>' . $row ['skype_id'] . '</td>';
																	echo '<td>' . $row ['timezone'] . '</td>';
																	echo '<td nowrap="nowrap">';
																	echo '<a href="#" data-toggle="tooltip" title="' . $row ['description'] . '"><i class="fa fa-caret-square-o-up"></i></a>';
																	echo '<a href="?content=39&id=' . $row ['id'] . '"> <i class="fa fa-pencil-square"></i></a>';
																	// echo '<a href="?content=37&id='.$row['id'].'" onclick="return confirm(\'Are you sure you want to delete?\')" > <i class="fa fa-trash"></i></a>';//'?content=16&id='.$row['id'].'
																	echo '<a href="#"  onClick=delFromHome(' . $row ['id'] . ',"traineeDelete") > <i class="fa fa-trash"></i></a>'; // '?content=16&id='.$row['id'].'
																	echo '</td>';
																	echo '</tr>';
																	$count ++;
																}
																
																?>
					  
					  
					<br>
					<p id="mainCount" style="display: block;">
						Total Number Of Interviews :<span id="mainCountcheck"> <?php echo $count;?></span><span
							id="mainCountcheck2" style="display: none;"> <?php echo $countCheck;?></span>
					</p>
					<p id="mainCountDup" style="display: none;">
						Total Number Of Interviews : <span id="countDup"></span>
					</p>

				</tbody>
			</table>
			<label id="NoRowsAvailable" style="display: none"> No result matched
				for search criteria </label>
		</div>
	</div>
	<!-- /container -->
</body>
</html>