<?php 

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once($path);
$selecteddataTechnology = GlobalCrud::getData('technologySelect');
$selecteddataClient =  GlobalCrud::getData('clientSelect');
$selecteddataBatch =  GlobalCrud::getData('batchSelect');
$constants = explode ( ',', GlobalCrud::getConstants ( "timezoneConstants" ) );
$feeStatusConstants = explode(',', GlobalCrud::getConstants("feeStatusConstant"));
$id = null;
date_default_timezone_set("Asia/Kolkata");
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if ( null==$id ) {
	header("Location: index.php?content=37");
}

if ( !empty($_POST)) {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$alternatephone = $_POST['alternatephone'];
	$clientid = $_POST['clientid'];
	$skypeid = $_POST['skypeid'];
	$timezone = $_POST['timezone'];
	$batchid = $_POST['batchid'];
	//$createdDate = $_POST['createdDate'];
	$updatedDate = date("Y/m/d");
	$description = $_POST['description'];
	$phone = $_POST['phone'];
	$feeStatus = $_POST['feeStatus'];
	$technologyid = $_POST['technologyid'];


	// validate input
	$valid = true;
	if (empty($name)) {
		$valid = false;
	}
	if (empty($email)) {
		$valid = false;
	}
	if (empty ( $clientid )) {
		$valid = false;
	}
	
	if (empty($skypeid)) {
		$valid = false;
	}
	/* if (empty ( $batchid )) {
		$valid = false;
	} */
	
	if (empty($phone)) {
		$valid = false;
	}
	if (empty ( $technologyid )) {
		$valid = false;
	}
	

	// update data
	if ($valid) {
		$sql = "traineeUpdate";
		$sqlValuesForUpdate = array($name,$email,$alternatephone,$clientid,$skypeid,$timezone,$batchid,$updatedDate,$description,$phone,$feeStatus,$technologyid,$id);
		GlobalCrud::update($sql,$sqlValuesForUpdate);

		header("Location:../?content=37");
	}
}

else {
	$sql = "traineeSelectById";
	$sqlValues = array($id);
	$data = GlobalCrud::selectById($sql,$sqlValues);
	$name = $data['name'];
	$email = $data ['email'];
	$alternatephone = $data ['alternate_phone'];
	$clientid = $data ['client_id'];
	$skypeid = $data ['skype_id'];
	$timezone = $data ['timezone'];
	$batchid = $data['batch_id'];
	$description = $data['description'];
	$phone = $data['phone'];
	$feeStatus = $data['trainee_fee_status'];
	$technologyid = $data['technology_id'];
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
	var clientid =document.getElementById("clientid").value;
	var technologyid =document.getElementById("technologyid").value;
	
	if(clientid==0){
		
		document.getElementById("clientidError").innerHTML="Client Is Required";
		return false;
	}
	else if(technologyid==0){
		
		document.getElementById("technologyidError").innerHTML="technology Is Required";
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
				<h3>Update a Trainee</h3>
			</div>

			<form class="form-horizontal"
				action="./trainee/update.php?id=<?php echo $id?>" method="post" onsubmit="return validate()">
				<div class="form-actions1">
					<span id="createMessage" style="color: red; display: none">Dulpicate
						Entry Is Not Allowed</span>
				</div>
				<div class="control-group ">
				<div class="form-group required">
					<label class="control-label">Name</label>
					<div class="controls">
						 <input name="name" id="name" type="text" placeholder="name"
							value="<?php echo !empty($name)?$name:'';?>" onkeyup="validateUser('trainee')" required>
</div>
					</div>
				</div>


				<div class="control-group">
				<div class="form-group required">
					<label class="control-label">Email</label>
					<div class="controls">
						 <input name="email" type="email" placeholder="email"
							value="<?php echo !empty($email)?$email:'';?>" required>
</div>
					</div>
				</div>
				
				
				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Phone</label>
						<div class="controls">
								<input type="tel" name="phone" maxlength="15" placeholder="phone" 
								onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' 
								value="<?php echo !empty($phone)?$phone:'';?>" required>
						</div>
					</div>
				</div>
				
				<div class="control-group">
						<label class="control-label">Alternate Phone</label>
						<div class="controls">
							<input type="tel" name="alternatephone" maxlength="15" placeholder="alternatephone" 
								onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' 
								value="<?php echo !empty($alternatephone)?$alternatephone:'';?>" >
						</div>
				</div>



				<div class="control-group">
				<div class="form-group required">
					<label class="control-label">Client</label>
					<div class="controls">
						<select name="clientid" id="clientid">
							<option value="0">Select</option>
							<?php foreach ($selecteddataClient as $row): ?>
							<option <?php if($row['id'] == $clientid) {  ?>
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
						</select><span id="clientidError" style="color: red"></span>
						</div>
					</div>
				</div>

				<div class="control-group ">
				<div class="form-group required">
					<label class="control-label">Skype</label>
					<div class="controls">
						 <input name="skypeid" type="tel" placeholder="skype id"
							value="<?php echo !empty($skypeid)?$skypeid:'';?>" required>
</div>
					</div>
				</div>


				<div class="control-group">
					<label class="control-label">Timezone</label>
					<div class="controls">
						<select name="timezone" type="text">
							<option value=" ">Select</option>
							<?php foreach ($constants as $constant): ?>
							<option <?php if($constant == $timezone) {  ?>
								selected="selected" value="<?=$constant?>">
								<?php
}
else {
								?>
								value="<?=$constant?>" >
								<?php
							}
							echo $constant;
							?>
							</option>

							<?php endforeach ?>
						</select>
					</div>
				</div>


				<div class="control-group">
					<label class="control-label">Batch</label>
					<div class="controls">
						<select name="batchid" type="text">
							<option value=" ">Select</option>
							<?php foreach ($selecteddataBatch as $row): ?>
							<option <?php if($row['id'] == $batchid) {  ?>
								selected="selected" value="<?=$row['id']?>">
								<?php
}
else {
								?>
								value="<?=$row['id']?>" >
								<?php
							}
							echo $row['id'];
							?>
							</option>

							<?php endforeach ?>
						</select>
					</div>
				</div>


				<?php $role = $_SESSION ['role'];?>
				<div class="control-group">
					<label class="control-label">Status</label>
					<div class="controls">
						<select name="feeStatus" id="selectInTrainee" onchange="checkTheUserStatus('<?php echo $role?>','selectInTrainee','update')">
							<option value="">Select</option>
							<?php foreach ($feeStatusConstants as $feeStatusConstant): ?>
							<option <?php if($feeStatusConstant == $feeStatus) {?>
								selected="selected" value=" <?=$feeStatusConstant?>">
								<?php }else {?>
								value="<?=$feeStatusConstant?>">
								<?php }
								echo $feeStatusConstant;
								?>
							</option>

							<?php endforeach ?>
							
						</select><span id="userBasedAllowedAndNotAllowed" style="display: none;color:red;">This seleted value is not allowed for this login user</span>
					</div>
				</div>
				


				<!-- <div class="control-group ">
					    <label class="control-label">Technology</label>
					    <div class="controls">
					      	<input name="technologyid" type="text"  placeholder="Technology" value="<?php echo !empty($technologyid)?$technologyid:'';?>">
					      	
					    </div>
					  </div> -->

				<div class="control-group">
				<div class="form-group required">
					<label class="control-label">Technology</label>
					<div class="controls">
						<select name="technologyid" id="technologyid">
							<option value="0">Select</option>
							<?php foreach ($selecteddataTechnology as $row): ?>
							<option <?php if($row['id'] == $technologyid) {  ?>
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
						</select><span id="technologyidError" style="color: red"></span>
					</div>
				</div>
				</div>


				<div class="control-group ">
					<label class="control-label">Description</label>
					<div class="controls">
						<textarea name="description" type="text" placeholder="Description">
							<?php echo !empty($description)?$description:'';?>
					      	</textarea>
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-success" id="update">Update</button>
				<!-- 	<a class="btn" href="index.php">Back</a> -->
				</div>
			</form>
		</div>

	</div>
	<!-- /container -->
</body>
</html>
