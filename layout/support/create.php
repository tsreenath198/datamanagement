<?php 

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once($path);
$traineeData = GlobalCrud::getData('traineeSelect');
$trainerData = GlobalCrud::getData('trainerSelect');
$employeeData = GlobalCrud::getData('employeeSelect');
$timeConstants = explode(',', GlobalCrud::getConstants("timeConstants"));
$supportConstants = explode(',', GlobalCrud::getConstants("supportConstants"));
$supportPaidConstants = explode(',', GlobalCrud::getConstants("supportPaidConstants"));
//$clientData = GlobalCrud::getData('clientSelect');
date_default_timezone_set("Asia/Kolkata");
if ( !empty($_POST)) {

	// keep track post values
	$traineeid = $_POST['traineeid'];
	$supportedby = '';
	$trainerid=$_POST['trainerid'];
	$startdate=$_POST['startdate'];
	$enddate=$_POST['enddate'];
	$allottedtime=$_POST['allottedtime'];
	$endclient=$_POST['endclient'];
	$status=$_POST['status'];
$paidby=$_POST['paidby'];
	$technologyused=$_POST['technologyused'];
	$createdDate = date("Y/m/d");
	$updatedDate = $_POST['updatedDate'];
	$description = $_POST['description'];

	// validate input
	$valid = true;
	if (empty($traineeid)) {
		$valid = false;
	}
	if (empty($trainerid)) {
		$valid = false;
	}
	if (empty($startdate)) {
		$valid = false;
	}
	/* if (empty($enddate)) {
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
if (empty($paidby)) {
		$valid = false;
	}
	if (empty($technologyused)) {
		$valid = false;
	}
 */


	// insert data
	if ($valid) {
		$sql = "supportInsert";
		$sqlValues = array($traineeid,$supportedby,$trainerid,$startdate,$enddate,$allottedtime,$endclient,$status,$technologyused,$createdDate,$updatedDate,$description,$paidby);
		GlobalCrud::setData($sql,$sqlValues);
		header("Location:../?content=40");
	}
	else{

		header("Location:../?content=41");
	}

}

/*if ( !empty($_GET)) {
 echo "<script type='text/javascript'>alert('get');</script>";
}*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
function validate(){
	var trainerid =document.getElementById("trainerid").value;
	var traineeid =document.getElementById("traineeid").value;
var paidbyid =document.getElementById("paidbyid").value;
	
	if(trainerid==0){
		
		document.getElementById("$traineridError").innerHTML="Trainer name Is Required";
		return false;
	}
	else if(traineeid==0){
		
		document.getElementById("traineeidError").innerHTML="Trainee name Is Required";
		return false;
	}
else if(paidbyid==0){
		
		document.getElementById("paidbyidError").innerHTML="Paid by Is Required";
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
				<h3>Create a Support</h3>
			</div>

			<form class="form-horizontal" action="./support/create.php"
				method="post" onsubmit="return validate()">

				<!-- <div class="control-group">
					<div class="form-group required">
						<label class="control-label">Employee Name</label>
						<div class="controls">
							<select name="supportedby" id="supportedbyid">
								<option value="0">Select</option>
								<?php foreach ($employeeData as $row): ?>
								<option value="<?=$row['id']?>">
									<?php	echo $row ['name'];?>
									<?php endforeach ?>
								</option>
							</select><span id="supportedbyidError" style="color: red"></span>
						</div>
					</div>
				</div> -->

				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Trainee Name</label>
						<div class="controls">
							<select name="traineeid" id="traineeid">
								<option value="0">Select</option>
								<?php foreach ($traineeData as $row): ?>
								<option value="<?=$row['id']?>">
									<?php	echo $row ['name'];?>
									<?php endforeach ?>
								</option>
							</select><span id="traineeidError" style="color: red"></span>
						</div>
					</div>
				</div>
				
				
				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Trainer Name</label>
						<div class="controls">
							<select name="trainerid" id="trainerid">
								<option value="0">Select</option>
								<?php foreach ($trainerData as $row): ?>
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
							<input name="startdate" type="date" placeholder="start date"
								value="<?php echo !empty($startdate)?$startdate:'';?>" required>
						</div>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">End Date</label>
					<div class="controls">
						<input name="enddate" type="date" placeholder="end date"
							value="<?php echo !empty($enddate)?$enddate:'';?>" >

					</div>
				</div>


				<div class="control-group">
					<label class="control-label">Allotted Time</label>
					<div class="controls">
						<select name="allottedtime" type="time">
							<option value="">Select</option>
							<?php foreach ($timeConstants as $timeConstant): ?>
							<option value="<?=$timeConstant?>">
								<?php echo $timeConstant;?>
								<?php endforeach ?>
							</option>
						</select>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">End Client</label>
					<div class="controls">
						<input name="endclient" type="text" placeholder="end client"
							value="<?php echo !empty($endclient)?$endclient:'';?>" >

					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Technology Used</label>
					<div class="controls">
						<input name="technologyused" type="text"
							placeholder="technology used"
							value="<?php echo !empty($technologyused)?$technologyused:'';?>"
							>

					</div>
				</div>


	<div class="control-group">
				<div class="form-group required">
					<label class="control-label">Paid By</label>
					<div class="controls">
						<select name="paidby" type="text" id="paidbyid">
							<option value="">Select</option>
							<?php foreach ($supportPaidConstants as $supportPaidConstant): ?>
							<option value="<?=$supportPaidConstant?>">
								<?php	echo $supportPaidConstant;?>
								<?php endforeach ?>
							</option>
						</select><span id="paidbyidError" style="color: red"></span>
					</div>
					</div>
				</div>

<?php $role = $_SESSION ['role'];?>
				<div class="control-group">
					<label class="control-label">Status</label>
					<div class="controls">
						<select name="status" id="selectInSupport" onchange="checkTheUserStatus('<?php echo $role?>','selectInSupport','supportCreate')" >
							<option value="">Select</option>
							<?php foreach ($supportConstants as $supportConstant): ?>
							<option value="<?=$supportConstant?>">
								<?php	echo $supportConstant;?>
								<?php endforeach ?>
							</option>
						</select>
						<span id="userBasedAllowedAndNotAllowed" style="display: none;color:red;">This seleted value is not allowed for this login user</span>
					</div>
				</div>




				<!--  <div class="control-group"> 
					    <label class="control-label">Created Date</label>
					    <div class="controls">
					      	<input name="createddate" type="date" placeholder="Created Date" value="<?php echo !empty($createddate)?$createddate:'';?>" required>
					      	
					    </div>
					  </div>
					  <div class="control-group"> 
					    <label class="control-label">Updated Date</label>
					    <div class="controls">
					      	<input name="updateddate" type="date"  placeholder="Updated Date" value="<?php echo !empty($updateddate)?$updateddate:'';?>" required>
					      
					    </div>
					  </div> -->

				<div class="control-group">
					<label class="control-label">Description</label>
					<div class="controls">
						<textarea name="description" type="text" placeholder="description"
							value="<?php echo !empty($description)?$description:'';?>">
					      	</textarea>
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-success" id="supportCreate">Create</button>
				<!-- 	<a class="btn" href="index.php">Back</a> -->
				</div>
			</form>
		</div>

	</div>
	<!-- /container -->
</body>
</html>