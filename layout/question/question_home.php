<!DOCTYPE html>
<html lang="en">


<body>
	<div class="container-fluid">
		
		<div class="row">
			<p>
			<b class="labelData">Question</b>
				<a href="?content=35" class="btn btn-default"><i
					class="fa fa-plus-square"></i>&nbsp;Add</a> 
					<a href="./Excels/questionexcel.php" class="btn btn-default btn-lg "
					role="button"><i class="fa fa-file-excel-o"></i> export</a>
			</p>
			Search:<input id="filter" type="text" /> <label id="DeletedRecord"
				style="display: none"> Record Deleted Successfully </label>
			<table data-filter="#filter" class="footable" id="myTable">
				<thead>
					<tr>
						<th>End Client</th>
						<th>Question</th>
						<th>Answers</th>
						<!--<th>Description</th> -->
						<th data-sort-ignore="true">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					//header("Cache-Control: no-cache");
					$path = $_SERVER['DOCUMENT_ROOT'];
					$path .= "/layout/connection/GlobalCrud.php";
					include_once($path);
					//$delete = "questionDelete";
					$data = GlobalCrud::getData('questionSelect');
					$count = 0;
					foreach ($data as $row) {
						echo '<tr>';
						echo '<td>'. $row['interview_name'] . '</td>';
						echo '<td>'. $row['question'] . '</td>';
						echo '<td>'. $row['answers'] . '</td>';
						//echo '<td>'. $row['description'] . '</td>';
						echo '<td nowrap="nowrap">';
						echo '<a href="#" data-toggle="tooltip" title="'. $row['description'] . '"> <i class="fa fa-caret-square-o-up"></i></a>';
						echo '<a href="?content=36&id='.$row['id'].'"> <i class="fa fa-pencil-square"></i></a>';
						//echo '<a href="?content=34&id='.$row['id'].'"  onclick="return confirm(\'Are you sure you want to delete?\')" > <i class="fa fa-trash"></i></a>';//'?content=16&id='.$row['id'].'
						echo '<a href="#"  onClick=delFromHome('.$row['id'].',"questionDelete")  > <i class="fa fa-trash"></i></a>';
						echo '</td>';
						echo '</tr>';
						$count++;
					}

					/* function deleteRecord($idValue) {
									$sql = "questionDelete";
									$sqlValues = $idValue;
									GlobalCrud::delete($sql,$sqlValues);
									header("Location:./?content=34");
								}

						  if (isset($_GET['id'])) {
						    deleteRecord($_GET['id']);
						  }  */
						  ?>


					<br> Total Number Of Questions:
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
