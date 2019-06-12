<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
$dataTechnology = GlobalCrud::getData ( 'technologySelect' );
$dataTrainer = GlobalCrud::getData ( 'trainerSelect' );
$constants = explode ( ',', GlobalCrud::getConstants ( "timezoneConstants" ) );
$supportConstants = explode ( ',', GlobalCrud::getConstants ( "supportConstants" ) );
date_default_timezone_set ( "Asia/Kolkata" );
if (! empty ( $_POST )) {
	
	$technologyid = $_POST ['technologyid'];
	$trainerid = $_POST ['trainerid'];
	$startdate = $_POST ['startdate'];
	$enddate = $_POST ['enddate'];
	$duration = $_POST ['duration'];
	$status = $_POST ['status'];
	$createdDate = date ( "Y/m/d" );
	// $updatedDate = $_POST['updatedDate'];
	$description = $_POST ['description'];
	$time = $_POST ['time'];
	
	// validate input
	$valid = true;
	if (empty ( $technologyid )) {
		$valid = false;
	}
	if (empty ( $trainerid )) {
		$valid = false;
	}
	if (empty ( $startdate )) {
		$valid = false;
	}
	// insert data
	if ($valid) {
		$sql = "batchInsert";
		$sqlValues = array (
				$technologyid,
				$trainerid,
				$startdate,
				$enddate,
				$duration,
				$status,
				$createdDate,
				$description,
				$time
		);
		GlobalCrud::setData ( $sql, $sqlValues );
		header ( "Location:../?content=10" );
	} else {
		
		header ( "Location:../?content=11" );
	}
}

/*
 * if ( !empty($_GET)) {
 * echo "<script type='text/javascript'>alert('get');</script>";
 * }
 */
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">


function validate(){
	
	var technologyid =document.getElementById("technologyid").value;
	var trainerid =document.getElementById("trainerid").value;

	 if(technologyid==0){
		document.getElementById("technologyidError").innerHTML="technology Is Required";
		return false;
	}
	 else if(trainerid==0){
		 document.getElementById("traineridError").innerHTML="trainer Is Required";
			return false;

		 }
	else{
		location.reload();
		return true;
	}


}
</script>
</head>

<body>
	<div class="container">

		<div class="span10 offset1">
			<div class="row">
				<h3>Create a Batch</h3>
			</div>

			<form class="form-horizontal" action="./batch/create.php"
				method="post" onsubmit="return validate()">
				
				
				<div class="form-actions1">
					<span id="createMessage" style="color: red; display: none">Dulpicate
						Entry Is Not Allowed</span>
				</div>
				
				
				<div class="control-group ">
				<div class="form-group required">
					<label class="control-label">Technology Name</label>
					<div class="controls">
						 <select name="technologyid" id="technologyid">
							<option value="0">Select</option>
							<?php foreach ($dataTechnology as $row): ?>
							<option value="<?=$row['id']?>">
									<?php	echo $row ['name'];?>
									<?php endforeach ?>
								</option>

							
						</select><span id="technologyidError" style="color: red"></span>
</div>
					</div>
				</div>
				
				
				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Trainer Name</label> 
						<div class="controls">
							<select name="trainerid" id="trainerid">
								<option value="0">Select</option>
								<?php foreach ($dataTrainer as $row): ?>
								<option value="<?=$row['id']?>">
									<?php	echo $row ['name'];?>
									<?php endforeach ?>
								</option>
							</select><span id="traineridError" style="color: red"></span>
						</div>
					</div>
				</div>

				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Start Date</label>
						<div class="controls">
							<input name="startdate" id="startdate" type="date" placeholder="start date"
								value="<?php echo !empty($startdate)?$startdate:'';?>" required>
						</div>
					</div>
				</div>


				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">End Date</label>
						<div class="controls">
							<input name="enddate" id="enddate" type="date" placeholder="end date"
							value="<?php echo !empty($enddate)?$enddate:'';?>" >
					</div>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Duration</label>
					<div class="controls">
						<input name="duration" id="duration" type="text" placeholder="duration"
							value="<?php echo !empty($duration)?$duration:'';?>" >
					</div>

				</div>


				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Status</label>
						<div class="controls" id="errorBox">
							<select name="status" id="status"> 
							<option value="">Select</option>
							<?php foreach ($supportConstants as $supportConstant): ?>
							<option value="<?=$supportConstant?>">
								<?php	echo $supportConstant;?>
								<?php endforeach ?>
						
						</select>
						</div>
					</div>
				</div>


				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Time</label>
						<div class="controls">
								<select name="time" id="time">
							<option value="">Select</option>
							<?php foreach ($constants as $constant): ?>
							<option value="<?=$constant?>">
								<?php	echo $constant;?>
								<?php endforeach ?>
						
						</select>
						</div>
					</div>
				</div>

				<div class="control-group ">
					<label class="control-label">Desccription</label>
					<div class="controls">
						<textarea name="description" id="description" type="text" placeholder="description"
							value="<?php echo !empty($description)?$description:'';?>">
					      	</textarea>
					</div>
				</div>




				

				<div class="form-actions">
					<button type="submit" class="btn btn-success" id="create">Create</button>
					<!-- <a class="btn" href="index.php">Back</a> -->
				</div>
			</form>
		</div>

	</div>
	<!-- /container -->
</body>
</html>
