<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
$technologyData = GlobalCrud::getData ( 'technologySelect' );
$employeeData = GlobalCrud::getData ( 'employeeSelect' );
$id = null;
date_default_timezone_set("Asia/Kolkata");
if (! empty ( $_GET ['id'] )) {
	$id = $_REQUEST ['id'];
}

if (null == $id) {
	header ( "Location: index.php?content=4" );
}

if (! empty ( $_POST )) {
	$name = $_POST ['name'];
	$technologyid = $_POST ['supportedby'];
	$referredbyid = $_POST ['referredby'];
	$phone = $_POST ['phone'];
	$email = $_POST ['email'];
	// $createdDate = $_POST['createdDate'];
	$updatedDate = date ( "Y/m/d" );
	$description = $_POST ['description'];
	
	// validate input
	$valid = true;
	$valid = true;
	if (empty ( $name )) {
		$valid = false;
	}
	
	if (empty ( $technologyid )) {
		$valid = false;
	}
	
	if (empty ( $phone )) {
		$valid = false;
	}
	
	if (empty ( $email )) {
		$valid = false;
	}
	
	// update data
	if ($valid) {
		$sql = "trainerUpdate";
		$sqlValuesForUpdate = array (
				$name,
				$referredbyid,
				$technologyid,
				$phone,
				$email,
				$updatedDate,
				$description,
				$id 
		);
		GlobalCrud::update ( $sql, $sqlValuesForUpdate );
		
		header ( "Location:../?content=4" );
	}
} 

else {
	$sql = "trainerSelectById";
	$sqlValues = array (
			$id 
	);
	$data = GlobalCrud::selectById ( $sql, $sqlValues );
	$name = $data ['name'];
	$technologyid = $data ['technology_id'];
	$referredbyid= $data ['referred_by'];
	$phone = $data ['phone'];
	$email = $data ['email'];
	$description = $data ['description'];
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
	if(supportedbyid==0){
		document.getElementById("supportedbyidError").innerHTML="technology Is Required";
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
				<h3>Update a Trainer</h3>
			</div>

			<form class="form-horizontal"
				action="./trainer/update.php?id=<?php echo $id?>" method="post"
				onsubmit="return validate()">
				<div class="form-actions1">
					<span id="createMessage" style="color: red; display: none">Dulpicate
						Entry Is Not Allowed</span>
				</div>
				<div class="control-group">
					<div class="form-group required">
						<label class="control-label"> Trainer Name</label>
						<div class="controls">
							<input name="name" id="name" type="text" placeholder="name"
								value="<?php echo !empty($name)?$name:'';?>"
								onkeyup="validateUser('trainer')" required>
						</div>
					</div>
				</div>



				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Technology Name</label>
						<div class="controls">
							<select name="supportedby" id="supportedbyid">
								<option value="0">Select a technology</option>
							<?php foreach ($technologyData as $row): ?>
							<option <?php if($row['id'] == $technologyid) {  ?>
									selected="selected" value="<?=$row['id']?>">
								<?php }else {?>
								value="<?=$row['id']?>">
								<?php
								}
								echo $row ['name'];
								?>
							</option>

							<?php endforeach ?>
							</option>
							</select><span id="supportedbyidError" style="color: red"></span>
						</div>
					</div>
				</div>
				
				
				
				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Referred By</label>
						<div class="controls">
							<select name="referredby" id="referredbyid">
								<option value="0">Select a employee</option>
							<?php foreach ($employeeData as $row): ?>
							<option <?php if($row['id'] == $referredbyid) {  ?>
									selected="selected" value="<?=$row['id']?>">
								<?php }else {?>
								value="<?=$row['id']?>">
								<?php
								}
								echo $row ['name'];
								?>
							</option>

							<?php endforeach ?>
							</option>
							</select><span id="referredbyidError" style="color: red"></span>
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
					<div class="form-group required">
						<label class="control-label">Email</label>
						<div class="controls">
							<input name="email" type="email" placeholder="Email"
								value="<?php echo !empty($email)?$email:'';?>" required>
						</div>
					</div>
				</div>


				<!--  <div class="control-group">
					    <label class="control-label">Created Date</label>
					    <div class="controls">
					      	<input name="createdDate" type="date" placeholder="Created Date" value="<?php echo !empty($createdDate)?$createdDate:'';?>" required>
					      	
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Updated Date</label>
					    <div class="controls">
					      	<input name="updatedDate" type="date"  placeholder="Updated Date" value="<?php echo !empty($updatedDate)?$updatedDate:'';?>" required>
					      
					    </div>
					  </div>  -->

				<div class="control-group">
					<label class="control-label">Description</label>
					<div class="controls">
						<textarea name="description" type="text">
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
