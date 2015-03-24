<?php     
session_start();     
include("db.php");


	$error = array();
	
	$FirstName = isset($_POST['FirstName']) ? trim($_POST['FirstName']) : '';
	echo $FirstName;
		if($FirstName == "") $error[]=urlencode("Please enter a First Name.");
			
	$MiddleName = isset($_POST['MiddleName']) ? trim($_POST['MiddleName']) : '';
	
		if($MiddleName == "") $error[]=urlencode("Please enter a Middle Name.");
			
	$LastName = isset($_POST['LastName']) ? trim($_POST['LastName']) : '';
	
		if($LastName == "") $error[]=urlencode("Please enter a Last Name.");

	$type = isset($_POST['type']) ? trim($_POST['type']) : '';
		
	$email = isset($_POST['email']) ? trim($_POST['email']) : '';
	
		if($email == "") $error[]=urlencode("Please enter an Email Address.");
		

		
	$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
	
		if($phone == "") $error[]=urlencode("Please enter a Phone Number.");

	$stat = isset($_POST['stat']) ? trim($_POST['stat']) : '';

	$languges = isset($_POST['languges']) ? trim($_POST['languges']) : '';
	
		if($languges == "") $error[]=urlencode("Please enter a programming
		languges.");
	

	
	
	$connect = connect();
	
 echo $FirstName; 

     $sql = " insert into useres (FirstName,MiddleName,
LastName,type,email,phone,stat,languges)
VALUES('$FirstName','$MiddleName','$LastName','$type','$email','$phone','$stat','$languges');"; echo
$sql;     mysql_query($sql);
	
header("Refresh: 300; URL=insertUser.php");
	 if(mysql_affected_rows($connect) == 1)
	   { $id = mysql_insert_id($connect); $filename = $id ;
	
        echo "<h1>New User inserted - ID: $id</h1>";     }     else         echo
"<h1>Error: User not inserted</h1>";     mysql_close($connect);   ?>
