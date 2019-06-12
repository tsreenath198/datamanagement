<!DOCTYPE html>
<html lang="en">
<head>

<script type="text/javascript">
function getval(obj) {
	var tableName;
	if(obj.value == "Trainee"){
		tableName = 'trainee';
	}else if(obj.value == "Trainer"){
		tableName = 'trainer';
	}else if(obj.value == "Client"){
		tableName = 'client';
	}else if(obj.value == "Employee"){
		tableName = 'employee';
	}else{
		$('#mySelect').empty().append('<option>Select</option>');
		return;
	}
	$.ajax({
		  url: '/layout/connection/GlobalCrud.php',
 		  type: 'POST',
 		  data: {operation: "tracker", sql: "select * from " +tableName+" where active_flag=0 ORDER BY name asc" , sqlValues:""},
 		  success: function(response) {
 	 		  var array = response.split(",");
 	 		
 	 		$('#mySelect').empty().append('<option>Select</option>');
 	 		  for(var i=0;i<array.length;){
 	 	 		  /* console.log(array[i]+""+array[i+1]); */
 	 	 		   $('#mySelect')
 			        .append($("<option></option>")
 			        .attr("value",array[i])
 			        .text(array[i+1])); 
 	 	 		 i = i+2;
 	 		  }
				return true;
			},
			error: function(e){ 
				return false;
			}
	});
}
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
/* $(document).ready(
		function() {

			//$('#add').one('click', function() {
			 $('#a').click(function() { 
								
					$('#myTable tbody').append('<tr class="child"><td>'+$("#exist").val()+' </td><td>'+$("#type").val()+' </td><td>'+$("#proviedbyid").val()+' </td><td> '+$("#proviedforid").val()+'</td><td>'+$("#datepicker").val()+' </td></tr>');
								$("#exist").val("") && $("#type").val("") && $("#proviedbyid").val("") && $("#proviedforid").val("") &&$("#datepicker").val("");
								
								
			 });
		}); */
</script>
</head>

<body>
	<div class="container-fluid">
		<?php
		$path = $_SERVER ['DOCUMENT_ROOT'];
		$path .= "/layout/connection/GlobalCrud.php";
		include_once ($path);
		$delete = "trackerDelete";
		 $data="trackerAdd";
	
		$dataEmployee = GlobalCrud::getData ( 'employeeSelect' );
		$dataTrainee = GlobalCrud::getData ( 'traineeSelect' );
		$data = GlobalCrud::getData ( 'trackerSelect' );
		
		?>
		<div class="row">
			 <p>
				<b class="labelData">Opportunity Tracker</b> <a
					href="./Excels/batchexcel.php?operation=''" class="btn btn-default btn-lg "
					role="button"><i class="fa fa-file-excel-o"></i> export</a>
			</p> 
			 <label id="DeletedRecord"
				style="display: none"> Record Deleted Successfully </label>
			<form id="myform" method="post" action="#"
					onsubmit="return oppurtunityTracker()">
					<label id="#AddSucessful" style="display: none"> Add Successfull </label>
			<table class="footable" id="myTable">
			
				<thead>
					<tr >
						
						<th>Type</th>
                                                   <th>Category</th>
						<th>Provided By</th>
						<th>Provided For</th>
						<th>Date</th>
                                                 <th>Paid</th>
						<!-- <th>Description</th>-->
						<th data-sort-ignore="true">Action</th>

					</tr>
							
					
						<!-- <td><input type="radio" id="exist" name="type" value="1">Yes <input
							type="radio" id="exist" name="type" value="0">NO</td> -->

						
						<tr style="background-color: white;" align="center">
						<td><select id="type" name="type" onchange="getval(this);">
								<option value="">Select</option>
								<option value="Trainee">Trainee</option>
								<option value="Trainer">Trainer</option>
								<option value="Client">Client</option>
								<option value="Employee">Employee</option>
						</select></td>


                                                <td><select id="category" name="category">
								<option value="">Select</option>
								<option value="Interview">Interview</option>
								<option value="Resume">Resume</option>
								<option value="Support">Support</option>
								<option value="Training">Training</option>
						</select><span id="categoryidError" style="color: red"></span></td>
						<td><select name="providedBy" id="providedBy">
								<option value="">Select</option>
							<?php foreach ($dataEmployee as $row): ?>
							<option value="<?=$row['id']?>">
								<?php	echo $row ['name'];?>
								<?php endforeach ?>
							</option>
						</select> <span id="clientidError" style="color: red"></span></td>
					
					
					
						<td><select id="mySelect"></select></td>
						
						<td><input type="date" id="datepicker"></td>
                                                 <td><select id="paid" name="paid">
								<option value="">Select</option>
								<option value="Yes">Yes</option>
								<option value="No">No</option>
								
						</select><span id="paididError" style="color: red"></span></td>
						<td><input type="submit" value="Add" onKeyPress="return disableEnterKey(event)">
						 </td>
						

						</tr>
				
				</thead>
				<tbody>
			
					<?php
					// header("Cache-Control: no-cache");
					
					$count = 0;
					foreach ( $data as $row ) {
						
						echo '<tr>';
						/* echo '<td>' . $row ['existing'] . '</td>'; */
						echo '<td>' . $row ['type'] . '</td>';
                                                echo '<td>' . $row ['category'] . '</td>';
						echo '<td>' . $row ['provided_by'] . '</td>';
						echo '<td>' . $row ['provided_for'] . '</td>';
						echo '<td>' . $row ['date'] . '</td>';
						echo '<td>' . $row ['paid'] . '</td>';
						
						echo '<td  nowrap="nowrap">';
						//echo '<a href="#" data-toggle="tooltip" title="'.$row['status'].'"><i class="fa fa-envelope"></i></a>';
						echo '<a href="#" data-toggle="tooltip" title="'. $row['description'] . '"> <i class="fa fa-caret-square-o-up"></i></a>';
						echo '<a href="?content=56&id='.$row['id'].'"> <i class="fa fa-pencil-square"></i></a>';
						//echo '<a href="?content=55&id='.$row['id'].'"  onclick="return confirm(\'Are you sure you want to delete?\')" > <i class="fa fa-trash"></i></a>';//'?content=16&id='.$row['id'].'
						echo '<a href="#"  onClick=delFromHome('.$row['id'].',"trackerDelete")  > <i class="fa fa-trash"></i></a>';
						echo '</td>';
						echo '</tr>';						
						$count ++;
					}
					
					?>
						  
						  <br> Total Number Of Oppurtunites:
						
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
