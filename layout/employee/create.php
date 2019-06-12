<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
date_default_timezone_set("Asia/Kolkata");
$constants = explode ( ',', GlobalCrud::getConstants ( "roleConstants" ) );
if (! empty ( $_POST )) {
	
	// keep track post values
	$name = $_POST ['name'];
	$phone = $_POST ['phone'];
	$email = $_POST ['email'];
	$role = $_POST ['role'];
	//$basesalary = $_POST ['basesalary'];
	$createdDate = date ( "Y/m/d" );
	// $updatedDate = $_POST ['updatedDate'];
	$description = $_POST ['description'];
	
	// validate input
	$valid = true;
	if (empty ( $name )) {
		$valid = false;
	}
	/* if (empty ( $phone )) {
		$valid = false;
	}
	 */if (empty ( $email )) {
		$valid = false;
	}
	/* if (empty ( $role )) {
		$valid = false;
	} */
	/* if (empty ( $basesalary )) {
		$valid = false;
	} */
	
	// insert data
	if ($valid) {
		$sql = "employeeInsert";
		$sqlValues = array (
				$name,
				$phone,
				$email,
				$role,
				$basesalary,
				$createdDate,
				$description 
		);
		GlobalCrud::setData ( $sql, $sqlValues );
		header ( "Location:../?content=13" );
	} else {
		
		header ( "Location:../?content=14" );
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
<style>
.red {
	color: red;
}
</style>



</head>

<body>
	<div class="container">

		<div class="span10 offset1">
			<div class="row">
				<h3>Create a Employee</h3>
			</div>

			<form class="form-horizontal" action="./employee/create.php"
				method="post">
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
								onkeyup="validateUser('employee')"  required>
					</div>
					</div>
				</div>

				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Phone</label>
						<div class="controls">
								<input type="tel" name="phone" maxlength="10" placeholder="phone"  maxlength="15"
								onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45'
								value="<?php echo !empty($phone)?$phone:'';?>" required>
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

				<!-- <div class="control-group">
					<label class="control-label">Role</label>
					<div class="controls">
						<i class="icon-asterisk"></i> <input name="role" type="text" placeholder="role"
							value="<?php echo !empty($role)?$role:'';?>" required>

					</div>
				</div>-->

				<div class="control-group ">
					<label class="control-label">Role</label>
					<div class="controls">
						<select name="role">
							<option value="">Select</option>
							 <?php foreach ($constants as $constant): ?>
						<option  value="<?=$constant?>"> <?php	echo $constant;?>
						<?php endforeach ?>
						</select>
					</div>
				</div>

				<!-- <div class="control-group">
					<label class="control-label">Base salary</label>
					<div class="controls">
						<input name="basesalary" type="text" placeholder="base salary"
							value="<?php echo !empty($basesalary)?$basesalary:'';?>" >

					</div>
				</div> -->


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
					<a class="btn" href="index.php">Back</a>
				</div>
			</form>
		</div>

	</div>
	<!-- /container -->
</body>
</html>