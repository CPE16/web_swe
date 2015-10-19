<?php 
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$dbname = "comsystem";


	$conn = mysql_connect($host,$user,$pass,$dbname) or die(mysql_error());
	mysql_query("SET NAMES UTF8");

		$pdo = new PDO('mysql:host=localhost;dbname=comsystem','root','');
        $pdo->exec("set names utf8");


?>
