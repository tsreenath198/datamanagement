<?php 

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once($path);
$selecteddata = GlobalCrud::getData('employeeSelect');
$constants = explode(',', GlobalCrud::getConstants("todoConstants"));
$id = null;
date_default_timezone_set("Asia/Kolkata");
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if ( null==$id ) {
	header("Location: index.php?content=19");
}

if ( !empty($_POST)) {
	$category = $_POST['category'];
	$status = $_POST['status'];
	$assignedto = $_POST['assignedto'];
	$updatedDate=date("Y/m/d");
	$estimatedtime=$_POST['estimatedtime'];
	$description = $_POST['description'];
	//$name = $_POST['time'];

	// validate input
	$valid = true;
	/* if (empty($category)) {
		$valid = false;
	}
	if (empty($status)) {
		$valid = false;
	} */
	if (empty($assignedto)) {
		$valid = false;
	}
	/* if (empty($estimatedtime)) {
		$valid = false;
	} */



	// update data
	if ($valid) {
		$sql = "todoUpdate";
		$sqlValuesForUpdate = array($category,$status,$assignedto,$estimatedtime,$updatedDate,$description,$id);
		GlobalCrud::update($sql,$sqlValuesForUpdate);
		header("Location:../?content=19");
	}
}

else {
	$sql = "todoSelectById";
	$sqlValues = array($id);
	$data = GlobalCrud::selectById($sql,$sqlValues);
	$category = $data['category'];
	$status = $data['status'];
	$assignedto = $data['assigned_to'];
	$estimatedtime=$data['estimated_time'];
	$description = $data['description'];
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
	var assignedtoid =document.getElementById("assignedtoid").value;
	
	if(assignedtoid==0){
		
		document.getElementById("assignedtoidError").innerHTML="Employee Name Is Required";
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
				<h3>Update a Tasks</h3>
			</div>

			<form class="form-horizontal"
				action="./todo/update.php?id=<?php echo $id?>" method="post"onsubmit="return validate()">
				<div class="control-group">
					<label class="control-label">Category</label>
					<div class="controls">
						<input name="category" type="text" placeholder="category"
							value="<?php echo !empty($category)?$category:'';?>" >

					</div>
				</div>


				<div class="control-group ">
					<label class="control-label">Status</label>

					<div class="controls">
						<select name="status" type="text">
							<option value="">Select</option>
							<?php foreach ($constants as $constant): ?>
							<option <?php if($constant == $status) {  ?> selected="selected"
								value="<?=$constant?>">
								<?php
}
else {
								?>
								value="<?=$constant?>">
								<?php
							}
							echo  $constant;
							?>
								</option>
								<?php endforeach ?>
						
						</select>
					</div>
				</div>




				<div class="control-group">
				<div class="form-group required">
					<label class="control-label">Employee Name</label>
					<div class="controls">
						<select name="assignedto" id="assignedtoid">
							<option value="">Select</option>
							<?php foreach ($selecteddata as $row): ?>
							<option <?php if($row['id'] == $assignedto) {  ?>
								selected="selected" value="<?=$row['id']?>">
								<?php
}
else {
								?>
								value="<?=$row['id']?>">
								<?php
							}
							echo $row ['name'];
							?>
							</option>

							<?php endforeach ?>
						</select><span id="assignedtoidError" style="color: red"></span>
						</div>
					</div>
				</div>


				<div class="control-group ">
					<label class="control-label">Estimated Days </label>
					<div class="controls">
						<input name="estimatedtime" type="text"
							placeholder="estimated days"
							value="<?php echo !empty($estimatedtime)?$estimatedtime:'';?>"
							>

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
					<a class="btn" href="index.php">Back</a>
				</div>
			</form>
		</div>

	</div>
	<!-- /container -->
</body>
</html>
