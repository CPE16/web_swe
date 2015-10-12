<meta charset = "utf-8">

<?php
require "config.php";

function login($usr,$pass,$type,$pdo)
{
	if($type == 0)
	{
			$login_type = "admin";
			$from = "adminregis";
	}
	else if($type==1) 
	{
			$login_type = "Student_ID";
			$from = "studentregis";
	}
	else 
	{
			$login_type = "Projressor_ID";
			$from = "profressorregis";
	}

	$sth = $pdo->prepare("SELECT * FROM $from WHERE $login_type = :usr and password = :psswrd");
	$sth->bindParam(':usr', $usr, PDO::PARAM_STR);
  	$sth->bindParam(':psswrd', $pass, PDO::PARAM_STR);
  	$sth->execute();
  	while ($row = $sth->fetch(PDO::FETCH_ASSOC)) 
  	{
		return true;
  	}
  	return false;
}

function goback($message,$url)
{ 
	echo "
	<script type='text/javascript'>
	alert('$message');
	window.location.href='$url' </script>
	";
}

function success($user,$url)
{
		session_start();
		$_SESSION['login_user']= $user; // Initializing Session
		$status = "Success";
		header("location: $url");// Redirecting To Other Page
}
?>


		   
