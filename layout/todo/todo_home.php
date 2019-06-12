<!DOCTYPE html>
<html lang="en">


<body>
	<div class="container-fluid">
		
		<div class="row">
			<p>
			<b class="labelData">Tasks</b>
				<a href="?content=20" class="btn btn-default"><i
					class="fa fa-plus-square"></i>&nbsp;Add</a> <a
					href="./Excels/todoexcel.php" class="btn btn-default btn-lg "
					role="button"><i class="fa fa-file-excel-o"></i> export</a>
			</p>
			Search:<input id="filter" type="text" /> <label id="DeletedRecord"
				style="display: none"> Record Deleted Successfully </label>
			<table data-filter="#filter" class="footable" id="myTable">
				<thead>
					<tr>
						<th>Category</th>
						<th>Status</th>
						<th>Employee Name</th>
						<th>Estimated Time</th>
						<th data-sort-ignore="true">Actions</th>
					</tr>
				</thead>
				<tbody>

					<?php
					header ( "Cache-Control: no-cache" );
					
					$path = $_SERVER ['DOCUMENT_ROOT'];
					$path .= "/layout/connection/GlobalCrud.php";
					include_once ($path);
					$delete = "todoDelete";
					$data = GlobalCrud::getData ( 'todoSelect' );
					$count = 0;
					foreach ( $data as $row ) {
						echo '<tr id="' . $row ['id'] . '">';
						echo '<td>' . $row ['category'] . '</td>';
						echo '<td>' . $row ['status'] . '</td>';
						echo '<td>' . $row ['employee_name'] . '</td>';
						echo '<td>' . $row ['estimated_time'] . '</td>';
						echo '<td nowrap="nowrap">';
						echo '<a href="#" data-toggle="tooltip" title="' . $row ['description'] . '"> <i class="fa fa-caret-square-o-up"></i></a>';
						echo '<a href="?content=21&id=' . $row ['id'] . '"> <i class="fa fa-pencil-square"></i></a>';
						echo '<a href="#"  onClick=delFromHome(' . $row ['id'] . ',"todoDelete")  > <i class="fa fa-trash"></i></a>'; // '?content=16&id='.$row['id'].'
						                                                                                                         // echo '<a href="?content=19&id='.$row['id'].'" onclick="return deleteRecordById('.$row['id'].')" > <i class="fa fa-trash"></i></a>';//'?content=16&id='.$row['id'].'
						echo '</td>';
						echo '</tr>';
						$count ++;
					}
					
					?>
						  
				<br> Total Number Of Tasks:
					<?php echo $count;?>
				</tbody>
			</table>
			<label id="NoRowsAvailable" style="display: none"> No result matched
				for search criteria </label>
		</div>
	</div>
	<!-- /container -->
</body>
</html>
