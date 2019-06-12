<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
date_default_timezone_set ( "Asia/Kolkata" );
if (! empty ( $_POST )) {
	
	// keep track post values
	$name = $_POST ['name'];
	$address = $_POST ['address'];
	$createdDate = date ( "Y/m/d" );
	$poc = $_POST ['poc'] [0];
	$email = $_POST ['email'] [0];
	$phone = $_POST ['phone'] [0];
	$designation = $_POST ['designation'] [0];
	$description = $_POST ['description'];
	
	// validate input
	$valid = true;
	if (empty ( $name )) {
		$valid = false;
	}
	
	if (empty ( $address )) {
		$valid = false;
	}
	
	if (empty ( $poc )) {
		$valid = false;
	}
	if (empty ( $email )) {
		$valid = false;
	}
	if (empty ( $designation )) {
		$valid = false;
	}
	
	if (empty ( $phone )) {
		$valid = false;
	}
	
	// $clientid = $_POST['clientid'];
	
	// insert data
	if ($valid) {
		$sql = "clientInsert";
		$sqlValues = array (
				$name,
				$address,
				$createdDate,
				$description 
		);
		$clientid = GlobalCrud::setData ( $sql, $sqlValues );
		$sql = "contactInsert";
		for($i = 0; $i < count ( $_POST ['poc'] ); $i ++) {
			$poc = $_POST ['poc'] [$i];
			$email = $_POST ['email'] [$i];
			$phone = $_POST ['phone'] [$i];
			$designation = $_POST ['designation'] [$i];
			$sqlValues = array (
					$clientid,
					$poc,
					$email,
					$phone,
					$createdDate,
					$description,
					$designation 
			);
			GlobalCrud::setData ( $sql, $sqlValues );
		}
		header ( "Location:../?content=7" );
	} else {
		
		header ( "Location:../?content=8" );
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<script type="text/javascript">


</script>
</head>

<body>
	<div class="container">

		<div class="span10 offset1">
			<div class="row">
				<h3>Create a Client</h3>
			</div>

			<form class="form-horizontal" action="./client/create.php"
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
								onkeyup="validateUser('client')" required>
						</div>
					</div>
				</div>


				<div class="control-group">
					<div class="form-group required">
						<label class="control-label">Address</label>
						<div class="controls">
							<input name="address" type="text" placeholder="address"
								value="<?php echo !empty($address)?$address:'';?>" required>
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


				<div class="control-group">

					<div class="row">
						<h3>Add Contacts</h3>
					</div>
					<div class="form-group required">


						<table id="tab_logic">

							<thead>
								<tr>
									<th class="text-center"><label class="control-label">Name</label></th>
									<th class="text-center"><label class="control-label">Email</label></th>
									<th class="text-center"><label class="control-label">Designation</label></th>
									<th class="text-center"><label class="control-label">Phone</label></th>
									<th class="text-center">Add/Remove</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input type="text" name='poc[]' placeholder='poc'
										value="<?php echo !empty($poc)?$poc:'';?>"
										class="form-control" required="required" /></td>
									<td><input type="email" name='email[]' placeholder='email'
										value="<?php echo !empty($email)?$email:'';?>"
										class="form-control" required="required" /></td>

									<td><input type="text" name='designation[]'
										placeholder='designation'
										value="<?php echo !empty($designation)?$designation:'';?>"
										class="form-control" required="required" /></td>
									<td><input type="text" name='phone[]' placeholder='phone'
										maxlength="15" value="<?php echo !empty($phone)?$phone:'';?>"
										onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45'
										class="form-control" required="required" /></td>
									<td><a id="add_row">&nbsp;<i class="fa fa-plus-square"></i></a></td>
								</tr>
								<tr id='addr1'></tr>
							</tbody>
						</table>



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
