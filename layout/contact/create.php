<?php 
	
	 $path = $_SERVER['DOCUMENT_ROOT'];
   	 $path .= "/layout/connection/GlobalCrud.php";
   	 include_once($path);
   	 $dataClient = GlobalCrud::getData ( 'clientSelect' );
   	 date_default_timezone_set("Asia/Kolkata");
	if ( !empty($_POST)) {
		
		// keep track post values
		$clientid = $_POST['clientid'];
		$poc = $_POST['poc'];
        $email = $_POST['email'];
		$phone = $_POST['phone'];
		$createdDate = date("Y/m/d");
		//$updatedDate = $_POST['updatedDate'];
		$description = $_POST['description'];
		
		// validate input
		$valid = true;
		
		if (empty($clientid)) {
			$valid = false;
		}
		if (empty($poc)) {
			$valid = false;
		}
		if (empty($email)) {
			$valid = false;
		}
		if (empty($phone)) {
			$valid = false;
		}
		
		

			
		// insert data
		if ($valid) {
			$sql = "contactInsert";
			$sqlValues = array($clientid,$poc,$email,$phone,$createdDate,$description);
			GlobalCrud::setData($sql,$sqlValues);
			header("Location:../?content=43");
		}
		else{
				
				header("Location:../?content=44");
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
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
  </head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Create a contact</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="./contact/create.php" method="post" >
					  
					<div class="control-group">
					    <label class="control-label">Poc </label>
					    <div class="controls">*
					      	<input name="poc" type="text"  placeholder="poc" value="<?php echo !empty($poc)?$poc:'';?>" required>
					    
					    </div>
					  </div>
					  
					 <div class="control-group">
					<label class="control-label">Client</label>
					<div class="controls">
						<select name="clientid" type="text">
							<option value="0">Select</option>
                         	<?php foreach ($dataClient as $row): ?>
							<option value="<?=$row['id']?>"> <?php	echo $row ['name'];?>
							<?php endforeach ?>
 							</option>
						</select>
					</div>
				</div>
					  
					   
					   <div class="control-group">
					    <label class="control-label">Email</label>
					    <div class="controls">*
					      	<input name="email" type="email"  placeholder="email" value="<?php echo !empty($email)?$email:'';?>" required>
					    
					    </div>
					  </div>
					  
					   <div class="control-group">
					    <label class="control-label">Phone</label>
					    <div class="controls">*
					      	<input name="phone" type="tel"  maxlength="15" placeholder="Phone" 
					      	onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 43 || event.charCode == 45' 
					      	value="<?php echo !empty($phone)?$phone:'';?>" required>
					    
					    </div>
					  </div>
					  
					 
					  <!-- <div class="control-group">
					    <label class="control-label">Created Date</label>
					    <div class="controls">*
					      	<input name="createdDate" type="date" placeholder="Created Date" value="<?php echo !empty($createdDate)?$createdDate:'';?>" required>
					      	
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Updated Date</label>
					    <div class="controls">*
					      	<input name="updatedDate" type="date"  placeholder="Updated Date" value="<?php echo !empty($updatedDate)?$updatedDate:'';?>" required>
					      
					    </div>
					  </div> -->

					   <div class="control-group">
					    <label class="control-label">Description</label>
					    <div class="controls">*
					      	<textarea name="description" type="text"  placeholder="Description" value="<?php echo !empty($description)?$description:'';?>">
					      	</textarea>
					    </div>
					  </div>


					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Create</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>