	<?php 
					header("Cache-Control: no-cache");
					$path = $_SERVER['DOCUMENT_ROOT'];
					$path .= "/layout/connection/GlobalCrud.php";
					include_once($path);
					function deleteRecord($idValue) {
									$sql = "todoDelete";
									$sqlValues = $idValue;
									GlobalCrud::delete($sql,$sqlValues);
									}

						  if (isset($_GET['id'])) {
						    deleteRecord($_GET['id']);
						  }
						  
						  function deleteRecord($idValue) {
						  	$sql = "technologyDelete";
						  	$sqlValues = $idValue;
						  	GlobalCrud::delete($sql,$sqlValues);
						  }
						  
						  if (isset($_GET['id'])) {
						  	deleteRecord($_GET['id']);
						  }
						  
					/* 	  
					function deleteRecord($idValue) {
						  	$sql = "traineeDelete";
						  	$sqlValues = $idValue;
						  	GlobalCrud::delete($sql,$sqlValues);
						  }
						  
						  if (isset($_GET['id'])) {
						  	deleteRecord($_GET['id']);
						  } */
						  
						  function deleteRecord($idValue) {
						  	$sql = "batchDelete";
						  	$sqlValues = $idValue;
						  	GlobalCrud::delete($sql,$sqlValues);
						  }
						  
						  if (isset($_GET['id'])) {
						  	deleteRecord($_GET['id']);
						  }
						  
 ?>