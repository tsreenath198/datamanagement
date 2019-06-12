<?php 

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once($path);
$traineeData = GlobalCrud::getData('traineeSelect');
$dataTrainee = GlobalCrud::getData ( 'traineeSelect' );
$dataEmployee = GlobalCrud::getData ( 'employeeSelect' );
$timeConstants = explode(',', GlobalCrud::getConstants("timeConstants"));
$supportConstants = explode(',', GlobalCrud::getConstants("supportConstants"));
$id = null;
date_default_timezone_set("Asia/Kolkata");
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if ( null==$id ) {
	header("Location: index.php?content=47");
}

if ( !empty($_POST)) {
	//supportedby traineeid startdate enddate allottedtime endclient status paidby technologyused description
	$supportedby = $_POST['supportedby'];
	$supportedto=$_POST['supportedto'];
	$date=$_POST['date'];
	$hours=$_POST['hours'];
	$description=$_POST['description'];
	
	

	// validate input
	$valid = true;
	if (empty($supportedby)) {
		$valid = false;
	}
	if (empty($supportedto)) {
		$valid = false;
	}
	
	
	


	// update data
	if ($valid) {
		$sql = "supportTrackerUpdate";
		$sqlValuesForUpdate = array($supportedby,$supportedto,$date,$hours,$description,$id);
		GlobalCrud::update($sql,$sqlValuesForUpdate);
		header("Location:../?content=47");
	}
}

else {
	$sql = "supportTrackerSelectById";
	$sqlValues = array($id);
	$data = GlobalCrud::selectById($sql,$sqlValues);
	$supportedby = $data['support_by'];
	$supportedto=$data['support_to'];
	$date=$data['date'];
	$hours=$data['hours'];
	$description=$data['description'];
	
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
	var supportedbyid =document.getElementById("supportedbyid").value;
	var supportedtoid =document.getElementById("supportedtoid").value;
	if(supportedbyid==0 ){
		
		document.getElementById("supportedbyidError").innerHTML="Supportedby Is Required";
		return false;
	}
	else if(supportedtoid==0){
		document.getElementById("supportedtoidError").innerHTML="Supportedto Is Required";
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
				<h3>Update a Supportracker</h3>
			</div>

			<form class="form-horizontal"
				action="./supporttracker/update.php?id=<?php echo $id?>" method="post"
				onsubmit="return validate()">



				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">SupportedBy</label>
						<div class="controls">
							<select name="supportedby" id="supportedbyid">
								<option value="0">Select</option>
							<?php foreach ($dataEmployee as $row): ?>
							<option <?php if($row['id'] == $supportedby) {  ?>
									selected="selected" value="<?=$row['id']?>">
								<?php
}
else {
								?>
								value="<?=$row['id']?>" >
								<?php
							}
							echo $row ['name'];
							?>
							</option>

							<?php endforeach ?>
						</select><span id="supportedbyidError" style="color: red"></span>
						</div>
					</div>
				</div>


				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">SupportedTo</label>
						<div class="controls">
							<select name="supportedto" id="supportedtoid">
								<option value="0">Select</option>
							<?php foreach ($dataTrainee as $row): ?>
							<option <?php if($row['id'] == $supportedto) {  ?>
									selected="selected" value="<?=$row['id']?>">
								<?php
}
else {
								?>
								value="<?=$row['id']?>" >
								<?php
							}
							echo $row ['name'];
							?>
							</option>

							<?php endforeach ?>
						</select><span id="supportedtoidError" style="color: red"></span>
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
					<label class="control-label">Hours</label>
					<div class="controls">
						<input name="hours"  
							value="<?php echo !empty($hours)?$hours:'';?>">

					</div>
				</div>


				

				<div class="control-group">
					<label class="control-label">Description</label>
					<div class="controls">
						<textarea name="description" type="text" placeholder="description">
							<?php echo !empty($description)?$description:'';?>
					      		</textarea>
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-success">Update</button>
					<a class="btn" href="./supporttracker/supporttracker_home.php">Back</a>
				</div>
			</form>
		</div>

	</div>
	<!-- /container -->
</body>
</html>
