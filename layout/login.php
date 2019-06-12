<?php
error_reporting(0);
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";
include_once ($path);

if (! empty ( $_POST )) {
	$username = $_POST ["username"];
	$password = $_POST ["password"];
	
	$valid = true;
	
	if (empty ( $username )) {
		$valid = false;
	}
	
	if (empty ( $password )) {
		$valid = false;
	}
	
	if ($valid) {
		$sql = "usercredsselect";
		$sqlValues = array (
				$username,
				$password 
		);
		$data = GlobalCrud::selectById ( $sql, $sqlValues );
		
		if ($data ['username'] == $username) {
			session_start();
			$_SESSION['username'] = $data ['username'];
			$_SESSION['role'] = $data ['role'];
			header ( "Location:./index.php" );
		} else {
			header ( "Location:./login.php" );
		}
	}
}

?>
<html>
<head>
<meta charset="utf-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">

		<form class="form-login" action="./login.php" method="post">
			<div class="control-group">
				<div class="form-group required">
					<label class="control-label">User Name</label>
					<div class="controls">
						<input name="username" type="text" placeholder="username"
							value="<?php echo !empty($username)?$username:'';?>" required>
					</div>
				</div>
			</div>


			<div class="control-group">
				<div class="form-group required">
					<label class="control-label">Password</label>
					<div class="controls">
						<input name="password" type="password" placeholder="password"
							value="<?php echo !empty($password)?$password:'';?>" required>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</form>
	</div>

</body>
</html>
