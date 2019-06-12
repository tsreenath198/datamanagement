<!DOCTYPE html>
<html lang="en">


<body>
	<div class="container-fluid">

		<div class="row">
			<p>
				<b class="labelData">Support</b> <a href="?content=41"
					class="btn btn-default"><i class="fa fa-plus-square"></i>&nbsp;Add</a>
				<a href="./Excels/supportexcel.php" class="btn btn-default btn-lg "
					role="button"><i class="fa fa-file-excel-o"></i> export</a>
			</p>
			Search:<input id="filter" type="text" /><input type="hidden" name="supportHidden" id="supportHidden" value="1"/><!--<?php if($role == 'PowerUser') {?> Include <input type="checkbox" name="include" id="checkboxID" onchange="changeTheClass()"/> <?php }?> <label id="DeletedRecord"
				style="display: none"> Record Deleted Successfully </label>-->
			<table data-filter="#filter" class="footable" id="myTable">
				<thead>



					<tr>
						<!--<th data-sort-ignore="true"></th>-->
						<th>Trainee Name</th>
						<!-- <th>Employee Name</th> -->
						<th>Trainer Name</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Allotted Time</th>
						<th>End Client</th>
						<th>Technology Used</th>
<th>Paid By</th>
						<th>Status</th>
						<!-- <th>Description</th>
 -->
						<th data-sort-ignore="true">Action</th>

					</tr>
				</thead>
				<tbody>
					<?php
					// header("Cache-Control: no-cache");
					$path = $_SERVER ['DOCUMENT_ROOT'];
					$path .= "/layout/connection/GlobalCrud.php";
					include_once ($path);
					$delete = "supportDelete";
					$data = GlobalCrud::getData ( 'supportSelect' );
					$data2 = GlobalCrud::getData ( 'supportGroupByTraineeId' );
					$array_value = array();
					$count = 0;
					$beforeValue = 0;
					foreach ( $data2 as $row ) {
						//array_push($array, $var)
						$array_value[$row['trainee_id']] = $row['totalCount'];
					}
					
					foreach ( $data as $row ) {
						$end_dateTd = '<td>' . $row ['end_date'] . '</td>';
						if ($row ['end_date'] == '0000-00-00') {
							$end_dateTd = '<td></td>';
						}
						
						/*if ($row ['trainee_id'] == $beforeValue) {
							echo '<tr class="RowToClick' . $row ['trainee_id'] . '" id="hide">';
							echo '<td></td>';
						} else {
							echo '<tr class="RowToClick' . $row ['trainee_id'] . 'e" id="' . $row ['trainee_id'] . 'e">';
							
							if($array_value[$row ['trainee_id']] >= 2){
								echo '<td><i class="fa fa-plus-circle" onclick="toogle(' . $row ['trainee_id'] . ')" id="imageId" style="display:block;"></i></td>';
								
							}else{
							echo '<td></td>';
							}
							$count++;
						}*/
/*if(trim($row['status'],"") == '5 - Closed'){
					   					echo '<tr class="RowToClick">';
					   				}else{
						   		echo '<tr>';
					   				}*/
						echo '<tr>';
						echo '<td>' . $row ['trainee_name'] . '</td>';
						/* echo '<td>' . $row ['employee_name'] . '</td>'; */
						echo '<td>' . $row ['trainer_name'] . '</td>';
						echo '<td>' . $row ['start_date'] . '</td>';
						echo $end_dateTd;
						echo '<td>' . $row ['allotted_time'] . '</td>';
						echo '<td>' . $row ['end_client'] . '</td>';
						echo '<td>' . $row ['technology_used'] . '</td>';
						echo '<td>' . $row ['paid_by'] . '</td>';
						echo '<td>' . $row ['status'] . '</td>';
						// echo '<td>'. $row['description'] . '</td>';
						echo '<td  nowrap="nowrap">';
						// echo '<a href="#" data-toggle="tooltip" title="'.$row['status'].'"><i class="fa fa-envelope"></i></a>';
						echo '<a href="#" data-toggle="tooltip" title="' . $row ['description'] . '"> <i class="fa fa-caret-square-o-up"></i></a>';
						echo '<a href="?content=42&id=' . $row ['id'] . '"> <i class="fa fa-pencil-square" ></i></a>';
						// echo '<a href="?content=40&id='.$row['id'].'" onclick="return confirm(\'Are you sure you want to delete?\')" > <i class="fa fa-trash"></i></a>';//'?content=16&id='.$row['id'].'
						echo '<a href="#"  onClick=delFromHome(' . $row ['id'] . ',"supportDelete")  > <i class="fa fa-trash"></i></a>';
						echo '</td>';
						echo '</tr>';
$count++;
						$beforeValue = $row ['trainee_id'];
						
					}
					
					?>
					<br><p id="mainCount" style="display: block;"> Total Number Of Supports : <?php echo $count;?></p>
													<!--<p id="mainCountDup" style="display: none;"> Total Number Of Supports : <span id="countDup"></span>--></p>
				</tbody>
			</table>
			<label id="NoRowsAvailable" style="display: none"> No result matched
				for search criteria </label>
		</div>
	</div>
	<!-- /container -->
</body>
</html>
