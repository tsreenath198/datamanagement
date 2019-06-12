<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
date_default_timezone_set("Asia/Kolkata");
$roleConstants = explode(',', GlobalCrud::getConstants("userRolesConstants"));
if (! empty ( $_POST )) {
	
	// keep track post values
	
	/* username
	firstname
	lastname
	email
	phoneno
	password
	role
	description */
	
	
	
	$username = $_POST ['name'];
	$firstname = $_POST ['fname'];
	$lastname = $_POST ['lname'];
	$email = $_POST ['email'];
	$phoneno = $_POST ['phone'];
	$password = $_POST ['password'];
	$role = $_POST ['role'];
	$description = $_POST ['description'];
	
	// validate input
	$valid = true;
	if (empty ( $username )) {
		$valid = false;
	}
	if (empty ( $firstname )) {
		$valid = false;
	}
	if (empty ( $lastname )) {
		$valid = false;
	}
	if (empty ( $email )) {
		$valid = false;
	}
	if (empty ( $phoneno )) {
		$valid = false;
	}
	
	if (empty ( $password )) {
		$valid = false;
	}
	if (empty ( $role )) {
		$valid = false;
	}
	
	// insert data
	if ($valid) {
		$sql = "userInsert";
		$sqlValues = array ($username,$firstname,$lastname,$email,$phoneno,$password,$role,$description);
		GlobalCrud::setData ( $sql, $sqlValues );
		header ( "Location:../?content=44" );
	} else {
		
		header ( "Location:../?content=45" );
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
	var role =document.getElementById("role").value;
	if(role == ""){
		
		document.getElementById("roleError").innerHTML="Role Is Required";
		return false;
	}
}
</script>
</head>

<body>
	<div class="container">

		<div class="span10 offset1">
			<div class="row">
				<h3>Create a User</h3>
			</div>

			<form class="form-horizontal" action="./registration/create.php"
				method="post" onsubmit="return validate()" >
				<div class="form-actions1">
					<span id="createMessage" style="color: red; display: none">Dulpicate
						Entry Is Not Allowed</span>
						<span id="createCMessage" style="color: red; display: none">
						Password And Conform Password Does Not Match
						</span>
				</div>

				<div
					class="control-group <?php echo !empty($fnameError)?'error':'';?>">
					<div class="form-group required">
						<label class="control-label">First Name</label>
						<div class="controls">
							<input name="fname" id="fname" type="text" placeholder="First Name"
								value="<?php echo !empty($fname)?$fname:'';?>"	required>

						</div>
					</div>
				</div>
				
				<div
					class="control-group <?php echo !empty($lnameError)?'error':'';?>">
					<div class="form-group required">
						<label class="control-label">Last Name</label>
						<div class="controls">
							<input name="lname" id="lname" type="text" placeholder="Last Name"
								value="<?php echo !empty($lname)?$lname:'';?>"
								 required>

						</div>
					</div>
				</div>
				
				
				<div
					class="control-group <?php echo !empty($emailError)?'error':'';?>">
					<div class="form-group required">
						<label class="control-label">Email </label>
						<div class="controls">
							<input name="email" id="email" type="email" placeholder="Email"
								value="<?php echo !empty($email)?$email:'';?>"
								 required>

						</div>
					</div>
				</div>
				
				
				<div
					class="control-group <?php echo !empty($phoneError)?'error':'';?>">
					<div class="form-group required">
						<label class="control-label">Phone No</label>
						<div class="controls">
							<input name="phone" id="phone" type="tel" placeholder=""
								value="<?php echo !empty($phone)?$phone:'';?>"  maxlength="15" onkeypress="return event.charCode >= 48 &amp;&amp; event.charCode <= 57 || event.charCode == 43 || event.charCode == 45"
								 required>

						</div>
					</div>
				</div>
				
				
				
				
				<div
					class="control-group <?php echo !empty($userNameError)?'error':'';?>">
					<div class="form-group required">
						<label class="control-label">Username</label>
						<div class="controls">
							<input name="name" id="name" type="text" placeholder="Username"
								value=""
								onkeyup="validateUserCreds('user_creds')" required>

						</div>
					</div>
				</div>
				
				<div
					class="control-group <?php echo !empty($passwordError)?'error':'';?>">
					<div class="form-group required">
						<label class="control-label">Password</label>
						<div class="controls">
							<input name="password" id="password" type="text" placeholder="Password"
								value="<?php echo !empty($password)?$password:'';?>" onBlur="checkPasswordAndConform()"
								 required>

						</div>
					</div>
				</div>
				
				<div
					class="control-group <?php echo !empty($passwordConformError)?'error':'';?>">
					<div class="form-group required">
						<label class="control-label">Conform Password</label>
						<div class="controls">
							<input name="conformPassword" id="conformPassword" type="text" placeholder="Conform Password"
								value="<?php echo !empty($conformPassword)?$conformPassword:'';?>" onBlur="checkPasswordAndConform()"
								 required>

						</div>
					</div>
				</div>
				
				
				
				<div
					class="control-group <?php echo !empty($roleError)?'error':'';?>">
					<div class="form-group required">
						<label class="control-label">Role</label>
					
						
						<div class="controls">
						<select name="role" id="role">
							<option value="">Select</option>
							<?php foreach ($roleConstants as $roleConstant): ?>
							<option value="<?=$roleConstant?>">
								<?php	echo $roleConstant;?>
								<?php endforeach ?>
							</option>
						</select><span id="roleError" style="color: red"></span>
						</div>
						
						
						
					</div>
				</div>
				
				<div
					class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
					<label class="control-label">Description</label>
					<div class="controls">
						<textarea name="description"  placeholder="Description"
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
