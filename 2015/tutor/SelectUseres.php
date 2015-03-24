<?php
	session_start();
	include("db.php"); 
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Select</title>
<style type="text/css">
<!--
body {
	font: 100% Verdana, Arial, Helvetica, sans-serif;
	background: #666666;
	margin: 0; /* it's good practice to zero the margin and padding of the body element to account for differing browser defaults */
	padding: 0;
	text-align: center; /* this centers the container in IE 5* browsers. The text is then set to the left aligned default in the #container selector */
	color: #000000;
}

.oneColElsCtrHdr #container {
	width: 46em;  /* this width will create a container that will fit in an 800px browser window if text is left at browser default font sizes */
	background: #FFFFFF;
	margin: 0 auto; /* the auto margins (in conjunction with a width) center the page */
	border: 1px solid #000000;
	text-align: left; /* this overrides the text-align: center on the body element. */
}
.oneColElsCtrHdr #header {
	padding: 0 10px 0 20px;  /* this padding matches the left alignment of the elements in the divs that appear beneath it. If an image is used in the #header instead of text, you may want to remove the padding. */
	background-color: #660000;
} 
.oneColElsCtrHdr #header h1 {
	margin: 0; /* zeroing the margin of the last element in the #header div will avoid margin collapse - an unexplainable space between divs. If the div has a border around it, this is not necessary as that also avoids the margin collapse */
	padding: 10px 0; /* using padding instead of margin will allow you to keep the element away from the edges of the div */
}
.oneColElsCtrHdr #mainContent {
	padding: 0 20px; /* remember that padding is the space inside the div box and margin is the space outside the div box */
	background: #FFFFFF;
}
.oneColElsCtrHdr #footer { 
	padding: 0 10px; /* this padding matches the left alignment of the elements in the divs that appear above it. */
	background:#DDDDDD;
} 
.oneColElsCtrHdr #footer p {
	margin: 0; /* zeroing the margins of the first element in the footer will avoid the possibility of margin collapse - a space between divs */
	padding: 10px 0; /* padding on this element will create space, just as the the margin would have, without the margin collapse issue */
}
-->
</style>
</head>

<body class="oneColElsCtrHdr">

<div id="container">
  <div id="mainContent">
  <?php
	$connect = connect();
	
	$sql = "SELECT * FROM useres";

	$query = mysql_query($sql);
	echo "<html>
		<title>Users</title>
		</head>
		<body>
		<h1>Users</h1>
		<table border=1>
		<tr>
		<td></td>
		<td><h5>Name</h5></td>
		<td><h5>Type</h5></td>
		<td><h5>Email</h5></td>
		<td><h5>Phone</h5></td>
		<td><h5>Status </h5></td>
	
		<td><h5>languages</h5></td>
		<tr>";
		
	if (mysql_num_rows($query) == 0)	
	{
	    echo "No records found";
	}
	else
	{	
		while($row = mysql_fetch_object($query))
		{	
			echo "<tr><td><a href='UpdateHr.php?user=".$row->email."'><img src='b_edit.png' alt='Angry face' border=0/></a></img>" ;
			echo "<a href='DeleteStaff.php?value=".$row->email."' onclick=\"return confirm('Do you want to delete this info');\"'><img src='b_drop.png' alt='Angry face' border=0/></img></a>";
			

			echo "</td><td>" . $row->FirstName;
			echo " " . $row->MiddleName;
			echo " " . $row->LastName;
    		echo "</td><td>" . $row->type;
			echo "</td><td>" . $row->email;
			echo "</td><td>" . $row->phone;
			echo "</td><td>" . $row->stat;
			echo "</td><td>" . $row->languges;
		}
	}
	mysql_close($connect);
?>
  <!-- end #mainContent --></table></div>
	<!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats --><br class="clearfloat" />
<!-- end #container --></div>
</body>
</html>