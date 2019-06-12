<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet"
	href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
<script type="text/javascript">
/* $(function(){
	$( "#supportTrackingDate" ).datepicker({dateFormat:"yy-mm-dd"}).datepicker("setDate",new Date());
});
 */

/* $(document).ready(
		function() {

			//$('#add').one('click', function() {
			 $('#add').click(function() { 
								
				/* if($("#supportby").val()!=null && $("#supportby").val()!= "" && $("#supportto").val()!=null && $("#supportto").val()!= "" && $("#date").val()!=null && $("#date").val()!= ""){
					$('#myTable tbody').append('<tr class="child"><td>'+$("#supportby").val()+' </td><td>'+$("#supportto").val()+' </td><td>'+$("#date").val()+' </td><td> '+$("#hours").val()+'</td><td>'+$("#description").val()+' </td></tr>');
								$("#supportby").val("") && $("#supportto").val("") && $("#supportby").val("") && $("#hours").val("") &&$("#date").val("");
								
								} 

				
								});
		}); */

		$( "#AddRecord" ).slideUp( 300 ).delay( 5000 ).fadeIn( 400 );

				function disableEnterKey(e)
				
				{
			
				     var key;
				
				 
				
				     if(window.event)
				
				          key = window.event.keyCode;     //IE
				
				     else
				
				          key = e.which;     //firefox
				
				 
				
				     if(key == 13 )
				
				          return false;
				
				     else
				
				          return true;
				
				}
							


				
</script>
<body>
	<div class="container-fluid">
 <?php
 header ( "Cache-Control:no-cache" );
 $path = $_SERVER ['DOCUMENT_ROOT'];
 $path .= "/layout/connection/GlobalCrud.php";

 include_once($path);
 $delete = "supportTrackerDelete";
 $dataEmployee = GlobalCrud::getData ( 'employeeSelect' );
 $dataTrainee = GlobalCrud::getData ( 'traineeSelect' );
 date_default_timezone_set("Asia/Kolkata");
 ?>
		<div class="row">
			<p>
				<b class="labelData">Support Tracker</b>
				<!-- <a href="?content=14" class = "btn btn-default"><i class="fa fa-plus-square"></i>&nbsp;Add</a>
				 -->
				<a href="./Excels/employeeexcel.php" class="btn btn-default btn-lg "
					role="button"><i class="fa fa-file-excel-o"></i> export</a>
			</p>
			<form id="myform" method="post" action="#" onsubmit="return supportTracking()"> 
			<!--Search:<input id="filter" type="text" /> <label id="DeletedRecord" style="display: none">Record Deleted successfully!!</label>-->
			<label id="AddRecord" style="display: none">Add successful</label>
			<table id="myTable" data-filter="#filter" class="footable">
				<thead>
					<tr>
						<th>SupportedBy</th>
						<th>SupportedTo</th>
						<th>Date</th>
						<th>Hours</th>
						<th>descrition</th>
						<!-- <th> Base Salary</th>
		                    <th>Created Date</th>
		                  <th>Updated Date</th>
		                   <th>Description</th> -->
						<th data-sort-ignore="true">Action</th>
					</tr>
					
					
					
						
					<tr style="background-color: white;" align="center">	
						<td>
						
						
						<select  name="supportTrackingSupportby" id="supportTrackingSupportby"> 
							<option value="">Select</option>
							<?php foreach ($dataEmployee as $row): ?>
							<option value="<?=$row['id']?>">
								<?php	echo $row ['name'];?>
								<?php endforeach ?>
							</option>
						</select > 
						
						<span id="clientidError" style="color: red"></span>
						</td>
						
						
						<td>
						
						 <select  name="supportTrackingSupportto" id="supportTrackingSupportto"> 
							<option value="">Select</option>
							<?php foreach ($dataTrainee as $row): ?>
							<option value="<?=$row['id']?>">
								<?php	echo $row ['name'];?>
								<?php endforeach ?>
							</option>
						</select >
					
						<span id="clientidError" style="color: red"></span>
						</td>
						
						
						
					<!-- 	<td><input type="text" id="supportTrackingDate" placeholder="Date"></td> -->
					<td><input type=date id="supportTrackingDate" > </td>
						<td><input type="number" id="supportTrackingHours" placeholder="Hours" value="1" min="0" max="24"></td>
						<td><input type="text" id="supportTrackingDescription" placeholder="Description" maxlength="60"></td>
						
						
						<td>
								<button id="add" type="submit" value="Add" onKeyPress="return disableEnterKey(event)" >Add</button>
							
						</td>
						
						
					</tr>
					
				</thead> 
				
				
				
				<tbody>
				
					
					
					
					
		              <?php
																
   					  /*  if ( !empty($_POST)) {
   					   
   					   	// keep track post values
   					   	$supportby = $_POST['supportby'];
   					   	$supportto=$_POST['supportto'];
   					   	$date=$_POST['date'];
   					   	$hours=$_POST['hours'];
   					  	$description = $_POST['description'];
   					   
   					   	// validate input
   					   	$valid = true;
   					   	if (empty($supportby)) {
   					   		$valid = false;
   					   	}
   					   	if (empty($supportto)) {
   					   		$valid = false;
   					   	}
   					   	if (empty($date)) {
   					   		$valid = false;
   					   	}
   					   	if (empty($hours)) {
   					   		$valid = false;
   					   	}
   					   	 if (empty($enddate)) {
   					   		$valid = false;
   					   		}
   					   		if (empty($allottedtime)) {
   					   		$valid = false;
   					   		}
   					   		if (empty($endclient)) {
   					   		$valid = false;
   					   		}
   					   		if (empty($status)) {
   					   		$valid = false;
   					   		}
   					   		if (empty($technologyused)) {
   					   		$valid = false;
   					   		}
   					   		
   					   
   					   
   					   	// insert data
   					   	if ($valid) {
   					   		$sql = "supportTrackerInsert";
   					   		$sqlValues = array($supportby,$supportto,$date,$hours,$description);
   					   		GlobalCrud::setData($sql,$sqlValues);
   					   		header("Location:../?content=47");
   					   	}
   					   	else{
   					   
   					   		header("Location:../?content=47");
   					   	}
   					   
   					   } */
   					   
   					  // $delete="employeeDelete";
					   $data = GlobalCrud::getData('supportTrackerSelect');
					   foreach ($data as $row) {
					   	
					  
					   	
						   		echo '<tr>';
							   	echo '<td>'. $row['employee_name'] . '</td>';
							   	echo '<td>'. $row['trainee_name'] . '</td>';
							   	echo '<td>'. $row['date'] . '</td>';
							   	echo '<td>'. $row['hours'] . '</td>';
							   	echo '<td>'. $row['description'] . '</td>';
							   	echo '<td nowrap="nowrap">';
							   	/* echo '<a href="#" data-toggle="tooltip" title="'. $row['description'] . '"> <i class="fa fa-caret-square-o-up"></i></a>';
							  	echo '<a href="?content=48&id='.$row['id'].'"> <i class="fa fa-pencil-square"></i></a>';
							   	echo '<a href="?content=47&id='.$row['id'].'"  onclick="return confirm(\'Are you sure you want to delete?\')" > <i class="fa fa-trash"></i></a>';//'?content=16&id='.$row['id'].'
							   */// 	echo '<a href="#"  onClick=delFromHome('.$row['id'].',"employeeDelete") > <i class="fa fa-trash"></i></a>';//'?content=16&id='.$row['id'].'
							   	echo '<a href="#" data-toggle="tooltip" title="'. $row['description'] . '"> <i class="fa fa-caret-square-o-up"></i></a>';
							   	echo '<a href="?content=48&id='.$row['id'].'"> <i class="fa fa-pencil-square"></i></a>';
							   	//echo '<a href="?content=40&id='.$row['id'].'"  onclick="return confirm(\'Are you sure you want to delete?\')" > <i class="fa fa-trash"></i></a>';//'?content=16&id='.$row['id'].'
							   	echo '<a href="#"  onClick=delFromHome('.$row['id'].',"supportTrackerDelete")  > <i class="fa fa-trash"></i></a>';
							   	
							   	echo '</td>';
							   	
							   	echo '</tr>';
							   	$count++;
					   }

					   /* function deleteRecord($idValue) {
									$sql = "employeeDelete";
									$sqlValues = $idValue;
									GlobalCrud::delete($sql,$sqlValues);
									header("Location:./?content=13");
								}

						  if (isset($_GET['id'])) {
						    deleteRecord($_GET['id']);
						  } */
					  ?>
					    <br> Total number of Support Tracking:
					<?php echo $count;?>
				      </tbody>
			</table>
			</form>
			<label id="NoRowsAvailable" style="display: none"> No result matched
				for search criteria </label>
		</div>
	</div>
	<!-- /container -->
</body>
</html>