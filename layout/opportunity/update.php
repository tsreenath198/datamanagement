<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
$traineeData = GlobalCrud::getData ( 'traineeSelect' );
$employeeData = GlobalCrud::getData ( 'employeeSelect' );
$clientData = GlobalCrud::getData ( 'clientSelect' );
$trainerData = GlobalCrud::getData ( 'trainerSelect' );
$dataEmployee = GlobalCrud::getData ( 'employeeSelect' );
/*
 * $timeConstants = explode(',', GlobalCrud::getConstants("timeConstants")); $supportConstants = explode(',', GlobalCrud::getConstants("supportConstants"));
 */
$id = null;
date_default_timezone_set ( "Asia/Kolkata" );
if (! empty ( $_GET ['id'] )) {
	$id = $_REQUEST ['id'];
}

if (null == $id) {
	header ( "Location: index.php?content=55" );
}

if (! empty ( $_POST )) {
	// supportedby traineeid startdate enddate allottedtime endclient status technologyused description
	$type = $_POST ['type'];
	$providedby = $_POST ['providedBy'];
	$providedfor = $_POST ['providedfor'];
	$date = $_POST ['date'];
	$description = $_POST['description'];
$category = $_POST['category'];
$paid = $_POST['paid'];
	/*
	 * $allottedtime=$_POST['allottedtime']; $endclient=$_POST['endclient']; $status=$_POST['status']; $technologyused=$_POST['technologyused']; $updateddate = date("Y/m/d"); $description = $_POST['description'];
	 */
	
	// validate input
	$valid = true;
	if (empty ( $type )) {
		$valid = false;
	}
	if (empty ( $providedby )) {
		$valid = false;
	}
	if (empty ( $providedfor )) {
		$valid = false;
	}
	if (empty ( $date )) {
		$valid = false;
	}
	
	// update data
	if ($valid) {
		$sql = "trackerUpdate";
		$sqlValuesForUpdate = array (
				$type,$category,
				$providedby,
				$providedfor,
				$date,$paid,
				$id 
		);
		GlobalCrud::update ( $sql, $sqlValuesForUpdate );
		header ( "Location:../?content=55" );
	}
} 

else {
	$sql = "trackerSelectById";
	$sqlValues = array (
			$id 
	);
	$data = GlobalCrud::selectById ( $sql, $sqlValues );
	$type = $data ['type'];
	$providedby = $data ['provided_by'];
	$providedfor = $data ['provided_for'];
	$date = $data ['date'];
	$description = $data['description'];
$category = $data['category'];
$paid = $data['paid'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
function validate(){
	var type =document.getElementById("type").value;
	var provideBy =document.getElementById("providedBy").value;
var providedfor = document.getElementById("providedfor").value;
var category = document.getElementById("category").value;

	if(type==0 ){
		
		document.getElementById("typeError").innerHTML="Employee Name Is Required";
		return false;
	}
	 if(provideBy==0){
		document.getElementById("providedbyError").innerHTML="Trainee Name Is Required";
		return false;
	} 
	 if(providedfor==0){
		document.getElementById("providedforError").innerHTML="Trainee Name Is Required";
		return false;
	} 

 if(category == 0){
	document.getElementById("categoryError").innerHTML="Category Is Required";
		return false;
	}
	/*else{
		location.reload();
		return true;
	}*/
}
</script>
</head>

<body>
	<div class="container">

		<div class="span10 offset1">
			<div class="row">
				<h3>Update a Tracker</h3>
			</div>
			<form class="form-horizontal"
				action="./opportunity/update.php?id=<?php echo $id?>" method="post"
				onsubmit="return validate()">


				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Type</label>
						<div class="controls">


							<select id="type" name="type" onchange="getval(this);">
								<option value="">Select</option>
								<option value="Trainee" <?php if('Trainee' == $type) {  ?>
									selected="selected" <?php }?>>Trainee</option>
								<option value="Trainer" <?php if('Trainer' == $type) {  ?>
									selected="selected" <?php }?>>Trainer</option>
								<option value="Client" <?php if('Client' == $type) {  ?>
									selected="selected" <?php }?>>Client</option>
								<option value="Employee" <?php if('Employee' == $type) {  ?>
									selected="selected" <?php }?>>Employee</option>
							</select><span id="typeError" style="color: red"></span>
						</div>
					</div>
				</div>



                                <div class="control-group">
					<div class="form-group required">
						<label class="control-label">Category</label>
						<div class="controls">
							<select name="category" id="category">
								
                                                              <option value="0">Select</option>




                                                              <option value="Interview" <?php if('Interview' == $category) {  ?>
									selected="selected" <?php }?>>Interview</option>
								<option value="Resume" <?php if('Resume' == $category) {  ?>
									selected="selected" <?php }?>>Resume</option>
								<option value="Support" <?php if('Support' == $category) {  ?>
									selected="selected" <?php }?>>Support</option>
								<option value="Training" <?php if('Training' == $category) {  ?>
									selected="selected" <?php }?>>Training</option>
                                                                   
						</select><span id="categoryError" style="color: red"></span>
						</div>
					</div>
				</div>

                                

				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Provided By</label>
						<div class="controls">
							<select name="providedBy" id="providedBy">
								<option value="0">Select</option>
							<?php foreach ($employeeData as $row): ?>
							<option <?php if($row['id'] == $providedby) {  ?>
									selected="selected" value="<?=$row['id']?>">
								<?php
								} else {
									?>
								value="<?=$row['id']?>" >
								<?php
								}
								echo $row ['name'];
								?>
							</option>

							<?php endforeach ?>
						</select><span id="proviedByError" style="color: red"></span>
						</div>
					</div>
				</div>



				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Provided For</label>
						<div class="controls">
							<select name="providedfor" id="providedfor">
							
							
							
							
							<?php if('Trainer' == $type){  ?>
								<option value="0">Select</option>
							<?php foreach ($trainerData as $row): ?>
							<option <?php if($row['id'] == $providedfor) {  ?>
									selected="selected" value="<?=$row['id']?>">
								<?php
								} else {
									?>
								value="<?=$row['id']?>" >
								<?php
								}
								echo $row ['name'];
								?>
								
							</option>

							<?php endforeach ?>
						</select><span id="proviedByError" style="color: red"></span>
						<?php }?>
						
						
						
						
						
						
						<?php if('Trainee' == $type){  ?>
								<option value="0">Select</option>
							<?php foreach ($traineeData as $row): ?>
							<option <?php if($row['id'] == $providedfor) {  ?>
									selected="selected" value="<?=$row['id']?>">
								<?php
								} else {
									?>
								value="<?=$row['id']?>" >
								<?php
								}
								echo $row ['name'];
								?>
								
							</option>

							<?php endforeach ?>
						</select><span id="proviedByError" style="color: red"></span>
						<?php }?>
						
						
						
						
							<?php if('Employee' == $type){  ?>
								<option value="0">Select</option>
							<?php foreach ($dataEmployee as $row): ?>
							<option <?php if($row['id'] == $providedfor) {  ?>
									selected="selected" value="<?=$row['id']?>">
								<?php
								} else {
									?>
								value="<?=$row['id']?>" >
								<?php
								}
								echo $row ['name'];
								?>
								
							</option>

							<?php endforeach ?>
						</select><span id="proviedByError" style="color: red"></span>
						<?php }?>
						
						
						
						
						
								<?php if('Client' == $type){  ?>
								<option value="0">Select</option>
							<?php foreach ($clientData as $row): ?>
							<option <?php if($row['id'] == $providedfor) {  ?>
									selected="selected" value="<?=$row['id']?>">
								<?php
								} else {
									?>
								value="<?=$row['id']?>" >
								<?php
								}
								echo $row ['name'];
								?>
								
							</option>

							<?php endforeach ?>
						</select><span id="proviedByError" style="color: red"></span>
						<?php }?>
						
						
						
						
					
						
						
						</div>
					</div>
				</div>




				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Date</label>
						<div class="controls">
							<input name="date" type="date"
								value="<?php echo !empty($date)?$date:'';?>" required>
						</div>
					</div>
				</div>

                                  <div class="control-group">
					<div >
						<label class="control-label">Paid</label>
						<div class="controls">
							<select name="paid" id="paid">
								<option value="">Select</option>
							       <option value="Yes" <?php if('Yes' == $paid) {  ?>
									selected="selected" <?php }?>>Yes</option>
								<option value="No" <?php if('No' == $paid) {  ?>
									selected="selected" <?php }?>>No</option>
								
						</select></span>
						</div>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Description</label>
					<div class="controls">
						<textarea name="description" type="text" placeholder="description">
							<?php echo !empty($description)?$description:'';?>
					      		</textarea>
					</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-success">Update</button>
					<a class="btn" href="index.php">Back</a>
				</div>


			</form>
		</div>

	</div>
	<!-- /container -->
</body>
</html>