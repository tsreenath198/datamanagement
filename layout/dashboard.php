<!DOCTYPE html>
<html>
<head profile="http://www.w3.org/2005/10/profile">
<title>Usk Tool</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="./css/bootstrap.min.css" rel="stylesheet">

<link href=".css/asterisk.css" rel="stylesheet" type="text/css" />
<link href="./css/fa/css/font-awesome.min.css" rel="stylesheet"
	type="text/css" />
<link href="./css/foot/footable-0.1.css" rel="stylesheet"
	type="text/css" />
<link href="./css/foot/footable.sortable-0.1.css" rel="stylesheet"
	type="text/css" />

<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"
	type="text/javascript"></script>
<script src="./js/foot/footable-0.1.js" type="text/javascript"></script>
<script src="./js/foot/footable.sortable.js" type="text/javascript"></script>
<script src="./js/foot/footable.filter.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
      $('table').footable(



    	      );
    });

   
    
  </script>
<style type="text/css">
                	
  .footable {
	border-spacing: 0;
	width: 100%;
	border: solid #ccc 1px;
	-moz-border-radius: 6px;
	-webkit-border-radius: 6px;
	border-radius: 6px;
	font-family: 'trebuchet MS', 'Lucida sans', Arial;
	font-size: 14px;
	color: #444;
	
}
  .footable>tbody {
    height: 3px;       /* Just for the demo          */
    overflow-y: auto;    /* Trigger vertical scroll    */
    overflow-x: hidden;  /* Hide the horizontal scroll */
}          	
           
           
    	
   
#dashboard {
	width: 100%;
	height: auto;
	top: 30px;
	left: -15px;
	padding: 10px;
}

#dashboard .A {
	width: 50%;
	height: 50%;
	float: left;
	padding: 10px;
}

#dashboard .B {
	width: 50%;
	height: 50%;
	float: left;
	padding: 10px;
}

#dashboard .C {
	width: 50%;
	height: 50%;
	float: left;
	padding: 10px;
}

#dashboard .D {
	width: 50%;
	height: 50%;
	float: left;
	padding: 10px;
}

#dashboard .E {
	width: 50%;
	height: 50%;
	float: left;
	padding: 10px;
}


#dashboard, #dashboard>div {
	-webkit-box-sixing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}
.title{
text-align: right;
padding-right: 20px;
}
</style>

</head>
<body>
	<!-- Begin Wrapper -->
	<div class="container-fluid">
		<h2>
			 <img src="./img/logo.gif" align="left"
				width="100px"> <p class="title"> Data Management Tool</p>
		</h2>
		<div id="dropdown" class="title">
		Select :<select>
		<option>One</option>
		</select>
		</div>
		<div id="dashboard">

			<div class='A' id="none" data-panel_type="none">
				<h3>Payment Pending</h3>
				<table data-filter="#filter" class="footable">
					<thead>
						<tr>
							<th>Candidate Name</th>
							<th>Client Name</th>
							<th>Category</th>
							<th>Assisted By</th>


						</tr>
					</thead>
					<tbody>
						
					<?php
					error_reporting ( 0 );
					$path = $_SERVER['DOCUMENT_ROOT'];
					$path .= "/layout/connection/GlobalCrud.php";
					include_once($path);
					$count=0;
					$data = GlobalCrud::getData('paymentPendingSelect');
					foreach ($data as $row) {
						echo '<tr>';
						echo '<td>'. $row['name'] . '</td>';
						echo '<td>'. $row['client'] . '</td>';
						echo '<td>'. $row['category'] . '</td>';
						echo '<td>'. $row['assistedBy'] . '</td>';
						echo '</tr>';
						$count++;
					}?>
					</tbody>
				</table>
			</div>
			<h3>Batch</h3>
			<div class='B' id="none" data-panel_type="none">

				<table data-filter="#filter" class="footable">
					<thead>
						<tr>

							<th>Batch Id</th>
							<th>Number Of Students</th>
							<th>Trainer</th>
							<th>Technology</th>
						</tr>

					</thead>
					<tbody>
						<tr>
							<td>Batch Id</td>
							<td>Number Of Students</td>
							<td>Trainer</td>
							<td>Technology</td>
						</tr>

					</tbody>
				</table>
			</div>
			<div class='C' id="none" data-panel_type="none">
				<h3>Support</h3>
				<table data-filter="#filter" class="footable">
					<thead>
						<tr>
							<th>Supported By</th>
							<th>Supported To</th>
							<th>Start Date</th>
							<th>Technology</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Supported By</td>
							<td>Supported To</td>
							<td>Start Date</td>
							<td>Technology</td>
						</tr>

					</tbody>
				</table>

			</div>
			<div class='D' id="none" data-panel_type="none">
				<h3>Closed Trasactions</h3>
				<table data-filter="#filter" class="footable">
					<thead>
						<tr>
							<th>Client Name</th>
							<th>Training Count</th>
							<th>Support Count</th>
							<th>Interview Count</th>


						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Client Name</td>
							<td>Training Count</td>
							<td>Support Count</td>
							<td>Interview Count</td>
						</tr>
					</tbody>
				</table>
			</div>
		<div class='E' id="none" data-panel_type="none" >
			<h3>Support</h3>
			<table data-filter="#filter" class="footable">
				<thead>
					<tr>
						<th>Supported By</th>
						<th>Supported To</th>
						<th>Start Date</th>
						<th>Technology</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Supported By</td>
						<td>Supported To</td>
						<td>Start Date</td>
						<td>Technology</td>
					</tr>

				</tbody>
			</table>

		</div>
		



	</div>

<!-- 
SELECT tr.name as 'Name' , cl.name AS client ,"SUPPORT" as "category" ,"" AS "assistedBy" FROM support s , trainee tr ,client cl where s.status ='3 - Payment Pending' AND s.trainee_id=tr.id  AND cl.id = tr.client_id   
UNION
SELECT tr.name as 'Name' ,cl.name AS client ,"INTERVIEW" as "category" ,"" AS "assistedBy" FROM interview i, trainee tr,client cl where  i.status ='5 - Payment Pending' AND i.trainee_id=tr.id  AND cl.id = tr.client_id
UNION
SELECT tr.name as 'Name',cl.name AS client ,"Training" as "category" ,"" AS "assistedBy" From trainee tr , batch b ,client cl where cl.id= tr.client_id AND b.id = tr.batch_id AND b.status IN (SELECT status from batch b where b.status = '3 - Payment Pending') 



-->
	</div>
	<!-- Begin Content -->
</body>
</html>