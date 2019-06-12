<!DOCTYPE html>
<html lang="en">

<head><script type="text/javascript">
	$(document).ready(function() {
		$('#example').dataTable( {
		    "columnDefs": [{ "orderable": false, "targets": 1 }]
		});
	});
</script></head>
<body>
    <div  class="container-fluid">
		
			<div class="row">
				<p>
				<b class="labelData">Technology</b>
					<a href="?content=2" class = "btn btn-default"><i class="fa fa-plus-square"></i>&nbsp;Add</a>
					<a href="./Excels/technologyexcel.php" class="btn btn-default btn-lg " role="button" ><i class="fa fa-file-excel-o"></i> export</a>
				</p>
					Search:<input id="filter" type="text" /> <label id="DeletedRecord" style="display: none">Record Deleted successfully!!</label>
			<table data-filter="#filter" class="footable">
		              <thead>
		                <tr>
		                  <th> Name</th>
		                   <th data-sort-ignore="true">Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
		              header("Cache-Control:no-cache");
		               $path = $_SERVER['DOCUMENT_ROOT'];
   					   $path .= "/layout/connection/GlobalCrud.php";
   					   include_once($path);
   					   $delete="technologyDelete";
   					   $count=0;
					   $data = GlobalCrud::getData('technologySelect');
					   foreach ($data as $row) {
						   		echo '<tr>';
							   	 	echo '<td><a  href="?content=4&technology='.$row['id'].'">'. $row['name'] . '</a></td>';
							   	echo '<td nowrap="nowrap">';
							   	echo '<a href="#" data-toggle="tooltip" title="'. $row['description'] . '"> <i class="fa fa-caret-square-o-up"></i></a>';
							   	echo '<a href="?content=3&id='.$row['id'].'"> <i class="fa fa-pencil-square"></i></a>';
							   	//echo '<a href="?content=1&id='.$row['id'].'"  onclick="return confirm(\'Are you sure you want to delete?\')" > <i class="fa fa-trash"></i></a>';//'?content=16&id='.$row['id'].'
							   	echo '<a href="#"  onClick=delFromHome('.$row['id'].',"technologyDelete") > <i class="fa fa-trash"></i></a>';//'?content=16&id='.$row['id'].'
							   	echo '</td>';
							   	echo '</tr>';
							   	$count++;
					   }

					   /* function deleteRecord($idValue) {
									$sql = "technologyDelete";
									$sqlValues = $idValue;
									GlobalCrud::delete($sql,$sqlValues);
									header("Location:./?content=1");
								}

						  if (isset($_GET['id'])) {
						    deleteRecord($_GET['id']);
						  } */
					  ?>
					  <br> Total number of technologies:
					<?php echo $count;?>
				      </tbody>
	            </table>
	            <label id="NoRowsAvailable" style="display: none">  No result matched for search criteria	</label>
    	</div>
    </div> <!-- /container -->
  </body>
</html>