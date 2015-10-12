<?php
	require "config.php";
	
	$title = $_POST["title"];
	$note = $_POST["note"];
	$subtitle = $_POST["subtitle"];
	$date = date('d-m-y');
	if($title == null || $note == null)
	{
		header("Refresh:0.1; url=cpe02.php");
	}else{
	$sql = "INSERT INTO comsystem.logs(date,title,note,test) VALUES('$date','$title','$note','$subtitle')";
	if(mysql_query($sql))
	{
		header("Refresh:0.1; url=cpe02.php");
		
	}
	else
	{
		
	echo mysql_error();
	}
	
	}
	
	 
   

?>
