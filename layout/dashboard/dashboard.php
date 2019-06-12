<?php
error_reporting ( 0 );
$path = $_SERVER ['DOCUMENT_ROOT'];
$path .= "/layout/connection/GlobalCrud.php";

include_once ($path);
date_default_timezone_set ( "Asia/Kolkata" );

$dropdown = '';

$dataPayment = GlobalCrud::getData ( 'paymentPendingSelect' );

$dataBatch = GlobalCrud::getAllRecordsBasedOnId ( 'batchdashboardWithOutDate', array (
		'0',
		'0' 
) );
$dataSupport = GlobalCrud::getAllRecordsBasedOnId ( 'supportdashboardWithOutDate', array (
		'0',
		'0' 
) );
$dataInterview = GlobalCrud::getAllRecordsBasedOnId ( 'interviewdashboardWithOutDate', array (
		'0',
		'0' 
) );

/* $dataSupportTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionSupport', array (
		'0',
		'0' 
) );
$dataClientTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionClient', array (
		'0',
		'0' 
) );
$dataInterviewTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionInterview', array (
		'0',
		'0' 
) ); */


if ($_GET ['content'] == 50)
{
	$dataBatch = GlobalCrud::getAllRecordsBasedOnId ( 'batchdashboard', array (
			'1',
			'1'
	) );
	$dataSupport = GlobalCrud::getAllRecordsBasedOnId ( 'supportdashboard', array (
			'1',
			'1'
	) );
	$dataInterview = GlobalCrud::getAllRecordsBasedOnId ( 'interviewdashboard', array (
			'1',
			'1'
	) );
	$dataSupportTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionSupport', array (
			'1',
			'1'
	) );
	$dataClientTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionClient', array (
			'1',
			'1'
	) );
	$dataInterviewTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionInterview', array (
			'1',
			'1'
	) );
	$dateValue1 = date ( 'Y-M-d' );
	$dateT1 = date_create ( $dateValue1 );
	$temDate1 = date_sub ( $dateT1, date_interval_create_from_date_string ( '1 month' ) );
	$date1 = date_format ( $temDate1, 'Y-m' );
	$dropdown = 'Last Month Details   : ' . $date1;
}


if (! empty ( $_POST )) {
	
	// keep track post values
	$id = $_POST ['id'];
	
	if ($id == 1) {
		$dataBatch = GlobalCrud::getAllRecordsBasedOnId ( 'batchdashboard', array (
				$id,
				$id 
		) );
		$dataSupport = GlobalCrud::getAllRecordsBasedOnId ( 'supportdashboard', array (
				$id,
				$id 
		) );
		$dataInterview = GlobalCrud::getAllRecordsBasedOnId ( 'interviewdashboard', array (
				$id,
				$id 
		) );
		$dataSupportTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionSupport', array (
				$id,
				$id 
		) );
		$dataClientTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionClient', array (
				$id,
				$id 
		) );
		$dataInterviewTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionInterview', array (
				$id,
				$id 
		) );
		$dateValue1 = date ( 'Y-M-d' );
		$dateT1 = date_create ( $dateValue1 );
		$temDate1 = date_sub ( $dateT1, date_interval_create_from_date_string ( '1 month' ) );
		$date1 = date_format ( $temDate1, 'Y-m' );
		$dropdown = 'Last Month Details   : ' . $date1;
	}
	
	if ($id == 2) {
		// current finacial year 2014-04-01 to 2015-03-31
		$dateValue1 = date ( 'Y' ) . '-04-01'; // 2015-04-01
		$dateValue2 = date ( 'Y' ) . '-03-31'; // 2015-03-31
		$dateT1 = date_create ( $dateValue1 );
		$dateT2 = date_create ( $dateValue2 ); //
		if (date ( 'm' ) < 4) {
			// 2014-04-01 to 2015-03-31
			$temDate1 = date_sub ( $dateT1, date_interval_create_from_date_string ( '1 year' ) );
			$temDate2 = date_sub ( $dateT2, date_interval_create_from_date_string ( '0 year' ) );
		} elseif (date ( 'm' ) >= 4) {
			// 2015-04-01 to 2016-03-31
			$temDate1 = date_add ( $dateT1, date_interval_create_from_date_string ( '0 year' ) );
			$temDate2 = date_add ( $dateT2, date_interval_create_from_date_string ( '1 year' ) );
		}
		
		$date1 = date_format ( $temDate1, 'Y-m-d' );
		$date2 = date_format ( $temDate2, 'Y-m-d' );
		
		// echo "current year ".$date1 ." to ".$date2;
		
		$dataBatch = GlobalCrud::getAllRecordsBasedOnId ( 'batchdashboardYear', array (
				$date1,
				$date2 
		) );
		$dataSupport = GlobalCrud::getAllRecordsBasedOnId ( 'supportdashboardYear', array (
				$date1,
				$date2 
		) );
		$dataInterview = GlobalCrud::getAllRecordsBasedOnId ( 'interviewdashboardYear', array (
				$date1,
				$date2 
		) );
		$dataSupportTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionSupportYear', array (
				$date1,
				$date2 
		) );
		$dataClientTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionClientYear', array (
				$date1,
				$date2 
		) );
		$dataInterviewTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionInterviewYear', array (
				$date1,
				$date2 
		) );
		
		$dropdown = 'Current Year Details From :' . $date1 . " to " . $date2;
	}
	
	if ($id == 3) {
		// last finalical year 2013-04-01 to 2014-03-31
		
		$dateValue1 = date ( 'Y' ) . '-04-01'; // 2015-04-01
		$dateValue2 = date ( 'Y' ) . '-03-31'; // 2015-03-31
		$dateT1 = date_create ( $dateValue1 );
		$dateT2 = date_create ( $dateValue2 ); //
		if (date ( 'm' ) < 4) {
			// 2014-04-01 to 2015-03-31
			$temDate1 = date_sub ( $dateT1, date_interval_create_from_date_string ( '2 year' ) );
			$temDate2 = date_sub ( $dateT2, date_interval_create_from_date_string ( '1 year' ) );
		} elseif (date ( 'm' ) >= 4) {
			// 2015-04-01 to 2016-03-31
			$temDate1 = date_sub ( $dateT1, date_interval_create_from_date_string ( '1 year' ) );
			$temDate2 = date_sub ( $dateT2, date_interval_create_from_date_string ( '0 year' ) );
		}
		
		$date1 = date_format ( $temDate1, 'Y-m-d' );
		$date2 = date_format ( $temDate2, 'Y-m-d' );
		
		// echo "last year ".$date1 ." to ".$date2;
		
		$dataBatch = GlobalCrud::getAllRecordsBasedOnId ( 'batchdashboardYear', array (
				$date1,
				$date2 
		) );
		$dataSupport = GlobalCrud::getAllRecordsBasedOnId ( 'supportdashboardYear', array (
				$date1,
				$date2 
		) );
		$dataInterview = GlobalCrud::getAllRecordsBasedOnId ( 'interviewdashboardYear', array (
				$date1,
				$date2 
		) );
		$dataSupportTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionSupportYear', array (
				$date1,
				$date2 
		) );
		$dataClientTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionClientYear', array (
				$date1,
				$date2 
		) );
		$dataInterviewTran = GlobalCrud::getAllRecordsBasedOnId ( 'closeTrasactionInterviewYear', array (
				$date1,
				$date2 
		) );
		
		$dropdown = 'Last Year Details From :' . $date1 . " to " . $date2;
	}
}
?>

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
.labelData {
	font-size: 25px;
	color: #45aed0;
}

#dashboard {
	width: 98%;
	height: auto;
	top: 30px;
	left: -15px;
	padding: 10px;
	float: auto;
}

#dashboard,#dashboard>div {
	-webkit-box-sixing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

.title {
	text-align: right;
	padding-right: 20px;
}

#label {
	text-align: center;
	padding-right: 10px;
}

.labelData {
	font-size: 20px;
	color: #45aed0;
}

.labelData1 {
	font-size: 25px;
	color: #45aed0;
	height: 20px;
}

.txt {
	text-align: right;
}

.left1 {
	float: left;
	width: 48%;
	position: relative;
	height: 210px;
	overflow: auto;
	padding-left: 20px;
}

.right1 {
	position: relative;
	float: right;
	width: 48%;
	height: 210px;
	overflow: auto;
	/*clear: right; */
}

.Yearandselect {
	overflow: auto;
}
</style>

</head>
<body>
	<!-- Begin Wrapper -->
	<div class="container-fluid1">


		<div class="Yearandselect">
		<span class="labelData"><?php echo empty($dropdown)?'Current Month Details  : '.date('M-Y'):$dropdown;?></span>
		<span style="float: right;">
			<form action="#" method="post">
			<?php if ($_GET ['content'] == 50) {?>
				Select:<select name="id" id="id">
				
					
					<option value="1">Last Month</option>
					<option value="2">Current Year</option>
					<option value="3">Last Year</option>
					
					
				</select>
				<button type="submit" class="btn btn-success">GO!</button>
				<?php }?>
			</form>
		</span>
	</div>

				
				
				



<?php if ($_GET ['content'] == 50) {?>
<p class="labelData">
			<span>Training Closed Transaction</span><span style="float: right; width: 47%">Support
				Closed Transaction</span>
		</p>
		
			
			<div class="row">
	
		 <div class='left1' id="none">
				<table data-filter="#filter" class="footable">
					<thead>
						<tr>
							<th>Client Name</th>


							<th>Training Count</th>


						</tr>
					</thead>
					<tbody>
						
						<?php
						
						foreach ( $dataClientTran as $row ) {
							echo '<tr>';
							echo '<td>' . $row ['client'] . '</td>';
							echo '<td>' . $row ['training'] . '</td>';
							echo '</tr>';
						}
						?>
					</tbody>
				</table>
					
					<?php echo empty($dataClientTran)?'No Records Found':'';?>
				</div>
			
			
			
			
			
			
			<div class='right1' id="none">


				<table data-filter="#filter" class="footable">
					<thead>
						<tr>
							<th>Client Name</th>

							<th>Support Count</th>


						</tr>
					</thead>
					<tbody>
						
						<?php
	
	foreach ( $dataSupportTran as $row ) {
		echo '<tr>';
		echo '<td>' . $row ['client'] . '</td>';
		echo '<td>' . $row ['support'] . '</td>';
		
		echo '</tr>';
	}
	
	?>
					</tbody>
				</table>
					<?php echo empty($dataSupportTran)?'No Records Found':'';?>
				</div>
		

</div>
		<p class="labelData">
			<span>Interview Closed Transaction</span> <span
				style="float: right; width: 47%"></span>
		</p>
		<div class="row">
			<div class='left1' id="none">
				<table data-filter="#filter" class="footable">
					<thead>
						<tr>
							<th>Client Name</th>


							<th>Interview Count</th>



						</tr>
					</thead>
					<tbody>
						
						<?php
	
	foreach ( $dataInterviewTran as $row ) {
		echo '<tr>';
		echo '<td>' . $row ['client'] . '</td>';
		
		echo '<td>' . $row ['interview'] . '</td>';
		
		echo '</tr>';
		$count ++;
	}
	?>
					</tbody>
				</table>
					
					<?php echo empty($dataInterviewTran)?'No Records Found':'';?>
				</div>

 

		</div>

<?php }else{?>
				
				
				
				
				
				
			


	<div id="dashboard">

<p class="labelData">
			<span>Payment Pending</span><span style="float: right; width: 48%">Support</span>
		</p>
		<div class="row">

			<div class='left1' id="none">
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
	
	foreach ( $dataPayment as $row ) {
		echo '<tr>';
		echo '<td>' . $row ['name'] . '</td>';
		echo '<td>' . $row ['client'] . '</td>';
		echo '<td>' . $row ['category'] . '</td>';
		echo '<td>' . $row ['assistedBy'] . '</td>';
		echo '</tr>';
	}
	?>
					</tbody>
				</table>
					
				<?php echo empty($dataPayment)?'No Records Found':'';?>
		</div>


			<div class='right1' id="none">


				<table data-filter="#filter" class="footable">
					<thead>
						<tr>
							<th>Supported By</th>
							<th>Supported To</th>
							<th nowrap="nowrap">Start Date</th>
							<th>Technology</th>
							<th>status</th>
						</tr>
					</thead>
					<tbody>
					
						<?php
	
	foreach ( $dataSupport as $row ) {
		echo '<tr>';
		echo '<td>' . $row ['supportedBy'] . '</td>';
		echo '<td>' . $row ['supportedTo'] . '</td>';
		echo '<td>' . $row ['startedDate'] . '</td>';
		echo '<td>' . $row ['technology'] . '</td>';
		echo '<td>' . $row ['status'] . '</td>';
		echo '</tr>';
		$count ++;
	}
	?>
					</tbody>
				</table>
		<?php echo empty($dataSupport)?'No Records Found':'';?>
</div>
		</div>
		<p class="labelData"><span>Interview</span><span style="float: right; width: 48%">Batch</span></p>
		
		<div class="row">

			<div class='left1' id="none">



				<table data-filter="#filter" class="footable">
					<thead>
						<tr>
							<th>Date</th>
							<th>Consultant For</th>
							<th>Supported By</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
							<?php
	
	foreach ( $dataInterview as $row ) {
		echo '<tr>';
		echo '<td>' . $row ['date'] . '</td>';
		echo '<td>' . $row ['trainee'] . '</td>';
		echo '<td>' . $row ['supportedBy'] . '</td>';
		echo '<td>' . $row ['status'] . '</td>';
		echo '</tr>';
		$count ++;
	}
	?>
					</tbody>
				</table>
				<?php echo empty($dataInterview)?'No Records Found':'';?>
</div>


<div class="row">

			<div class='right1' id="none">
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
						<?php
	
	foreach ( $dataBatch as $row ) {
		echo '<tr>';
		echo '<td>' . $row ['batchId'] . '</td>';
		echo '<td>' . $row ['noofStudent'] . '</td>';
		echo '<td>' . $row ['name'] . '</td>';
		echo '<td>' . $row ['technologyName'] . '</td>';
		echo '</tr>';
		$count ++;
	}
	?>
					</tbody>
				</table>
				<?php echo empty($dataBatch)?'No Records Found':'';?>
			</div>






		</div>
<?php }?>
		





	</div>

</div>









	<!-- Begin Content -->
</body>
</html>