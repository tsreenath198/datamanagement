<?php 
	
	 $path = $_SERVER['DOCUMENT_ROOT'];
   	 $path .= "/layout/connection/GlobalCrud.php";
   	 include_once($path);
   	 $selectedData = GlobalCrud::getData('technologySelect');
   	 date_default_timezone_set("Asia/Kolkata");
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php?content=25");
	}
	
	if ( !empty($_POST)) {

		$technologyid = $_POST['technologyid'];
		$name = $_POST['name'];
		$esthrs = $_POST['esthrs'];
		//$createdDate = $_POST['createdDate'];
		$updatedDate = date("Y/m/d");
		$description = $_POST['description'];
		
		// validate input
		$valid = true;
		if (empty($technologyid)) {
			$valid = false;
		}
		/* if (empty($name)) {
			$valid = false;
		}
		if (empty($esthrs)) {
			$valid = false;
		}
		 */
		
		// update data
		if ($valid) {
			$sql = "courseUpdate";
			$sqlValuesForUpdate = array($technologyid,$name,$esthrs,$updatedDate,$description,$id);
			GlobalCrud::update($sql,$sqlValuesForUpdate);

			header("Location:../?content=25");
		}
		} 

		else {
				$sql = "courseSelectById";
				$sqlValues = array($id);
				$data = GlobalCrud::selectById($sql,$sqlValues);
				$technologyid = $data['technology_id'];
		        $name = $data['name'];
		       $esthrs = $data['est_hrs'];
		      // $createdDate = $data['created_date'];
		       //$updatedDate = $data['updated_date'];
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
	var technologyid =document.getElementById("technologyid").value;
	
	 if(technologyid==0){
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
				<h3>Update a Course</h3>
			</div>

			<form class="form-horizontal"
				action="./course/update.php?id=<?php echo $id?>" method="post" onsubmit="return validate()"> 

				<!-- <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					    <label class="control-label">Technology</label>
					    <div class="controls">
					      	<input name="technologyid" type="text"  placeholder="Technology" value="<?php echo !empty($technologyid)?$technologyid:'';?>" required>
					      	
					    </div>
					  </div>-->


				<div class="control-group">
				<div class="form-group required">
					<label class="control-label">Technology</label>
					<div class="controls">
						<select name="technologyid" id="technologyid">
							<option value="0">Select</option>
                          <?php foreach ($selectedData as $row): ?>
						<option <?php if($row['id'] == $technologyid) {  ?>
								selected="selected" value="<?=$row['id']?>"> <?php
							}
							else {
								?> value="<?=$row['id']?>" > <?php
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
					<label class="control-label">Name</label>
					<div class="form-actions1">
					<span id="createMessage" style="color: red; display: none">Dulpicate
						Entry Is Not Allowed</span>
				</div>
					<div class="controls">
						<input name="name" id="name" type="text" placeholder="name"
								value="<?php echo !empty($name)?$name:'';?>"
								onkeyup="validateUser('course')"  >

					</div>
				</div>


				<div class="control-group ">
					<label class="control-label">Estimated Hours </label>
					<div class="controls">
						<input name="esthrs" type="text" placeholder="esthrs"
							value="<?php echo !empty($esthrs)?$esthrs:'';?>">

					</div>
				</div>



				<div class="control-group ">
					<label class="control-label">Description</label>
					<div class="controls">
						<textarea name="description" type="text" placeholder="description" >
							<?php echo !empty($description)?$description:'';?>
					      	</textarea>
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-success" id="update">Update</button>
					<a class="btn" href="index.php">Back</a>
				</div>
			</form>
		</div>

	</div>
	<!-- /container -->
</body>
</html>