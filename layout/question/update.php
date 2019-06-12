<?php 

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once($path);
$interviewData = GlobalCrud::getData('interviewSelect');
date_default_timezone_set("Asia/Kolkata");
$id = null;
if ( !empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if ( null==$id ) {
	header("Location: index.php?content=34");
}

if ( !empty($_POST)) {

	$interviewid = $_POST['interviewid'];
	$question = $_POST['question'];
	$answers=$_POST['answers'];
	//$created_date = $_POST['created_date'];
	$updatedDate = date("Y/m/d");
	$description = $_POST['description'];
	// validate input
	$valid = true;

	if (empty($interviewid)) {
		$valid = false;
	}
	if (empty($question)) {
		$valid = false;
	}



	// update data
	if ($valid) {
		$sql = "questionUpdate";
		$sqlValuesForUpdate = array($interviewid,$question,$answers,$updatedDate,$description,$id);
		GlobalCrud::update($sql,$sqlValuesForUpdate);

		header("Location:../?content=34");
	}
}

else {
	$sql = "questionSelectById";
	$sqlValues = array($id);
	$data = GlobalCrud::selectById($sql,$sqlValues);
	$interviewid = $data['interview_id'];
	$question = $data['question'];
	$answers= $data['answers'];
	//$created_date = $data['created_date'];
	//$updateddate = $data['updateddate'];
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
	var interviewid =document.getElementById("interviewid").value;
	
	if(interviewid==0){
		
		document.getElementById("interviewidError").innerHTML="End Client Is Required";
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
				<h3>Update a Question</h3>
			</div>

			<form class="form-horizontal"
				action="./question/update.php?id=<?php echo $id?>" method="post"  onsubmit="return validate()">

				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">End Cilent</label>
						<div class="controls">
							<select name="interviewid" id="interviewid">
								<option value="0">Select</option>
								<?php foreach ($interviewData as $row): ?>
								<option <?php if($row['id'] == $interviewid) {  ?>
									selected="selected" value="<?=$row['id']?>" requried>
									<?php
								}else { ?>
								value="<?=$row['id']?>" >
									<?php
							}echo $row ['interviewer'];?>
							</option><?php endforeach ?>
							</select><span id="interviewidError" style="color: red"></span>
						</div>
					</div>
				</div>

				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Question</label>

						<div class="controls">
							<input name="question" type="text" placeholder="question"
								value="<?php echo !empty($question)?$question:'';?>" required>
						</div>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Answers</label>
					<div class="controls">
						<input name="answers" type="text" placeholder="answers"
							value="<?php echo !empty($answers)?$answers:'';?>">

					</div>
				</div>

				<!--    <div class="control-group"> 
					    <label class="control-label">Created Date</label>
					    <div class="controls">
					      	<input name="createdDate" type="text"  placeholder="created Date" value="<?php echo !empty($createddate)?$createddate:'';?>" required>
					    
					    </div>
					  </div>
					  
					  <div class="control-group"> 
					    <label class="control-label">Updated Date</label>
					    <div class="controls">
					      	<input name="updatedDate" type="text"  placeholder="Updated Date" value="<?php echo !empty($updateddate)?$updateddate:'';?>" required>
					    
					    </div>
					  </div>-->

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
