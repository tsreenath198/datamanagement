<?php 

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once($path);
$data = GlobalCrud::getData('employeeSelect');
$constants = explode(',', GlobalCrud::getConstants("todoConstants"));
date_default_timezone_set("Asia/Kolkata");
if ( !empty($_POST)) {

	// keep track post values
	$category = $_POST['category'];
	$status = $_POST['status'];
	$assignedto=$_POST['assignedto'];
	$createdDate=date("Y/m/d");
	$estimatedtime = $_POST['estimatedtime'];
	$description=$_POST['description'];
$employeeName=$_POST['employeeName'];

	// validate input
	$valid = true;
	/* if (empty($category)) {
		$valid = false;
	}
	if (empty($status)) {
		$valid = false;
	} 
	if (empty($assignedto)) {
		$valid = false;
	}*/
	/* if (empty($estimatedtime)) {
		$valid = false;
	}
 */

	$toEmail = $_POST['employeeEmail'];
	$subject = "Regarding Newly Created Task";
		$body = "Hi,\n 
			Assigned To: ".$employeeName."\n"
					."Time Line: ".$estimatedtime."\n"
							."Description: ".$description."\n";

	// insert data
	if ($valid) {
		$sql = "todoInsert";
		$sqlValues = array($category,$status,$assignedto,$estimatedtime,$createdDate,$description);
		GlobalCrud::setData($sql,$sqlValues);
		GlobalCrud::sendEmail($toEmail,$subject,$body);
		header("Location:../?content=19");
	}
	else{

		header("Location:../?content=20");
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
	var assignedtoid =document.getElementById("assignedtoid").value;
	var descriptionid =document.getElementById("descriptionid").value;
	if(assignedtoid==0){
		
		document.getElementById("assignedtoidError").innerHTML="Employee Name Is Required";
		return false;
	}
if(descriptionid.length==0){
		
		document.getElementById("descriptiontoidError").innerHTML="Description Is Required";
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
				<h3>Create a Tasks</h3>
			</div>

			<form class="form-horizontal" action="./todo/create.php"
				method="post" onsubmit="return validate()">
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
							<option value="<?=$constant?>">
								<?php	echo $constant;?>
								<?php endforeach ?>
							</option>
						</select>
					</div>
				</div>



				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Employee Name</label>
						<div class="controls">
							<select name="assignedto" id="assignedtoid" onchange="getTheEmail('employee')">
								<option value="">Select</option>
								<?php foreach ($data as $row): ?>
								<option value="<?=$row['id']?>">
									<?php	echo $row ['name'];?>
									<?php endforeach ?>
								</option>
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

				<div class="control-group ">
<div class="form-group required">
					<label class="control-label">Description</label>
					<div class="controls">
						<textarea name="description" type="text" placeholder="description" id="descriptionid"
							value="<?php echo !empty($description)?$description:'';?>"></textarea>
					<input type="hidden" name="employeeEmail" id="employeeEmail" /><input type="hidden" name="employeeName" id="employeeName" /><span id="descriptiontoidError" style="color: red"></span>
					</div>
</div>
				</div>



				<div>
					<div class="form-actions">
						<button type="submit" class="btn btn-success">Create</button>
						<a class="btn" href="index.php">Back</a>
					</div>
				</div>
			</form>

		</div>

	</div>
	<!-- /container -->
</body>
</html>
