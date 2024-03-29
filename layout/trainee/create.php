<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
$dataTechnology = GlobalCrud::getData ( 'technologySelect' );
$dataClient = GlobalCrud::getData ( 'clientSelect' );
$dataBatch = GlobalCrud::getData ( 'batchSelect' );
$constants = explode ( ',', GlobalCrud::getConstants ( "timezoneConstants" ) );
$feeStatusConstants = explode(',', GlobalCrud::getConstants("feeStatusConstant"));
date_default_timezone_set("Asia/Kolkata");
if (! empty ( $_POST )) {
	// keep track post values
	$name = $_POST ['name'];
	$email = $_POST ['email'];
	$alternatephone = $_POST ['alternatephone'];
	$clientid = $_POST ['clientid'];
	$skypeid = $_POST ['skypeid'];
	$timezone = $_POST ['timezone'];
	$batchid = $_POST ['batchid'];
	$createdDate = date ( "Y/m/d" );
	// $updatedDate = $_POST['updatedDate'];
	$description = $_POST ['description'];
	$phone = $_POST ['phone'];
	$technologyid = $_POST ['technologyid'];
	$feeStatus = $_POST['feeStatus'];

	// validate input
	$valid = true;
	if (empty ( $name )) {
		$valid = false;
	}
	if (empty ( $email )) {
		$valid = false;
	}
	
 	if (empty ( $clientid )) {
		$valid = false;
	}
    if (empty ( $skypeid )) {
		$valid = false;
	}
	/* if (empty ( $timezone )) {
		$valid = false;
	} */
	/* if (empty ( $batchid )) {
		$valid = false;
	} */
	if (empty ( $phone )) {
		$valid = false;
	}
	if (empty ( $technologyid )) {
		$valid = false;
	}

	// insert data
	if ($valid) {
		$sql = "traineeInsert";
		$sqlValues = array (
				$name,
				$email,
				$alternatephone,
				$clientid,
				$skypeid,
				$timezone,
				$batchid,
				$createdDate,
				$description,
				$phone,
				$feeStatus,
				$technologyid
		);
		GlobalCrud::setData ( $sql, $sqlValues );
		header ( "Location:../?content=37" );
	} else {

		header ( "Location:../?content=38" );
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
				<h3>Create a Trainee</h3>
			</div>

			<form class="form-horizontal" action="./trainee/create.php" 
				method="post" onsubmit="return validate()">
				<div class="form-actions1">
					<span id="createMessage" style="color: red; display: none">Dulpicate
						Entry Is Not Allowed</span>
				</div>
				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Name</label>
						<div class="controls">
							<input name="name" id="name" type="text" placeholder="name"
								value="<?php echo !empty($name)?$name:'';?>"
								onkeyup="validateUser('trainee')" required>
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
					<div class="controls" id="errorBox">
						<select name="clientid" id="clientid">
							<option value="">Select</option>
							<?php foreach ($dataClient as $row): ?>
							<option value="<?=$row['id']?>">
								<?php	echo $row ['name'];?>
								<?php endforeach ?>
							</option>
						</select><span id="clientidError" style="color: red"></span>
					</div>
					</div>
				</div>


				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Skype</label>
						<div class="controls">
							<input name="skypeid" type="text" placeholder="skype id"
								value="<?php echo !empty($skypeid)?$skypeid:'';?>" required>

						</div>
					</div>
				</div>

				<div class="control-group ">
					<label class="control-label">Timezone</label>
					<div class="controls">
						<select name="timezone">
							<option value=" ">Select</option>
							<?php foreach ($constants as $constant): ?>
							<option value="<?=$constant?>">
								<?php	echo $constant;?>
								<?php endforeach ?>
						
						</select>
					</div>
				</div>




				<div class="control-group">
					<label class="control-label">Batch</label>
					<div class="controls">
						<select name="batchid" >
							<option value="NULL">Select</option>
							<?php foreach ($dataBatch as $row): ?>
							<option value="<?=$row['id']?>">
								<?php	echo $row ['id'];?>
								<?php endforeach ?>
							</option>
						</select>
					</div>
				</div>
				<?php $role = $_SESSION ['role'];?>
				<div class="control-group">
					<label class="control-label">Fee Status</label>
					<div class="controls">
						<select name="feeStatus" id="selectInTrainee" onchange="checkTheUserStatus('<?php echo $role?>','selectInTrainee','create')" >
							<option value="">Select</option>
							<?php foreach ($feeStatusConstants as $feeStatusConstant): ?>
							<option value="<?=$feeStatusConstant?>">
								<?php	echo $feeStatusConstant;?>
								<?php endforeach ?>
							</option>
						</select>
						<span id="userBasedAllowedAndNotAllowed" style="display: none;color:red;">This seleted value is not allowed for this login user</span>
					</div>
				</div>
				

				

				<!--  <div class="control-group">
					    <label class="control-label">Technology</label>
					    <div class="controls">*
					      	<input name="technologyid" type="text"  placeholder="technology" value="<?php echo !empty($technologyid)?$technologyid:'';?>" required>
					    
					    </div>
					  </div> -->
				<div class="control-group">
				<div class="form-group required">
					<label class="control-label">Technology</label>
					<div class="controls">
						<select name="technologyid" id=technologyid >
							<option value="">Select</option>
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
					<label class="control-label">Description</label>
					<div class="controls">
						<textarea name="description" type="text" placeholder="Description"
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
