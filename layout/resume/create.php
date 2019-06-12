<?php 
	
	 $path = $_SERVER['DOCUMENT_ROOT'];
   	 $path .= "/layout/connection/GlobalCrud.php";
   	 include_once($path);

	if ( !empty($_POST)) {
		
		// keep track post values
		$traineeid = $_POST['traineeid'];
		$technologyid = $_POST['technologyid'];
		$createdby = $_POST['createdby'];
		$status = $_POST['status'];
		$attachment = $_POST['attachment'];
		$filename = $_POST['filename'];
		//$createdDate = $_POST['createddate'];
		//$updatedDate = $_POST['updatedDate'];
		$description = $_POST['description'];
		
		// validate input
		$valid = true;
	if (empty($traineeid)) {
			$valid = false;
		}
		
		if (empty($technologyid)) {
			$valid = false;
		}
		if (empty($createdby)) {
			$valid = false;
		}
		
		if (empty($status)) {
			$valid = false;
		}
		if (empty($attachment)) {
			$valid = false;
		}
		
	
	    

			
		// insert data
		if ($valid) {
			$sql = "resumeInsert";
            $sqlValues = array($traineeid,$technologyid,$createdby,$status,$attachment,$filename,$description);
						GlobalCrud::setData($sql,$sqlValues);
			header("Location:../?content=16");
		}
		else{
				
				header("Location:../?content=17");
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
		    			<h3>Create a resume</h3>
		    		</div>
    		
	    			<form class="form-horizontal" action="./resume/create.php" method="post" >
					   <div class="control-group <?php echo !empty($nameError)?'error':'';?>">
					    <label class="control-label">Trainee</label>
					    <div class="controls">
					      	<input name="trainee" type="text"  placeholder="trainee" value="<?php echo !empty($traineeid)?$traineeid:'';?>" required>
					      	
					    </div>
					  </div>
					  
					   
					  
					   <div class="control-group ">
					    <label class="control-label">Technology</label>
					    <div class="controls">
					      	<input name="technology" type="text"  placeholder="technology" value="<?php echo !empty($technology_id)?$technology_id:'';?>" required>
					      	
					    </div>
					  </div>
					   
					  
					  
					  
					  <div class="control-group ">
					    <label class="control-label">Created By</label>
					    <div class="controls">
					      	<input name="createdby" type="text" placeholder="createdby" value="<?php echo !empty($created_by)?$created_by:'';?>" required>
					      	
					    </div>
					  </div>
					  
					   <div class="control-group ">
					    <label class="control-label">Status</label>
					    <div class="controls">
					      	<input name="status" type="text" placeholder="status" value="<?php echo !empty($status)?$status:'';?>" required>
					      	
					    </div>
					  </div>
					  
					   <div class="control-group ">
					    <label class="control-label">Attachment</label>
					    <div class="controls">
					      	<input name="attachment" type="text" placeholder="attachment" value="<?php echo !empty($attachment)?$attachment:'';?>" required>
					      	
					    </div>
					  </div>
					  
					  <div class="control-group ">
					    <label class="control-label">File Name</label>
					    <div class="controls">
					      	<input name="filename" type="text" placeholder="filename" value="<?php echo !empty($filename)?$filename:'';?>" required>
					      	
					    </div>
					  </div>
					  
					  
					<!--   <div class="control-group ">
					    <label class="control-label">Created Date</label>
					    <div class="controls">
					      	<input name="createdDate" type="date"  placeholder="createdDate" value="<?php echo !empty($createdDate)?$createdDate:'';?>" required>
					      
					    </div>
					  </div>
					  
					  
					  
					  <div class="control-group ">
					    <label class="control-label">Updated Date</label>
					    <div class="controls">
					      	<input name="updatedDate" type="date"  placeholder="Updated Date" value="<?php echo !empty($updatedDate)?$updatedDate:'';?>" required>
					      
					    </div>
					  </div> -->

					   <div class="control-group ">
					    <label class="control-label">Description</label>
					    <div class="controls">
					      	<input name="description" type="text"  placeholder="Description" value="<?php echo !empty($description)?$description:'';?>">
					      	
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