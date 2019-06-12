<?php
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);
date_default_timezone_set("Asia/Kolkata");
if (! empty ( $_POST )) {
	
	// keep track post values
	$name = $_POST ['name'];
	$createdDate = date ( "Y/m/d" );
	// $updatedDate = $_POST['updatedDate'];
	$description = $_POST ['description'];
	
	// validate input
	$valid = true;
	if (empty ( $name )) {
		$valid = false;
	}
	
	// insert data
	if ($valid) {
		$sql = "technologyInsert";
		$sqlValues = array (
				$name,
				$createdDate,
				$description 
		);
		GlobalCrud::setData ( $sql, $sqlValues );
		header ( "Location:../?content=1" );
	} else {
		
		header ( "Location:../?content=2" );
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
</head>

<body>
	<div class="container">

		<div class="span10 offset1">
			<div class="row">
				<h3>Create a Technology</h3>
			</div>

			<form class="form-horizontal" action="./technology/create.php"
				method="post">
				<div class="form-actions1">
					<span id="createMessage" style="color: red; display: none">Dulpicate
						Entry Is Not Allowed</span>
				</div>

				<div
					class="control-group <?php echo !empty($nameError)?'error':'';?>">
					<div class="form-group required">
						<label class="control-label">Technology Name</label>
						<div class="controls">
							<input name="name" id="name" type="text" placeholder="name"
								value="<?php echo !empty($name)?$name:'';?>"
								onkeyup="validateUser('technology')" required>

						</div>
					</div>
				</div>
				<div
					class="control-group <?php echo !empty($descriptionError)?'error':'';?>">
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
