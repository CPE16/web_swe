<?php
session_start();

if (isset($_GET['session_name'])) 
	{
		$_SESSION['session_name'] = $_GET['session_name'];
		echo $_SESSION['session_name'];
	}
	echo "tpp";
?>