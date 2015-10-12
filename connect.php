<?php
	$host = 'localhost';
	$user = 'root';
	$pass = 'robot';
	$dbname = 'comsys';


	$conn = mysql_connect($host,$user,$pass,$dbname) or die(mysql_error());
	mysql_query("SET NAMES UTF8");

?>