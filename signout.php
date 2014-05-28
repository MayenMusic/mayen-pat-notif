<?php
	session_start();
	require_once("mayen-dbcon.php");
	$db = new db();
	$db -> connect();
	
	if($_SESSION["type"] == "admin"){
		unset ($_SESSION["isAdmin"]);
		unset ($_SESSION["type"]);		
		header('Location:index.php');
	}
	
	session_destroy();
?>