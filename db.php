<?php

/**************************************
Connect to the database
***************************************/
function connect()
{
	$connect = mysql_connect("localhost", "root", "")
	or die( "ERROR: Connection failed!");

	$sel = mysql_select_db("tutoring_management_system");
	if(!$sel)
		exit("Error: Could not select database!");	

	return $connect;
}

/**************************************
Get array list for ENUM or SET options
***************************************/
function getOptions($sql)
{
	$connect = connect();
	$query = mysql_query($sql);	
	$row = mysql_fetch_object($query);
	$setOptions = preg_replace("/(enum|set)\('(.+?)'\)/","\\2", $row->Type);
	$options = explode("','", $setOptions);
	mysql_close($connect);
	return $options;
}

?>