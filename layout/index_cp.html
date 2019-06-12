<!DOCTYPE html>
<html>
<head profile="http://www.w3.org/2005/10/profile">
<title>Usk Tool</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="./css/bootstrap.min.css" rel="stylesheet">
<link href="./css/index.css" rel="stylesheet" type="text/css" />
<link href="./css/asterisk.css" rel="stylesheet" type="text/css" />
<link href="./css/fa/css/font-awesome.min.css" rel="stylesheet"
	type="text/css" />
<link href="./css/foot/footable-0.1.css" rel="stylesheet"
	type="text/css" />
<link href="./css/foot/footable.sortable-0.1.css" rel="stylesheet"
	type="text/css" />
	<style type="text/css">
	
	<style type="text/css">
    #navRes{
        padding: 0;
        list-style: none;
    }
    #navRes li{
        width: 100px;
        display: inline-block;
        position: relative;
        text-align: center;
        line-height: 21px;
    }
    #navRes li a{
        display: block;
        padding: 5px 10px;
        color: #333;
        background: #45aed0;
        text-decoration: none;
    }
    #navRes li a:hover{
        color: #fff;
        background: #939393;
    }
    #navRes li ul{
        display: none;
        position: absolute;
        z-index: 999;
        left: 0;
    }
    #navRes li:hover ul{
        display: block; /* display the dropdown */
    }
</style>

<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"
	type="text/javascript"></script>

<script src="./js/jquery.js" type="text/javascript"></script>
<script src="./js/foot/footable-0.1.js" type="text/javascript"></script>
<script src="./js/foot/footable.sortable.js" type="text/javascript"></script>
<script src="./js/foot/footable.filter.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
      $('table').footable(



    	      );
    });

    $(document).ready(function(){
    	var rowCount = $('#myTable tr').length - 1;
    	var i=1;
       $("#add_row").click(function(){
        $('#addr'+i).html("<td><input name='contactId[]' type='hidden' value='0'/><input name='poc[]' type='text' placeholder='poc' class='form-control input-md'  /> </td><td><input  name='email[]' type='email' placeholder='email'  class='form-control input-md'></td><td><input  name='designation[]' type='text' placeholder='designation'  class='form-control input-md'></td><td><input  name='phone[]' type='text' placeholder='phone' onkeypress='return event.charCode >= 48 &amp;&amp; event.charCode <= 57' class='form-control input-md'></td><td>&nbsp;<a  onClick='delRow(0)'><i class='fa fa-minus-square'></i></a></td>");
        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
        i++; 
    });
      

    });

 function delRow(id)
    {
      var current = window.event.srcElement;
      //here we will delete the line
      while ( (current = current.parentElement)  && current.tagName !="TR");
                 current.parentElement.removeChild(current);
                 if(id != 0){
                	var main =  document.getElementById("deleteRecords").value;
                	if(main == ''){
                		document.getElementById("deleteRecords").value = id;
                	}else
                 document.getElementById("deleteRecords").value = main+","+id;      
                 }    
    }

 function MatchIgnoreCase(strTerm, strToSearch) 
 { 
 	strToSearch = strToSearch.toLowerCase(); 
 	strTerm = strTerm.toLowerCase(); 
 	if(strToSearch==strTerm) 
 	{ 
 		return true; 
 	} else { 
 		return false; 
 	} 
 }
     function validateUser(tablename) {
     	var name = document.getElementById("name").value;
     	// alert("Name"+name.length); 
         if(name.length>=3){
         	$.ajax({
         		  url: '/layout/connection/GlobalCrud.php',
         		  type: 'POST',
         		  data: {operation: "duplicate", sql: "select * from "+tablename+" where name like  '"+name+"%'" , sqlValues:""},
         		  success: function(response) {
         		  	var splitted = response.split(",", 1);

         		  var result = MatchIgnoreCase(name,splitted+"");
         		  	$('#createMessage').css("display", "none");
         			if(result){
         				
         		  		$('#create').hide();
         		  		$('#update').hide();
         		  		$('#createMessage').css("display", "block");
         		  	}
         			else{
         				$('#create').show();
         				$('#update').show();
         				$('#createMessage').css("display", "none");
             			}
         		  },
         		  error: function(e) {
         		  }
         		});
 		
     	   	} 
     }


     function validateUserCreds(tablename) {
      	var name = document.getElementById("name").value;
          if(name.length>=3){
          	$.ajax({
          		  url: '/layout/connection/GlobalCrud.php',
          		  type: 'POST',
          		  data: {operation: "duplicateUser", sql: "select * from "+tablename+" where username like  '"+name+"%'" , sqlValues:""},
          		  success: function(response) {
          		  	var splitted = response.split(",", 1);
	          		  var result = MatchIgnoreCase(name,splitted+"");
          		  	$('#createMessage').css("display", "none");
          			if(result){
          				
          		  		$('#create').hide();
          		  		$('#update').hide();
          		  		$('#createMessage').css("display", "block");
          		  	}
          			else{
          				$('#create').show();
          				$('#update').show();
          				$('#createMessage').css("display", "none");
              			}
          		  },
          		  error: function(e) {
              		  alert("error");
          		  }
          		});
  		
      	   	} 
      }


function oppurtunityTracker(){
	/* var existing =  $("#exist").val(); */
	var type = $("#type").val();
var category = $("#category").val();
var paid = $("#paid").val();
	var provideBy = $("#providedBy").val();
	var provideFor = $("#mySelect").val();
	var date = $("#datepicker").val();
	var arrayValues=[type,category,provideBy,provideFor,date,paid];
	$.ajax({
		  url: '/layout/connection/GlobalCrud.php',
 		  type: 'POST',
 		  async: false,
			data: {operation: "oppurtunityTrackerInsert", sql: "trackerInsert", sqlValues : arrayValues},
			success: function(response) {
				
				 $("#AddSucessful").css("display", "block");
				/*  setTimeout(function(){
  				   $("#AddSucessful").css("display", "none");
  			      },1000); */

				 return true;
				 	},
			error: function(e){ 
				return false;
	}

	});
	
	
}


function supportTracking() {
        
       	 var supportby = $("#supportTrackingSupportby").val(); 
         var supportto = $("#supportTrackingSupportto").val();
         var date = $("#supportTrackingDate").val();
         var hours = $("#supportTrackingHours").val();
         var description = $("#supportTrackingDescription").val();
         var arrayValues = [supportby,supportto,date,hours,description];
           	$.ajax({
           		  url: '/layout/connection/GlobalCrud.php',
           		  type: 'POST',
           		  async: false,
           		  data: {operation: "supportTracking", sql: "supportTrackerInsert",sqlValues : arrayValues },
           		  success: function(response) {
               		  

           			  $("#AddRecord").css("display", "block");
           			 setTimeout(function(){
      				   $("#AddRecord").css("display", "none");
      			      },5000);

           		  return false;
           		  },
           		  error: function(e) {
               	   return false;
           		  }
           		});
   		
       	   
       }

     function checkPasswordAndConform(){

         var pass = $("#password").val();
         var cpass = $("#conformPassword").val();
         if(pass === cpass){
        		$('#create').show();
  				$('#update').show();
        	 $('#createCMessage').css("display", "none");
         
             
         }else{
        	 $('#create').hide();
		  		$('#update').hide();
        	 $('#createCMessage').css("display", "block");
             
             
         }
     }
     
       
     function getTheEmail(tablename) {
      	var name = document.getElementById("assignedtoid").value;
        
          	$.ajax({
          		  url: '/layout/connection/GlobalCrud.php',
          		  type: 'POST',
          		  data: {operation: "email", sql: "select * from "+tablename+" where id = '"+name+"'" , sqlValues:"",body:"",method:""},
          		  success: function(response) {
          		  	var splitted = response.split(",", 2);
          		    document.getElementById("employeeEmail").value = splitted[0];
					document.getElementById("employeeName").value = splitted[1];
          		  	
          		  },
          		  error: function(e) {
          		  }
          		});
  		
      	   
      }

    function delFromHome(id,sqlCon)
    {
    	
    	 var current = window.event.srcElement;
     	var answer =  confirm("Are you sure you want to delete?");
    		if(answer){
    	$.ajax({
    		   type: "POST",
    		   url: "/layout/connection/GlobalCrud.php",
    		   data: {operation: "delete", sql: sqlCon, sqlValues: id},
    		   cache: false,
    		   success: function(){
    			   $("#DeletedRecord").css("display", "block");
    			   setTimeout(function(){
    				   $("#DeletedRecord").css("display", "none");
    			      },1000);
    			   while ( (current = current.parentElement)  && current.tagName !="TR");
    			              current.parentElement.removeChild(current);
    		  },error: function(){
    			
    		  }
    		 
    		 });
    		}
    	
    }


    $(function() {
        $('a').click(function() {
           
        });
    });
    
    function toogle(id) {
       		$('.RowToClick' + id).toggle(300);
    		//$('.RowToClick' + id+'e').toggleClass('fa-plus-circle fa-minus-circle');
       		$('.RowToClick' + id+'e').find('i').toggleClass('fa-minus-circle fa-plus-circle');
       		//$('#'+id).show();
	}

    
    function changeTheClass(){
    	
    	  $("#myTable tr.RowToClick").toggle(self.checked);  
    	 
    	   $('#checkboxID').click(function() {
    		   if(this.checked){
    			   $("#mainCountcheck").html(document.getElementById("myTable").rows.length);
    		  }else{
    			  $("#mainCountcheck").html(parseInt(document.getElementById("myTable").rows.length)-parseInt($("#mainCountcheck2").html())-parseInt(1));
    		  }
    		}); 
      		
    	} 

 function changeTheClass1(){
	  $("#myTable tr.RowToClick2").toggle(self.checked);  
    } 


 function checkTheUserStatus(user,elementId,buttonId){
	//console.log(user);
		if(user == 'User'){
			var selectedvalue = $("#"+elementId).val();
			if(selectedvalue.length == 20 || selectedvalue.length == 10){
				$("#userBasedAllowedAndNotAllowed").css("display","block");
				$("#"+buttonId).css("display","none");
				
				}
		/* 	if(selectedvalue.length == 10){
				$("#userBasedAllowedAndNotAllowed").css("display","block");
				$("#"+buttonId).css("display","none");
			}
		 */	if(selectedvalue.length != 10 && selectedvalue.length != 20 ){
				//console.log("10");
				$("#userBasedAllowedAndNotAllowed").css("display","none");
				$("#"+buttonId).css("display","block");
		}
		}
		
 }
function disableEditButton(role){

	if(role == 'View'){
 	$(".fa-pencil-square" ).css( "display", "none" );
 	$(".fa-trash" ).css( "display", "none" );
	}
}
  </script>

<link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon" />
</head>
<?php
error_reporting ( 0 );
session_start ();
$username = $_SESSION ['username'];
$role = $_SESSION ['role'];
if (! empty ( $username )) {
	?>
<body onload="disableEditButton('<?php echo trim($role)?>')">





	<!-- Begin Wrapper -->
	<div class="container-fluid">

		<div class="mainHeader">
			<ul class="li">

				<li class="left"><img src="./img/logo_blue.gif" /></li>
				<li class="right" id="dmtHeading"><h1>Data Management Tool</h1></li>

			</ul>
		</div>
		<!-- Begin Header -->
		<!-- 	<h2>Data Management Tool <img src="./img/logo.gif" align="right" width="100px"></h2> -->
		<!-- End Header -->
		<!-- Begin Naviagtion -->



		<div id="nav">
			<!-- <div class="navigation">
				<nav class="navbar navbar-default"> 
					<div class="container-fluid">
						
					</div>
				</nav>

			</div> -->
			<ul>
						<?php include 'menu.php';?>
					</ul>
		</div>
		
		
		
		
		<ul id="navRes">
		 <li>
            <a href="#">Select</a>
            <ul id="navRes">
               <?php include 'menu.php';?>
            </ul>
        </li>
		
		</ul>





		
		
		
		<div align="right">
		
Welcome to <?php  echo $_SESSION['username']; ?><br> <a
				href="logout.php" class="logout">logout</a>
		</div>

		
		
		
		
		
		
		
		<!-- End Naviagtion -->
		<!-- Begin Content -->


		<div id="content">
			<?php
	
	// $username = $_SESSION['username'];
	// if (!empty($username)){
	
	switch ($_GET ['content']) {
		/* technology */
		case 1 :
			include './technology/technology_home.php';
			break;
		case 2 :
			include './technology/create.php';
			break;
		case 3 :
			include './technology/update.php';
			break;
		
		/* Trainer */
		case 4 :
			include './trainer/trainer_home.php';
			break;
		case 5 :
			include './trainer/create.php';
			break;
		case 6 :
			include './trainer/update.php';
			break;
		
		/* Client */
		case 7 :
			include './client/client_home.php';
			break;
		case 8 :
			include './client/create.php';
			break;
		case 9 :
			include './client/update.php';
			break;
		
		/* Batch */
		case 10 :
			include './batch/batch_home.php';
			break;
		case 11 :
			include './batch/create.php';
			break;
		case 12 :
			include './batch/update.php';
			break;
		
		/* employee */
		case 13 :
			include './employee/employee_home.php';
			break;
		case 14 :
			include './employee/create.php';
			break;
		case 15 :
			include './employee/update.php';
			break;
		
		/* Resume */
		/*
		 * case 16 :
		 * include '/resume/resume_home.php';
		 * break;
		 * case 17 :
		 * include '/resume/create.php';
		 * break;
		 * case 18 :
		 * include '/resume/update.php';
		 * break;
		 */
		
		/* TODO */
		case 19 :
			include './todo/todo_home.php';
			break;
		case 20 :
			include './todo/create.php';
			break;
		case 21 :
			include './todo/update.php';
			break;
		
		/* Interview */
		case 22 :
			include './interview/interview_home.php';
			break;
		case 23 :
			include './interview/create.php';
			break;
		case 24 :
			include './interview/update.php';
			break;
		
		/* course */
		case 25 :
			include './course/course_home.php';
			break;
		case 26 :
			include './course/create.php';
			break;
		case 27 :
			include './course/update.php';
			break;
		
		/* recording */
		/*
		 * case 28 :
		 * include '/recording/recording_home.php';
		 * break;
		 * case 29 :
		 * include '/recording/create.php';
		 * break;
		 * case 30 :
		 * include '/recording/update.php';
		 * break;
		 */
		
		/* Pay slip */
		/*
		 * case 31 :
		 * include '/payslip/payslip_home.php';
		 * break;
		 * case 32 :
		 * include '/payslip/create.php';
		 * break;
		 * case 33 :
		 * include '/payslip/update.php';
		 * break;
		 */
		
		/* question */
		case 34 :
			include './question/question_home.php';
			break;
		case 35 :
			include './question/create.php';
			break;
		case 36 :
			include './question/update.php';
			break;
		
		/* Trainee */
		case 37 :
			include './trainee/trainee_home.php';
			break;
		case 38 :
			include './trainee/create.php';
			break;
		case 39 :
			include './trainee/update.php';
			break;
		
		/* Support */
		case 40 :
			include './support/support_home.php';
			break;
		case 41 :
			include './support/create.php';
			break;
		case 42 :
			include './support/update.php';
			break;
		
		case 43 :
			include './dashboard/dashboard.php';
			break;
		
		/* User Details */
		case 44 :
			include './registration/registration_home.php';
			break;
		case 45 :
			include './registration/create.php';
			break;
		case 46 :
			include './registration/update.php';
			break;
		/* client_contact */
		/*
		 * case 43 :
		 * include './contact/contact_home.php';
		 * break;
		 * case 44 :
		 * include './contact/create.php';
		 * break;
		 * case 45 :
		 * include './contact/update.php';
		 * break;
		 *
		 * case 46 :
		 * include './Excels/excels.php';
		 * break;
		 */
		
                   /* Support tracker */
			case 47 :
				include './supporttracker/supporttracker_home.php';
				break;
case 48 :
					include './supporttracker/update.php';
					break;
                  /* Opportunity tracker */
			case 55 :
				include './opportunity/opportunity.php';
				break;
case 56 :
include './opportunity/update.php'; 
break;

		default :
			include './dashboard/dashboard.php';
			break; 
	}
} else {
	include './login.php';
}
?>
		</div>
		<!-- Begin Content -->
	</div>
	<!-- End Wrapper -->
</body>
</html>