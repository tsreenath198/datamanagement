<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
date_default_timezone_set ( "Asia/Kolkata" );
$id = null;
if (! empty ( $_GET ['id'] )) {
	$id = $_REQUEST ['id'];
}

if (null == $id) {
	header ( "Location: index.php?content=7" );
}

if (! empty ( $_POST )) {
	
	$name = $_POST ['name'];
	$address = $_POST ['address'];
	$createdDate = date ( "Y/m/d" );
	$updatedDate = date ( "Y/m/d" );
	$description = $_POST ['description'];
	
	// validate input
	$valid = true;
	if (empty ( $name )) {
		$valid = false;
	}
	
	if (empty ( $address )) {
		$valid = false;
	}
	
	// update data
	if ($valid) {
		$sql = "clientUpdate";
		$sqlValuesForUpdate = array (
				$name,
				$address,
				$updatedDate,
				$description,
				$id 
		);
		GlobalCrud::update ( $sql, $sqlValuesForUpdate );
		// deleteRecords
		$deleteRecords = $_POST ['deleteRecords'];
		if ($deleteRecords != '') {
			$myArray = explode ( ',', $deleteRecords );
			for($j = 0; $j < count ( $myArray ); $j ++) {
				$sqlContactDelete = "contactDelete";
				$sqlContactDeleteValues = $myArray [$j];
				GlobalCrud::delete ( $sqlContactDelete, $sqlContactDeleteValues );
			}
		}
		$sqlContactInsert = "contactInsert";
		$sqlContactUpdate = "contactUpdate";
		
		for($i = 0; $i < count ( $_POST ['poc'] ); $i ++) {
			$contactId = $_POST ['contactId'] [$i];
			$poc = $_POST ['poc'] [$i];
			$email = $_POST ['email'] [$i];
			$phone = $_POST ['phone'] [$i];
			$designation = $_POST ['designation'] [$i];
			$clientid = $id;
			
			if ($contactId == 0) {
				$sqlValues = array (
						$clientid,
						$poc,
						$email,
						$phone,
						$createdDate,
						$description,
						$designation
				);
				GlobalCrud::setData ( $sqlContactInsert, $sqlValues );
			} elseif ($contactId != 0) {
				$sqlValuesContactUpdate = array (
						$clientid,
						$poc,
						$email,
						$phone,
						$updatedDate,
						$description,
						$designation,
						$contactId 
				);
				GlobalCrud::update ( $sqlContactUpdate, $sqlValuesContactUpdate );
			}
		}
		
		header ( "Location:../?content=7" );
	}
} 

else {
	$sql = "clientSelectById";
	$sqlValues = array (
			$id 
	);
	$data = GlobalCrud::selectById ( $sql, $sqlValues );
	$name = $data ['name'];
	$address = $data ['address'];
	$description = $data ['description'];
	
	$sqlContact = "contactSelectById";
	$sqlValuesContact = array (
			$id 
	);
	$dataContact = GlobalCrud::getAllRecordsBasedOnId ( $sqlContact, $sqlValuesContact );
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">

		<div class="span10 offset1">
			<div class="row">
				<h3>Update a Client</h3>
			</div>

			<form class="form-horizontal"
				action="./client/update.php?id=<?php echo $id?>" method="post">
				<div class="form-actions1">
					<span id="createMessage" style="color: red; display: none">Dulpicate
						Entry Is Not Allowed</span>
				</div>
				<div
					class="control-group <?php echo !empty($nameError)?'error':'';?>">
					<label class="control-label">Name</label>
					<div class="controls">
						<input name="name" id="name" type="text" placeholder="name"
							value="<?php echo !empty($name)?$name:'';?>"
							onkeyup="validateUser('client')" required>

					</div>
				</div>



				<div class="control-group ">
					<label class="control-label">Address</label>
					<div class="controls">
						<input name="address" type="text" placeholder="address"
							value="<?php echo !empty($address)?$address:'';?>" required>

					</div>
				</div>

				<div class="control-group ">
					<label class="control-label">Description</label>
					<div class="controls">
						<textarea name="description" type="text" placeholder="Description"><?php echo !empty($description)?$description:'';?></textarea>
					</div>
				</div>


				<div class="control-group">

					<div class="row">
						<h3>Update Contact</h3>
					</div>
					<div class="form-group required">
						<table id="tab_logic">

							<thead>
								<tr>
									<th class="text-center">Name</th>
									<th class="text-center">Email</th>
									<th class="text-center">Designation</th>
									<th class="text-center">Phone</th>
									<th class="text-center">Add/Remove</th>
								</tr>
							</thead>
							<tbody>
				<?php
				$mainValue = 1;
				foreach ( $dataContact as $row ) {
					?>
				<tr>

									<td><input type="hidden" name='contactId[]'
										value="<?php echo $row['id']; ?>" class="form-control" /> <input
										type="text" name='poc[]' placeholder='poc'
										value="<?php echo $row['poc']; ?>" class="form-control"
										required="required" /></td>
									<td><input type="email" name='email[]' placeholder='email'
										value="<?php echo $row['email']; ?>" class="form-control"
										required="required" /></td>

									<td><input type="text" name='designation[]'
										placeholder='designation'
										value="<?php echo $row['designation']; ?>"
										class="form-control" required="required" /></td>


									<td><input type="text" name='phone[]' placeholder='phone'
										maxlength="15"
										onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45'
										value="<?php echo $row['phone']; ?>" class="form-control"
										required="required" /></td>
										<?php if($mainValue == 1){?>
										<td><a id="add_row">&nbsp;<i class="fa fa-plus-square"></i></a></td>
							<?php
					
} else {
						?><td><a onClick="delRow(<?php echo $row['id']; ?>)">&nbsp;<i
											class="fa fa-minus-square"></i></a></td>
							<?php }?>
								</tr>
					<?php
					$mainValue ++;
				}
				?>
                    <tr id='addr1'></tr>
							</tbody>
						</table>

						<input type="hidden" name="deleteRecords" id="deleteRecords" />

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
